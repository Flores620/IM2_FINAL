<?php
session_start();

if(isset($_SESSION['uid'])){
  require 'dbconnection.php';
  
  $title = htmlspecialchars($_POST['title']); 
  $post_content = htmlspecialchars($_POST['create_post_content']);
  $salary = floatval($_POST['salary']);
  
  
  $con=create_connection();
  if($con->connect_error){
      die("Connection Failed" .$con->connect_error);
  }
  $sql_insert="INSERT INTO post "
          . "VALUES(0,'$title','$post_content','$salary',NOW(),NOW(), ".$_SESSION['uid'].")";

  $con->query($sql_insert);
  
  header ("location:../home.php?postsuccess=1");
}
