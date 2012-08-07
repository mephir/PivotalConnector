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

$rss = new SimpleXMLElement("<rss></rss>");
$rss->addAttribute('version', '2.0');
$channel = $rss->addChild('channel');
foreach ($activities as $activity)
{
  $item = $channel->addChild('item');
  $item->addChild('title', $activity->get('description'));
  $item->addChild('description', $activity->get('description'));
  $stories = $activity->getStories();
  if (count($stories) > 0)
  {
    $item->addChild('link', (string) $stories[0]->story->url);
  }
  else
  {
    $item->addChild('ling', 'http://www.pivotaltracker.com/projects/' . $activity->get('project_id'));
  }
  $item->addChild('pubDate', $activity->get('occurred_at'));
  $guid = $item->addChild('guid', $activity->get('id'));
  $guid->addAttribute('isPermaLink', 'false');
  $item->addChild('author', $activity->get('author'));
  $item->addChild('category', $activity->get('event_type'));
}

ob_start();
ob_end_clean();
header('Content-type: application/rss+xml');
echo $rss->asXml();