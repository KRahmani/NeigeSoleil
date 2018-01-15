<?php
/**
 * Created by PhpStorm.
 * User: kahin
 * Date: 12/01/2018
 * Time: 02:03
 */
session_start();
//si le user veut se déconnecté on libére la variable de session prenom
if (isset($_POST["logout"])) {
    unset($_SESSION["prenom"]);
    header("location: index.php");
}
?>

<!DOCTYPE HTML>
<html>
<!-- pour inclure tous les liens css générals-->
<?php require ("head.php");?>
<body>
<!-- pour inclure le header (accueil / appartements / equipements / a propos de nous / connexion )-->
    <?php require ("header.php");?>
<!-- on mets le corps de la page -->
<div style="text-align: center;">
    <form method="post">
        <input type = "submit" value = "Déconnexion" name = "logout">
    </form>
</div>

    </div>
<!-- pour inclure le footer-->
<?php require ("footer.php");?>
<!-- pour inclure les fichiers js -->
<?php require ("script_js.php");?>
</body>
<script>
    //pour encadrer le button connexion dans le header
    set_currentPage("connexion");
</script>

