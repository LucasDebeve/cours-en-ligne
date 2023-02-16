<?php

session_start();

include 'head.php';
include 'nav.php';

if (isset($_SESSION['id'])) {
    header('Location: index.php');
    exit;
}
?>
<div class="container-lg d-flex flex-column flex-sm-row justify-centered">
    <div class="col-lg-5 container-md Box color-shadow-small my-8">
        <div class="Box-row">
            <h3 class="m-0">Connexion</h3>
        </div>
        <div class="Box-row">
            <form action="authenticate.php" method="post">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" class="input-block mb-4" name="username" id="username">
                <label for="password">Mot de passe</label>
                <input type="password" class="input-block mb-4" name="password" id="password">
                <button class="btn btn-primary btn-block" type="submit" aria-label="Full-width input">Se
                    connecter</button>
            </form>
        </div>
    </div>
    <div class="col-lg-5 container-md Box color-shadow-small my-8">
        <div class="Box-row">
            <h3 class="m-0">Inscription</h3>
        </div>
        <div class="Box-row">
            <form action="register.php" method="post">
                <label for="nom">Nom</label>
                <input type="text" class="input-block mb-4" name="nom" id="nom">
                <label for="prenom">Prénom</label>
                <input type="text" class="input-block mb-4" name="prenom" id="prenom">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" class="input-block mb-4" name="username" id="username">
                <label for="password">Mot de passe</label>
                <input type="password" class="input-block mb-4" name="password" id="password">
                <button class="btn btn-danger btn-block" type="submit"
                    aria-label="Full-width input">S'inscrire</button>
            </form>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>