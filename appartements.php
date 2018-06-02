<?php
require ("header_main.php");
include ("controleur/controleur.php");
require ("function.php");
if (!isset($_SESSION["prenom"]))
{
    //go("connexion.php");
    header("location: connexion.php");
}
if (isset($_SESSION["prenom"]) && isset($_SESSION["type"])
    && $_SESSION["type"] == "proprietaire")
{
    header("location: appartements_pro.php");
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
    <div id="features-wrapper">
        <div class="container">
            <div id = "recherche_container">
                <form class="navbar-form navbar-left" action="" method="post">
                    <div   style = "display: inline-block;" class="form-group 2u">
                        <input name="dateDebut" id="get_date_debut" type="date" data-toggle="datepicker" class="form-control hasDatepicker" placeholder="Date" required="">
                    </div>
                    <div   style = "display: inline-block;" class="form-group 2u">
                        <input name="dateFin" id="get_date_fin" type="date" data-toggle="datepicker" class="form-control" placeholder="Date" required="">
                    </div>
                    <?php
                        fetch_Region_index();
                    ?>
                    <div  style = "display: inline-block;" class="form-group 1u">
                        <input name = "prixMax" type="text" class="form-control" placeholder="Prix Max">
                    </div>
                    <div  style = "display: inline-block;" class="form-group 1u">
                        <input name="prixMin" type="text" class="form-control" placeholder="Prix Min">
                    </div>
                    <div  style = "display: inline-block;" class="form-group 1u">
                        <input name="nbPersonne" type="text" class="form-control" placeholder="Nb Per">
                    </div>
                    <input style="display: inline;padding: 0.0em 1.0em;" type="submit" value = "search" name = "search" class="btn btn-default">
                </form>
            </div>
            <div class="row">
                <?php
               if (!isset($_POST["search"]))
                  fetch_appartements_index(10);
                else {
                    //j'appelle une autre fonction qui recherche des
                    //appartements selon les filtre du locataire*/
                    fetch_appartements_Research();
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