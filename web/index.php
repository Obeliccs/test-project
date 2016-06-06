<?php
define('ROOT_PATH', realpath(dirname(__DIR__)));

$pdo = require_once ROOT_PATH . '/inc/db.php';

$uri = explode('/',substr($_SERVER['REQUEST_URI'], 1));
//Берем контроллер из первого куска урла
$controller = $uri[0];
if(empty($controller)){
    $controller = 'index';
}
if(!empty($uri[1])){echo urldecode($uri[1]);};

if(!is_file(ROOT_PATH . '/controller/' . $controller . '.php')){
    $controller = 'not-found';
}
// Подключаем файл контроллер
require ROOT_PATH . '/controller/' . $controller . '.php';

// Подключаем файл вьюхи
require_once ROOT_PATH . '/view/' . $controller . '.php';
