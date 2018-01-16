<div class="modal fade fatmodal" id="modalcontacter" tabindex="-1" role="dialog" aria-labelledby="modalDisplayProductLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDisplayProductLabel">Contacter Neige & Soleil</h5>
            </div>
            <div style = 'max-height: 800px;overflow: auto !important;' class="modal-body">
            <form method="post" class="navbar-form navbar-left">
                <div  style = "" class="form-group 5u input_contacter">
                    <input type="text" class="form-control" placeholder="Nom *">
                </div>
                <div  style = "float: right;" class="form-group 5u input_contacter">
                    <input type="text" class="form-control" placeholder="Prenom *">
                </div>
                <div  style = "margin: 1% 0%;" class="form-group">
                    <input type="text" class="form-control" placeholder="Téléphone *">
                </div>
                <div  style = "margin: 1% 0%;" class="form-group">
                    <input type="email" class="form-control" placeholder="Mail *">
                </div>
                <textarea id = "contact_area"class="form-control"></textarea>
                <div  style = "display: inline-block; float: right;margin: 2% 0%;" class="form-group ">
                    <input style="padding: 0.4em 0.8em;font-size: inherit;" type="submit" class="form-control" value="Envoyer">
                </div>
            </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

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
                        <li id = "accueil"><a href="index.php">Acceuil</a></li> 
                        <li id = "appartements"><a href = "appartements.php">Appartements</a></li>
                        <li id = "equipements"><a href="equipements.php">Équipements</a></li>
                        <li id = "aproposdenous"><a>À propos de Nous</a></li>
                        <li id = "connexion"><a href="connexion.php"><i class="fa fa-user" aria-hidden="false"></i> <?php if (isset($_SESSION["prenom"]))echo $_SESSION["prenom"]; else echo "connexion";?></a></li>
                    </ul>
                </nav>
            </header>
        </div>

