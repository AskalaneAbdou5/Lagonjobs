<?php 

// MODIFIER UN OFFRE

if(isset($_POST['updated_id_offre']) && 
isset($_POST['updated_titre']) && 
isset($_POST['updated_descript']) && 
isset($_POST['updated_id_status']) &&
isset($_POST['updated_id_contrat'])){

    $id_offre=$_POST['updated_id_offre'];
    $titre=$_POST['updated_titre'];
    $description=$_POST['updated_descript'];
    $status=$_POST['updated_id_status'];
    $contrat=$_POST['updated_id_contrat'];

    $sql = "UPDATE offres SET Titre=:titre, Description=:descript, Id_status=:id_status, Id_contrat=:id_contrat WHERE Id=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'id'=>$id_offre,
        'titre'=>$titre,
        'id_status'=>$status,
        'id_contrat'=>$contrat,
        'descript'=>$description
    ]);
}

//MODIFIER UN UTILISATEUR


if(isset($_POST['updated_id_user']) && 
isset($_POST['updated_nom']) && 
isset($_POST['updated_prenom']) && 
isset($_POST['updated_email']) && 
isset($_POST['updated_role_user'])){

    $id_user=$_POST['updated_id_user'];
    $nom=$_POST['updated_nom'];
    $prenom=$_POST['updated_prenom'];
    $email=$_POST['updated_email'];
    $id_role=$_POST['updated_role_user'];

    $sql = "UPDATE utilisateurs SET Nom=:nom, Prenom=:prenom, Email=:email, Id_role=:id_role  WHERE Id=:id_user";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'id_user'=>$id_user,
        'nom'=>$nom,
        'prenom'=>$prenom,
        'email'=>$email,
        'id_role' => $id_role
    ]);
}