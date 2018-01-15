<?php
require ("header_main.php");
include ("controleur/controleur.php");

if (!isset($_SESSION["prenom"]))
{
    header("location: connexion.php");
}
if (isset($_SESSION["prenom"]) && isset($_SESSION["type"])
    && $_SESSION["type"] == "proprietaire")
{
    header("location: appartements_pro.php");
}

function fetch_appartements_index(){
    $cont = new Controleur();
    $tab = $cont->fetch_appartements(10);
    foreach ($tab as $tab_tmp)
    {
        echo '<div class="4u 12u(medium)">';
        echo '<section class="box feature">';
        echo ' <a  class="image featured"><img src="imagesAppartement/' . utf8_encode($tab_tmp["lienphoto"]) . '.jpg" alt="" /></a>';
        echo '<div class="inner">';
        echo ' <header>';
        echo '<h2>' . utf8_encode($tab_tmp["regionv"]) .' / '. utf8_encode($tab_tmp["nomv"]) . '</h2>';
        echo '<p>' . $tab_tmp['typeappart'] .' / ' . $tab_tmp["surface"] .'m²'  .'</p>';
        echo '<p>' . $tab_tmp['prix_base'].' Euros' . '</p>';
        echo '<button value = "' . $tab_tmp["idappartement"] . '" class="but_contacter">Contacter</button>';
        echo ' </header>';
        echo '</div>';
        echo '</section>';
        echo '</div>';
    }
}
function fetch_appartements_Research(){
    $cont = new Controleur();
    $tab = $cont->fetch_appartements_Research($_POST["Region"],$_POST["dateDebut"],$_POST["dateFin"], $_POST["prixMin"],$_POST["prixMax"],$_POST["nbPersonne"]);
    foreach ($tab as $tab_tmp)
    {
        echo '<div class="4u 12u(medium)">';
        echo '<section class="box feature">';
        echo ' <a  class="image featured"><img src="imagesAppartement/' . utf8_encode($tab_tmp["lienphoto"]) . '.jpg" alt="" /></a>';
        echo '<div class="inner">';
        echo ' <header>';
        echo '<h2>' . utf8_encode($tab_tmp["regionv"]) .' / '. utf8_encode($tab_tmp["nomv"]) . '</h2>';
        echo '<p>' . $tab_tmp['typeappart'] .' / ' . $tab_tmp["surface"] .'m²'  .'</p>';
        echo '<p>' . $tab_tmp['prix_base'].' Euros' . '</p>';
        echo '<button value = "' . $tab_tmp["idappartement"] . '" class="but_contacter">Contacter</button>';
        echo ' </header>';
        echo '</div>';
        echo '</section>';
        echo '</div>';
    }
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
                    <select name="Region" style="display: inline; background: white;" class="2u">
                        <option value = "" disabled selected>Region</i></option>
                        <option value = "nouvelle-aquitaine">nouvelle-aquitaine</option>
                        <option value="saintDenis">Saint DENIS</option>
                        <option value="yveline">Yveline</option>
                    </select>
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
                  fetch_appartements_index();
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