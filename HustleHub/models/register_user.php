<?php 
require 'dbconnection.php';


  $fname = htmlspecialchars($_POST['fname']);
  $lname = htmlspecialchars($_POST['lname']);
  $email = htmlspecialchars($_POST['email']);
  $cnumber = htmlspecialchars($_POST['cnumber']);
  $gender = htmlspecialchars($_POST['gender']);
  $bdate = htmlspecialchars($_POST['bdate']);
  $pass = htmlspecialchars($_POST['pass']);
  $conpass = htmlspecialchars($_POST['conpass']);
  $role = htmlspecialchars($_POST['role']);
  
  echo "First Name:" .$fname. "<br>";
  echo "Last Name:" .$lname. "<br>";
  echo "Email:" .$email. "<br>";
  echo "Contact Number:" .$cnumber. "<br>";
  echo "Gender:" .$gender. "<br>";
  echo "Birth Date:" .$bdate. "<br>";
  echo "Pass:" .$pass. "<br>";
  echo "Confirm Password:" .$conpass. "<br>";
  echo "Role" .$role. "<br>";
  
  
  $con=create_connection();
  if($con->connect_error){
      die("Connection Failed" .$con->connect_error);
  }
  $email_error=0;
  
  $sql_email="SELECT * FROM user WHERE email='$email'";
  
  $result_email=$con->query($sql_email);
  
  if($result_email->num_rows>0){
      $email_error=1;
  }
  $password_error=0;
  
  if(strcmp($pass,$conpass)!=0){
      $password_error=1;
  }
  
  if($email_error==0 && $password_error==0){
        $sql_insert="INSERT INTO user VALUES(0,'$fname','$lname','$email','$cnumber', '$gender','$bdate','$pass','$role')";

        $con->query($sql_insert);

        header ("location:../login.php?regsuccess=1");
  }
  else{
        header ("location:../registration.php?email_error=".$email_error
                ."&pass_error=" .$password_error);
  }




?>