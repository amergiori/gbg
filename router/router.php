<?php
    require __DIR__ . "/../inc/bootstrap.php";  
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri = explode( '/', $uri );
    $allowedRoutes = ['list', 'insert', 'delete'];
    if (
        (!isset($uri[4]) || $uri[4] != 'user') 
        || (!isset($uri[5]) || !in_array($uri[5], $allowedRoutes))
        ) {
        header("HTTP/1.1 404 Not Found");
        exit();
    }
    require PROJECT_ROOT_PATH . "/Controller/Api/UserController.php";
    $controller = ucfirst($uri[4]).'Controller';
    $objFeedController = new $controller();
    $strMethodName = '';
    switch($uri[5]) {
        case 'list':
            $strMethodName = 'getList';
            break;
        case 'insert':
            $strMethodName = 'insertUser';
            break;
        case 'delete':
            $strMethodName = 'deleteUser';
            break;
    };
    $objFeedController->{$strMethodName}();