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
            $id = trim($_POST['ID']);
            $name = trim($_POST['NAME']);
            try {
              $sql = "UPDATE USERS SET NAME = '$name' WHERE ID = $id";
              $stmt = $db->conn->prepare($sql);
              $stmt->execute();
              echo $stmt->rowCount() . " records UPDATED successfully";
            } catch (PDOException $e) {
              echo $sql . "<br>" . $e->getMessage();
            }
          }

          $query = $db->conn->prepare("SELECT * FROM USERS WHERE ID = :ID");
          $query->bindParam("ID", $_SESSION['USER_ID'], PDO::PARAM_STR);
          $query->execute();
          $row = $query->fetch(PDO::FETCH_OBJ);
          //echo '<pre>';
          //print_r($row);
          //echo '</pre>';
          ?>
          <form action="" method="post">
            <input type="hidden" name="ID" value="<?php echo $row->ID; ?>">
            <div class="form-group row">
              <label for="name" class="col-sm-2 col-form-label">Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="NAME" value="<?php echo $row->NAME; ?>" placeholder="Full Name">
              </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="email" value="<?php echo $row->EMAIL; ?>" placeholder="Email" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label for="username" class="col-sm-2 col-form-label">Username</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="username" value="<?php echo $row->USERNAME; ?>" placeholder="Username" readonly>
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
