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
          <button id="reload" class="btn btn-default"><i class="fa fa-sync"></i> Reload</button>
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
                  <th style="width:130px;">Action</th>
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
                        <a class="btn btn-sm btn-primary" href="javascript:void(0)" user_id="<?php echo $val->ID; ?>"><i class="fa fa-edit"></i> Edit</a>
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
<div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">User Form</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <input type="hidden" value="" name="id"/> 
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">First Name</label>
              <div class="col-md-9">
                <input name="firstName" placeholder="First Name" class="form-control" type="text">
                <span class="help-block"></span>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Last Name</label>
              <div class="col-md-9">
                <input name="lastName" placeholder="Last Name" class="form-control" type="text">
                <span class="help-block"></span>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Gender</label>
              <div class="col-md-9">
                <select name="gender" class="form-control">
                  <option value="">--Select Gender--</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                </select>
                <span class="help-block"></span>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Address</label>
              <div class="col-md-9">
                <textarea name="address" placeholder="Address" class="form-control"></textarea>
                <span class="help-block"></span>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Date of Birth</label>
              <div class="col-md-9">
                <input name="dob" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text">
                <span class="help-block"></span>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

<?php require_once __DIR__ . '/partial/script.php'; ?>

<script type="text/javascript">

  jQuery(document).ready(function($){
    $("#add_user").click(function () {
      $('#form')[0].reset(); // reset form on modals
      $('.form-group').removeClass('has-error'); // clear error class
      $('.help-block').empty(); // clear error string
      $('#modal_form').modal('show'); // show bootstrap modal
      $('.modal-title').text('Add User'); // Set Title to Bootstrap modal title
    });
  });

</script>

<?php require_once __DIR__ . '/partial/footer.php'; ?>
