<?php
require_once(dirname(dirname(__FILE__)) . '/Frontoffice/bdd_service_frontoffice.php');
$LaDerniereOffre = RecupererLaDerniereOffre();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
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
            <a href="connexion.php" class="btn btn-outline">Connexion</a>
            <a href="inscription.php" class="btn btn-outline">Inscription</a>
        </nav>


    </header>

    <main >
        <section class="hero">
            <div class="container grid">
                <section>
                    <h1>Trouver votre stage ou emploi facilement</h1>
                    <p>Des offres claires et à jour, pour étudiants et jeunes diplômes. Recherche par mot clé, lieu, type de contrât et teletravail.</p>
                    <form action="offres.php" class="form cards search-inline">
                        <input type="text" name="mot_cle" placeholder="Mot cle (ex: PHP, support, réseau)">

                        <input type="text" name="ville" placeholder=" Ville (ex: Mamoudzou)">

                        <select name="type_de_contrat" >
                            <option value="0">Type de contrat</option>
                            <option value="1">Stage</option>
                            <option value="2">CDD</option>
                            <option value="3">CDI</option>
                        </select>

                        <select name="type_de_contrat" >
                            <option value="0">Télétravail</option>
                            <option value="1">Hybride</option>
                            <option value="2">Sur site</option>
                        </select>

                        <button type="submit" class="btn">Rechercher</button>
                    </form>
                </section>

                <section class="card">
                    <h4>Pourquoi Lagonjobs ?</h4>
                    <ul>
                        <li>Annonces adaptées aux profils SIO</li>
                        <li>Interface simple et tojule</li>
                        <li>Back-office pour administrateurs</li>
                    </ul>
                    <p>Astuce_crées, un compte pour sauvegarder des offres</p>
                </section>
            </div><br>

        <!--Offres d'emploi et stages-->
        
        <div class="container">
            <h2>Les 3 dernières offres ajoutées</h2>
            <section class="cards">

                <?php
                if (empty($LaDerniereOffre)) {
                echo '<p>Desolé aucune offre disponible dans la base de donner pour le moment.</p>';
                } else {
                foreach ($LaDerniereOffre as $offre) {
                ?>
                
                <article class="card">
                    <p><?= ($offre['Titre']); ?></p> 
                            
                    <h2><?= ($offre['Contrat']); ?></h2>
                            
                    <p><?= ($offre['Type_de_travail']); ?></p>
                            
                    <p><?= ($offre['Description']); ?></p>

                    <p><?= ($offre['Ville']); ?></p>

                    <p><?= ($offre['Date_du_debut']); ?></p>

                    <p><?= ($offre['Date_de_fin']); ?></p>

                    <p><a class="btn btn-outline" href="details_offres.php">detail</a></p>
                        
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