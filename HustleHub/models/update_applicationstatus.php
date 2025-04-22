<?php
session_start();

if(isset($_SESSION['uid'])){
  require 'dbconnection.php';
  
  $appid = ($_POST['appid']);
  $status = htmlspecialchars($_POST['status']);
  
  
  $con=create_connection();
  if($con->connect_error){
      die("Connection Failed" .$con->connect_error);
  }
  $sql_insert="UPDATE application SET status = '$status' WHERE appid= '$appid' ";
 

  $con->query($sql_insert);
  
  header ("location:../home.php?updatesuccess=1");
}
