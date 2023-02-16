<?php

session_start();


try {
    $bd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'admin', 'lucas');
    echo 'Connexion réussie';
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

if (isset($_POST['password']) && isset($_POST['username'])) {
    $username = $_POST['username'];
    $sql = "SELECT * FROM user WHERE username = ?";
    $req = $bd->prepare($sql);
    $req->execute([$username]);
    $req->setFetchMode(PDO::FETCH_ASSOC);
    $result = $req->fetch();

    if ($result && password_verify($_POST['password'], $result['mdp'])) {
        $nom = $result['nom'];
        $prenom = $result['prnm'];
        $role = $result['idRole'];
        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['name'] = $username;
        $_SESSION['role'] = $role;
        $_SESSION['id'] = $result['idUser'];
        header('Location: index.php');
    } else {
        header('Location: login.php');
        exit;
    }
}
?>