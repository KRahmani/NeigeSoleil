<?php
	//appel du model
	require ("model/model.php");
	class Controleur
	{
		public function connexionProp($username, $password)
		{
		  $unModel = new Model();
			if($username != "" && $password != "") {
                $count = $unModel->connexionProp($username, $password);
                if ($count == 1)
                {
                    $_SESSION['username'] = $username;
                    header('Location: vue/vueespaceProp.php');
                 }
                 else {
                    return $count;
                 }
			}
			else
				echo "Veuillez renseigner votre nom utilisateur et votre mot de passe";
		}
	}



