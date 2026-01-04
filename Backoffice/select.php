<?php
//Selection des offres

$sql = "SELECT of.Id,
of.Titre,
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


//Selection des modes de travail

$sql = "SELECT * FROM `utilisateurs`";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$utilisateurs=$stmt->fetchall();



?>