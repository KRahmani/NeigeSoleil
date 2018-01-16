<?php
/**
 * Created by PhpStorm.
 * User: kahin
 * Date: 16/01/2018
 * Time: 00:20
 */

function fetch_appartements_index($nb){
    $cont = new Controleur();
    $tab = $cont->fetch_appartements($nb);
    foreach ($tab as $tab_tmp)
    {
        echo '<div class="4u 12u(medium)">';
        echo '<section class="box feature">';
        echo ' <a  class="image featured"><img src="imagesAppartement/' . utf8_encode($tab_tmp["lienphoto"]) . '.jpg" alt="" /></a>';
        echo '<div class="inner">';
        echo ' <header>';
        echo '<h2>' . utf8_encode($tab_tmp["regionv"]) .' / '. utf8_encode($tab_tmp["nomv"]) . '</h2>';
        echo '<p>' . $tab_tmp['typeappart'] .' / ' . $tab_tmp["surface"] .'m²'  .'</p>';
        echo '<p>' . $tab_tmp['prix_base'].' Euros' . '</p>';
        echo '<button value = "appartement ref : ' . $tab_tmp["idappartement"] . '" class="but_contacter">Réserver</button>';
        echo ' </header>';
        echo '</div>';
        echo '</section>';
        echo '</div>';
    }
}

function fetch_appartements_accueil($nb){
    $cont = new Controleur();
    $tab = $cont->fetch_appartements($nb);
    foreach ($tab as $tab_tmp)
    {
        echo '<div class="4u 12u(medium)">';
        echo '<section class="box feature">';
        echo ' <a  class="image featured"><img src="imagesAppartement/' . utf8_encode($tab_tmp["lienphoto"]) . '.jpg" alt="" /></a>';
        echo '<div class="inner">';
        echo ' <header>';
        echo '<h2>' . utf8_encode($tab_tmp["regionv"]) .' / '. utf8_encode($tab_tmp["nomv"]) . '</h2>';
        echo '<p>' . $tab_tmp['typeappart'] .' / ' . $tab_tmp["surface"] .'m²'  .'</p>';
        echo '<p>' . $tab_tmp['prix_base'].' Euros' . '</p>';
        echo ' </header>';
        echo '</div>';
        echo '</section>';
        echo '</div>';
    }
}
function fetch_appartements_Research(){
    $cont = new Controleur();
    $tab = $cont->fetch_appartements_Research($_POST["Region"],$_POST["dateDebut"],$_POST["dateFin"], $_POST["prixMin"],$_POST["prixMax"],$_POST["nbPersonne"]);
    foreach ($tab as $tab_tmp)
    {
        echo '<div class="4u 12u(medium)">';
        echo '<section class="box feature">';
        echo ' <a  class="image featured"><img src="imagesAppartement/' . utf8_encode($tab_tmp["lienphoto"]) . '.jpg" alt="" /></a>';
        echo '<div class="inner">';
        echo ' <header>';
        echo '<h2>' . utf8_encode($tab_tmp["regionv"]) .' / '. utf8_encode($tab_tmp["nomv"]) . '</h2>';
        echo '<p>' . $tab_tmp['typeappart'] .' / ' . $tab_tmp["surface"] .'m²'  .'</p>';
        echo '<p>' . $tab_tmp['prix_base'].' Euros' . '</p>';
        echo '<button value = "appartement ref : ' . $tab_tmp["idappartement"] . '" class="but_contacter">Réserver</button>';
        echo ' </header>';
        echo '</div>';
        echo '</section>';
        echo '</div>';
    }
}
function fetch_Region_index(){
    $cont = new Controleur();
    $tab = $cont->fetch_Region();
    echo '<select name="Region" style="display: inline; background: white;" class="2u">';
    echo '<option value = "" disabled selected>Region</option>';
    foreach ($tab as $tab_tmp)
    {
        echo '<option value ="' .  utf8_encode($tab_tmp["NOMR"]) .  '" >' . utf8_encode($tab_tmp["NOMR"]) . '</option>';
    }

    echo '</select>';
}

function fetch_Equipement_index($nb){
    $cont = new Controleur();
    $tab = $cont->fetch_Equipement($nb);
    foreach ($tab as $tab_tmp)
    {
        echo '<div class="4u 12u(medium)">';
        echo '<section class="box feature">';
        echo ' <a  class="image featured"><img src="imagesMateriel/' . utf8_encode($tab_tmp["image"]) . '.jpg" alt="" /></a>';
        echo '<div class="inner">';
        echo ' <header>';
        echo '<h2>' . utf8_encode($tab_tmp["TYPEM"]) .'</h2>';
        echo '<p>' . utf8_encode($tab_tmp['ETAT']) .'</p>';
        echo '<p>' . utf8_encode($tab_tmp['PRIX']).' Euros' . '</p>';
        echo '<button value = "équipement ref : ' . $tab_tmp["IDMATERIEL"] . '" class="but_contacter">Réserver</button>';
        echo ' </header>';
        echo '</div>';
        echo '</section>';
        echo '</div>';
    }
}

function fetch_EquipementWithRecherche_index($donnee){
    $cont = new Controleur();
    $tab = $cont->fetch_EquipementWithRecherche($donnee);
    foreach ($tab as $tab_tmp)
    {
        echo '<div class="4u 12u(medium)">';
        echo '<section class="box feature">';
        echo ' <a  class="image featured"><img src="imagesMateriel/' . utf8_encode($tab_tmp["image"]) . '.jpg" alt="" /></a>';
        echo '<div class="inner">';
        echo ' <header>';
        echo '<h2>' . utf8_encode($tab_tmp["TYPEM"]) .'</h2>';
        echo '<p>' . utf8_encode($tab_tmp['ETAT']) .'</p>';
        echo '<p>' . utf8_encode($tab_tmp['PRIX']).' Euros' . '</p>';
        echo '<button value = "équipement ref : ' . $tab_tmp["IDMATERIEL"] . '" class="but_contacter">Réserver</button>';
        echo ' </header>';
        echo '</div>';
        echo '</section>';
        echo '</div>';
    }
}

function fetch_EquipementProp_index($idProp){
    $cont = new Controleur();
    $tab = $cont->fetch_EquipementProp($idProp);
    foreach ($tab as $tab_tmp)
    {
        echo '<div class="4u 12u(medium)">';
        echo '<section class="box feature">';
        echo ' <a  class="image featured"><img src="imagesMateriel/' . utf8_encode($tab_tmp["image"]) . '.jpg" alt="" /></a>';
        echo '<div class="inner">';
        echo ' <header>';
        echo '<h2>' . utf8_encode($tab_tmp["TYPEM"]) .'</h2>';
        echo '<p>' . utf8_encode($tab_tmp['ETAT']) .'</p>';
        echo '<p>' . utf8_encode($tab_tmp['PRIX']).' Euros' . '</p>';
        echo ' </header>';
        echo '</div>';
        echo '</section>';
        echo '</div>';
    }
}

function fetch_appartementsProp($id)
{
    $cont = new Controleur();
    $tab = $cont->fetch_appartementsProp($id);
    foreach ($tab as $tab_tmp)
    {
        echo '<div class="4u 12u(medium)">';
        echo '<section class="box feature">';
        echo ' <a  class="image featured"><img src="imagesAppartement/' . utf8_encode($tab_tmp["lienphoto"]) . '.jpg" alt="" /></a>';
        echo '<div class="inner">';
        echo ' <header>';
        echo '<h2>' . utf8_encode($tab_tmp["regionv"]) .' / '. utf8_encode($tab_tmp["nomv"]) . '</h2>';
        echo '<p>' . $tab_tmp['typeappart'] .' / ' . $tab_tmp["surface"] .'m²'  .'</p>';
        echo '<p>' . $tab_tmp['prix_base'].' Euros' . '</p>';
        echo ' </header>';
        echo '</div>';
        echo '</section>';
        echo '</div>';
    }
}
