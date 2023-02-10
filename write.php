<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
} else if (isset($_SESSION['role']) && $_SESSION['role'] !== 1) {
    header('Location: index.php');
    exit;
} else if (!isset($_SESSION['role'])) {
    echo 'noob';
}
include 'head.php';

include 'nav.php';

include 'writeForm.php';



include 'footer.php';
?>