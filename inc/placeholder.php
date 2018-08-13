<?php

if (isset($_GET['page'])) {
  $page = $_GET['page'];
  require_once __DIR__ . "/../pages/$page.php";
  /* switch ($page) {
    case 'home':
    require_once __DIR__ . '/home.php';
    break;
    default:
    require_once __DIR__ . '/home.php';
    } */
} else {
  require_once __DIR__ . "/../pages/home.php";
}
