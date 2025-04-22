<?php
session_start();

if(isset($_SESSION['uid'])){
  require 'dbconnection.php';
  
  $pid = ($_POST['pid']);
  $cover_letter = htmlspecialchars($_POST['cover_letter']);
  
  
  $con=create_connection();
  if($con->connect_error){
      die("Connection Failed" .$con->connect_error);
  }
  $sql_insert="INSERT INTO application "
          . "VALUES(0,".$_SESSION['uid'].",'$pid','$cover_letter',NOW(),NOW(),'pending')";

  $con->query($sql_insert);
  
  header ("location:../home.php?applicationsuccess=1");
}
