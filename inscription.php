<?php
require ("header_main.php");
session_start();

require ("controleur/controleur.php");

if(isset($_POST['inscription'])){
    $cont = new Controleur();
    //
    $civilite = $_POST['civilite'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    $address = $_POST['address'];
    $code_postal = $_POST['code_postal'];
    $ville = $_POST['ville'];
    $telephone = $_POST['telephone'];
    $mot_passe = $_POST['mot_passe'];
    //
    $count = $cont->Inscription($civilite,$nom,$prenom,$mail,$address,$code_postal,$ville,$telephone,$mot_passe);
}
?>

<!DOCTYPE HTML>
<!--
	Verti by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CC   A 3.0 license (html5up.net/license)
-->
<html>
<?php require ("head.php");?>
<body>
<?php require ("header.php")?>
    <!-- Main -->
    <div id="main-wrapper">
        <h1 id ="title_locataire">Inscription locataire</h1>
        <div class="container">

            <div id="container_connexion">
                <!-- Content -->
                <article>
                    <?php include("vue/vueInscription.php"); ?>
                </article>
            </div>
        </div>
    </div>

    </div>
<?php require ("footer.php");?>
<?php require ("script_js.php");?>
</body>

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
        set_currentPage("connexion");
    </script>
    <?php
    unset($_POST["false"]);
}?>
</html>