<?php
	//appel du model
	include ("model/model.php");
	class Controleur
	{
		private $unModel;
		public function __construct ($serveur, $bdd, $user, $mdp)
		{
			$this->unModel = new Model($serveur,$bdd, $user, $mdp);
		}
		function connnexionProp($usename, $password)
		{
			if($username !== "" && $password !== ""){ 
				return $this->model->connexionProp($username, $password);
			}
			else
				echo "Veuillez renseigner votre nom utilisateur et votre mot de passe";
		}
	}