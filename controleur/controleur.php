<?php
	//appel du model
	require ("model/model.php");
	class Controleur
	{
		public function connexion_Loc($username, $password)
		{
		  $unModel = new Model();
			if($username != "" && $password != "") {
                $count = $unModel->connexion_Loc($username, $password);
                if ($count == 1)
                {
                    $_SESSION['username'] = $username;
                    header('Location: vue/vueespaceLoc.php');
                 }
                 else {
                    return $count;
                 }
			}
			else
				echo "Veuillez renseigner votre nom utilisateur et votre mot de passe";
		}

        public function connexion_Pro($username, $password)
        {
            $unModel = new Model();
            if($username != "" && $password != "") {
                $count = $unModel->connexion_Pro($username, $password);
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

        public function Inscription($civilite,$nom,$prenom,$mail,$address,$code_postal,$ville,$telephone,$mot_passe){
            $unModel = new Model();
               $unModel->Inscription($civilite,$nom,$prenom,$mail,$address,$code_postal,$ville,$telephone,$mot_passe);
               header('Location: vue/vueespaceLoc.php');
        }
	}



