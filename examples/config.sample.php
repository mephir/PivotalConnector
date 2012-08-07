<?php
/*
 * This file is part of the PivotalConnector package.
 * Pawel Wilk <pwilkmielno@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

define('PIVOTAL_TOKEN', ''); //API token for pivotal access, token could be generated on https://www.pivotaltracker.com/profile
define('SSL_ENABLED', true); //SSL transmission, host isn't verify
define('ACTIVITY_LIMIT', 10); //Limit of retrieved activities

define('PIVOTAL_CONNECTOR_LIB', dirname(__FILE__) . '../lib');