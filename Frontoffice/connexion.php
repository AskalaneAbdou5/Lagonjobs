<?php
require_once(dirname(dirname(__FILE__)) . '/Frontoffice/bdd_service_frontoffice.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
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
    </nav>

    </header>

    <main class="center hero">

        <h1>Connexion</h1>

        <form action="Inscription.php" class="form row auth-card">

            <div class="stack">
                <div class="stack">
                    <div>
                        <label>Email</label>         
                        <input type="email" name="email" required>
                    </div>

                    <div>
                        <label>Mot de passe</label>         
                        <input type="password" name="password" required>
                    </div>
                </div>
                
                <a href="connexion.html">Mot de passe oublié ?</a>

                <div class="action">
                    <button type="submit" class="btn btn-outline">Se connecter</button> 
                    <a href="Inscription.php" class="btn">Créer un compte</a>
                </div>
            </div>


        </form>
    </main>


    <footer class="site-footer footer-inner">
        <p class="container">© 2025 Lagonjobs- Touts droits réservés</p>
        <a href="contact.php">Confidentialité Nous contacter.</a>
    </footer>


    
</body>
</html>