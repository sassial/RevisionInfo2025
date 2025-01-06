<?php

include 'modele/connexion.php';
include 'modele/requetes.generiques.php';

function recupereTousAnnonces(PDO $db): array {
    $query = 'SELECT * FROM annonce';
    return $db->query($query)->fetchAll();
}

function recupereAnnoncesParCategorie(PDO $db, string $categorie): array {
    $query = 'SELECT annonce.*, categorie.nom FROM annonce
    INNER JOIN classement ON classement.idAnnonce = annonce.id
    INNER JOIN categorie ON categorie.id = classement.idCategorie
    WHERE LOWER(categorie.nom) = LOWER(:categorie)';
    $statement = $db->prepare($query);
    $statement->execute([':categorie' => $categorie]);
    $result = $statement->fetchAll();
    return $result;
}

?>