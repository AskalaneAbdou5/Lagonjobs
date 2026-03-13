<?php
if (isset($_GET['prenom']) && isset($_GET['nom']) && isset($_GET['email']) && isset($_GET['password']) && isset($_GET['re_password'])) {

    $Prenom=$_GET['prenom'];
    $Nom=$_GET['nom'];
    $Email=$_GET['email'];
    $Motdepasse=$_GET['password'];
    $Remotdepasse=$_GET['re_password'];

    if ($Motdepasse === $Remotdepasse) {
        $sql = "INSERT INTO utilisateurs(Nom,Prenom,Email,Mot_de_passe,Id_role) VALUES('$Nom','$Prenom','$Email','$Motdepasse',2)"; 
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    }else {
        echo "<script>
            alert('Les mots de passe ne sont pas identique');
            window.location.href = 'Inscription.php';
        </script>";
    }
    
}

?>