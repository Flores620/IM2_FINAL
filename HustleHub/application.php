<?php 
include 'views/header.php';

if (!isset($_GET['pid'])) {
  die("No post ID provided.");
}

$pid = $_GET['pid'];

include 'views/view_applicationform.php';

include 'views/footer.php'
?>

?>

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

