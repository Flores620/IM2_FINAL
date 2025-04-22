<?php
include 'views/header.php';

if (!isset($_SESSION['uid'])) {
    header('Location: index.php');
    exit;
}

echo "<p>" . $_SESSION['fname']. " " .$_SESSION['lname'] ."</p>";

if(isset($_SESSION['uid'])){
    include 'views/view_jobpost.php';
}

include 'views/footer.php';
?>
