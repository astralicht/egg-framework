<?php

/**
*
*	Environment can either be local or production
*
**/

$ENVIRONMENT = 'LOCAL';

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

include_once "php/controllers/Controller.php";
include_once "php/services/Service.php";
include_once "php/controllers/error404Controller.php";
include_once 'php/controllers/homeController.php';