<?php
session_start();
include 'head.php';
if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit;
}
?>

<?php
include 'nav.php';

include 'parcourir.php';

include 'footer.php';
?>