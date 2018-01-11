<?php

session_start(); //on commence une session
require '../content/Class/Bdd_Co.php';
if (isset($_POST['login']) AND isset($_POST['password'])) { //si l'utilisateur a posté un mot de passe
    $bdd = Bdd_Co::Connexion();
    $login = htmlspecialchars($_POST['login']);
    $password = sha1($_POST['password']); //on crypte le mot de passe
    $requete_ident = $bdd->query("SELECT * FROM users WHERE login='" . $login . "'") or die('Erreur : ' . $e->getMessage());
    $identification = $requete_ident->fetch();
    if ($identification['login'] == $login AND $identification['pass'] == $password) { //et on le compare au nom d'utilisateur et mot de passe stocké dans la bdd 

// On stock dans la variable globale de sessions les différentes informations de l'utilisateur pour vérifier entre chaque page si c'est bien le bon utilisateur. 
        $_SESSION['id'] = $identification['id'];
        $_SESSION['first_name'] = $identification['first_name'];
        $_SESSION['last_name'] = $identification['last_name'];
        $_SESSION['login'] = $identification['login'];
        $_SESSION['email'] = $identification['email'];
        $_SESSION['date_suscribe'] = $identification['date_suscribe'];
        $_SESSION['right'] = $identification['authority'];
        header('Location: /index.php');
    } else { //s'ils ne correspondent pas, afficher un message d'erreur
        $errors ['message'] = "Le nom d'utilisateur et/ou le mot de passe sont incorret";
        $_SESSION['errors'] = $errors; //on stocke les erreurs
        header('Location: /index.php');
    }
} else {
    $errors ['message'] = "Vous avez oublié de renseigner un des champs";
    $_SESSION['errors'] = $errors; //on stocke les erreurs
    header('Location: /index.php');
}
