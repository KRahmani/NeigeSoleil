<?php
require ("header_main.php");
include ("controleur/controleur.php");
?>

<!DOCTYPE HTML>
<html>
<?php require ("head.php");?>

<body>
<?php require ("header.php");?>
<!-- à mettre notre page appartements -->
<div>
    <h1 id = "Welcome_name">Bienvenue  <?php echo $_SESSION["prenom"];?> Youmer</h1>

    <div id="features-wrapper">
        <div class="container">
            <div id = "recherche_container">
                <form class="navbar-form navbar-left" action="">
                    <div  style = "display: inline-block;" class="form-group 3u">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <select  style="display: inline; background: white;" class="2u">
                        <option selected>Region</i></option>
                        <option>PARIS</option>
                        <option>Saint DENIS</option>
                        <option>Yveline</option>
                    </select>
                    <div  style = "display: inline-block;" class="form-group 1u">
                        <input type="text" class="form-control" placeholder="Prix Max">
                    </div>
                    <div  style = "display: inline-block;" class="form-group 1u">
                        <input type="text" class="form-control" placeholder="Prix Min">
                    </div>
                    <div  style = "display: inline-block;" class="form-group 1u">
                        <input type="text" class="form-control" placeholder="Nb Per">
                    </div>
                    <button style="display: inline;" type="submit" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
            </div>
            <div class="row">
                <div class="4u 12u(medium)">
                    <!-- Box -->
                    <section class="box feature">
                        <a href="#" class="image featured"><img src="https://marcfoujolsimmobilier.files.wordpress.com/2013/02/mg_2381.jpg" alt="" /></a>
                        <div class="inner">
                            <header>
                                <h2>Paris 12</h2>
                                <p>Un appartement pour Kahina et youmer </p>
                            </header>
                        </div>
                    </section>

                </div>
                <div class="4u 12u(medium)">

                    <!-- Box -->
                    <section class="box feature">
                        <a href="#" class="image featured"><img src="http://www.book-a-flat.com/photo/paris/13966/salon-2.jpg" alt="" /></a>
                        <div class="inner">
                            <header>
                                <h2>La courneuve</h2>
                                <p>impossible de trouver ça à la courneuve</p>
                            </header>
                        </div>
                    </section>

                </div>
                <div class="4u 12u(medium)">

                    <!-- Box -->
                    <section class="box feature">
                        <a href="#" class="image featured"><img src="https://www.singularstays.co.uk/rentals/fotos/2/14263615214167d32224288b3a5d28719590752311/146123601439bfc4b4a92dedcb3ffe61f189d82a18.jpg" alt="" /></a>
                        <div class="inner">
                            <header>
                                <h2>Paris 1</h2>
                                <p>juste à coté de rue rambuteau hhh</p>
                            </header>
                        </div>
                    </section>

                </div>
                <div class="4u 12u(medium)">

                    <!-- Box -->
                    <section class="box feature">
                        <a href="#" class="image featured"><img src="https://www.lesvoletsverts.fr/wp-content/uploads/2017/08/salon-1-3.jpg" alt="" /></a>
                            <div class="inner">
                            <header>
                                <h2>Ivry sur seine</h2>
                                <p>L'école de ton mari à Kahina</p>
                            </header>
                        </div>
                    </section>

                </div>
                <div class="4u 12u(medium)">

                    <!-- Box -->
                    <section class="box feature">
                        <a href="#" class="image featured"><img src="https://marcfoujolsimmobilier.files.wordpress.com/2013/02/mg_2381.jpg" alt="" /></a>
                        <div class="inner">
                            <header>
                                <h2>Paris 12</h2>
                                <p>Un appartement pour Kahina et youmer </p>
                            </header>
                        </div>
                    </section>

                </div>
                <div class="4u 12u(medium)">

                    <!-- Box -->
                    <section class="box feature">
                        <a href="#" class="image featured"><img src="http://www.book-a-flat.com/photo/paris/13966/salon-2.jpg" alt="" /></a>
                        <div class="inner">
                            <header>
                                <h2>La courneuve</h2>
                                <p>impossible de trouver ça à la courneuve</p>
                            </header>
                        </div>
                    </section>

                </div>
                <div class="4u 12u(medium)">

                    <!-- Box -->
                    <section class="box feature">
                        <a href="#" class="image featured"><img src="https://www.singularstays.co.uk/rentals/fotos/2/14263615214167d32224288b3a5d28719590752311/146123601439bfc4b4a92dedcb3ffe61f189d82a18.jpg" alt="" /></a>
                        <div class="inner">
                            <header>
                                <h2>Paris 1</h2>
                                <p>juste à coté de rue rambuteau hhh</p>
                            </header>
                        </div>
                    </section>

                </div>
                <div class="4u 12u(medium)">

                    <!-- Box -->
                    <section class="box feature">
                        <a href="#" class="image featured"><img src="https://www.lesvoletsverts.fr/wp-content/uploads/2017/08/salon-1-3.jpg" alt="" /></a>
                        <div class="inner">
                            <header>
                                <h2>Ivry sur seine</h2>
                                <p>L'école de ton mari à Kahina</p>
                            </header>
                        </div>
                    </section>

                </div>   <div class="4u 12u(medium)">

                    <!-- Box -->
                    <section class="box feature">
                        <a href="#" class="image featured"><img src="https://marcfoujolsimmobilier.files.wordpress.com/2013/02/mg_2381.jpg" alt="" /></a>
                        <div class="inner">
                            <header>
                                <h2>Paris 12</h2>
                                <p>Un appartement pour Kahina et youmer </p>
                            </header>
                        </div>
                    </section>

                </div>
                <div class="4u 12u(medium)">

                    <!-- Box -->
                    <section class="box feature">
                        <a href="#" class="image featured"><img src="http://www.book-a-flat.com/photo/paris/13966/salon-2.jpg" alt="" /></a>
                        <div class="inner">
                            <header>
                                <h2>La courneuve</h2>
                                <p>impossible de trouver ça à la courneuve</p>
                            </header>
                        </div>
                    </section>

                </div>
                <div class="4u 12u(medium)">

                    <!-- Box -->
                    <section class="box feature">
                        <a href="#" class="image featured"><img src="https://www.singularstays.co.uk/rentals/fotos/2/14263615214167d32224288b3a5d28719590752311/146123601439bfc4b4a92dedcb3ffe61f189d82a18.jpg" alt="" /></a>
                        <div class="inner">
                            <header>
                                <h2>Paris 1</h2>
                                <p>juste à coté de rue rambuteau hhh</p>
                            </header>
                        </div>
                    </section>

                </div>
                <div class="4u 12u(medium)">

                    <!-- Box -->
                    <section class="box feature">
                        <a href="#" class="image featured"><img src="https://www.lesvoletsverts.fr/wp-content/uploads/2017/08/salon-1-3.jpg" alt="" /></a>
                        <div class="inner">
                            <header>
                                <h2>Ivry sur seine</h2>
                                <p>L'école de ton mari à Kahina</p>
                            </header>
                        </div>
                    </section>

                </div>
            </div>
        </div>
</div>

</div>
<?php require ("footer.php");?>
<?php require ("script_js.php");?>
<script>
set_currentPage("appartements");
</script>
</body>
</html>