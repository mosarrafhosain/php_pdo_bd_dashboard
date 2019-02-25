
<div class="message">
  <?php if (isset($_SESSION['success']) && !empty($_SESSION['success'])) { ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?php
      echo $_SESSION['success'];
      unset($_SESSION['success']);
      ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php } ?>

  <?php if (isset($_SESSION['error']) && !empty($_SESSION['error'])) { ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <?php
      echo $_SESSION['error'];
      unset($_SESSION['error']);
      ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php } ?>

  <script type="text/javascript">
    jQuery(document).ready(function ($) {
      $(".message").delay(5000).slideUp(500, function(){
        $(this).remove();
      });
    });
  </script>
</div>
