<?php
session_start();
		class Model
        {
            private $pdo;

            private function connexion_bdd()
            {
                $this->pdo=null;
                try{
                    //PDO est une classe qui permet de se connecter à mysql et donc à la base qu'on veut
                    $username = 'root';
                    $password = 'root';
                    $dbname = "NeigeSoleil";
                    $servername = "localhost";
                    $this->pdo = new PDO("mysql:host=".$servername, $username, $password);
                    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $this->pdo->exec("USE " . $dbname);
                }
                catch (exception $exp) {
                    echo "Erreur de connexion à la BDD";
                }
            }
            public function connexionProp($username, $password)
            {
                $this->connexion_bdd();
                if ($this->pdo != null)
                {
                    $requete = "SELECT * from proprietaire where PRENOMP=:username and mot_passe=:password";
                    $donnees= array(":username" =>$username, ":password" =>$password);
                    $sql = $this->pdo->prepare($requete);
                    $sql->execute($donnees);
                    $results = $sql->fetch();
                    if ($sql->rowCount() <= 0)
                    {
                        return 0;
                    }
                    else{
                        $_SESSION["nom"] = $results['NOMP'];
                        $_SESSION["prenom"] = $results['PRENOMP'];
                        return 1;
                    }
                }
                else{
                    return null;
                }
            }
        }