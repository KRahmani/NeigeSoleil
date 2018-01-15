<?php
session_start();
?>
<html>
<?php require ("head.php");?>
<body>
<?php require ("header.php");?>
<!-- Main -->
<h2>Bienvenue Locataire <?php echo $_SESSION['nom'] . "  " . $_SESSION['prenom'];?> dans votre espace personnel </h2></br>
</body>
</html>