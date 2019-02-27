<?php require_once __DIR__ . '/partial/header.php'; ?>

<div class="container-fluid">
  <div class="row">
    <?php require_once __DIR__ . '/partial/sidebar.php'; ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?php echo $title; ?></h1>
      </div>

      <div class="row">
        <div class="col-md-12">
          <ul>
            <li>Invalid login attempt to be blocked</li>
            <li>Multiple Login not Allowed at a same time</li>
            <li>Password Reset & Forgot Password</li>
            <li>Password Expire & force to change the password</li>
            <li>Password Complexity</li>
          </ul>
          <ul>
            <li>Edit profile</li>
            <li>Change password</li>
          </ul>
        </div>
      </div>
    </main>
  </div>
</div>

<?php require_once __DIR__ . '/partial/script.php'; ?>

<script type="text/javascript">

  jQuery(document).ready(function ($) {

  });

</script>

<?php require_once __DIR__ . '/partial/footer.php'; ?>
