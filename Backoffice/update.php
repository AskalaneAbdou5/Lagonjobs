<?php 

if(isset($_POST['updated_id']) && 
isset($_POST['updated_titre']) && 
isset($_POST['updated_descript']) && 
isset($_POST['updated_id_status']) &&
isset($_POST['updated_id_contrat'])){

    $id_offre=$_POST['updated_id'];
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