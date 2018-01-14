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

    public function connexion_Loc($username, $password)
    {
        $this->connexion_bdd();
        if ($this->pdo != null)
        {
            $requete = "SELECT * from LOCATAIRE where PRENOML=:username and mot_passe=:password";
            $donnees= array(":username" =>$username, ":password" =>$password);
            $sql = $this->pdo->prepare($requete);
            $sql->execute($donnees);
            $results = $sql->fetch();
            if ($sql->rowCount() <= 0)
            {
                return 0;
            }
            else{
                $_SESSION["nom"] = $results['NOML'];
                $_SESSION["prenom"] = $results['PRENOML'];
                return 1;
            }
        }
        else{
            return null;
        }
    }

    public function connexion_Pro($username, $password)
    {
        $this->connexion_bdd();
        if ($this->pdo != null)
        {
            $requete = "SELECT * from PROPRIETAIRE where PRENOMP=:username and mot_passe=:password";
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

    public function Inscription($civilite,$nom,$prenom,$mail,$address,$code_postal,$ville,$telephone,$mot_passe)
    {
        $this->connexion_bdd();
        if ($this->pdo != null)
        {
            $requete = "INSERT INTO `LOCATAIRE` (`CIVILITE`, `NOML`, `PRENOML`, `ADRESSEL`, `CODEPOSTAL`, `VILLE`, `TEL`, `EMAIL`, `MOT_PASSE`) 
                        VALUES ('$civilite', '$nom', '$prenom', '$address', '$code_postal', '$ville', '$telephone', '$mail', '$mot_passe')";
            $sql = $this->pdo->prepare($requete);
            $sql->execute();
            $_SESSION["nom"] = $nom;
            $_SESSION["prenom"] = $prenom;
        }
        else{
            return null;
        }
    }
}