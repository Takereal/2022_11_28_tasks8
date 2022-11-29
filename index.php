<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include ('config.php'); 

try {
  $dbObject = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
}catch (PDOException $err) {
  print $err->getMessage();
  exit;
}

include (SITE_PATH . 'core' . DS . 'core.php'); 

$router = new Router($registry);

$registry->set ('router', $router);
$router->setPath (SITE_PATH . 'controllers');
$router->start();
