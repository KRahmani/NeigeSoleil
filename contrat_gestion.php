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
    <h1 id="Welcome_name">Mes contrats de gestion</h1>
    <div id="tableau_contrats">
        <div id="tableau_contrats" style="width: 85%;margin: auto;">
            <table class="table" >
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Ref Contrat</th>
                    <th scope="col">Ref Appartement</th>
                    <th scope="col">DATE DE SIGNATURE</th>
                    <th scope="col"> DATE DE DEBUT</th>
                    <th scope="col">DATE DE FIN</th>
                    <th scope="col"> ETAT DU CONTRAT</th>
                </tr>
                </thead>
                <tbody>
                <?php fetch_contratsProp($_SESSION["id"]);?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>

<?php require("footer.php"); ?>
</body>
</html>