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
                $_SESSION["type"] = "locataire";
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
                //la récupération de données
                $_SESSION["nom"] = $results['NOMP'];
                $_SESSION["prenom"] = $results['PRENOMP'];
                $_SESSION["type"] = "proprietaire";
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

    public function fetch_appartements($nb)
    {
        $this->connexion_bdd();
        if ($this->pdo != null)
        {
            $requete = "select A.idappartement, v.nomv, v.regionv, A.prix_base, A.lienphoto, A.typeappart, A.surface"
           . " from appartement A, info_ville v where  A.idville = v.idville limit " . $nb;
            $sql = $this->pdo->prepare($requete);
            $sql->execute();
            $results = $sql->fetchAll();
            return $results;
        }
        else{
            return null;
        }
    }

        public function fetch_appartements_Research($region,$dateDeb,$dateFin,$prixMin,$prixMax,$nbPersonne)
        {
                $this->connexion_bdd();
                if ($this->pdo != null)
                {
                    $requete = "select A.idappartement, v.nomv, v.regionv, A.prix_base, A.lienphoto, A.typeappart, A.surface"
                        . " from appartement A, info_ville v where A.idville = v.idville";
                    if ($region != ''){
                        $requete = $requete . " and  v.regionv = '$region'";
                    }
                    if ($prixMin != ''){
                        $requete = $requete . " and prix_base >= $prixMin";
                    }
                    if ($prixMax != ''){
                        $requete = $requete . " and prix_base <= $prixMax";
                    }
                    if ($nbPersonne != ''){
                        $requete = $requete . " and capacite_accueil >= $nbPersonne";
                    }
                    if ($dateDeb != '' && $dateFin != ''){
                        $requete = $requete . " and (select count(IDR) from reservation where (datedebut >= '$dateDeb' and datefin <= '$dateFin')"
                            . " or (datedebut between '$dateDeb' and '$dateFin') or (datedebut >= '$dateDeb' and datefin >= '$dateFin')) = 0";
                    }
                    $donnees= array(
                        ":region" =>$region,
                        ":prixMin" =>$prixMin,
                        ":prixMax" =>$prixMax,
                        ":nbPersonne" =>$nbPersonne,
                        ":dateDeb" =>$dateDeb,
                        ":dateFin" =>$dateFin
                    );
                    $sql = $this->pdo->prepare($requete);
                    $sql->execute();
                    $results = $sql->fetchAll();
                    return $results;
                }
                else{
                    return null;
                }
            }

    public function fetch_Region()
    {
        $this->connexion_bdd();
        if ($this->pdo != null)
        {
            $requete = "select * from region";
            $sql = $this->pdo->prepare($requete);
            $sql->execute();
            $results = $sql->fetchAll();

            return $results;
        }
        else{
            return null;
        }
    }

    public function fetch_Equipement($nb)
    {
        $this->connexion_bdd();
        if ($this->pdo != null)
        {
            $requete = "select * from MATERIEL limit $nb";
            $sql = $this->pdo->prepare($requete);
            $sql->execute();
            $results = $sql->fetchAll();

            return $results;
        }
        else{
            return null;
        }
    }

    public function fetch_EquipementWithRecherche($donnee)
    {
        $this->connexion_bdd();
        if ($this->pdo != null)
        {
            $requete = "select * from MATERIEL where TYPEM like '%$donnee%' or ETAT like '%$donnee%' or PRIX like '%$donnee%'";
            $sql = $this->pdo->prepare($requete);
            $sql->execute();
            $results = $sql->fetchAll();

            return $results;
        }
        else{
            return null;
        }
    }




}