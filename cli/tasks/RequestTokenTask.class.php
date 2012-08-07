<?php
class RequestTokenTask extends BasePivotalConnectorTask {
  public function execute()
  {
    if (!$this->getOption('email', false) || !$this->getOption('password', false))
    {
      $this->help();
      return;
    }

    $pc = new PivotalConnector($this->getProvider($this->getOption('provider', 'pcCurlProvider')));
    $token = $pc->retrieveToken($this->getOption('email'), $this->getOption('password'));

    printf('Your token: %s', $token);
  }

  public function help()
  {
    echo <<<EOF
Command request access token from pivotal

Example of usage
[php pivotal request:token --email=username@domain.tld --password=passwd]

EOF;
  }
}