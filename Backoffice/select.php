<?php
//Selection des offres

$sql = "SELECT of.Id,
of.Titre,
of.Id_status,
of.Id_contrat,
of.Description,
ctr.Contrat,
st.Status FROM offres of
JOIN status st ON of.Id_status=st.Id
JOIN types_de_contrat ctr ON of.Id_contrat=ctr.Id";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$offres=$stmt->fetchall();

//Selection des status

$sql = "SELECT * FROM `status`";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$status=$stmt->fetchall();


//Selection des categories

$sql = "SELECT * FROM `types_de_contrat`";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$categories=$stmt->fetchall();

//Selection des villes

$sql = "SELECT * FROM `villes`";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$villes=$stmt->fetchall();

//Selection des modes de travail

$sql = "SELECT * FROM `modes_de_travail`";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$mode_travail=$stmt->fetchall();


//Selection des utilisateurs

$sql = "SELECT * FROM `utilisateurs` WHERE 1=1";

// Filtrage des utilisateurs

$params = []; //permet de stocker les données passées en post

    // Filtre pour les nom
    
if (isset($_POST['nom'])){
    $filtre_nom=$_POST['nom'];
    
    $sql.= " AND Nom LIKE :filtre_nom";

    $params['filtre_nom'] = "%".$filtre_nom."%"; //on stock la valeur en post dans params
}

    // Filtre pour les prenom

if (isset($_POST['prenom'])){
    $filtre_prenom=$_POST['prenom'];
    
    $sql.= " AND Prenom LIKE :filtre_prenom";

    $params['filtre_prenom'] = "%".$filtre_prenom."%"; //on stock la valeur en post dans params
}

    // Filtre pour les emails

if (isset($_POST['email'])){
    $filtre_email=$_POST['email'];
    
    $sql.= " AND Prenom LIKE :filtre_email";

    $params['filtre_email'] = "%".$filtre_email."%"; //on stock la valeur en post dans params
}

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$utilisateurs=$stmt->fetchall();



?>