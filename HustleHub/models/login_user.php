<?php
   session_start();
   require 'dbconnection.php';



  $email = htmlspecialchars($_POST['email']);
  $pass = htmlspecialchars($_POST['pass']);  
  
  
  $con=create_connection();
  if($con->connect_error){
      die("Connection Failed" .$con->connect_error);
  }
  
  $email_error=0;
  
  $sql_email="SELECT * FROM user WHERE email='$email' AND password='$pass'";
  
  $result_email=$con->query($sql_email);
  
  if($result_email->num_rows>0){
      $row=$result_email->fetch_assoc();
      $_SESSION['uid']=$row['uid'];
      $_SESSION['fname']=$row['firstname'];
      $_SESSION['lname']=$row['lastname'];
      $_SESSION['email']=$row['email'];
      $_SESSION['cnumber']=$row['contact_number'];
      $_SESSION['role']=$row['role'];
      
      header('location:../home.php');
  }
  else{
      header('location:../login.php?log_error=1');
  }