<?php
$DEBUG = true;

if ($DEBUG) {
  error_reporting(E_ALL);
  ini_set("display_errors", 1);
}

// class autoloader.
spl_autoload_register(function ($class) {
  try {
    include 'controllers/' . $class . '.class.php';
  } catch (Exception $e) {
    echo $e;
    die();
  }
});

session_start();
// session_destroy();

$action = 'GameList';
if (isset($_GET['action'])) {
  $action = $_GET['action'];
}
try {
  new $action();
} catch (Exception $e) {
  if ($DEBUG) {
    echo $e;
    die();
  } else {
    header('Location: index.php');
  }
}
