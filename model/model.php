<?php
		class Model
		{
			private $pdo;
			public function __construct($serveur, $bdd, $user, $mdp)
			{
				$this->pdo=null;
			
			
				try
				{
					//PDO est une classe qui permet de se connecter à mysql et donc à la base qu'on veut
					$this->pdo = new PDO("mysql:host=".$serveur.";dbname=".$bdd, $user, $mdp );
				}
				catch (exception $exp)
				{
					echo "Erreur de connexion à la BDD";
				}
				
			}
			function connnexionProp($unsename, $password)
			{
				if ($this->pdo != null)
				{
				$requete = "SELECT count(*) from proprietaire where name=:username and mot_psse=:password";
				$donnees= array(
					":username" =>$username,
					":password" =>$password,
					);
				$connect= $this->pdo->prepare ($requete);
				$connect->execute($donnees);
				$count = $connect->rowCount();
				return $count;
				}
				else{
				return null;
				}
				
			}
		}