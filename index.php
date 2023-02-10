<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}
include 'head.php';


?>

<?php
include 'nav.php';

include 'parcourir.php';

include 'footer.php';
?>