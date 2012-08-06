<?php
/**
 * Pivotal Story - provide story actions
 *
 * @category   Library
 * @package    PivotalConnector
 * @subpackage items
 * @author     Pawel Wilk <pwilkmielno@gmail.com>
 * @license    http://creativecommons.org/licenses/by-sa/3.0/
 * @link       https://github.com/mephir/PivotalConnector
 */
class PivotalStory extends BasePivotalItem {
  protected $provider = null;

  public function __construct(ProviderInterface $provider)
  {
    $this->provider = $provider;
  }

  public function getTask($task_id)
  {
    //
  }

  public function getTasks()
  {
    //
  }

  public function addTask(PivotalTask $task)
  {
    //
  }

  public function deleteTask($task)
  {
    //
  }

  public function addComment($text)
  {
    //
  }

  public function save()
  {
    //
  }

  public function delete()
  {
    //
  }
}