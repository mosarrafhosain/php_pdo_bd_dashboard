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
          <?php
          if (isset($_POST['SAVE'])) {
            //echo '<pre>';
            //print_r($_POST);
            //echo '</pre>';
            $users_id = trim($_POST['USERS_ID']);
            $full_name = trim($_POST['FULL_NAME']);
            try {
              $sql = "UPDATE USERS SET FULL_NAME = '$full_name' WHERE USERS_ID = $users_id";
              $stmt = $db->conn->prepare($sql);
              $stmt->execute();
              $_SESSION['success'] = $stmt->rowCount() . " records UPDATED successfully";
            } catch (PDOException $e) {
              $_SESSION['error'] = $sql . "<br>" . $e->getMessage();
            }
          }

          $query = $db->conn->prepare("SELECT * FROM USERS WHERE USERS_ID = :USERS_ID");
          $query->bindParam("USERS_ID", $_SESSION['USER_ID'], PDO::PARAM_STR);
          $query->execute();
          $row = $query->fetch(PDO::FETCH_OBJ);
          //echo '<pre>';
          //print_r($row);
          //echo '</pre>';
          ?>
          <?php require_once __DIR__ . '/partial/message.php'; ?>
          <form action="" method="post">
            <input type="hidden" name="USERS_ID" value="<?php echo $row->USERS_ID; ?>">
            <div class="form-group row">
              <label for="full_name" class="col-sm-2 col-form-label">Full Name</label>
              <div class="col-sm-10">
                <input type="text" name="FULL_NAME" id="full_name" class="form-control" value="<?php echo $row->FULL_NAME; ?>" placeholder="Full Name">
              </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="email" id="email" class="form-control" value="<?php echo $row->EMAIL; ?>" placeholder="Email" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label for="username" class="col-sm-2 col-form-label">Username</label>
              <div class="col-sm-10">
                <input type="text" id="username" class="form-control" value="<?php echo $row->USERNAME; ?>" placeholder="Username" readonly>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-10">
                <button type="submit" name="SAVE" class="btn btn-primary">Save Changes</button>
              </div>
            </div>
          </form>
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
