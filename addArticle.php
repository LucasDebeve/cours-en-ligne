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

echo '<div class="Toast">
<span class="Toast-icon">';

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
    echo '<div class="Toast--success">
    <span class="Toast-icon">
    <!-- <%= octicon "check" %> -->
        <svg width="12" height="16" viewBox="0 0 12 16" class="octicon octicon-check" aria-hidden="true">
            <path fill-rule="evenodd" d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5L12 5z" />
        </svg>
    </span>
    <span class="Toast-content">Article ajouté avec succès !';
} catch (PDOException $e) {
     echo '<div class="Toast--error">
    <span class="Toast-icon">
    <!-- <%= octicon "stop" %> -->
      <svg width="14" height="16" viewBox="0 0 14 16" class="octicon octicon-stop" aria-hidden="true">
        <path
          fill-rule="evenodd"
          d="M10 1H4L0 5v6l4 4h6l4-4V5l-4-4zm3 9.5L9.5 14h-5L1 10.5v-5L4.5 2h5L13 5.5v5zM6 4h2v5H6V4zm0 6h2v2H6v-2z"
        />
      </svg>
    </span>
    <span class="Toast-content">'.$e->getMessage();
}

echo '</span></div>';
include('footer.php');
?>