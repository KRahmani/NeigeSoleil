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
                    <h2>Bienvenue, vous voulez préparer votre séjour ??.</h2>
                    <p>Pour voir le catalogue merci de vous inscrire ou de vous connecter.</p>
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
                            <h3>Interesting stuff</h3>
                            <div class="grid">
                                <div class="row 50%">
                                    <div class="6u"><a href="#" class="image fit"><img src="images/pic04.jpg" alt="" /></a></div>
                                    <div class="6u"><a href="#" class="image fit"><img src="images/pic05.jpg" alt="" /></a></div>
                                    <div class="6u"><a href="#" class="image fit"><img src="images/pic06.jpg" alt="" /></a></div>
                                    <div class="6u"><a href="#" class="image fit"><img src="images/pic07.jpg" alt="" /></a></div>
                                </div>
                            </div>
                            <a href="#" class="button icon fa-file-text-o">More</a>
                        </section>
                    </div>

                </div>
                <div class="8u 12u(medium) important(medium)">

                    <!-- Content -->
                    <div id="content">
                        <section class="last">
                            <h2>So what's this all about?</h2>
                            <p>This is <strong>Verti</strong>, a free and fully responsive HTML5 site template by <a href="http://html5up.net">HTML5 UP</a>.
                                Verti is released under the <a href="http://html5up.net/license">Creative Commons Attribution license</a>, so feel free to use it for any personal or commercial project you might have going on (just don't forget to credit us for the design!)</p>
                            <p>Phasellus quam turpis, feugiat sit amet ornare in, hendrerit in lectus. Praesent semper bibendum ipsum, et tristique augue fringilla eu. Vivamus id risus vel dolor auctor euismod quis eget mi. Etiam eu ante risus. Aliquam erat volutpat. Aliquam luctus mattis lectus sit amet phasellus quam turpis.</p>
                            <a href="#" class="button icon fa-arrow-circle-right">Continue Reading</a>
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