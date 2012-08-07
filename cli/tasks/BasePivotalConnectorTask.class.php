<?php
abstract class BasePivotalConnectorTask {
//  protected $options = array();
//  protected $arguments = array();
//
//  public function __construct($arguments)
//  {
//    foreach ($arguments as $arg)
//    {
//      if (preg_match('#^--[a-z]+=.+$#is', trim($arg)))
//      {
//        pred_match_all('#^--([a-z])+=(.+)$#is', trim($arg), $matches);
//      }
//      else
//      {
//        //
//      }
//    }
//  }

  abstract public function execute($arguments, $options);
}