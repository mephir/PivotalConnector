<?php
class ActivityAllTask extends BasePivotalConnectorTask {
  public function execute()
  {
    if (!$this->getOption('token', false))
    {
      $this->help();
      return;
    }

    $pc = new PivotalConnector($this->getProvider($this->getOption('provider', 'pcCurlProvider')), $this->getOption('token'));

    try
    {
      $result = $pc->getActivity($this->getOption('limit', 10));
    }
    catch(PivotalException $e)
    {
      print($e);
      return;
    }

    foreach ($result as $r)
    {
      printf($this->getOption('output', "%s\n"), (string) $r);
    }
  }

  public function help()
  {
    echo <<<EOF
Command retrieve all activities

Example of usage
[php pivotal activity:all --token=pivotal_token_token [--limit=10]]

EOF;
  }
}