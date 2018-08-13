<?php

require_once __DIR__ . '/Config.php';

class Common extends Config
{

  public function __construct()
  {
    parent::__construct();
  }

  /*
    Upload a file in a directory
   */

  function file_upload($id, $path)
  {
    $allowedExts = array("jpg", "jpeg", "gif", "png");
    $extension = @end(explode(".", $_FILES["file"]["name"]));
    if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/pjpeg")) && ($_FILES["file"]["size"] < 5000000) && in_array($extension, $allowedExts)) {
      if (file_exists($path . $id . "." . $extension))
        return "The file is exists. Please try another.";
      else {
        move_uploaded_file($_FILES["file"]["tmp_name"], $path . $id . "." . $extension);
        return $id . "." . $extension;
      }
    } else
      return "The file format or file size is not correct.";
  }

  /*
    Delete a file from a directory
   */

  function file_delete($path)
  {
    if (file_exists($path)) {
      $unlink = @unlink($path);
      if ($unlink) {
        return TRUE;
      } else {
        return FALSE;
      }
    }
  }

}

#End common class
