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
    <div style="background: white;
    width: 40%;
    margin: auto;
    border-radius: 6px;">
       <div style="width: 70%;
    text-align: left;
    margin: auto;">
        <div><h4 style="display: inline">Nom : </h4><?php echo utf8_encode($_SESSION["nom"]);?></div>
        <div><h4 style="display: inline">Prenom : </h4><?php echo utf8_encode($_SESSION["prenom"]);?></div>
        <div><h4 style="display: inline">mail : </h4><?php echo utf8_encode($_SESSION["mail"]);?></div>
        <div><h4 style="display: inline">adresse : </h4><?php echo utf8_encode($_SESSION["adresse"]);?></div>
        <div><h4 style="display: inline">code postal : </h4><?php echo utf8_encode($_SESSION["code_postal"]);?></div>
        <div><h4 style="display: inline">ville : </h4><?php echo utf8_encode($_SESSION["ville"]);?></div>
        <div><h4 style="display: inline">téléphone : </h4><?php echo utf8_encode($_SESSION["telephone"]);?></div>
        <?php if ($_SESSION["type"] == "proprietaire") echo ' <div><h4 style="display: inline">rib : </h4>'.$_SESSION["rib"].'</div>';?>
    <form method="post">

        <input style="    padding: 0em 1.0em;
    margin: 2% 0%;" type = "submit" value = "Déconnexion" name = "logout">
    </form>
</div>
    </div>
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

