<?php
include_once "../class/admin/Registration.php";
 session_start();
  if(isset($_SESSION['email'])){
      $obj= new Registration();
      $obj->setData($_POST);
      $obj->storeChoice();
  }
  else{
      header('location:registration.php');
  }

?>