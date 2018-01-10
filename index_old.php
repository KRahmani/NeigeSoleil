<?php
	include ("controleur/controleur.php");
?>
<html>
	<head>
		<title>Neige et Soleil</title>
		<meta charset ="UTF-8">
	</head>
	<body>
		<?php
			session_start();
			include("vue/vueconnexion.php");
			if(isset($_POST['username']) && isset($_POST['password'])){
				$unControleur = new Controleur ("localhost","iris","kahina","1005");
				//pour la sécurité contre les injections sql et les failles xss
				$username = mysql_real_escape_string($db,htmlspecialchars($_POST['username'])); 
				$password = mysql_real_escape_string($db,htmlspecialchars($_POST['password']));
				$count = $unControleur->connexionProp($username, $password);
				if (count !== 0){
					$_SESSION['username'] = $username;
					header('Location: espaceProp.php');
					
				 }
			}
	


		?>

	</body>
</html>