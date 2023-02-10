<?php

session_start();


try {
    $bd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'admin', 'lucas');
    echo 'Connexion réussie';
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

if (isset($_POST['nom']) && $_POST['prenom'] && isset($_POST['password'])) {
    $name = $_POST['nom'];
    $firstname = $_POST['prenom'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE UPPER(nom) = UPPER(?) AND UPPER(prnm) = UPPER(?) AND mdp = ?";
    $req = $bd->prepare($sql);
    $req->execute([$name, $firstname, $password]);
    $req->setFetchMode(PDO::FETCH_ASSOC);
    $result = $req->fetch();

    if ($result) {
        $nom = $result['nom'];
        $prenom = $result['prnm'];
        $role = $result['idRole'];
        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['name'] = ucwords($nom.' '.$prenom);
        $_SESSION['role'] = $role;
        $_SESSION['id'] = $result['idUser'];
        header('Location: index.php');
    } else {
        echo 'Invalid username or password';
    }
}
?>