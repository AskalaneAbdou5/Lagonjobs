<?php


function calcul_periode_de_contrat ($nb_jours){

    $mois=intdiv($nb_jours,30);
    $jours=$nb_jours%30;
    return $mois." mois et ".$jours." jours";

}

function virifie_email_dans_la_base($email, $table_utilisateurs){

    for ($i=0; $i < count($table_utilisateurs); $i++) { 
        if ($table_utilisateurs[$i]['Email'] == $email) {
            return true;
        }else{
            return false;
        }
    }
}

?>