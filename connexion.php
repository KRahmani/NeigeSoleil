<?php
require ("header_main.php");
session_start();

require ("controleur/controleur.php");

if(isset($_POST['username']) && isset($_POST['password'])){
    $cont = new Controleur();
    //pour la sécurité contre les injections sql et les failles xss
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $count = $cont->connexion_Loc($username, $password);
    if ($count == 0)
        $_POST['false'] =  "yes";
}
?>

<!DOCTYPE HTML>
<!--
	Verti by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CC   A 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title>Verti by HTML5 UP</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="assets/css/main.css" />
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
</head>
<body>
<div style="margin-top: 1%;
    text-align: center;">
    <div id="logo">
        <img src="n&s.png">
    </div></div>
<div id="page-wrapper">
    <!-- Header -->
    <div id="header-wrapper">
        <header id="header" class="container">

            <!-- Logo -->
            <div id="logo">
                <h1><a href="index.php">Neige&Soleil</a></h1>
                <!--<span>by </span> -->
            </div>

            <!-- Nav -->
            <nav id="nav">
                <ul>
                    <li class="current"><a href="index.php">Acceuil</a></li>
                    <li><a href="left-sidebar.html">Appartements</a></li>
                    <li><a href="right-sidebar.html">Équipements</a></li>
                    <li><a href="right-sidebar.html">À propos de Nous</a></li>
                    <li><a href="right-sidebar.html">Nous contacter</a></li>
                </ul>
            </nav>

        </header>
    </div>


    </div>

    <!-- Main -->
    <div id="main-wrapper"><h1 id ="title_locataire">Je suis locataire</h1>
        <div class="container">

            <div id="container_connexion">

                <!-- Content -->
                <article>
                    <h2 style="text-align: center;">Connexion</h2>
                    <?php include("vue/vueconnexion.php"); ?>
                </article>

            </div>
        </div>
    </div>

    <!-- Footer -->
    <div id="footer-wrapper">
        <footer id="footer" class="container">
            <div class="row">
                <div class="3u 6u(medium) 12u$(small)">

                    <!-- Links -->
                    <section class="widget links">
                        <h3>Random Stuff</h3>
                        <ul class="style2">
                            <li><a href="#">Etiam feugiat condimentum</a></li>
                            <li><a href="#">Aliquam imperdiet suscipit odio</a></li>
                            <li><a href="#">Sed porttitor cras in erat nec</a></li>
                            <li><a href="#">Felis varius pellentesque potenti</a></li>
                            <li><a href="#">Nullam scelerisque blandit leo</a></li>
                        </ul>
                    </section>

                </div>
                <div class="3u 6u$(medium) 12u$(small)">

                    <!-- Links -->
                    <section class="widget links">
                        <h3>Random Stuff</h3>
                        <ul class="style2">
                            <li><a href="#">Etiam feugiat condimentum</a></li>
                            <li><a href="#">Aliquam imperdiet suscipit odio</a></li>
                            <li><a href="#">Sed porttitor cras in erat nec</a></li>
                            <li><a href="#">Felis varius pellentesque potenti</a></li>
                            <li><a href="#">Nullam scelerisque blandit leo</a></li>
                        </ul>
                    </section>

                </div>
                <div class="3u 6u(medium) 12u$(small)">

                    <!-- Links -->
                    <section class="widget links">
                        <h3>Random Stuff</h3>
                        <ul class="style2">
                            <li><a href="#">Etiam feugiat condimentum</a></li>
                            <li><a href="#">Aliquam imperdiet suscipit odio</a></li>
                            <li><a href="#">Sed porttitor cras in erat nec</a></li>
                            <li><a href="#">Felis varius pellentesque potenti</a></li>
                            <li><a href="#">Nullam scelerisque blandit leo</a></li>
                        </ul>
                    </section>

                </div>
                <div class="3u 6u$(medium) 12u$(small)">

                    <!-- Contact -->
                    <section class="widget contact">
                        <h3>Contact Us</h3>
                        <ul>
                            <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
                            <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                            <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
                            <li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
                            <li><a href="#" class="icon fa-pinterest"><span class="label">Pinterest</span></a></li>
                        </ul>
                        <p>1234 Fictional Road<br />
                            Nashville, TN 00000<br />
                            (800) 555-0000</p>
                    </section>

                </div>
            </div>
            <div class="row">
                <div class="12u">
                    <div id="copyright">
                        <ul class="menu">
                            <li>&copy; Untitled. All rights reserved</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>

</div>

<!-- Scripts -->

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.dropotron.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
<script src="assets/js/main.js"></script>

</body>
<?php if (isset($_POST["false"])){?>
    <script type="text/javascript">
        document.getElementById("name_user").innerHTML = "Nom d'utilisateur ou mot de passe incorrect";
        document.getElementById("name_user").style.color = "red";
    </script>
    <?php
    unset($_POST["false"]);
}?>
</html>