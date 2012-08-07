<?php
class PivotalActivity extends BasePivotalItem {
  protected $project = null;
  protected $stories = null;
  private $xml = null;

  public function __construct(pcProvider $provider, SimpleXMLElement $xml = null)
  {
    parent::__construct($provider);

    if (!is_null($xml))
    {
      $this->set('id', (string)$xml->id);
      $this->set('version', (string)$xml->version);
      $this->set('event_type', (string)$xml->event_type);
      $this->set('occurred_at', (string)$xml->occurred_at);
      $this->set('author', (string)$xml->author);
      $this->set('project_id', (string)$xml->project_id);
      $this->set('description', (string)$xml->description);
      $this->xml = $xml;
      $this->_new = false;
      $this->_dirty = false;
    }
  }

  public function getProject()
  {
    //
  }

  public function getStories()
  {
    return $this->xml->stories;

    if (is_null($this->stories))
    {
      $output = array();
      //@todo: retrieving stories
      $this->stories = $output;
    }
    return $this->stories;
  }

  public function __toString()
  {
    return $this->get('occurred_at') . ' - ' . $this->get('description');
  }
}