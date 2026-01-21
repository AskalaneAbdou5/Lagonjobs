<?php
require_once(__DIR__ . '/select.php');



if (isset($_GET['email']) && isset($_GET['password'])){
    for ($i=0; $i < count($utilisateurs); $i++) { 
        if ($utilisateurs[$i]['Email'] === $_GET['email'] && $utilisateurs[$i]['Mot_de_passe'] ===  $_GET['password']){

            $_SESSION['LOG_USER']= $utilisateurs[$i]['Nom']." ".$utilisateurs[$i]['Prenom'];
            echo "<script>alert('Bienvenue".$_SESSION['LOG_USER']."');</script>";

        }else{
        echo "<script>
            alert('L\'identifiant ou le mot de passe est incorrect');
            window.location.href = 'connexion.php';
        </script>";
        }
    }
}

?>