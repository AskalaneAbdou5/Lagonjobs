<?php
require_once('../asset/configmysql.php');


// RecupererLesOffres
$sql_rqt ='SELECT o.*, Id_contrat, Id_mode_de_travail, Id_ville From offres o 
INNER JOIN types_de_contrat ON offres.id_contrat =types_de_contrat.Id
INNER JOIN mode_de_travail on ';



$sql = $pdo->prepare($sql_rqt);
$sql->execute();
$RecupererLesOffres = $sql->fetchAll();

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


    <span class="logo"><a href="gestion_offre.html">Lagon</a>jobs</span>
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

        <?php
        if (empty($RecupererLesOffres)) {
          echo '<p>Desolé aucune offre disponible dans la base de donner pour le moment.</p>';
        } else {
          foreach ($RecupererLesOffres as $offre) {
        ?>
        
        <article class="card">
          <p><?= ($offre['Titre']); ?></p> 
                
          <h2><?= ($offre['Id_contrat']); ?></h2>
                
          <p><?= ($offre['Id_mode_de_travail']); ?></p>
                
          <p><?= ($offre['Description']); ?></p>

          <p><?= ($offre['Id_ville']); ?></p>

          <p><?= ($offre['Date_debut']); ?></p>

          <p><?= ($offre['Date_fin']); ?></p>

          <form action="details_offres.php" method="get">
              <input type="hidden" name="id_offre" value="0">
              <button type="submit" class="btn btn-outline">Voir</button>
          </form>
                
        </article>

        <?php 
          }
        } 
        ?>

      </section>
    </div>

  </main>
  

  <footer class="site-footer footer-inner">
    <p class="container">© 2025 Lagonjobs- Touts droits réservés</p>
    <a href="contact.php">Confidentialité Nous contacter.</a>
  </footer>
    
</body>
</html>