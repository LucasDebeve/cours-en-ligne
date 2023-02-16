<?php

session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

include('head.php');
include('nav.php');

$title = $_POST['title'];
$content = $_POST['content'];
$img = $_POST['image'];
$date = date("Y-m-d H:i:s");
$author = 1;

try {
    $bd = new PDO("mysql:host=localhost;dbname=blog", "admin", "lucas");
    $sql = "INSERT INTO article (titleArticle , contentArticle, imgArticle, dateArticle, idAuthor) VALUES (:title, :content, :image, :date, :author)";
    $stmt = $bd->prepare($sql);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':image', $img);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':author', $author);
    $stmt->execute();
    echo '<span class="State State--open">Article ajouté</span>';
} catch (PDOException $e) {
     echo '<span class="State State--closed">'.$e->getMessage()."</span>";
}

echo '</div>';
include('footer.php');
?>