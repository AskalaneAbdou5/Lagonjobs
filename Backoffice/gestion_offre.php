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

        <form action="" class="form cards search-inline">
            <input type="text" name="titre" placeholder="Titre">

            <select name="status" >
                <option>Status</option>
                <?php for ($i=0; $i < count($status); $i++) { 
                echo "<option value=".$status[$i]['Id'].">".$status[$i]['Status']."</option>";
                }?>
            </select>

            <select name="categorie" >
                <option>Catégorie</option>
                <?php for ($i=0; $i < count($categories); $i++) { 
                echo "<option value=".$categories[$i]['Id'].">".$categories[$i]['Contrat']."</option>";
                }?>
            </select>

            <button class="btn btn-outline" >Filtrer</button>
            <button class="btn btn-outline" >Reinitialiser</button>

        </form><br>

        <table border="2px">
            <tr>
                <th>Titre</th>
                <th>Statut</th>
                <th>Catégorie</th>
                <th>Description</th>
                <th>Action</th>
            </tr>

            <?php for ($i=0; $i < count($offres); $i++) { ?>
            <tr>
                <td><?php echo $offres[$i]['Titre'];?></td>
                <td><?php echo $offres[$i]['Status'];?></td>
                <td><?php echo $offres[$i]['Contrat'];?></td>
                <td><?php echo $offres[$i]['Description'];?></td>
                <td><button class="btn btn-outline">Modifier</button> <button class="btn btn-outline">Supprimer</button></td>
            </tr>
            <?php } ?>

            
        </table>
    </main>

    <footer class="site-footer footer-inner">
    <p class="container">© 2025 Lagonjobs- Touts droits réservés</p>
  </footer>

    

    
</body>
</html>