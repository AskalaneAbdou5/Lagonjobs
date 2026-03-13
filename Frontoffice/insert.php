<?php
if (isset($_GET['insert_prenom']) && isset($_GET['insert_nom']) && isset($_GET['insert_email']) && isset($_GET['insert_password']) && isset($_GET['re_password'])) {

    $Prenom=$_GET['insert_prenom'];
    $Nom=$_GET['insert_nom'];
    $Email=$_GET['insert_email'];
    $Motdepasse=$_GET['insert_password'];
    $Remotdepasse=$_GET['re_password'];

    //Ajout d'un utilisateur si les mots de passes sont identique

    if ($Motdepasse === $Remotdepasse) {

        $sql = "INSERT INTO utilisateurs(Nom,Prenom,Email,Mot_de_passe,Id_role) VALUES(:nom, :prenom, :email, :mdp ,2)"; 
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'nom' => $Nom,
            'prenom' => $Prenom,
            'email' => $Email,
            'mdp' => $Motdepasse
        ]);

        echo "<script> alert('Votre compte a été bien créé');</script>";
    }else {
        echo "<script>
            alert('Les mots de passe ne sont pas identique');
            window.location.href = 'Inscription.php';
        </script>";
    }
    
}

?>