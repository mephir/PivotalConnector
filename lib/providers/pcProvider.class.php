<?php
abstract class pcProvider {
  const METHOD_GET = 0;
  const METHOD_POST = 1;
  const METHOD_PUT = 2;

  protected $ssl_enabled = true;
  protected $url = 'www.pivotaltracker.com/services/v3';
  protected $method = 0;
  protected $headers = array();
  protected $basic_auth = null;
  protected $resource = null;
  protected $params = array();

  private $cert_path = null;
  protected $verify_ssl = true;

  public function __construct($cert = null, $verify_ssl = true)
  {
    $this->cert_path = $cert;
    $this->verify_ssl = $verify_ssl;
  }

  public function isSSLEnabled()
  {
    return $this->ssl_enabled;
  }

  public function enableSSL($v = true)
  {
    $this->ssl_enabled = $v;
  }

  public function getUrl()
  {
    $url = $this->ssl_enabled?'https://':'http://';
    return $url . $this->url . $this->getResource();
  }

  public function setHeader($name, $value)
  {
    $this->headers[$name] = $values;
  }

  public function getHeader($name)
  {
    return isset($this->headers[$name])?$this->headers[$name]:false;
  }

  public function setBasicAuth($username, $password)
  {
    $this->basic_auth = array(
      'username' => $username,
      'password' => $password,
    );
  }

  public function getSSLCertPath()
  {
    return $this->cert_path;
  }

  public function verifySSL()
  {
    return $this->verifySSL;
  }

  public function setResource($resource)
  {
    $this->resource = $resource;
  }

  public function getResource()
  {
    return $this->resource;
  }

  public function setParam($name, $value)
  {
    $this->params[$name] = $value;
  }

  public function getParam($name)
  {
    return isset($this->params[$name])?$this->params[$name]:false;
  }

  abstract public function execute();

  public function setMethod($method)
  {
    $this->method = $method;
  }

  public function getMethod()
  {
    return $this->method;
  }

  public function isBasicAuth()
  {
    return !is_null($this->basic_auth);
  }

  public function getBasicAuth($param = null)
  {
    if (is_null($param))
    {
      return $this->basic_auth;
    }
    return isset($this->basic_auth[$param])?$this->basic_auth[$param]:false;
  }

  public function getUrlifyParams()
  {
    $fields_string = '';
    foreach($this->params as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
    rtrim($fields_string,'&');
    return $fields_string;
  }
}