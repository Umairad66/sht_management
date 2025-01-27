<?php
function view($viewName, $data = []) {
    // Assuming your views are stored in a 'views' folder under the project root
    $viewPath = __DIR__ . '/../views/' . $viewName . '.php';

    if ($viewPath && file_exists($viewPath)) {
        // Extract the variables for use in the view
        extract($data);

        // Include the view file
        include $viewPath;
        unset($_SESSION["old"]);
    } else {
        // Handle the case where the view file does not exist
        echo "View not found: $viewName";
    }
}

function asset($path = ""){
    return $GLOBALS['SITE_URL'].$path;
}

function route($path = ""){
    return $GLOBALS['SITE_URL'].$path;
}

function old($field_name = "") {
    if(!empty($field_name))
        return ($_SESSION["old"][$field_name] ?? null) ? $_SESSION["old"][$field_name] : '';
}

function include_view($path, $data = []){
    $viewPath = __DIR__ . '/../views/' . $path . '.php';

    if ($viewPath && file_exists($viewPath)) {
        // Extract the variables for use in the view
        extract($data);

        // Include the view file
        include_once $viewPath;
    } else {
        // Handle the case where the view file does not exist
        echo "View not found: $viewPath";
    }
    
}

function auth_middleware($url){
    $exclude_url = ["/login", "/register", '/register_submit', '/login_submit'];

    if(in_array($url, $exclude_url) && ($_SESSION['auth']["id"] ?? null)) {
        header("location: ". route(""));
        exit;
    }else if(!in_array($url, $exclude_url) && !($_SESSION['auth']["id"] ?? null)) {
        header("location: ". route("login"));
        exit;
    }
}
// unset($_SESSION['auth']);