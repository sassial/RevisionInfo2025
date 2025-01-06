<?php
include 'modele/connexion.php';

function recupereTousColonnes(PDO $db, string $table): array {
    $query = 'DESCRIBE ' . $table;
    $statement = $db->query($query);
    return $statement->fetchAll(PDO::FETCH_COLUMN);
}
?>