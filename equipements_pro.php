<?php
require ("header_main.php");
include ("controleur/controleur.php");
require ("function.php");
if (!isset($_SESSION["prenom"]))
{
    header("location: connexion.php");
}
?>

<!DOCTYPE HTML>
<html>
<?php require ("head.php");?>

<body>
<?php require ("header.php");?>
<!-- à mettre notre page equipements -->
<div>
    <h1 id = "Welcome_name">Bienvenue  <?php echo $_SESSION["prenom"];?></h1>
    <h3 style="text-align: center;margin-top: 2%;">Mes équipements</h3>
    <div id="features-wrapper">
        <div class="container">
            <div class="row">
                <?php
                if (isset($_SESSION["prenom"]) && isset($_SESSION["type"])
                    && $_SESSION["type"] == "proprietaire") {
                    fetch_EquipementProp_index($_SESSION["id"]);

                }
                ?>
            </div>
        </div>
</div>

</div>
<?php require ("footer.php");?>
<?php require ("script_js.php");?>
<script>
    set_currentPage("equipements");
</script>
</body>
</html>