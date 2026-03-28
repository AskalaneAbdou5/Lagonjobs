<?php 
// Requete SQL pour ajouter des offres

if(isset($_GET['titre']) && 
isset($_GET['statut']) && 
isset($_GET['categorie']) && 
isset($_GET['description']) &&
isset($_GET['mission']) &&
isset($_GET['profil']) &&
isset($_GET['ville']) &&
isset($_GET['mode_de_travail']) &&
isset($_GET['date_debut']) &&
isset($_GET['date_fin'])){

    $titre=trim($_GET['titre']);
    $statut=$_GET['statut'];
    $contrat=$_GET['categorie'];
    $description=trim($_GET['description']);
    $mission=trim($_GET['mission']);
    $profil=trim($_GET['profil']);
    $ville=$_GET['ville'];
    $mdt=$_GET['mode_de_travail'];
    $date_debut=trim($_GET['date_debut']);
    $date_fin=trim($_GET['date_fin']);

    if(!empty($titre) && 
    !empty($description) && 
    !empty($mission) && 
    !empty($profil) &&
    !empty($date_debut) &&
    !empty($date_fin)){

        $sql = "INSERT INTO offres(Titre,Id_statut,Id_contrat,Description,Mission,Profil,Id_ville,Id_mode_de_travail,Date_debut,Date_fin)
        VALUES (:titre,:id_statut,:id_contrat,:descrip,:mission,:profil,:id_ville,:id_mdt,:date_debut,:date_fin)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'titre'=>$titre,
            'id_statut'=>$statut,
            'id_contrat'=>$contrat,
            'descrip'=>$description,
            'mission'=>$mission,
            'profil'=>$profil,
            'id_ville'=>$ville,
            'id_mdt'=>$mdt,
            'date_debut'=>$date_debut,
            'date_fin'=>$date_fin
        ]);
    }else{
        echo "<script> alert('Veuillez remplir tous les champs');
        window.location.href = 'offres.php';</script>";
    }
}





// Requete SQL pour ajouter des utilisateurs

if (isset($_POST['insert_prenom']) && isset($_POST['insert_nom']) && isset($_POST['insert_email']) && isset($_POST['insert_password']) && isset($_POST['insert_role_user'])) {

    $Prenom=trim($_POST['insert_prenom']);
    $Nom=trim($_POST['insert_nom']);
    $Email=trim($_POST['insert_email']);
    $Motdepasse=trim($_POST['insert_password']);
    $role_user=trim($_POST['insert_role_user']);

    //hash le mot de passe

    $motdepasse_hash=password_hash($Motdepasse, PASSWORD_DEFAULT);

    //verifie si les variables sont vides

    if (!empty($Prenom) && !empty($Nom) && !empty($Email) && !empty($Motdepasse) && !empty($role_user)) {

        $sql = "INSERT INTO utilisateurs(Nom,Prenom,Email,Mot_de_passe,Id_role) VALUES(:nom, :prenom, :email, :mdp ,:id_role)"; 
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'nom' => $Nom,
            'prenom' => $Prenom,
            'email' => $Email,
            'mdp' => $motdepasse_hash,
            'id_role' => $role_user
        ]);
    }else{
        echo "<script> alert('Veuillez remplir tous les champs');</script>";
    }

}

?>