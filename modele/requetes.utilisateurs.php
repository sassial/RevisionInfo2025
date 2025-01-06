<?php

include 'modele/connexion.php';

function doesUserExist($db, $login) {
    $statement = $db->prepare("SELECT * FROM `utilisateur` WHERE `login` = ?");
    $statement->execute([$login]);
    $userExists = $statement->fetch();
    return $userExists ? true : false;
}

function addUser(PDO $db, array $utilisateur): bool {
    $query = 'INSERT INTO `utilisateur` (login, password) VALUES (:login, :password)';
    $statement = $db->prepare($query);
    $statement->bindParam(":login", $utilisateur['login'], PDO::PARAM_STR);
    $statement->bindParam(":password", $utilisateur['password'], PDO::PARAM_STR);
    return $statement->execute();
}

?>