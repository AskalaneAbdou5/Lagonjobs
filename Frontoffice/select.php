<?php 

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
JOIN status st ON of.Id_status=st.Id
JOIN types_de_contrat tdc ON of.Id_contrat=tdc.Id
JOIN villes vil ON of.Id_ville=vil.Id
JOIN modes_de_travail mdt ON of.Id_mode_de_travail=mdt.Id 
ORDER BY of.Id DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$offres=$stmt->fetchall();


?>