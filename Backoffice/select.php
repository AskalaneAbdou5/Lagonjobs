<?php
//Selection des offres

$sql = "SELECT of.Id,
of.Titre,
of.Id_statut,
of.Id_contrat,
of.Description,
ctr.Contrat,
st.Statut FROM offres of
JOIN statuts st ON of.Id_statut=st.Id
JOIN types_de_contrat ctr ON of.Id_contrat=ctr.Id
WHERE of.Id_statut = 1";

// Filtrage des offres

$params = []; //permet de stocker les données passées en post

    // Filtre avec le titre
    
if (isset($_POST['titre'])){
    $filtre_titre=$_POST['titre'];
    
    $sql.= " AND of.Titre LIKE :filtre_titre";

    $params['filtre_titre'] = "%".$filtre_titre."%"; //on stock la valeur en post dans params
}


    // Filtre avec le statut

if (isset($_POST['statut'])){
    $filtre_statut=$_POST['statut'];
    if ($filtre_statut != ""){
        $sql.= " AND of.Id_statut= :filtre_statut";

        $params['filtre_statut'] = $filtre_statut;
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


$page_actuel=1; //la page actuel
$debut=0;

//Mis à jour de la page actuelle après avoir être revenu à la page precedent

if(isset($_GET['id_page_precedent'])){
    $page_actuel=intval($_GET['id_page_precedent']);
}

//Mis à jour de la page actuelle après avoir appuyer les numeros de pages

if (isset($_GET['page'])) {
    $page_actuel = $_GET['page'];
}


//Mis à jour de la page actuelle après être allé à la page suivante

if(isset($_GET['id_page_suivant'])){
    $page_actuel=intval($_GET['id_page_suivant']);
}

// recupere le nombre d'offre

$sl = "SELECT COUNT(Id) FROM `offres`";
$stmt = $pdo->prepare($sl);
$stmt->execute();
$nbOffres=$stmt->fetchColumn();

$nbDePages = intdiv( $nbOffres, 5);

if (($nbOffres%5)!= 0){
    $nbDePages+=1;
}

$debut = ($page_actuel * 5) - 5;

$sql.=" LIMIT ".$debut.",5";


$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$offres=$stmt->fetchall();

//Selection des statut

$sql = "SELECT * FROM `statuts`";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$statut=$stmt->fetchall();

//Selection des messages

$sql = "SELECT * FROM `messages`";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$messages=$stmt->fetchall();


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