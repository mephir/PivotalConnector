<?php
class pcCurlProvider extends pcProvider {
  protected $methods = array(
    0 => 80, //CURLOPT_HTTPGET
    1 => 47, //CURLOPT_POST
    2 => 54, //CURLOPT_PUT
  );

  public function execute()
  {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $this->getUrl());
    curl_setopt($curl, $this->methods[$this->getMethod()], true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    if ($this->isSSLEnabled())
    {
      if (is_null($this->getSSLCertPath()) || !$this->verifySSL())
      {
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
      }
      else
      {
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curl, CURLOPT_CAINFO, $this->getSSLCertPath());
      }
    }

    if ($this->isBasicAuth())
    {
      curl_setopt($curl, CURLOPT_USERPWD, $this->getBasicAuth('username') . ":" . $this->getBasicAuth('password'));
    }

    if ($this->getMethod() == pcProvider::METHOD_POST)
    {
      curl_setopt($curl, CURLOPT_POSTFIELDS, $this->getUrlifyParams());
    }

    $response = curl_exec($curl);

    $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    switch ($http_code)
    {
      case 200:
        break;
      case 401:
        throw new PivotalUnauthorizedAccessException($response, $http_code);
      default:
        throw new PivotalProviderException($response, $http_code);
    }
    curl_close($curl);
    return $response;
  }
}