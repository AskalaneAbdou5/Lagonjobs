<?php

if (isset($_POST['delete_offre'])){

    $id_offre=$_POST['delete_offre'];

    $sql = "DELETE FROM offres WHERE Id=:id_offre";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'id_offre'=>$id_offre
    ]);

}

if (isset($_POST['delete_user'])){

    $id_user=$_POST['delete_user'];

    $sql = "DELETE FROM utilisateurs WHERE Id=:id_user";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'id_user'=>$id_user
    ]);

}
?>