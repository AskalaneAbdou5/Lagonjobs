<?php
session_start();
require_once('../asset/configmysql.php');
require_once(__DIR__ . '/session.php');
require_once(__DIR__ . '/select.php');
require_once(__DIR__ . '/fonction.php');

if (isset($_GET['id_offre'])){
    $id_offre=$_GET['id_offre'];
    $contrat=$offres[$id_offre]['Contrat'];
    $titre=$offres[$id_offre]['Titre'];
    $ville=$offres[$id_offre]['Nom_ville'];
    $mode_de_travail=$offres[$id_offre]['Mode_de_travail'];
    $nb_jours=$offres[$id_offre]['nb_jours'];
    $mission=$offres[$id_offre]['Mission'];
    $profil=$offres[$id_offre]['Profil'];
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>details</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/png" href="../logo/Logo.png" />
</head>
<body>

    <header class="site-header header-inner">

    <span class="logo"><a href="index.html"><img src="../logo/Logo.png" alt="logo lagonjobs"></span>
    <nav class="nav">
        <a href="index.php">Accueil</a>
        <a href="offres.php">Offres</a>
        <a href="contact.php">Contact</a>
        <?php
        if(!isset($_SESSION['LOG_USER'])){
        ?>
            <button class="btn btn-outline" onclick="window.location.href='connexion.php'">Connexion</button>
            <button class="btn" onclick="window.location.href='inscription.php'">Inscription</button>
        <?php }else{ ?>

            <button class="btn" onclick="window.location.href='deconnexion.php'">Deconnexion</button>

        <?php } ?>
    </nav>

  </header>


    <main class="container">
        <br>
        <br>
        <article class="card">
            <a href="offres.php">←Retour aux offres</a><br>
            <p class="badge"><?php echo $contrat ?></p>
            <h1><?php echo $titre ?></h1>

            <p><?php echo $ville." - ".$mode_de_travail." - ".calcul_periode_de_contrat($nb_jours) ?></p>

            <p><b>Mission:</b> <?php echo $mission ?></p>

            <P><b>Profil :</b> <?php echo $profil ?></P>

            <?php if (isset($_SESSION['LOG_USER'])){ ?>



                <button class="btn" type="submit">Postuler</button>
                
                <?php }else{ ?>
                        <button class="btn" onclick="window.location.href='connexion.php'">Postuler</button>
                <?php } ?>

                <button class="btn btn-outline" onclick="window.location.href='offres.php'">Voir d'autres offres</button>

        </article>

    </main>



    <footer class="site-footer footer-inner">
    <p class="container">© 2025 Lagonjobs- Touts droits réservés</p>
    <a href="contact.php">Confidentialité Nous contacter.</a>
  </footer>
    
</body>
</html>