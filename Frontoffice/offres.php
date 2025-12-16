<?php
require_once(dirname(dirname(__FILE__)) . '/Frontoffice/bdd_service_frontoffice.php');
$lesOffres = RecupererLesOffres();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offres</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>


  <!--en-tête-->
  <header class="site-header header-inner">


    <h1><a href="index.php">Lagon</a>jobs</h1>
    <nav class="nav">
        <a href="index.php">Accueil</a>
        <a href="offres.php">Offres</a>
        <a href="contact.php">Contact</a>
        <a href="connexion.php" class="btn btn-outline">Connexion</a>
        <a href="inscription.php" class="btn btn-outline">Inscription</a>
    </nav>

  </header>



  <main class="hero">
    <div class="container">
      <h1>Offres d'emploi & stages</h1>

      <!--Formilaire de filtrage-->
        <form action="offres.php" method="POST" class="form cards search-inline">
            <input type="text" name="motcle" placeholder="Mot-clé">
            
            <select name="type_de_contrat" >
              <option value="0">Stage</option>
              <option value="1">CDD</option>
              <option value="2">CDI</option>
            </select>

            <select name="ville" >
              <option value="0">Mamoudzou</option>
              <option value="1">Dzaoudzi</option>
              <option value="2">Koungou</option>
            </select>

            <select name="Télétravail" >
              <option value="0">Hybride</option>
              <option value="1">Sur site</option>
            </select>

            <button type="submit" class="btn">Filtrer</button>
            <input class="btn-outline" type="submit" value="Réinitialiser">
        </form> <br>

      <hr>
      <br>

      <!--Offres d'emploi et stages-->
      <section class="cards">
        <article class="card">
          <p>Stage</p>
          <h2>Stagiaire Dévelopeur Web</h2>
          <p>Mamoudzou-Hybride</p>
          <p>Participer au développement des sites vitrine et e-commerce.</p>
          <a href="details_offres.php" class="btn btn-outline">Dêtail</a>
        </article>

        <article class="card">
          <p>CDD</p>
          <h2>Technicien support</h2>
          <p>Dzaoudzi - Sur site</p>
          <p>Assistance utilisateur, resolution d'incidents et maintenance.</p>
          <a href="details_offres.php" class="btn btn-outline">Dêtail</a>
        </article>

        <article class="card">
          <p>CDD</p>
          <h2>Admin systémes junior</h2>
          <p>Koungou - Hybride</p>
          <p>Administration Linux/Windows, sauvegardes et supervision.</p>
          <a href="details_offres.php" class="btn btn-outline">Dêtail</a>
        </article>
      </section>
    </div>

  </main>


  <footer class="site-footer footer-inner">
    <p class="container">© 2025 Lagonjobs- Touts droits réservés</p>
    <a href="contact.php">Confidentialité Nous contacter.</a>
  </footer>
    
</body>
</html>