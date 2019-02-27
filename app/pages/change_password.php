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
            $old_password = trim($_POST['OLD_PASSWORD']);
            $new_password = trim($_POST['NEW_PASSWORD']);
            $confirm_password = trim($_POST['CONFIRM_PASSWORD']);
            $password = sha1($new_password);
            try {
              $sql = "UPDATE USERS SET PASSWORD = :PASSWORD WHERE USERS_ID = :USERS_ID";
              $stmt = $db->conn->prepare($sql);
              $stmt->bindParam("PASSWORD", $password, PDO::PARAM_STR);
              $stmt->bindParam("USERS_ID", $users_id, PDO::PARAM_STR);
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
              <label for="OLD_PASSWORD" class="col-sm-2 col-form-label">Old Password</label>
              <div class="col-sm-10">
                <input type="password" name="OLD_PASSWORD" id="OLD_PASSWORD" class="form-control" placeholder="Enter Old Password">
              </div>
            </div>
            <div class="form-group row">
              <label for="NEW_PASSWORD" class="col-sm-2 col-form-label">New Password</label>
              <div class="col-sm-10">
                <input type="password" name="NEW_PASSWORD" id="NEW_PASSWORD" class="form-control" placeholder="Enter New Password">
              </div>
            </div>
            <div class="form-group row">
              <label for="CONFIRM_PASSWORD" class="col-sm-2 col-form-label">Confirm Password</label>
              <div class="col-sm-10">
                <input type="password" name="CONFIRM_PASSWORD" id="CONFIRM_PASSWORD" class="form-control" placeholder="Confirm New Password">
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
