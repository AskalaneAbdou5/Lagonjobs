<?php

function connexionBdd()
{
    try {
        // On se connecte à MySQL
        $mysqlClient = new PDO('mysql:host=localhost;dbname=lagonjobs;charset=utf8', 'root', '');
        echo "Connexion réussie";
        return $mysqlClient;
    } catch (Exception $e) {
        // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : ' . $e->getMessage());
    }
}





function RecupererLesOffres()
{
    $mysqlClient = connexionBdd();
    $sql_rqt = 'SELECT * FROM offres';
    $sql = $mysqlClient->prepare($sql_rqt);
    $sql->execute();
    $sql_resultat = $sql->fetchAll();

    return $sql_resultat;
}