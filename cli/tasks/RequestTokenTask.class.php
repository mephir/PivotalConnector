<?php
class RequestTokenTask extends BasePivotalConnectorTask {
  public function execute()
  {
    if (!$this->getOption('username', false) || !$this->getOption('password', false))
    {
      $this->help();
      return;
    }

    $pc = new PivotalConnector($this->getProvider($this->getOption('provider', 'pcCurlProvider')));

    try
    {
      $user = $pc->retrieveToken($this->getOption('username'), $this->getOption('password'));
    }
    catch(PivotalException $e)
    {
      print($e);
      return;
    }

    printf($this->getOption('output', "Your token: %s\n"), $user->getToken());
  }

  public function help()
  {
    echo <<<EOF
Command request access token from pivotal

Example of usage
[php pivotal request:token --username=username@domain.tld --password=passwd]

EOF;
  }
}