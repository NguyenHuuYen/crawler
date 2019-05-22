<?php

/**
 * Function view().
 * Direct to pages, and send data to display.
 */

function view($viewName, $args = array ())
{
    // Format file's name.
    $view = str_replace('.', DIRECTORY_SEPARATOR, $viewName);
    // Change a array, key => varialble, value => variable's value.
    $data = extract($args);
    // Create cache helps to run faster.
    ob_start();
    // Load the corresponding file.
    if (file_exists(VIEW_PATH . $view . '.php')) {
        require_once VIEW_PATH . $view . '.php';
    }
    // Turn file view into a variable.
    $content = ob_get_clean();
    // Load layout.php - master layout of the project.
    require_once VIEW_PATH . 'layout.php';
}

?>