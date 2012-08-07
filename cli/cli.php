<?php
/*
 * This file is part of the PivotalConnector package.
 * Pawel Wilk <pwilkmielno@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once('cli/cliAutoload.class.php');
cliAutoload::getInstance()->register();

$task = explode(':', $argv[1]);
$className = ucfirst($task[0]).ucfirst($task[1]).'Task';

$command = new $className(array_slice($argv,2));
$command->execute();