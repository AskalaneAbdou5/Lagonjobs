<?php


function calcul_periode_de_contrat ($nb_jours){

    $mois=intdiv($nb_jours,30);
    $jours=$nb_jours%30;
    return $mois." mois et ".$jours." jours environ";

}

?>