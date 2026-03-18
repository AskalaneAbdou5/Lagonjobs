<?php
require_once(__DIR__ . '/select.php');



if (isset($_POST['log_email']) && isset($_POST['log_password'])){
    for ($i=0; $i < count($utilisateurs); $i++) { 
        if ($utilisateurs[$i]['Email'] == $_POST['log_email'] && password_verify($_POST['log_password'], $utilisateurs[$i]['Mot_de_passe'])){

            if($utilisateurs[$i]['Id_role'] == 2){
                $_SESSION['LOG_ADMIN']= $utilisateurs[$i]['Nom']." ".$utilisateurs[$i]['Prenom'];

                echo "<script>alert('Bienvenue ".$_SESSION['LOG_ADMIN']."');window.location.href = '../Backoffice/gestion_offre.php';</script>";
            }else{
                $_SESSION['LOG_USER']= $utilisateurs[$i]['Nom']." ".$utilisateurs[$i]['Prenom'];

                echo "<script>alert('Bienvenue ".$_SESSION['LOG_USER']."');window.location.href = 'index.php';</script>";
            }
        }
    }
    echo "<script>
        alert('L\'identifiant ou le mot de passe est incorrect');
        window.location.href = 'connexion.php';
    </script>";
}

?>