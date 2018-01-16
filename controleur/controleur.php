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
                    header('Location:appartements.php');
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
                    header('Location: appartements_pro.php');
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
               header('Location: /vue/vueespaceLoc.php');
        }

        public function fetch_appartements($nb){
            $unModel = new Model();
            $tab = $unModel->fetch_appartements($nb);
            return $tab;
        }

        public function fetch_appartements_Research($region,$dateDeb,$dateFin,$prixMin,$prixMax,$nbPersonne){
            $unModel = new Model();
            $tab = $unModel->fetch_appartements_Research($region,$dateDeb,$dateFin,$prixMin,$prixMax,$nbPersonne);
            return $tab;
        }

        public function fetch_Region(){
            $unModel = new Model();
            $tab = $unModel->fetch_Region();
            return $tab;
        }

        public function fetch_Equipement($nb){
            $unModel = new Model();
            $tab = $unModel->fetch_Equipement($nb);
            return $tab;
        }

        public function fetch_EquipementWithRecherche($donnee){
            $unModel = new Model();
            $tab = $unModel->fetch_EquipementWithRecherche($donnee);
            return $tab;
        }

	}



