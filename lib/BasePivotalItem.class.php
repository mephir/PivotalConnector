<?php
/**
 * Pivotal Base Item - Class providing basic behaviors for all pivotal items like project, story, task etc...
 *
 * @category   Library
 * @package    BasePivotalItem
 * @author     Pawel Wilk <pwilkmielno@gmail.com>
 * @license    http://creativecommons.org/licenses/by-sa/3.0/
 * @link       https://github.com/mephir/PivotalConnector
 */
abstract class BasePivotalItem {
  protected $provider = null;
  protected $_data = array();
  protected $_new = true;
  protected $_dirty = false;

  public function __construct(ProviderInterface $provider)
  {
    $this->provider = $provider;
  }

  public function set($key, $value)
  {
    $this->_data[$key] = $value;
  }

  public function get($key)
  {
    if (!isset($this->_data[$key]))
    {
      throw new PivotalUnknownProperty($this, $key); //Unknown record property / related component "$key" on "$this"
    }
    return $this->_data[$key];
  }

  public function __call($method_name, $arguments)
  {
    //
  }

  public function __toXml()
  {
    //
  }
}