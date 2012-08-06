<?php
/**
 * Pivotal Project - class keeping providing support for project
 *
 * @category   Library
 * @package    PivotalProject
 * @author     Pawel Wilk <pwilkmielno@gmail.com>
 * @license    http://creativecommons.org/licenses/by-sa/3.0/
 * @link       https://github.com/mephir/PivotalConnector
 */
class PivotalProject {
  protected $connector = null;

  public function __construct(PivotalConnector $connector)
  {
    $this->connector = $connector;
  }

  public function getMembers()
  {
    //
  }

  public function getMember($member_id)
  {
    //
  }

  public function addMember(PivotalMember $member, $role = 'Member')
  {
    //
  }

  public function deleteMember(PivotalMember $member)
  {
    //
  }

  public function getIterations($group = null, $limit = null, $offset = null)
  {
    //
  }

  public function getStory($story_id)
  {
    //
  }

  public function getStories($limit = 3000, $offset = 0)
  {
    //
  }

  public function getStoriesByFilter($filter, $limit = 3000, $offset = 0)
  {
    //
  }

  public function addStory(PivotalStory $story)
  {
    //
  }

  public function deleteStory($story)
  {
    //
  }

  public function deliverAllFinished()
  {
    //
  }
}