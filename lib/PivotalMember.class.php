<?php
/**
 * Pivotal Member - provide member actions
 *
 * @category   Library
 * @package    PivotalMember
 * @author     Pawel Wilk <pwilkmielno@gmail.com>
 * @license    http://creativecommons.org/licenses/by-sa/3.0/
 * @link       https://github.com/mephir/PivotalConnector
 */
class PivotalMember extends BasePivotalItem {
  const ROLE_OWNER = 'Owner';
  const ROLE_MEMEBER = 'Member';

  protected $provider = null;

  public function __construct(ProviderInterface $provider)
  {
    $this->provider = $provider;
  }

  public function delete()
  {
    //
  }
}