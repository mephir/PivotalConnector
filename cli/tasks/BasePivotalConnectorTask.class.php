<?php
abstract class BasePivotalConnectorTask {
  protected $options = array();

  public function __construct($argv)
  {
    foreach ($argv as $arg)
    {
      if (preg_match('#^--[a-z]+=.+$#is', trim($arg)))
      {
        preg_match_all('#^--([a-z]+)=(.+)$#is', trim($arg), $matches);
        $this->options[$matches[1][0]] = $matches[2][0];
      }
    }
  }

  abstract public function execute();

  public function getOption($name, $default = null)
  {
    return isset($this->options[$name])?$this->options[$name]:$default;
  }

  public function getProvider($className)
  {
    return new $className();
  }
}