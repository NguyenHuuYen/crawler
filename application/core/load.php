<?php

/**
 * Function load().
 * Determine what controller is called.
 */

function load()
{
    // Check controller and action are called.
    $controller = isset($_GET['c']) ? $_GET['c'] : CONTROLLER_DEFAULT;
    $action = isset($_GET['a']) ? $_GET['a'] : ACTION_DEFAULT;
    // Rename controller is true with format. 
    $controllerName = ucfirst(strtolower($controller)) . 'Controller';
    // If file controller isn't exist, direct page Home and print error.
    if (!file_exists(CONTROLLER_PATH . $controllerName . '.php')) {
        return view('home', array ('error' => 'Not found FILE.'));
    }

    require_once 'Controller.php';
    require_once CONTROLLER_PATH . $controllerName . '.php';

    // If textbox URL is empty, direct page Home and print error.
    if (empty($_POST['url'])) {
        return view('home', array ('error' => 'Please enter your URL.'));
    }

    // Create object controller and execute action().
    $object = new $controllerName();
    $object->$action();
}

?>