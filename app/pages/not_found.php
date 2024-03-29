<?php require_once __DIR__ . '/partial/header.php'; ?>

<div class="container-fluid">
  <div class="row">
    <?php require_once __DIR__ . '/partial/sidebar.php'; ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?php echo $title; ?></h1>
      </div>

      <div class="text-center">
        <h1 class="mt-5">404 Page Not Found</h1>
        <p class="lead">The page you requested is not found.</p>
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
