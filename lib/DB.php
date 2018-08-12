<?php

require_once __DIR__ . '/Config.php';

class DB extends Config
{

  public function __construct()
  {
    parent::__construct();
  }

  public function select_single($id, $table)
  {
    $query = "SELECT * FROM $table WHERE id='$id'";
    $result = mysql_query($query);
    $value = mysql_fetch_array($result);
    return $value;
  }

  public function select_single_field_info($id, $table, $field)
  {
    $query = "SELECT $field FROM $table WHERE id='$id'";
    $result = mysql_query($query);
    $value = mysql_fetch_array($result);
    $data = $value[0];
    return $data;
  }

  public function add_image_name($id, $table, $image)
  {
    $update_query = "UPDATE $table SET image='$image' WHERE id='$id'";
    $result = mysql_query($update_query);
    if ($result) {
      $feedback = '<div class="success">Data added with image successfully.</div>';
    } else {
      $feedback = '<div class="error">Could not add image. Try again later.' . mysql_error() . '</div>';
    }
    return $feedback;
  }

  public function update_image_name($id, $table, $image)
  {
    $update_query = "UPDATE $table SET image='$image' WHERE id='$id'";
    $result = mysql_query($update_query);
    if ($result) {
      $feedback = '<div class="success">Data updated with image successfully.</div>';
    } else {
      $feedback = '<div class="error">Could not update image. Try again later.' . mysql_error() . '</div>';
    }
    return $feedback;
  }

  public function delete($id, $table)
  {
    $query = "DELETE FROM $table WHERE id='$id'";
    $result = mysql_query($query);
    if ($result) {
      $feedback = '<div class="success">Data Deleted Successfully.</div>';
    } else {
      $feedback = '<div class="error">Problem to Delete.' . mysql_error() . '</div>';
    }
    return $feedback;
  }

}

#End DB class
