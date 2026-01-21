<?php
session_start();
require_once('../asset/configmysql.php');
require_once(__DIR__ . '/session.php');
require_once(__DIR__ . '/select.php');

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



  <main class="hero">
    <div class="container">
      <h1>Offres d'emploi & stages</h1>

      <!--Formilaire de filtrage-->
        <form action="offres.php" method="POST" class="form filter-bar">
            <input type="text" name="motcle" placeholder="Mot-clé">
            
            <select name="type_de_contrat" >
                <option>Type de contrat</option>
                <?php for ($i=0; $i < count($categories); $i++) { 
                echo "<option value=".$categories[$i]['Id'].">".$categories[$i]['Contrat']."</option>";
                }?>
            </select>

            <select name="villes" >
                <option>Ville</option>
                <?php for ($i=0; $i < count($villes); $i++) { 
                echo "<option value=".$villes[$i]['Id'].">".$villes[$i]['Nom_ville']."</option>";
                }?>
            </select>

            <select name="mode_de_travail" >
                <?php for ($i=0; $i < count($mode_travail); $i++) { 
                echo "<option value=".$mode_travail[$i]['Id'].">".$mode_travail[$i]['Mode_de_travail']."</option>";
                }?>
            </select>

            <button type="submit" class="btn">Filtrer</button>
            <input class="btn-outline" type="submit" value="Réinitialiser">
        </form> <br>

      <hr>
      <br>



      <!--Offres d'emploi et stages-->
      <section class="cards">

        <?php
        for ($i=0; $i < count($offres); $i++) {
        ?>
        
        <article class="card">
          <p class="badge"><?php echo $offres[$i]['Contrat']; ?></p> 
                  
          <h2><?php echo $offres[$i]['Titre']; ?></h2>
                  
          <p><?php echo $offres[$i]['Mode_de_travail']; ?></p>
                  
          <p><?php echo $offres[$i]['Description']; ?></p>

          <p><?php echo $offres[$i]['Nom_ville']; ?></p>


          <form action="details_offres.php" method="get">
              <input type="hidden" name="id_offre" value="<?php echo $i?>">
              <button type="submit" class="btn btn-outline">Détails</button>
          </form>
                
        </article>

        <?php 
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