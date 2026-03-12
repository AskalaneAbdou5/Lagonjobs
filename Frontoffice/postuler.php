<?php
session_start();
require_once('../asset/configmysql.php');
require_once(__DIR__ . '/session.php');
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/png" href="../logo/Logo.png" />
</head>
<body>

    <header class="site-header header-inner">


    <span class="logo"><a href="index.html">Lagon</a>jobs</span>
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
    
    <!--Formullaire-->
      <h1>Postuler</h1>

      <form action="contact.html" method="POST" class="form">
        
        <div class="stack">
          <div class="stack">
            <label for="dest_email">Destinataire</label>
            <input type="email" name="dest_email">
          </div>

          <div class="stack">
            <div>
              <label for="sujet">Sujet</label>
              <input type="text" name="suje" required>
            </div>

            <div>
              <label for="message">Message</label>
              <textarea name="message" id=""></textarea>
            </div>
          </div>

          <div class="action">
            <button type="submit" class="btn">Envoyez</button>
          </div>
        </div>

      </form><br>


  </main>

  <footer class="site-footer footer-inner">
    <p class="container">© 2025 Lagonjobs- Touts droits réservés</p>
    <a href="contact.php">Confidentialité Nous contacter.</a>
  </footer>



    

    
</body>
</html>