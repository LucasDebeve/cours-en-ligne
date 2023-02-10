<?php
session_start();
if(!isset($_SESSION['loggedin'])){
    header('Location: login.php');
    exit;
}
include 'head.php';
include 'nav.php';
?>