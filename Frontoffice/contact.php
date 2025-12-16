<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
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

  <main class="center hero">
    
    <!--Formullaire-->
    <h1>Contact</h1>
    <p>Une question ? Envoyez-nous un message et un adminitrateur vous répondra.</p>

      <form action="contact.php" method="POST" class="form row auth-card">
        <label for="nom">Nom</label>
        <input type="text" name="nom" required>

        <label for="email">Email</label>
        <input type="text" name="email" required>

        <label for="sujet">Sujet</label>
        <input type="text" name="suje" required>

        <label for="message">Message</label>
        <textarea name="message" id=""></textarea>

        <button type="submit" class="btn">Envoyez</button>
        <button type="reset" class="btn btn-outline">Effacer</button>

      </form><br>


  </main>

  <footer class="site-footer footer-inner">
    <p class="container">© 2025 Lagonjobs- Touts droits réservés</p>
    <a href="contact.php">Confidentialité Nous contacter.</a>
  </footer>



    

    
</body>
</html>