<?php

/**
* Define constants of the project.
*/

// Database constants to connect Database
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'crawlers');
define('TB_NAME', 'articles');

// Controller and action constants default when not find $_GET on URL.
define('CONTROLLER_DEFAULT', 'crawler');
define('ACTION_DEFAULT', 'printHome');

// Path constants.
define('APP_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'application' . DIRECTORY_SEPARATOR);
define('CORE_PATH', APP_PATH . 'core' . DIRECTORY_SEPARATOR);
define('VIEW_PATH', APP_PATH . 'views' . DIRECTORY_SEPARATOR);
define('CONTROLLER_PATH', APP_PATH . 'controllers' . DIRECTORY_SEPARATOR);
define('MODEL_PATH', APP_PATH . 'models' . DIRECTORY_SEPARATOR);
define('LIBRARY_PATH', APP_PATH . 'libs' . DIRECTORY_SEPARATOR);

?>