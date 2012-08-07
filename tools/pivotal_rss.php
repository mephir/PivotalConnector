<?php
/*
 * This file is part of the PivotalConnector package.
 * Pawel Wilk <pwilkmielno@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * This script is retrieving activities and return them in rss format
 */

include_once('config.php');
require_once(PIVOTAL_CONNECTOR_LIB.'/pcAutoload.class.php');

pcAutoload::getInstance()->register();

$pivotal = new PivotalConnector(new pcCurlProvider(), PIVOTAL_TOKEN);

$activities = $pivotal->getActivity(ACTIVITY_LIMIT);

