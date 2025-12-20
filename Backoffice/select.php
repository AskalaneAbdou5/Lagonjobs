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


?>