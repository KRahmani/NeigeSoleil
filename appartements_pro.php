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
<!-- à mettre notre page appartements -->
<div>
    <h1 id = "Welcome_name">Bienvenue  <?php echo $_SESSION["prenom"];?></h1>
    <h3 style="text-align: center;margin-top: 2%;">Mes appartements</h3>
    <div id = "container_appartement_pro">
        <div id="features-wrapper">
        <div class="container">
<!--            <div id = "recherche_container">
                <form class="navbar-form navbar-left" action="">
                    <div  style = "display: inline-block;" class="form-group 3u">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <select  style="display: inline; background: white;" class="2u">
                        <option selected>Region</i></option>
                        <option>PARIS</option>
                        <option>Saint DENIS</option>
                        <option>Yveline</option>
                    </select>
                    <div  style = "display: inline-block;" class="form-group 1u">
                        <input type="text" class="form-control" placeholder="Prix Max">
                    </div>
                    <div  style = "display: inline-block;" class="form-group 1u">
                        <input type="text" class="form-control" placeholder="Prix Min">
                    </div>
                    <div  style = "display: inline-block;" class="form-group 1u">
                        <input type="text" class="form-control" placeholder="Nb Per">
                    </div>
                    <button style="display: inline;" type="submit" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
            </div>-->
            <div class="row">
            <?php
            if (isset($_SESSION["prenom"]) && isset($_SESSION["type"])
            && $_SESSION["type"] == "proprietaire") {
                fetch_appartementsProp($_SESSION["id"]);

            }
            ?>
            </div>
        </div>
</div>
    </div>

</div>
<?php require ("footer.php");?>
<?php require ("script_js.php");?>
<script>
set_currentPage("appartements");
</script>
</body>
</html>