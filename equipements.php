<?php
require ("header_main.php");
include ("controleur/controleur.php");
require ("function.php");
if (!isset($_SESSION["prenom"]))
{
    header("location: connexion.php");
}
if (isset($_SESSION["prenom"]) && isset($_SESSION["type"])
    && $_SESSION["type"] == "proprietaire")
{
    header("location: equipements_pro.php");
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
    <div id="features-wrapper">
        <div class="container">
            <div id = "recherche_equipement">
                <form class="navbar-form navbar-left" action="" method="post">
                    <div   style = "display: inline-block;" class="form-group 5u">
                        <input type="text" name="recherche_content"
                               value = "<?php if (isset($_POST["recherche_content"])) echo $_POST["recherche_content"];?>"
                               id="recherche" placeholder="Recherche" class="form-control hasDatepicker">
                    </div>
                    <input style="display: inline;padding: 0.0em 1.0em;" type="submit" value = "search" name = "recherche" class="btn btn-default">
                </form>
            </div>
            <div class="row">
                <?php
                if (!isset($_POST["recherche"])) {
                    fetch_Equipement_index(10);
                }
                else{
                    fetch_EquipementWithRecherche_index($_POST['recherche_content']);
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