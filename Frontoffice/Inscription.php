<?php
require_once('../asset/configmysql.php');

$Prenom= $_GET['prenom'];
$Nom=$_GET['nom'];
$Email=$_GET['email'];
$Motdepasse=$_GET['password'];

$sql = "INSERT INTO utilisateurs ( Prenom, Nom, Email, Mot_de_passe, Id_role) VALUES (P"; 
$stmt = $pdo->prepare($sql);
$stmt->execute();


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/png" href="../logo/Logo.png" />
</head>
<body>
    <header class="site-header header-inner">

        <span class="logo"><a href="gestion_offre.html">Lagon</a>jobs</span>
        <nav class="nav">
            <a href="index.php">Accueil</a>
            <a href="offres.php">Offres</a>
            <a href="contact.php">Contact</a>
        </nav>
    </header>

    <main class="center hero">
        
        <h1> Inscription </h1>

        <form action="connexion.php" class="form row auth-card" method="get">

                <div class="row">
                    <div>
                        <label >Prénom</label>         
                        <input type="text" name="prenom" required>
                    </div>

                    <div>
                        <label>Nom</label>
                        <input type="text" name="nom" required>
                    </div>
                </div>

                <div class="stack">
                    <div>
                        <label>Email</label>         
                        <input type="email" name="email" required>
                    </div>
                </div>

                <div class="row">
                    <div>
                        <label>Mot De Passe</label>         
                        <input type="password" name="password" required>
                    </div>

                    <div>
                        <label>Confirmer le mot de passe</label>          
                        <input type="password" name="password" required>
                    </div>
                </div>
                <div class="action">
                    <div>
                        <button type="submit" class="btn btn-outline">Créer mon compte</button> 
                        <a href="connexion.html" class="btn">Déjà inscrit?</a>
                    </div>
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