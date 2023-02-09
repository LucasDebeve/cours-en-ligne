<div class="container-lg">

    <div class="Subhead Subhead--spacious">
        <h2 class="Subhead-heading">Les cours</h2>
    </div>

    <?php
    // select all articles
    try {
        $bd = new PDO("mysql:host=localhost;dbname=blog", "admin", "lucas");
        $sql = "SELECT * FROM article ORDER BY dateArticle DESC";
        $articles = $bd->prepare($sql);
        $articles->execute();
        $articles->setFetchMode(PDO::FETCH_ASSOC);
        $i = 0;
        echo ("<div class='container-lg clearfix gutter-md-spacious'>");
        foreach ($articles as $article) {
            if ($i % 3 == 0) {
                echo "</div><div class='container-lg clearfix gutter-md-spacious'>";
            }
            echo
                "<div class='col-md-4 float-left anim-fade-in'>
                <div class='Box mb-4'>
                    <div class='Box-header'>
                        <img src='" . $article['imgArticle'] . "' class='card-img-top rounded' alt='img' style='width: 100%;'>
                        <h2 class='box-title'>" . $article['titleArticle'] . "</h2>
                    </div>
                    <div class='Box-body'>
                        <p>" . substr($article['contentArticle'], 0, 120) . "...</p>
                    </div>
                    <div class='Box-footer'>
                        <a href='article.php?id=" . $article['idArticle'] . "' class='btn btn-outline'>Lire la suite</a>
                    </div>
                </div>
            </div>";
            $i++;
        }
        echo ("</div>");
    } catch (Exception $e) {
        echo "<p>Erreur de base de données :</br>$e</p>";
    }
    ?>

</div>