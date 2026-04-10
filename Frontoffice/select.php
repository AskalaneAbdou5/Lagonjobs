<?php 
//Selection des offres

$sql = "SELECT of.Id,
of.Titre,
tdc.Contrat,
vil.Nom_ville,
mdt.Mode_de_travail,
of.Description,
of.Mission,
of.Profil,
of.Date_debut,
of.Date_fin,
TIMESTAMPDIFF(DAY, of.Date_debut, of.Date_fin) as nb_jours
FROM offres of
JOIN statuts st ON of.Id_statut=st.Id
JOIN types_de_contrat tdc ON of.Id_contrat=tdc.Id
JOIN villes vil ON of.Id_ville=vil.Id
JOIN modes_de_travail mdt ON of.Id_mode_de_travail=mdt.Id 
WHERE of.Id_statut = 1
";

// Filtrage des données 

$params = []; //permet de stocker les données passées en post

    //MOT CLÉ


if (isset($_POST['motcle'])){
    $motcle=$_POST['motcle'];
    
    $sql.= " AND of.Titre LIKE :motcle";

    $params['motcle'] = "%".$motcle."%"; //on stock la valeur en post dans params
}

    //CONTRATs

if (isset($_POST['type_de_contrat'])){
    $contrat=$_POST['type_de_contrat'];
    if ($contrat != ""){
        $sql.= " AND of.Id_contrat= :contrat";

        $params['contrat'] = $contrat;
    }
}

    //VILLEs

if (isset($_POST['ville'])){
    $ville=$_POST['ville'];
    if ($ville != ""){
        $sql.= " AND of.Id_ville= :ville";

        $params['ville'] = $ville;
    }
}

    //MODE DE TRAVAIL

if (isset($_POST['mode_de_travail'])){
    $mdt=$_POST['mode_de_travail'];
    if ($mdt != ""){
        $sql.= " AND of.Id_mode_de_travail= :mdt";

        $params['mdt'] = $mdt;
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

$nbDePages = intdiv($nbOffres, 8);

if (($nbOffres%8)!= 0){
    $nbDePages+=1;
}

$debut = ($page_actuel * 8) - 8;

$sql.=" ORDER BY of.Id LIMIT ".$debut.",8";


//Selection des offres

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$offres=$stmt->fetchall();



//Selection des utilisateurs

$sql = "SELECT * FROM `utilisateurs`";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$utilisateurs=$stmt->fetchall();

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


?>