<?php
session_start();
require_once('../asset/configmysql.php');
require_once(__DIR__ . '/select.php');
require_once('../Frontoffice/session.php');


if (isset($_POST['id_delete_offre'])
&& isset($_POST['titre_delete_offre'])
&& isset($_POST['contrat_delete_offre'])
&& isset($_POST['descript_delete_offre'])
) {
    $id_offre=$_POST['id_delete_offre'];
    $titre=$_POST['titre_delete_offre'];
    $contrat=$_POST['contrat_delete_offre'];
    $descrip=$_POST['descript_delete_offre'];
}else{
    header("Location: gestion_offre.php");
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>details</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/png" href="../logo/Logo2.png" />
</head>
<body>


    <main class="container">
        <br>
        <br>
        <article class="card">
            <p class="badge"><?php echo $contrat ?></p>
            <h1><?php echo $titre ?></h1>

            <p><b>Description:</b> <?php echo $descrip ?></p>

            <b>Voulez vous vraiment supprimer cette offre ?</b> <br><br>

            <form action="gestion_offre.php" method="post">
                <input type="hidden" name="delete_offre" value="<?php echo $id_offre ?>">
                <button type="submit" class="btn_delete">Supprimer</button>
                <button type="button" class="btn btn-outline" onclick="window.location.href='gestion_offre.php'" >Annuler</button>
            </form>


        </article>

    </main>



    <footer class="site-footer footer-inner">
    <p class="container">© 2025 Lagonjobs- Touts droits réservés</p>
    <a href="contact.php">Confidentialité Nous contacter.</a>
  </footer>
    
</body>
</html>