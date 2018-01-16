<?php
require ("header_main.php");
session_start();

require ("controleur/controleur.php");

if (isset($_SESSION["prenom"]))
    header("location: user_profile.php");
if(isset($_POST['username']) && isset($_POST['password'])){
    $cont = new Controleur();
    //pour la sécurité contre les injections sql et les failles xss
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $count = $cont->connexion_Pro($username, $password);
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
<?php require ("head.php");?>
<body>
<?php require ("header.php");?>
    <!-- Main -->
    <div id="main-wrapper"><h1 id ="title_locataire">Je suis propriétaire</h1>
        <div class="container">

            <div id="container_connexion">

                <!-- Content -->
                <article>
                    <h2 style="text-align: center;">Connexion</h2>
                    <?php include("vue/vueconnexion_pro.php"); ?>
                </article>

            </div>
        </div>
    </div>

<?php require ("footer.php");?>
</div>
<?php require ("script_js.php");?>
<script>
    set_currentPage("connexion");
</script>
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