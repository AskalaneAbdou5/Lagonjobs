<?php

if (isset($_GET['delete_offre'])){

    $id_offre=$_GET['delete_offre'];

    $sql = "DELETE FROM offres WHERE Id=:id_offre";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'id_offre'=>$id_offre
    ]);

}
?>