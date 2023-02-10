<?php
include('head.php');
include 'nav.php';

if (!isset($_SESSION['id'])) {
  header('Location: login.php');
  exit;
}
?>
<div class="Layout Layout--sidebarPosition-start m-4 Layout--divided">
  <div class="Layout-sidebar p-2">
    <nav class="SideNav border" style="max-width: 360px">
      <a class="SideNav-item" href="#url">Account</a>
      <a class="SideNav-item" href="#url" aria-current="page">Profile</a>
      <a class="SideNav-item" href="#url">Emails</a>
      <a class="SideNav-item" href="#url">Notifications</a>
    </nav>
  </div>
  <div class="Layout-divider">

  </div>
  <div class="Layout-main p-2">
    <div class="container">
      <?php
      $article_id = $_GET['id'];
      try {
        $bd = new PDO("mysql:host=localhost;dbname=blog", "admin", "lucas");
        $sql = "SELECT * FROM article WHERE idArticle = ?";
        $article = $bd->prepare($sql);
        $article->execute([$article_id]);
        $article = $article->fetch(PDO::FETCH_ASSOC);
        echo "<figure class='figure d-flex flex-column flex-items-center'>
        <img src=" . $article['imgArticle'] . " class='rounded' alt='...' style='width: 100%; min-width: 235px; max-width : 1000px;'></figure>";
        echo "<div class='Subhead'>
          <h2 class='Subhead-heading'>" . $article['titleArticle'] . "</h2>
          <div class='Subhead-description'>"
            . $article['dateArticle'] .
          "</div>
        </div>";
        echo "<div class='markdown-body'>" . $article['contentArticle'] . "</div>";

      } catch (PDOException $e) {
        echo $e->getMessage();
      }

      ?>
    </div>
  </div>
</div>
</div>
<?php
include 'footer.php';
?>