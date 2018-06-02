<?php
require("header_main.php");
include("controleur/controleur.php");
require("function.php");
?>
<!DOCTYPE HTML>
<html>
<?php require ("head.php");?>

<body>
<?php require ("header.php"); ?>
<div>
    <h1 id="Welcome_name">Mes Statistiques</h1>

    <div id="tableau_contrats" style="width: 85%;margin: auto;">
        <h3>Mes apparatements</h3>
        <div id="tableau_StAppar" >
            <table class="table" >
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Année</th>
                    <th scope="col">Ref Appartement</th>
                    <th scope="col">Adresse appartement</th>
                    <th scope="col">Nombre de reservation</th>
                </tr>
                </thead>
                <tbody>
                <?php fetch_StatAppar($_SESSION["id"]);?>
                </tbody>
            </table>
        </div>
    </div>

    <div id="tableau_contrats" style="width: 85%;margin: 5% auto auto auto;">
        <h3>Mes Equipements</h3>
        <div id="tableau_StEqui" >
            <table class="table" >
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Année</th>
                    <th scope="col">Mois</th>
                    <th scope="col">Materiel</th>
                    <th scope="col">Nombre de reservation</th>
                </tr>
                </thead>
                <tbody>
                <?php fetch_StatEqui($_SESSION["id"]);?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>

<?php require("footer.php"); ?>
<?php require ("script_js.php");?>
<script>
    set_currentPage("connexion");
</script>
</body>
</html>