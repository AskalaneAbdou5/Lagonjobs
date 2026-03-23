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
JOIN types_de_contrat ctr ON of.Id_contrat=ctr.Id
WHERE of.Id_status = 1";

// Filtrage des offres

$params = []; //permet de stocker les données passées en post

    // Filtre avec le titre
    
if (isset($_POST['titre'])){
    $filtre_titre=$_POST['titre'];
    
    $sql.= " AND of.Titre LIKE :filtre_titre";

    $params['filtre_titre'] = "%".$filtre_titre."%"; //on stock la valeur en post dans params
}


    // Filtre avec le status

if (isset($_POST['status'])){
    $filtre_status=$_POST['status'];
    if ($filtre_status != ""){
        $sql.= " AND of.Id_status= :filtre_status";

        $params['filtre_status'] = $filtre_status;
    }
}

    // Filtre avec le type de contrat

if (isset($_POST['categorie'])){
    $filtre_contrat=$_POST['categorie'];
    if ($filtre_contrat != ""){
        $sql.= " AND of.Id_contrat= :filtre_contrat";

        $params['filtre_contrat'] = $filtre_contrat;
    }
}



$stmt = $pdo->prepare($sql);
$stmt->execute($params);
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

//Selection des roles

$sql = "SELECT * FROM `roles`";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$roles=$stmt->fetchall();



$sql = "SELECT 
ut.Id,
ut.Nom,
ut.Prenom,
ut.Email,
ut.Id_role,
rl.Nom_role
FROM utilisateurs ut
JOIN roles rl ON ut.Id_role=rl.Id
WHERE 1=1";

// Filtrage des utilisateurs

$params = []; //permet de stocker les données passées en post

    // Filtre avec le nom
    
if (isset($_POST['nom'])){
    $filtre_nom=$_POST['nom'];
    
    $sql.= " AND Nom LIKE :filtre_nom";

    $params['filtre_nom'] = "%".$filtre_nom."%"; //on stock la valeur en post dans params
}

    // Filtre avec le prenom

if (isset($_POST['prenom'])){
    $filtre_prenom=$_POST['prenom'];
    
    $sql.= " AND Prenom LIKE :filtre_prenom";

    $params['filtre_prenom'] = "%".$filtre_prenom."%"; //on stock la valeur en post dans params
}

    // Filtre avec l'email

if (isset($_POST['email'])){
    $filtre_email=$_POST['email'];
    
    $sql.= " AND Prenom LIKE :filtre_email";

    $params['filtre_email'] = "%".$filtre_email."%"; //on stock la valeur en post dans params
}

    // Filtre avec le role

if (isset($_POST['role_user'])){
    $filtre_role=$_POST['role_user'];

    $sql.= " AND ut.Id_role= :filtre_role";

    $params['filtre_role'] = $filtre_role;
}

//Selection des utilisateurs

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$utilisateurs=$stmt->fetchall();



?>