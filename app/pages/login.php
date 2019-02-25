<?php
require_once __DIR__ . '/../lib/Login.php';

$login = new Login();
$login->is_logged_in_redirect();

$msg = "";

if (isset($_POST['LOGIN'])) {
  $username = trim($_POST['USERNAME']);
  $password = trim($_POST['PASSWORD']);
  $msg = $login->login($username, $password);
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url("assets/bootstrap/css/bootstrap.min.css"); ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url("assets/css/login.css"); ?>" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" action="" method="post">
      <?php
      if (!empty($msg)) {
        ?>
        <div class="alert alert-danger"><?php echo $msg; ?></div>
        <?php
      }
      ?>
      <img class="mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please login</h1>
      <label for="username" class="sr-only">Username or email address</label>
      <input type="text" name="USERNAME" id="username" class="form-control" value="<?php echo isset($_POST['USERNAME']) ? $_POST['USERNAME'] : ''; ?>" placeholder="Username or email address" required autofocus>
      <label for="password" class="sr-only">Password</label>
      <input type="password" name="PASSWORD" id="password" class="form-control" value="<?php echo isset($_POST['PASSWORD']) ? $_POST['PASSWORD'] : ''; ?>" placeholder="Password" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="LOGIN">Login</button>
      <a href="<?php echo base_url("index.php?page=forgot_password"); ?>">Forgot password</a>
      <p class="mt-5 mb-3 text-muted">&copy; <?php echo date('Y') - 1; ?>-<?php echo date('Y'); ?></p>
    </form>
  </body>
</html>
