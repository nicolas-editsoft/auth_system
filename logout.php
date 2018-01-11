<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
    <head>
        <title>Administration - déconnexion</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <link href='/content/css/style.css' rel='stylesheet' type='text/css'/>
    </head>
    <body>
        <h1 style="text-align: center">
            <?php
            session_destroy(); //on détruit la session
            header("refresh:5;url=/index.php");
            ?>
            vous vous êtes déconnectés avec succès, Vous allez être automatiquement redirigé vers la page d'accueil.
        </h1>
    </body>
</html>