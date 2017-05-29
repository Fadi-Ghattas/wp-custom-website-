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
require_once("$dirName/controllers/Project.php");
require_once("$dirName/views/ProjectView.php");

require_once("$dirName/models/ClientModel.php");
require_once("$dirName/controllers/Client.php");
require_once("$dirName/views/ClientView.php");

require_once("$dirName/models/TeamModel.php");
require_once("$dirName/controllers/Team.php");
require_once("$dirName/views/TeamVIew.php");

require_once("$dirName/models/CVModel.php");

require_once("$dirName/models/ProjectTypeModel.php");
require_once("$dirName/controllers/ProjectType.php");

require_once("$dirName/models/PositionModel.php");
require_once("$dirName/controllers/Position.php");

require_once("$dirName/models/TimeLineModel.php");
require_once("$dirName/controllers/TimeLine.php");

require_once("$dirName/models/SweetWordModel.php");
require_once("$dirName/controllers/SweetWord.php");

require_once("$dirName/models/JobModel.php");
require_once("$dirName/controllers/Job.php");

require_once("$dirName/models/JobLocationModel.php");
require_once("$dirName/controllers/JobLocation.php");