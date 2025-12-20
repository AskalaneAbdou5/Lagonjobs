<?php
require_once(dirname(dirname(__FILE__)) . '/Frontoffice/bdd_service_frontoffice.php');
$lesOffres = RecupererLesOffres();

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

        <hr class="container">

            <div class="container">
                <h2>Dernières offres</h2>

                <div class="cards">
                    <article class="card ">
                        <p class="badge">Stage</p>
                        <h3>Stagiaire Developpeur Web</h3>
                        <p>Mamoudzou - Hybride</p>
                        <p>Participer au développement et é-commerce.</p>
                        <form action="details_offres.php" method="get">
                            <input type="hidden" name="id_offre" value="0">
                            <button type="submit" class="btn btn-outline">Voir</button>
                        </form>
                    </article>
                    

                    <article class="card">
                        <p class="badge">CDD</p>
                        <h3>Technicien support</h3>
                        <p>Dzaoudzi - Hybride</p>
                        <p>Assistance virtulle. Indication et Maintenance.</p>
                        <form action="details_offres.php" method="get">
                            <input type="hidden" name="id_offre" value="1">
                            <button type="submit" class="btn btn-outline">Voir</button>
                        </form>
                    </article>

                    <article class="card">
                        <p class="badge">Stage</p>
                        <h3>Stagiaire Developpeur Web</h3>
                        <p>Mamoudzou - Hybride</p>
                        <p>Participer au développement et é-commerce.</p>
                        <form action="details_offres.php" method="get">
                            <input type="hidden" name="id_offre" value="2">
                            <button type="submit" class="btn btn-outline">Voir</button>
                        </form>
                    </article>
                </div>
            </div>
        </section>
        
    </main>

    <footer class="site-footer footer-inner">
        <p class="container">© 2025 Lagonjobs- Touts droits réservés</p>
        <a href="contact.php">Confidentialité Nous contacter.</a>
    </footer>
    
</body>
</html>