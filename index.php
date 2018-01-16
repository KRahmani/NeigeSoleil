<?php
require ("header_main.php");
	include ("controleur/controleur.php");
	require ("function.php");
?>

<!DOCTYPE HTML>
<html>
    <?php require ("head.php");?>

    <body>
    <?php require ("header.php");?>
    <!-- Banner -->
    <div id="banner-wrapper">
        <div id="banner" class="box container">
            <div class="row">
                <div class="7u 12u(medium)">
                    <h2>Bienvenue, vous voulez préparer votre séjour ?</h2>
                    <p>Pour voir nos appartements merci de vous inscrire ou de vous connecter.</p>
                </div>
                <div class="5u 12u(medium)">
                    <ul>
                        <li><a style = "font-size: 1.6em;" href="connexion_pro.php" class="button big icon fa-arrow-circle-right">Je suis propriétaire</a></li>
                        <li><a style = "font-size: 1.6em;" href="connexion.php" class="button alt big icon fa-arrow-circle-right">Je suis locataire</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Features -->
    <div id="features-wrapper">
        <div class="container">
            <div class="row">
                <?php
                if (isset($_SESSION["prenom"]) && isset($_SESSION["type"])
                    && $_SESSION["type"] == "locataire")
                 fetch_appartements_index(3);
                else
                    fetch_appartements_accueil(3);
                ?>
            </div>
        </div>
    </div>

    <!-- Main -->
    <div id="main-wrapper">
        <div class="container">
            <div class="row 200%">
                <div class="4u 12u(medium)">

                    <!-- Sidebar -->
                    <div id="sidebar">
                        <section class="widget thumbnails">
                            <h3>Louez & Profitez</h3>
                            <div class="grid">
                                <div class="row 50%">
                                    <div class="6u"><a href="#" class="image fit"><img src="https://www.alpbachtal.at/website/var/tmp/image-thumbnails/10000/12082/thumb__gallery-large__wide/skifahrer-rote-jacke-blickt-auf-berge-ski-juwel-alpbachtal-wildschoanau.jpeg" alt="" /></a></div>
                                    <div class="6u"><a href="#" class="image fit"><img src="https://www.wur.nl/upload_mm/8/6/a/ad5911bf-d3dd-4f76-b8c9-104bdf29cd95_Wintersport3.jpg" alt="" /></a></div>
                                </div>
                            </div>
                            <a href="appartements.php" class="button icon fa-file-text-o">More</a>
                        </section>
                    </div>

                </div>
                <div class="8u 12u(medium) important(medium)">

                    <!-- Content -->
                    <div id="content">
                        <section class="last">
                            <h2>Qui sommes nous ?</h2>
                            <p>NEIGE ET SOLEIL est une société de location d’appartements et de matériels de ski et randonné en montagne. Elle se situe dans la vallée du Queyras, près de Briançon.
                                Son Activité principale consiste en la gestion locative d’appartements.
                                En effet, elle propose à des propriétaires une gestion locative de leurs appartements en les louant à des particuliers de manière saisonnière.
                            </p>
                        </section>
                    </div>

                </div>
            </div>
        </div>
    </div>

    </div>
    <?php require ("footer.php");?>
    <?php require ("script_js.php");?>
<script>
    set_currentPage("accueil");
</script>
	</body>
</html>