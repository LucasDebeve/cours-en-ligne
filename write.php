<?php
session_start();
include 'head.php';
?>

<?php
include 'nav.php';

if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit;
}

if (!isset($_SESSION['id']) && $_SESSION['role'] !== 1) {
    echo "<script>alert('Halte là ! Interdiction de venir sur cette page.'); location.href='login.php';</script>";
    echo 'Non non non...';
} else {
    include 'writeForm.php';
}


include 'footer.php';
?>