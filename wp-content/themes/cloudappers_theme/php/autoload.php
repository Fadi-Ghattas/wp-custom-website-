<?php
/**
 * Created by PhpStorm.
 * User: Fadi
 * Date: 4/5/2016
 * Time: 4:15 AM
 */

$dirName = dirname(__FILE__);

require_once ("$dirName/users.php");
require_once ("$dirName/emails.php");
require_once ("$dirName/helpers.php");
require_once ("$dirName/pods.php");
require_once ("$dirName/ajax.php");
require_once ("$dirName/hooks.php");
require_once ("$dirName/queue.php");
require_once("$dirName/queries.php");

require_once("$dirName/models/PodsModel.php");
require_once("$dirName/views/ViewTemplate.php");

require_once("$dirName/models/ServiceModel.php");
require_once("$dirName/controllers/Service.php");
require_once("$dirName/views/ServiceView.php");

require_once("$dirName/models/ProjectModel.php");
//require_once("$dirName/controllers/Service.php");
//require_once("$dirName/views/ServiceView.php");