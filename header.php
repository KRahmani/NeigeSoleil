<div style="margin-top: 1%;
    text-align: center;">
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
                        <li id = "accueil"><a href="index.php">Acceuil</a></li>
                        <li id = "appartements"><a href = "appartements.php">Appartements</a></li>
                        <li id = "equipements"><a href="equipements.php">Équipements</a></li>
                        <li id = "aproposdenous"><a>À propos de Nous</a></li>
                        <li id = "connexion"><a href="connexion.php"><i class="fa fa-user" aria-hidden="false"></i> <?php if (isset($_SESSION["prenom"]))echo $_SESSION["prenom"]; else echo "connexion";?></a></li>

                    </ul>
                </nav>

            </header>
        </div>

