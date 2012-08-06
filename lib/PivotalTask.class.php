<?php
/**
 * Pivotal Task - provide task actions
 *
 * @category   Library
 * @package    PivotalTask
 * @author     Pawel Wilk <pwilkmielno@gmail.com>
 * @license    http://creativecommons.org/licenses/by-sa/3.0/
 * @link       https://github.com/mephir/PivotalConnector
 */
class PivotalTask extends BasePivotalItem {
  protected $provider = null;

  public function __construct(ProviderInterface $provider)
  {
    $this->provider = $provider;
  }

  public function save()
  {
    //
  }

  public function delete()
  {
    //
  }

  public function isComplete()
  {
    //
  }

  public function complete()
  {
    //
  }

  public function uncomplete()
  {
    //
  }
}