<?php
include 'views/header.php';


if(isset($_SESSION['uid'])){
    include 'views/view_applied.php';
}




include 'views/footer.php';
?>