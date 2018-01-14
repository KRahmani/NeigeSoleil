<?php
session_start();
?>
<h2>Bienvenue Proprietaire <?php echo $_SESSION['nom'] . "   " . $_SESSION['prenom'];?> dans votre espace personnel </h2></br>