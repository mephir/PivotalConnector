<?php
class PivotalActivity extends BasePivotalItem {
  protected $project = null;
  protected $stories = array();
  private $xml = null;

  public function __construct(pcProvider $provider, SimpleXMLElement $xml = null)
  {
    parent::__construct($provider);

    if (!is_null($xml))
    {
      $this->set('id', (string)$xml->id);
      $this->set('version', (string)$xml->version);
      $this->set('event_type', (string)$xml->event_type);
      $this->set('occured_at', (string)$xml->occured_at);
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
    //
  }
}