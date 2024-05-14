<?php
session_start();
if(!isset($_SESSION['name'])){
header("location:user-login.php");
}
?>