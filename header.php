<div style="margin-top: 1%; text-align: center;">
    <div id="logo">
        <a href="index.php"><img src="n&s.png"></a>
    </div>
</div>
<div id="page-wrapper">
    <!-- Header -->
    <div id="header-wrapper">
        <header id="header" class="container">

            <!-- Logo -->
            <div id="logo">
                <h1><a href="index.php">Neige&Soleil</a></h1>
                <!--<span>by </span> -->
            </div>
            <!-- Nav -->
            <nav id="nav">
                <ul>
                    <li id="accueil"><a href="index.php">Accueil</a></li>
                    <li id="appartements"><a href="appartements.php">Appartements</a></li>
                    <li id="equipements"><a href="equipements.php">Équipements</a></li>
                    <li id="aproposdenous"><a>À propos de Nous</a></li>
                    <li id="connexion">
                        <?php if ($_SESSION["type"] == "proprietaire" && isset($_SESSION["prenom"]))
                        {
                            echo '<a> <i class="fa fa-user" aria-hidden="false"></i>';
                            echo $_SESSION["prenom"] . '</a>';
                            echo '
                            <ul id="menu-accordeon">
                                <li><a href="connexion.php">Mon profile</a></li>
                                <li><a href="contrat_gestion.php">Contrats de gestion</a></li>
                                <li><a href="Statistiques.php">Statistiques</a></li>
                            </ul>';
                        }
                        else {
                            echo '<a href="connexion.php">
                                <i class="fa fa-user" aria-hidden="false"></i>';
                            if (isset($_SESSION["prenom"]))
                                echo $_SESSION["prenom"];
                            else echo "connexion";
                            echo '</a>';
                        }
                        ?>
                    </li>
                </ul>
            </nav>
        </header>
    </div>

