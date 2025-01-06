<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include("controleurs/functions.php");
include("vues/functions.php");

if(isset($_GET['cible']) && !empty($_GET['cible'])) {
    $url = $_GET['cible'];
} else {
    $url = 'utilisateurs';
}

include('controleurs/' . $url . '.php');
