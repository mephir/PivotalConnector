<?php
class PivotalUser {
  protected $id;
  protected $token;

  public function __construct($id, $token)
  {
    $this->id = $id;
    $this->token = $token;
  }

  public function getId()
  {
    return $this->id;
  }

  public function getToken()
  {
    return $this->token;
  }
}