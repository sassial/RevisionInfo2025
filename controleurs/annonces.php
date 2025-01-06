<?php
include('modele/requetes.annonces.php');

if (!isset($_GET['function']) || empty($_GET['function'])) {
    $function = "accueil";
} else {
    $function = $_GET['function'];
}

switch ($function) {
    
    case 'accueil':
        $vue = "accueil";
        $title = "Accueil";
        break;
        
    case 'liste':
        $vue = "liste";
        $title = "Liste des annonces";
        $entete = "Voici la liste :";
        $table = "annonce";
        
        $liste = recupereTousAnnonces($db);
        
        if(empty($liste)) {
            $alerte = "Aucune annonce pour le moment";
        }
        
        break;
    
    case 'listecategorie':
        $vue = "liste";
        $title = "Liste des annonces";
        $entete = "Voici la liste :";
        $table = "annonce";
        if (!isset($_GET['categorie']) || empty($_GET['categorie'])) {
            $categorie = "Sport";
        } else {
            $categorie = $_GET['categorie'];
        }
        
        $liste = recupereAnnoncesParCategorie($db, $categorie);
        echo empty($liste);

        
        if(empty($liste)) {
            $alerte = "Aucune annonce pour le moment";
        }
        
        break;
        
    default:
        $vue = "erreur404";
        $title = "error404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}

include ('vues/header.php');
include ('vues/' . $vue . '.php');
include ('vues/footer.php');
