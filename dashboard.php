<?php
$html = <<<HTML
<div class="container-lg my-4">
    <div class="color-shadow-extra-large p-3">
        <h1 class="text-center">Tableau de modération</h1>
        <form action="moderate.php" method="GET" class="text-center">
            <input type="text" name="search" class="form-control" placeholder="Rechercher un article"/>
            <input type="submit" value="Rechercher">
        </form>
HTML;
//show all articles
// select all articles
try {
    $bd = new PDO("mysql:host=localhost;dbname=blog", "admin", "lucas");
    if (isset($_GET['search'])) {
        $search_query = $_GET['search'];
        if (substr($search_query, 0, 1) == " " || substr($search_query, -1) == " ") {
            $search_query = trim($search_query);
        }
        if (substr($search_query, 0, 3) === "id:") {
            $sql = "SELECT * FROM article WHERE idArticle = " . substr($search_query, 3) . " ORDER BY dateArticle DESC";
            echo substr($search_query, 3);
        } else {
            $sql = "SELECT * FROM article WHERE titleArticle LIKE '%$search_query%' OR contentArticle LIKE '%$search_query%' ORDER BY dateArticle DESC";
        }
    } else {
        $sql = "SELECT * FROM article ORDER BY dateArticle DESC";
    }
    $articles = $bd->prepare($sql);
    $articles->execute();
    $articles->setFetchMode(PDO::FETCH_ASSOC);
    $i = 0;
    $html .= "<div class='container-lg clearfix gutter-md-spacious'>";
    foreach ($articles as $article) {
        if ($i % 3 == 0) {
            $html .= "</div><div class='container-lg clearfix gutter-md-spacious'>";
        }
        $html .=
            "<div class='col-md-4 float-left anim-fade-in'>
            <div class='Box mb-4'>
                <div class='Box-header'>
                    <img src='" . $article['imgArticle'] . "' class='card-img-top rounded' alt='img' style='width: 100%;'>
                    <h2 class='box-title'>" . $article['titleArticle'] . "</h2>
                </div>
                <div class='Box-body'>
                    <p>" . substr($article['contentArticle'], 0, 120) . "...</p>
                </div>
                <div class='Box-footer d-inline'>
                    <form class='d-inline-block my-2' action='modifyArticle.php' method='post'>
                        <input type='hidden' name='id' value='" . $article['idArticle'] . "'>
                        <button type='submit' name='delete' value='Supprimer' class='btn-octicon' aria-label='Pencil icon'>                    
                            <svg class='octicon' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' width='16' height='16'><path fill-rule='evenodd' d='M11.013 1.427a1.75 1.75 0 012.474 0l1.086 1.086a1.75 1.75 0 010 2.474l-8.61 8.61c-.21.21-.47.364-.756.445l-3.251.93a.75.75 0 01-.927-.928l.929-3.25a1.75 1.75 0 01.445-.758l8.61-8.61zm1.414 1.06a.25.25 0 00-.354 0L10.811 3.75l1.439 1.44 1.263-1.263a.25.25 0 000-.354l-1.086-1.086zM11.189 6.25L9.75 4.81l-6.286 6.287a.25.25 0 00-.064.108l-.558 1.953 1.953-.558a.249.249 0 00.108-.064l6.286-6.286z'></path></svg>
                        </button>
                    </form>
                    <form class='d-inline-block my-2' action='deleteArticle.php' method='post'>
                        <input type='hidden' name='id' value='" . $article['idArticle'] . "'>
                        <button type='submit' name='delete' value='Supprimer' class='btn-octicon btn-octicon-danger' aria-label='Trashcan icon'>                    
                            <svg class='octicon' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' width='16' height='16'><path fill-rule='evenodd' d='M6.5 1.75a.25.25 0 01.25-.25h2.5a.25.25 0 01.25.25V3h-3V1.75zm4.5 0V3h2.25a.75.75 0 010 1.5H2.75a.75.75 0 010-1.5H5V1.75C5 .784 5.784 0 6.75 0h2.5C10.216 0 11 .784 11 1.75zM4.496 6.675a.75.75 0 10-1.492.15l.66 6.6A1.75 1.75 0 005.405 15h5.19c.9 0 1.652-.681 1.741-1.576l.66-6.6a.75.75 0 00-1.492-.149l-.66 6.6a.25.25 0 01-.249.225h-5.19a.25.25 0 01-.249-.225l-.66-6.6z'></path></svg>
                        </button>
                    </form>
                    <a href='article.php?id=" . $article['idArticle'] . "' class='btn btn-outline btn-sm d-inline-block  my-2'>
                        Lire la suite
                    </a>
                </div>
            </div>
        </div>";
        $i++;
    }
    $html .= ("</div></div></div>");
} catch (Exception $e) {
    $html .= "<p>Erreur de base de données :</br>$e</p>";
}

//button to delete article
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM article WHERE idArticle = $id";
    $bd->exec($sql);
    header("Location: dashboard.php");

}
echo $html;
?>