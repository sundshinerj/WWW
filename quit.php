<?php 
session_start();
//require_once 'include/func_checkHttpref.php';
unset($_SESSION['id']);
unset($_SESSION['name']);
header('Location: login.php');
?>
