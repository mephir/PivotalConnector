<?php
class PivotalProviderException extends PivotalException {
  public function __toString()
  {
    return $this->getCode().': '.$this->getMessage();
  }
}