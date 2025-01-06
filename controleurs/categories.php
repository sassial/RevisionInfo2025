<?php
include('modele/requetes.categories.php');

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
        $title = "Liste des categories";
        $entete = "Voici la liste :";
        $table = "categorie";
        
        $liste = recupereTousCategories($db);
        
        if(empty($liste)) {
            $alerte = "Aucune categorie pour le moment";
        }
        
        break;
    
    case 'listederoulante':
        $vue = "listederoulante";
        $title = "Liste deroulante des categories";
        $entete = "Voici la liste :";
        $table = "categorie";
        
        $liste = recupereTousCategories($db);
        
        if(empty($liste)) {
            $alerte = "Aucune categorie pour le moment";
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
