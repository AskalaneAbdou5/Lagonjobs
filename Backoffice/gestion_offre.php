<?php
session_start();
require_once('../asset/configmysql.php');
require_once('../Frontoffice/session.php');
require_once(__DIR__ . '/insert.php');
require_once(__DIR__ . '/delete.php');
require_once(__DIR__ . '/update.php');
require_once(__DIR__ . '/select.php');

//Redirige l'administrateur dans la page connexion s'il n'est pas connecter

if (!isset($_SESSION['LOG_ADMIN'])) {
    header("Location: ../Frontoffice/connexion.php");
}


//Verifier si les données du filtrage en post existe

  //Le statut

if (isset($_POST['statut'])){
  $statut_filter=$_POST['statut'];
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
    <link rel="icon" type="image/png" href="../logo/Logo2.png" />

</head>
<body class="body">

    <header class="site-header header-inner">


    <span class="logo"><a href="gestion_offre.html"><img src="../logo/Logo.png" alt="logo lagonjobs"></span>
    <nav class="nav">
        <a href="gestion_offre.php">Tableau de bord</a>
        <a href="offres.php">Offres</a>
        <a href="utilisateurs.php">Utilisateur</a>
        <a href="messages_contact.php">Messages</a>

        <?php if(isset($_SESSION['LOG_ADMIN'])){ ?>

          <button class="btn" onclick="window.location.href='../Frontoffice/deconnexion.php'">Deconnexion</button>

        <?php } ?>
    </nav>

  </header>

    <main class="container">
        <h1>Gestion des offres</h1><br>

        <!-- FORMULAIRE DE FILTRAGE -->

        <form action="gestion_offre.php" class="form filter-bar" method="post">

            <!--- figes les elements qui sont rentrer dans les champs -->

            <?php if(isset($_POST['titre'])){ ?>
                <input type="text" name="titre" placeholder="Titre" value="<?php echo $_POST['titre'] ?>">
            <?php }else { ?>
                <input type="text" name="titre" placeholder="Titre">
            <?php } ?>

            <select name="statut" >
                <option value="">Statut</option>
                <?php for ($i=0; $i < count($statut); $i++) { 
     
                  //Fige le statut si l'id du statut en post correspond l'id du statut de la base 

                  if ($statut_filter != $statut[$i]['Id']){
                    echo "<option value=".$statut[$i]['Id'].">".$statut[$i]['Statut']."</option>";
                  }else{
                    echo "<option value=".$statut[$i]['Id']." selected>".$statut[$i]['Statut']."</option>";
                  }

                }?>
            </select>

            <select name="categorie" >
                <option value="">Type de contrat</option>
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
                <th>Type de contrat</th>
                <th>Description</th>
                <th>Action</th>
            </tr>

            <?php for ($i=0; $i < count($offres); $i++) { ?>
            <tr>
                <td><?php echo $offres[$i]['Titre'];?></td>
                <td><?php echo $offres[$i]['Statut'];?></td>
                <td><?php echo $offres[$i]['Contrat'];?></td>
                <td><?php echo $offres[$i]['Description'];?></td>
                <td>
                    <form action="update_emploi.php" method="post">
                        <input type="hidden" name="update_id" value="<?php echo $offres[$i]['Id'];?>">
                        <input type="hidden" name="update_titre" value="<?php echo $offres[$i]['Titre'];?>">
                        <input type="hidden" name="update_statut" value="<?php echo $offres[$i]['Id_statut'];?>">
                        <input type="hidden" name="update_contrat" value="<?php echo $offres[$i]['Id_contrat'];?>">
                        <input type="hidden" name="update_description" value="<?php echo $offres[$i]['Description'];?>">
                        <button class="btn btn-outline" type="submit">Modifier</button>
                    </form>
                    <form action="comfirme_delete.php" method="post">
                        <input type="hidden" name="id_delete_offre" value="<?php echo $offres[$i]['Id'] ?>">
                        <input type="hidden" name="titre_delete_offre" value="<?php echo $offres[$i]['Titre'] ?>">
                        <input type="hidden" name="contrat_delete_offre" value="<?php echo $offres[$i]['Contrat'] ?>">
                        <input type="hidden" name="descript_delete_offre" value="<?php echo $offres[$i]['Description'] ?>">
                        <button class="btn_delete">Supprimer</button>
                    </form> 

                </td>
            </tr>
            <?php } ?>

            
        </table>
        <center>

        <!-- Bouton precedent de la pagination pour revenir la page precedente -->

          <?php if (($page_actuel - 1) < 1 ){ ?>

              <form action="gestion_offre.php" method="get">
                <input type="hidden" name="id_page_precedent" value="<?php echo $page_actuel ?>">
                <button type="submit" disabled>Précédent</button>
              </form>

          <?php }else{ ?>

              <form action="gestion_offre.php" method="get">
                    <input type="hidden" name="id_page_precedent" value="<?php echo $page_actuel - 1 ?>">
                    <button type="submit">Précédent</button>
                </form>

          <?php } ?>


      <!-- Bouton precedent de la pagination pour revenir la page precedente -->

          <?php if (($page_actuel + 1) > $nbDePages){ ?>

              <form action="gestion_offre.php" method="get">
                <input type="hidden" name="id_page_suivant" value="<?php echo $page_actuel ?>">
                <button type="submit" disabled>Suivant</button>
              </form>

          <?php }else{ ?>

              <form action="gestion_offre.php" method="get">
                    <input type="hidden" name="id_page_suivant" value="<?php echo $page_actuel + 1 ?>">
                    <button type="submit">Suivant</button>
                </form>

          <?php } ?>

          
        </center>
    </main>

    <footer class="site-footer footer-inner">
    <p class="container">© 2025 Lagonjobs- Touts droits réservés</p>
  </footer>

    

    
</body>
</html>