<?php
abstract class pcProvider {
  const METHOD_GET = 'get';
  const METHOD_POST = 'post';
  const METHOD_PUT = 'put';
  const METHOD_DELETE = 'delete';

  protected $ssl_enabled = true;
  protected $url = 'www.pivotaltracker.com/services/v3';
  protected $method = 'get';
  protected $headers = array();

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
    return $this->ssl_enabled?'https://'?'http://';
  }

  abstract public function execute();

  public function setHeader($name, $value)
  {
    $this->headers[$name] = $values;
  }

  public function getHeader($name)
  {
    return isset($this->headers[$name])?$this->headers[$name]:false;
  }
}