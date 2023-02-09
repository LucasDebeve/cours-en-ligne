<div class='container-lg'>

    <form action="addArticle.php" method="post" class='mt-4'>
        <label for="title">Titre</label>
        <input class="form-control input-block  mb-4" type="text" id="title" placeholder="Incroyable titre"
            aria-label="Full-width input" maxlength="100" name="title"/>

        <label for="content">Contenu</label>
        <textarea class="form-control input-block mb-4" id="content" rows="10" placeholder="Contenu de l'article"
            aria-label="Full-width input" style='resize: vertical;' name="content"></textarea>
        <label for="image">Image de couverture</label>
        <input class="form-control input-block mb-4" type="text" id="image" placeholder="URL de l'image"
            aria-label="Full-width input" maxlength="300" name="image"/>

        <button class="btn btn-primary btn-block" type="submit" aria-label="Full-width input">Submit</button>
    </form>

</div>