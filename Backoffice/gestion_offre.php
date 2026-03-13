<?php
require_once('../asset/configmysql.php');
require_once(__DIR__ . '/insert.php');
require_once(__DIR__ . '/delete.php');
require_once(__DIR__ . '/update.php');
require_once(__DIR__ . '/select.php');


//Verifier si les données du filtrage en post existe

  //Le status

if (isset($_POST['status'])){
  $status_filter=$_POST['status'];
}

  //Le type de contrat

if (isset($_POST['categorie'])){
  $contrat_filter=$_POST['categorie'];
}

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
        <a href="utilisateurs.php">Utilisateur</a>
    </nav>

  </header>

    <main class="container">
        <h1>Gestion des emploies</h1><br>

        <!-- FORMULAIRE DE FILTRAGE -->

        <form action="gestion_offre.php" class="form filter-bar" method="post">

            <!--- figes les elements qui sont rentrer dans les champs -->

            <?php if(isset($_POST['titre'])){ ?>
                <input type="text" name="titre" placeholder="Titre" value="<?php echo $_POST['titre'] ?>">
            <?php }else { ?>
                <input type="text" name="titre" placeholder="Titre">
            <?php } ?>

            <select name="status" >
                <option value="">Status</option>
                <?php for ($i=0; $i < count($status); $i++) { 
     
                  //Fige le status si l'id du status en post correspond l'id du status de la base 

                  if ($status_filter != $status[$i]['Id']){
                    echo "<option value=".$status[$i]['Id'].">".$status[$i]['Status']."</option>";
                  }else{
                    echo "<option value=".$status[$i]['Id']." selected>".$status[$i]['Status']."</option>";
                  }

                }?>
            </select>

            <select name="categorie" >
                <option value="">Catégorie</option>
                <?php for ($i=0; $i < count($categories); $i++) { 

                  //Fige le type de contrat si l'id du type de contrat en post correspond l'id du type de contrat de la base 

                  if ($contrat_filter != $categories[$i]['Id']){
                    echo "<option value=".$categories[$i]['Id'].">".$categories[$i]['Contrat']."</option>";
                  }else{
                    echo "<option value=".$categories[$i]['Id']." selected>".$categories[$i]['Contrat']."</option>";
                  }

                }?>
            </select>

            <button class="btn btn-outline" >Filtrer</button>
            <button type="button" class="btn btn-outline" onclick="window.location.href='gestion_offre.php'" >Reinitialiser</button>

        </form><br>

        <table class="table-offres">
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
                <td>
                    <form action="update_emploi.php" method="post">
                        <input type="hidden" name="update_id" value="<?php echo $offres[$i]['Id'];?>">
                        <input type="hidden" name="update_titre" value="<?php echo $offres[$i]['Titre'];?>">
                        <input type="hidden" name="update_status" value="<?php echo $offres[$i]['Id_status'];?>">
                        <input type="hidden" name="update_contrat" value="<?php echo $offres[$i]['Id_contrat'];?>">
                        <input type="hidden" name="update_description" value="<?php echo $offres[$i]['Description'];?>">
                        <button class="btn btn-outline" type="submit">Modifier</button>
                    </form>
                    <form action="gestion_offre.php" method="get">
                        <input type="hidden" name="delete_offre" value="<?php echo $offres[$i]['Id'] ?>">
                        <button class="btn btn-outline">Supprimer</button>
                    </form> 

                </td>
            </tr>
            <?php } ?>

            
        </table>
    </main>

    <footer class="site-footer footer-inner">
    <p class="container">© 2025 Lagonjobs- Touts droits réservés</p>
  </footer>

    

    
</body>
</html>