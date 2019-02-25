<?php
require_once __DIR__ . '/../../inc/include.php';
$user->is_not_logged_in_redirect();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url("assets/img/favicon.ico"); ?>">

    <title><?php echo $title; ?> :: Module Name</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url("assets/bootstrap/css/bootstrap.min.css"); ?>" rel="stylesheet">
    
    <link href="<?php echo base_url("assets/font-awesome/css/font-awesome.min.css"); ?>" rel="stylesheet">
    
    <link href="<?php echo base_url("assets/ui/jquery-ui.min.css"); ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url("assets/css/dashboard.css"); ?>" rel="stylesheet">
    
    <script src="<?php echo base_url("assets/js/jquery-1.11.0.js"); ?>"></script>
    <script src="<?php echo base_url("assets/ui/jquery-ui.min.js"); ?>"></script>
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="<?php echo base_url(); ?>">Company name</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="<?php echo base_url("index.php?page=logout"); ?>">Logout</a>
        </li>
      </ul>
    </nav>        
