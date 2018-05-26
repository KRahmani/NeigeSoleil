<?php
require("header_main.php");
include("controleur/controleur.php");
require("function.php");
?>

<!DOCTYPE HTML>
<html>
<?php require ("head.php");?>

<body>
<?php require ("header.php");?>
<div>
    <h1 id="Welcome_name">Bienvenue <?php echo $_SESSION["prenom"]; ?></h1>
    <h3 style="text-align: center;margin-top: 2%;">Mes contrats de gestion</h3>
    <div id="tableau_contrats">
        <table class="tableContrats">
            <tr>
                <th>APPARTEMENT</th>
                <th>DATE DE SIGNATURE</th>
                <th> DATE DE DEBUT</th>
                <th>DATE DE FIN</th>
                <th> ETAT DU CONTRAT</th>
            </tr>
            <tr>
                <td>Carmen</td>
                <td>33 ans</td>
                <td>Espagne</td>
                <td>33 ans</td>
                <td>Espagne</td>
            </tr>
            <tr>
                <td>Michelle</td>
                <td>26 ans</td>
                <td>États-Unis</td>
                <td>33 ans</td>
                <td>Espagne</td>
            </tr>
        </table>
    </div>
</div>
</div>
</div>

<?php require("footer.php"); ?>
</body>
</html>