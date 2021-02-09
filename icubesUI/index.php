<?php
include_once "config.php";
include_once "route.php";

function base_url($url)
{
    if ($url) return BASE_URL . $url;
    return BASE_URL;
}
/* Redirect to login screen */
Route::add('/', function () {
    header('location: ' . base_url('auth/login'));
});

/* Redirect to login screen */
Route::add('/([a-z0-9]*)', function ($class) {
    header('location: ' . base_url('auth/login'));
});

Route::add('/([a-z0-9]*)/([a-z0-9_]*)', function ($class, $method) {
    if (!file_exists(MIDDLEWARE . "/$class.php")) { // Check if file is exists in Controller Folder
        not_found();
        die();
    }

    include_once MIDDLEWARE . "/$class.php"; // Include Class

    if (!class_exists($class)) {
        not_found();
        die();
    }
    $obj = new $class();
    if (!method_exists($obj, $method)) { // Check if Method is exists in class
        echo "Method $method Not Found";
        not_found();
        die();
    }

    $obj->$method();
});


Route::add('/([a-z0-9]*)/([a-z0-9_]*)/([\s\S]*)', function ($class, $method, $param1) {
    if (!file_exists(MIDDLEWARE . "/$class.php")) { // Check if file is exists in Controller Folder
        not_found();
        die();
    }

    include_once MIDDLEWARE . "/$class.php"; // Include Class

    if (!class_exists($class)) {
        not_found();
        die();
    }
    $obj = new $class();
    if (!method_exists($obj, $method)) { // Check if Method is exists in class
        echo "Method $method Not Found";
        not_found();
        die();
    }

    $obj->$method($param1);
});


Route::run('/');

function not_found()
{
    http_response_code(404);
    require_once "404.php"; // provide your own HTML for the error page
}
