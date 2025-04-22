<?php 
include 'views/header.php';

echo 'Profile';
echo '<br>';
echo  $_SESSION['fname']. "  " .$_SESSION['lname']. " " ;
echo  $_SESSION['cnumber']. "  ";
echo  $_SESSION['role'];

include 'views/footer.php';
