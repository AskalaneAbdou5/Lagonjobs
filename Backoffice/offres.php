<?php
require_once('../asset/configmysql.php');
require_once(__DIR__ . '/select.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gestion d'offre</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/png" href="../logo/Logo.png" />

</head>
<body class="body">

    <header class="site-header header-inner">


    <span class="logo"><a href="gestion_offre.html">Lagon</a>jobs</span>
    <nav class="nav">
        <a href="gestion_offre.php">Tableau de bord</a>
        <a href="offres.php">Offres</a>
        <a href="">Utilisateur</a>
    </nav>

  </header>

    <main class="container">
        
        <h1>Gestion des emploies</h1><br>

        <form action="gestion_offre.php" method="get" class="form">

            <div class="stack">

                <div>
                    <label for="titre">Titre :</label>
                    <input type="text" name="titre" placeholder="Titre" required>
                </div>

                <div class="row">
                    <div>
                        <label for="status">Status :</label>
                        <select name="status" >
                            <?php for ($i=0; $i < count($status); $i++) { 
                            echo "<option value=".$status[$i]['Id'].">".$status[$i]['Status']."</option>";
                            }?>
                        </select>
                    </div>

                    <div>
                        <label for="categorie">Catégorie :</label>
                        <select name="categorie" >
                            <?php for ($i=0; $i < count($categories); $i++) { 
                            echo "<option value=".$categories[$i]['Id'].">".$categories[$i]['Contrat']."</option>";
                            }?>
                        </select>
                    </div>
                </div>

                <div>
                    <label for="description">Description :</label>
                    <textarea name="description" required></textarea>
                </div>

                <div>
                    <label for="mission">Mission :</label>
                    <input type="text" name="mission" required>
                </div>

                <div>
                    <label for="profil">Profil :</label>
                    <input type="text" name="profil" required>
                </div>

                <div class="row">
                    <div>
                        <label for="ville">Ville :</label>
                        <select name="ville" >
                            <?php for ($i=0; $i < count($villes); $i++) { 
                            echo "<option value=".$villes[$i]['Id'].">".$villes[$i]['Nom_ville']."</option>";
                            }?>
                        </select>
                    </div>

                    <div>
                        <label for="mode_de_travail">Mode de travail :</label>
                        <select name="mode_de_travail" >
                            <?php for ($i=0; $i < count($mode_travail); $i++) { 
                            echo "<option value=".$mode_travail[$i]['Id'].">".$mode_travail[$i]['Mode_de_travail']."</option>";
                            }?>
                        </select>
                    </div>
                </div>

                <div>
                    <label for="date">Date :</label>

                    <div class="row">
                        <div>
                            <label for="date_debut">Debut</label>
                            <input type="date" name="date_debut" placeholder="Date de debut" required>
                        </div>

                        <div>
                            <label for="date_fin">Fin</label>
                            <input type="date" name="date_fin" placeholder="Date de fin" required>
                        </div>

                    </div>
                </div>
                
                <div class="action">
                    <button class="btn btn-outline" type="submit">Ajouter</button>
                </div>
                

            </div>

        </form><br>

    </main>

    <footer class="site-footer footer-inner">
        <p class="container">© 2025 Lagonjobs- Touts droits réservés</p>
    </footer>

    

    
</body>
</html>