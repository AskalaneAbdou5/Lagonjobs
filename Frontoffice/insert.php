<?php
if (isset($_POST['insert_prenom']) && isset($_POST['insert_nom']) && isset($_POST['insert_email']) && isset($_POST['insert_password']) && isset($_POST['re_password'])) {

    $Prenom=$_POST['insert_prenom'];
    $Nom=$_POST['insert_nom'];
    $Email=$_POST['insert_email'];
    $Motdepasse=$_POST['insert_password'];
    $Remotdepasse=$_POST['re_password'];

    //Ajout d'un utilisateur si les mots de passes sont identique

    if ($Motdepasse === $Remotdepasse) {

        $sql = "INSERT INTO utilisateurs(Nom,Prenom,Email,Mot_de_passe,Id_role) VALUES(:nom, :prenom, :email, :mdp ,1)"; 
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