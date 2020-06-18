<?php

/**
*
*	Environment can either be local or production
*
**/

$CONFIG['environment'] = 'local';

/**
*
*	Database details and connection
*
**/

$db_host = 'localhost';
$db_name = '';
$db_username = 'root';
$db_password = '';
$GLOBALS['conn'] = new mysqli($db_host, $db_username, $db_password, $db_name);

/**
*
*	Controller References
*
**/

include_once "php/controllers/welcomeController.php";
use php\controllers\Welcome;
include_once "php/controllers/error404Controller.php";
use php\controllers\Error404;