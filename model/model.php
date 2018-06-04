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
            
            $username = 'dbo740375814';
            $password = 'Kahina95&';
            $dbname = "db740375814";
            $servername = "db740375814.db.1and1.com:3306";
            /*
            $username = 'root';
            $password = 'root';
            $dbname = "NeigeSoleil";
            $servername = "localhost";
			*/
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
                $_SESSION["id"] = $results['IDTIERS'];
                $_SESSION["nom"] = $results['NOML'];
                $_SESSION["prenom"] = $results['PRENOML'];
                $_SESSION["type"] = "locataire";
                $_SESSION["adresse"] = $results['ADRESSEL'];
                $_SESSION["mail"] = $results['EMAIL'];
                $_SESSION["code_postal"] = $results['CODEPOSTAL'];
                $_SESSION["ville"] = $results['VILLE'];
                $_SESSION["telephone"] = $results['TEL'];
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
            $requete = "SELECT * from PROPRIETAIRE where PRENOMP=:username and MOT_PASSE=:password";
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
                $_SESSION["id"] = $results['IDTIERS'];
                $_SESSION["nom"] = $results['NOMP'];
                $_SESSION["prenom"] = $results['PRENOMP'];
                $_SESSION["type"] = "proprietaire";
                $_SESSION["adresse"] = $results['ADRESSEP'];
                $_SESSION["mail"] = $results['EMAIL'];
                $_SESSION["code_postal"] = $results['CODEPOSTAL'];
                $_SESSION["ville"] = $results['VILLE'];
                $_SESSION["telephone"] = $results['TEL'];
                $_SESSION["rib"] = $results['RIB'];
                return 1;
            }
        }
        else{
            return null;
        }
    }

    public function getMaxIdTiers()
    {
        $this->connexion_bdd();
        if ($this->pdo != null)
        {
            $requete = "select max(IDTIERS) from TIERS";
            $sql = $this->pdo->prepare($requete);
            $sql->execute();
            $result = $sql->fetch();
            return $result;
        }
        else{
            return null;
        }
    }
    public function Inscription($maxId,$civilite,$nom,$prenom,$mail,$address,$code_postal,$ville,$telephone,$mot_passe)
    {
        $this->connexion_bdd();
        if ($this->pdo != null)
        {
          
            $requete = "INSERT INTO `LOCATAIRE`(IDTIERS, CIVILITE, NOML, PRENOML, ADRESSEL, CODEPOSTAL, VILLE, TEL, EMAIL, MOT_PASSE) 
                        VALUES ('$maxId','$civilite', '$nom', '$prenom', '$address', '$code_postal', '$ville', '$telephone', '$mail', '$mot_passe')";
            $sql = $this->pdo->prepare($requete);
            $sql->execute();
            $_SESSION["nom"] = $nom;
            $_SESSION["prenom"] = $prenom;
            echo $maxId;
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
           . " from APPARTEMENT A, INFO_VILLE v where  A.idville = v.idville limit " . $nb;
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
                    $requete = "select A.IDAPPARTEMENT, v.NOMV, v.REGIONV, A.PRIX_BASE, A.LIENPHOTO, A.TYPEAPPART, A.SURFACE"
                        . " from APPARTEMENT A, INFO_VILLE v where A.idville = v.idville";
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
                        $requete = $requete . " and (select count(IDR) from RESERVATION where (datedebut >= '$dateDeb' and datefin <= '$dateFin')"
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
            $requete = "select * from REGION";
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
    public function fetch_EquipementProp($idprop)
    {
        $this->connexion_bdd();
        if ($this->pdo != null)
        {
            $requete = "select * from MATERIEL where idtiers = $idprop";
            $sql = $this->pdo->prepare($requete);
            $sql->execute();
            $results = $sql->fetchAll();

            return $results;
        }
        else{
            return null;
        }
    }

    public function fetch_appartementsProp($idProp)
    {
        $this->connexion_bdd();
        if ($this->pdo != null)
        {
            $requete = "select A.idappartement, v.nomv, v.regionv, A.prix_base, A.lienphoto, A.typeappart, A.surface, C.idTiers"
                . " from APPARTEMENT A, INFO_VILLE v, CONTRAT_GESTION C where A.idville = v.idville and A.idappartement = C.IDAPPARTEMENT and C.idTiers = " . $idProp;
            $sql = $this->pdo->prepare($requete);
            $sql->execute();
            $results = $sql->fetchAll();
            return $results;
        }
        else{
            return null;
        }
    }
	
	 public function fetch_Contrats($idprop)
    {
        $this->connexion_bdd();
        if ($this->pdo != null)
        {
            $requete = "select * from CONTRAT_GESTION where idtiers = $idprop";
            $sql = $this->pdo->prepare($requete);
            $sql->execute();
            $results = $sql->fetchAll();
            return $results;
        }
        else{
            return null;
        }
    }

	    public function fetch_StatAppar($idprop)
    {
        $this->connexion_bdd();
        if ($this->pdo != null)
        {
            $requete = "SELECT VUENBRESAPPART.*, APPARTEMENT.* FROM VUENBRESAPPART join APPARTEMENT on APPARTEMENT = APPARTEMENT.IDAPPARTEMENT WHERE  PROPRIETAIRE = $idprop ";
            $sql = $this->pdo->prepare($requete);
            $sql->execute();
            $results = $sql->fetchAll();
            return $results;
        }
        else{
            return null;
        }
    }

    public function fetch_StatEquim($idprop)
    {
        $this->connexion_bdd();
        if ($this->pdo != null)
        {
            $requete = "SELECT * FROM  VUENBMATERIEL WHERE PROPRIETAIRE = $idprop";
            $sql = $this->pdo->prepare($requete);
            $sql->execute();
            $results = $sql->fetchAll();
            return $results;
        }
        else{
            return null;
        }
    }

    public function fetchInfo($idprop,$idAppart){
        $this->connexion_bdd();
        if ($this->pdo != null)
        {
            $requete = "SELECT R.DATEDEBUT, R.DATEFIN, R.IDR FROM RESERVATION R, CONTRAT_GESTION A, PROPRIETAIRE P	 WHERE R.IDAPPARTEMENT = $idAppart AND A.IDTIERS = P.IDTIERS AND A.IDTIERS = $idprop";
            $sql = $this->pdo->prepare($requete);
            $sql->execute();
            $results = $sql->fetchAll();
            return $results;
        }
        else{
            return null;
        }
    }

    public function fetchInfoEqui($idprop,$idEqui){
        $this->connexion_bdd();
        if ($this->pdo != null)
        {
            $requete = "select L.IDR, L.QUANTITE from LOUER L, MATERIEL M where L.IDMATERIEL = M.IDMATERIEL  and M.IDTIERS = $idprop and L.IDMATERIEL = $idEqui";
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