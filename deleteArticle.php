<?php
//delete article
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    try {
        $bd = new PDO("mysql:host=localhost;dbname=blog", "admin", "lucas");
        $sql = "DELETE FROM article WHERE idArticle = $id";
        $bd->prepare($sql);
        $bd->exec($sql);
        echo "<p>Article supprimé</p>";
        header("Location: moderate.php");
        exit;
    } catch (Exception $e) {
        echo "<p>Erreur de base de données :</br>$e</p>";
    }
}


?>