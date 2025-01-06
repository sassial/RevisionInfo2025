<?php

include 'modele/connexion.php';
include 'modele/requetes.generiques.php';

function recupereTousCategories(PDO $db): array {
    $query = 'SELECT * FROM categorie';
    return $db->query($query)->fetchAll();
}

?>