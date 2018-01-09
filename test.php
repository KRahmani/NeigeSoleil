<?php
/**
 * Created by PhpStorm.
 * User: youmerachat
 * Date: 09/01/2018
 * Time: 18:38
 */

require ("controleur/controleur.php");

$cont = new Controleur();
//pour la sécurité contre les injections sql et les failles xss
$username = htmlspecialchars("youmer");
$password = htmlspecialchars("youmer");

$cont->connexionProp($username,$password);
/*
if ($count !== 0){
    $_SESSION['username'] = $username;
    header('Location: espaceProp.php');
}
*/