<?php

include_once(__DIR__ . "/../config/helpers.php");

// Define your routes

$routes = [

    '/register' => 'Auth@register_view',
    '/register_submit' => 'Auth@register_submit',
    '/login' => 'Auth@login_view',
    '/login_submit' => 'Auth@login_submit',

    '/' => 'Auth@dashboard_view',
    '/home' => 'Auth@dashboard_view',

    // user route start
    '/users' => 'Users@index',
    '/users/add' => 'Users@add',
    '/users/edit' => 'Users@edit',
    '/users/update' => 'Users@update',
    '/users/delete' => 'Users@delete',


    // Task route start
    '/tasks' => 'Tasks@index',
    '/tasks/add' => 'Tasks@add',
    '/tasks/edit' => 'Tasks@edit',
    '/tasks/update' => 'Tasks@update',
    '/tasks/delete' => 'Tasks@delete',
    "/tasks/load" => "Tasks@loaddata",
    
     // files route start
     '/files' => 'Files@index',
     '/files/add' => 'Files@add',
     '/files/edit' => 'Files@edit',
     '/files/update' => 'Files@update',
     '/files/delete' => 'Files@delete',
  

    // Teachert route end
    "/profile" => "Profile@index",
    "/teacher" => "Teacher@output",
    "/teacher/add" => "Teacher@insert",
    "/teacher/edit" => "Teacher@update",
    "/teacher/update" => "Teacher@updatedata",
    "/teacher/delete" => "Teacher@delete",
    "/teacher/load" => "Teacher@loaddata",

    // Project route start
    '/projects' => 'Projects@index',
    "/projects/add" => "Projects@add",
    "/projects/edit" => "Projects@edit",
    "/projects/update" => "Projects@update",
    "/projects/delete" => "Projects@delete",

    '/chatbot' => 'Chatbot@index',
    


];


// Get the requested URL
$requestUri = $_SERVER['REQUEST_URI'];


// Remove query string from the URL
$requestUri = strtok($requestUri, '?');

$requestUri = str_replace("/sht_management", "", $requestUri);


auth_middleware($requestUri);
// echo $requestUri;
// exit;

// Check if the requested route exists
if (array_key_exists($requestUri, $routes)) {
    // Split the controller and method
    list($controllerName, $methodName) = explode('@', $routes[$requestUri]);

    // Include the controller file
    include_once __DIR__ . '/../controllers/' . $controllerName . '.php';

    // Create an instance of the controller
    $controller = new $controllerName();

    // Call the specified method
    $controller->$methodName();
} else {

    // echo $requestUri;
    // exit;

    // Handle 404 - Not Found
    http_response_code(404);
    echo '404 Not Found';
}
