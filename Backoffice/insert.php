<?php 

if(isset($_GET['titre']) && 
isset($_GET['status']) && 
isset($_GET['categorie']) && 
isset($_GET['description']) &&
isset($_GET['mission']) &&
isset($_GET['profil']) &&
isset($_GET['ville']) &&
isset($_GET['mode_de_travail']) &&
isset($_GET['date_debut']) &&
isset($_GET['date_fin'])){

    $titre=$_GET['titre'];
    $status=$_GET['status'];
    $contrat=$_GET['categorie'];
    $description=$_GET['description'];
    $mission=$_GET['mission'];
    $profil=$_GET['profil'];
    $ville=$_GET['ville'];
    $mdt=$_GET['mode_de_travail'];
    $date_debut=$_GET['date_debut'];
    $date_fin=$_GET['date_fin'];


    $sql = "INSERT INTO offres(Titre,Id_status,Id_contrat,Description,Mission,Profil,Id_ville,Id_mode_de_travail,Date_debut,Date_fin)
    VALUES (:titre,:id_status,:id_contrat,:descrip,:mission,:profil,:id_ville,:id_mdt,:date_debut,:date_fin)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'titre'=>$titre,
        'id_status'=>$status,
        'id_contrat'=>$contrat,
        'descrip'=>$description,
        'mission'=>$mission,
        'profil'=>$profil,
        'id_ville'=>$ville,
        'id_mdt'=>$mdt,
        'date_debut'=>$date_debut,
        'date_fin'=>$date_fin
    ]);
}