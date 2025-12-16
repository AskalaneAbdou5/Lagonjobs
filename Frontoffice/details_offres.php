<?php
require_once(dirname(dirname(__FILE__)) . '/Frontoffice/bdd_service_frontoffice.php');
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>details</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header class="site-header header-inner">


    <h1><a href="index.php">Lagon</a>jobs</h1>
    <nav class="nav">
        <a href="index.php">Accueil</a>
        <a href="offres.php">Offres</a>
        <a href="contact.php">Contact</a>
        <button class="btn btn-outline"><a href="connexion.php">Connexion</a></button>
        <button class="btn btn-outline"><a href="inscription.php">Inscription</a></button>
    </nav>

  </header>


    <main class="container">

        <a href="offres.php">Retour aux offres</a>

        <br>
        <br>

        <article class="card">
            <p>Stage</p>
            <h1>Stagiaire Dévelopeur Web</h1>

            <p>Mamoudzou - Hybride - 3 à 6 mois</p>

            <p><b>Mission:</b> intégrer des masquettes,corriger les bugs, Participer aux revues de 
                code (niveau débutant).
            </p>

            <P><b>Profil :</b> motivation, bases HTML/CSS/JS,notions de PHP bienvenues.</P>
            <button class="btn"><a href="">Postuler</a></button>
            <button class="btn btn-outline"><a href="offres.php">Voir d'autres offres</a></button>

        </article>

    </main>



    <footer class="site-footer footer-inner">
    <p class="container">© 2025 Lagonjobs- Touts droits réservés</p>
    <a href="contact.php">Confidentialité Nous contacter.</a>
  </footer>
    
</body>
</html>