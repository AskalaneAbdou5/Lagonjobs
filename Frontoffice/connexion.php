<?php
require_once(dirname(dirname(__FILE__)) . '/Frontoffice/bdd_service_frontoffice.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header class="site-header header-inner"> 

    <h1><a href="index.php">Lagon</a>jobs</h1>

    <nav class="nav">
        <a href="index.php">Accueil</a>
        <a href="offres.php">Offres</a>
        <a href="contact.php">Contact</a>
    </nav>

    </header>

    <main class="center hero">

        <h1>Connexion</h1>

        <form action="Inscription.php" class="form row auth-card">

            <label>Email</label><br>          
            <input type="email" name="email" required>

            <br><br>

            <label>Mot De Passe</label><br>          
            <input type="password" name="password" required>
            <a href="connexion.html">Mot de passe oublié ?</a>

            <br><br>
            <button type="submit" class="btn btn-outline">Se connecter</button> 
            <button class="btn"><a href="Inscription.php">Créer un compte</a></button>


        </form>
    </main>


    <footer class="site-footer footer-inner">
        <p class="container">© 2025 Lagonjobs- Touts droits réservés</p>
        <a href="contact.php">Confidentialité Nous contacter.</a>
    </footer>


    
</body>
</html>