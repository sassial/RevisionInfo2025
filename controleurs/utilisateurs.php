<?php
include('modele/requetes.utilisateurs.php');

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
        
        
    case 'inscription':
        $vue = "inscription";
        $title = "Inscription";
        $alerte = false;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $login = $_POST["login"];
            $password = $_POST["password"];
            $passwordRepeat = $_POST["password-repeat"];
          
            if (empty($login)) {
              $alerte = "Login is required";
            } else {
              $login = test_input($login);
              if (strlen($login) < 8) {
                $alerte = "Login must be at least 8 characters long.";
              }
              if (doesUserExist($db, $login)) {
                $alerte = "This user already exists";
              }
            }
          
            if (empty($password)) {
              $alerte = "Password is required";
            } else {
              $password = test_input($password);
            }
          
            if (empty($passwordRepeat)) {
              $alerte = "Password (repeat) is required";
            } else {
              $passwordRepeat = test_input($passwordRepeat);
              if ($password !== $passwordRepeat) {
                $alerte = "Passwords do not match";
              }
            }
          
            if (!$alerte) {
              $password = password_hash($password, PASSWORD_BCRYPT);
              $utilisateur = [
                'login' => $login,
                'password' => $password,
              ];
              if (addUser($db, $utilisateur)) {
                $alerte = "Registration successful";
              } else {
                $alerte = "Registration failed";
              }
            }
          
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
