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
          <button id="add_user" class="btn btn-success"><i class="fa fa-plus"></i> Add User</button>
          <button id="reload" class="btn btn-default"><i class="fa fa-refresh"></i> Reload</button>
          <br>
          <br>
          <div class="table-responsive">
            <table id="table" class="table table-bordered table-condensed table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Username</th>
                  <th>Status</th>
                  <th style="width:160px;">Action</th>
                </tr>
              </thead>

              <tbody>
                <?php
                $query = $db->conn->prepare("SELECT * FROM USERS");
                $query->execute();
                if ($query->rowCount() > 0) {
                  $result = $query->fetchAll(PDO::FETCH_OBJ);
                  //echo '<pre>';
                  //print_r($result);
                  //echo '</pre>';

                  $sl = 0;
                  foreach ($result as $key => $val) {
                    ?>
                    <tr>
                      <td><?php echo ++$sl; ?></td>
                      <td><?php echo $val->NAME; ?></td>
                      <td><?php echo $val->EMAIL; ?></td>
                      <td><?php echo $val->USERNAME; ?></td>
                      <td><?php echo $val->STATUS == 1 ? 'Active' : 'Inactive'; ?></td>
                      <td>                        
                        <a class="btn btn-sm btn-primary" href="javascript:void(0)" user_id="<?php echo $val->ID; ?>"><i class="fa fa-pencil"></i> Edit</a>
                        <a class="btn btn-sm btn-danger" href="javascript:void(0)" user_id="<?php echo $val->ID; ?>"><i class="fa fa-trash"></i> Delete</a>
                      </td>
                    </tr>
                    <?php
                  }
                }
                ?>
              </tbody>

              <tfoot>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Username</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="#" method="post">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="name" placeholder="Enter name">
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="email" placeholder="Enter email">
            </div>
          </div>
          <div class="form-group row">
            <label for="username" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="username" placeholder="Enter username">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End Bootstrap modal -->

<?php require_once __DIR__ . '/partial/script.php'; ?>

<script type="text/javascript">

  jQuery(document).ready(function($){
    $("#add_user").click(function () {
      //$('#form')[0].reset(); // reset form on modals
      //$('.form-group').removeClass('has-error'); // clear error class
      //$('.help-block').empty(); // clear error string
      $('#modal_form').modal('show'); // show bootstrap modal
      //$('.modal-title').text('Add User'); // Set Title to Bootstrap modal title
    });
  });

</script>

<?php require_once __DIR__ . '/partial/footer.php'; ?>
