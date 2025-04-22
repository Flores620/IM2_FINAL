<?php
session_start();

if(isset($_SESSION['uid'])){
  require 'dbconnection.php';
  
  $sender_id = htmlspecialchars($_SESSION['uid']);
  $receiver_id = htmlspecialchars($_POST['receiver_id']);
  $message = htmlspecialchars($_POST['message']);
  
  
  
  $con=create_connection();
  if($con->connect_error){
      die("Connection Failed" .$con->connect_error);
  }
  $sql_insert="INSERT INTO message "
          . "VALUES(0,'$message',NOW(),NOW(),'$sender_id','$receiver_id' )";

  $con->query($sql_insert);
  
  header ("location:../home.php?postsuccess=1");
}
