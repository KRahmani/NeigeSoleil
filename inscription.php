<?php
require ("header_main.php");


require ("controleur/controleur.php");


if(isset($_POST['inscription'])){
    $cont = new Controleur();

	$idMax =  (int)$cont->getIdMaxTiers() + 1;
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
    $cont->Inscription((string)$idMax,$civilite,$nom,$prenom,$mail,$address,$code_postal,$ville,$telephone,$mot_passe);
    ?>
    <script>alert("Vous étes bien inscrit \n Bienvenue sur Neige & Soleil !! ")</script>
    <?php
}
?>

<!DOCTYPE HTML>
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