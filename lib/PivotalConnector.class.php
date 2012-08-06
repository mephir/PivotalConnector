<?php
/**
 * Pivotal Connector - basic class from everything begin
 *
 * @category   Library
 * @package    PivotalConnector
 * @author     Pawel Wilk <pwilkmielno@gmail.com>
 * @license    http://creativecommons.org/licenses/by-sa/3.0/
 * @link       https://github.com/mephir/PivotalConnector
 *
 */
class PivotalConnector {
  const RETRIEVE_TOKEN_POST = 0; //retrieve user token via POST (https://www.pivotaltracker.com/help/api?version=v3#retrieve_token_post)
  const RETRIEVE_TOKEN_BASIC = 1; //retrieve user token via Basic Auth (https://www.pivotaltracker.com/help/api?version=v3#retrieve_token_basic_auth)

  protected $provider = null;
  protected $token = null;

  public function __construct(ProviderInterface $provider, $token = null)
  {
    $this->provider = $provider;
    if (!is_null($token))
    {
      $this->token = $token;
    }
  }

  public function retrieveToken($username, $password, $method = 0)
  {
    //
  }

  public function getProjects()
  {
    //
  }

  public function getProject($project_id)
  {
    //
  }

  public function addProject($name, $iteration = 2, $points_scale = array(1,2,3,5,8))
  {
    //
  }
}