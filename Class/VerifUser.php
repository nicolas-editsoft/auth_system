<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of VerifUser
 *
 * @author nico_
 */
class VerifUser extends Bdd_Co {

    function VerifUser($first_name = '', $last_name = '', $login = '', $id = '', $email = '', $date_suscribe = '', $right = '') {
        $bdd = Bdd_Co::Connexion();
        $retour = $bdd->prepare("SELECT * FROM users WHERE id=?");
        $retour->execute(array($id));
        $donnes = $retour->fetch();
        if ($donnes["first_name"] == $first_name) {
            if ($donnes["last_name"] == $last_name) {
                if ($donnes["login"] == $login) {
                    if ($donnes["email"] == $email) {
                        if ($donnes["date_suscribe"] == $date_suscribe) {
                            if ($donnes["authority"] == $right) {
                                return TRUE;
                            } else {
                                return FALSE;
                            }
                        } else {
                            return FALSE;
                        }
                    } else {
                        return FALSE;
                    }
                } else {
                    return FALSE;
                }
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
        return FALSE;
    }

    function VerifLogin($login = '') {
        $bdd = Bdd_Co::Connexion();
        $retour = $bdd->prepare("SELECT login FROM users");
        $retour->execute();
        $verif = 0;
        while ($donnes = $retour->fetch()) {
            if ($login == $donnes["login"])
                $verif++;
        }
        if ($verif == 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    function VerifLoginId($login = '', $id ='') {
        $bdd = Bdd_Co::Connexion();
        $retour = $bdd->prepare("SELECT login FROM users WHERE id != ?");
        $retour->execute(array($id));
        $verif = 0;
        while ($donnes = $retour->fetch()) {
            if ($login == $donnes["login"])
                $verif++;
        }
        if ($verif == 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function VerifEmail($email = '') {
        $bdd = Bdd_Co::Connexion();
        $retour = $bdd->prepare("SELECT email FROM users");
        $retour->execute();
        $verif = 0;
        while ($donnes = $retour->fetch()) {
            if ($email == $donnes["email"])
                $verif++;
        }
        if ($verif == 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    function VerifEmailId($email = '', $id='') {
        $bdd = Bdd_Co::Connexion();
        $retour = $bdd->prepare("SELECT email FROM users WHERE id !=?");
        $retour->execute(array($id));
        $verif = 0;
        while ($donnes = $retour->fetch()) {
            if ($email == $donnes["email"])
                $verif++;
        }
        if ($verif == 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
