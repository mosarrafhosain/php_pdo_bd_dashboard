<?php

if (isset($_GET['page']) && !empty($_GET['page'])) {
  $page = $_GET['page'];
  $filename = __DIR__ . "/pages/$page.php";
  if (file_exists($filename)) {
    require_once $filename;
  } else {
    require_once __DIR__ . "/pages/not_found.php";
  }
  /* switch ($page) {
    case 'home':
    require_once __DIR__ . '/home.php';
    break;
    default:
    require_once __DIR__ . '/home.php';
    } */
} else {
  require_once __DIR__ . "/pages/home.php";
}
