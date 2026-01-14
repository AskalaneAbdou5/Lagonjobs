<?php
if (isset($_GET['prenom']) && isset($_GET['nom']) && isset($_GET['email']) && isset($_GET['password'])) {

    $Prenom=$_GET['prenom'];
    $Nom=$_GET['nom'];
    $Email=$_GET['email'];
    $Motdepasse=$_GET['password'];

    $sql = "INSERT INTO utilisateurs(Nom,Prenom,Email,Mot_de_passe,Id_role) VALUES('$Nom','$Prenom','$Email','$Motdepasse',2)"; 
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

}

?>