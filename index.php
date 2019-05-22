<?php

/**
* A mini crawler utility tool
* @author huuyen 
* @link https://github.com/NguyenHuuYen/crawler
*/

// Set a constant that hold the project's folder path.
define('ROOT_PATH', dirname(__FILE__));
// Load file config.php contain the constants of the project.
// DIRECTORY_SEPARATOR adds a slash to the end of the path.
require_once 'application' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'config.php';
// Load file load.php to call load() to determine what controller is being called.
require_once CORE_PATH . 'load.php';
// Load file view.php to use view() to direct from controller to folder view.
require_once CORE_PATH . 'view.php';

// Determine what controller is being called.
load();

?>