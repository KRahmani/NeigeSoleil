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

        public function Inscription($idMax,$civilite,$nom,$prenom,$mail,$address,$code_postal,$ville,$telephone,$mot_passe){
            $unModel = new Model();
               $unModel->Inscription($idMax,$civilite,$nom,$prenom,$mail,$address,$code_postal,$ville,$telephone,$mot_passe);
               header('Location: index.php');
        }
		
		public function getIdMaxTiers(){
            $unModel = new Model();
              $idMax = $unModel->getMaxIdTiers();
              return $idMax;
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

        public function fetch_EquipementProp($idProp){
            $unModel = new Model();
            $tab = $unModel->fetch_EquipementProp($idProp);
            return $tab;
        }

        public function fetch_appartementsProp($idProp){
            $unModel = new Model();
            $tab = $unModel->fetch_appartementsProp($idProp);
            return $tab;
        }

        public function fetch_ContratProp($idProp){
            $unModel = new Model();
            $tab = $unModel->fetch_Contrats($idProp);
            return $tab;
        }



	}



