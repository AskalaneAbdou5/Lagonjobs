<?php
session_start();
require_once('../asset/configmysql.php');
require_once('../Frontoffice/session.php');
require_once(__DIR__ . '/delete.php');
require_once(__DIR__ . '/insert.php');
require_once(__DIR__ . '/update.php');
require_once(__DIR__ . '/select.php');

//Redirige l'administrateur dans la page connexion s'il n'est pas connecter

if (!isset($_SESSION['LOG_ADMIN'])) {
    header("Location: ../Frontoffice/connexion.php");
}

//Verifier si les données du filtrage en post existe

  //Le role

if (isset($_POST['role_user'])){
  $role_filter=$_POST['role_user'];
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

        <?php if(isset($_SESSION['LOG_ADMIN'])){ ?>

          <button class="btn" onclick="window.location.href='../Frontoffice/deconnexion.php'">Deconnexion</button>

        <?php } ?>

    </nav>

  </header>

    <main class="container">

        <h1>Gestion des Utilisateurs</h1>

        <h3>Ajouter un utilisateur</h3>

        <form action="utilisateurs.php" class="form filter-bar" method="post">
  
            <input type="text" name="insert_nom" placeholder="Nom">
           
            <input type="text" name="insert_prenom" placeholder="Prénom" >
         
            <input type="email" name="insert_email" placeholder="Email" >

            <input type="password" name="insert_password" placeholder="Mot de passe" >

            <select name="insert_role_user" >
                <?php for ($i=0; $i < count($roles); $i++) { 
                    echo "<option value=".$roles[$i]['Id'].">".$roles[$i]['Nom_role']."</option>";
                }?>
            </select>

            <button type="submit" class="btn btn-outline" >Ajouter</button>
        
        </form><br>

        <h3>Filtrer les utilisateurs</h3>

        <!-- FORMULAIRE DE FILTRAGE -->

        <form action="utilisateurs.php" class="form filter-bar" method="post">

            <!--- figes les elements qui sont rentrer dans les champs -->

            <?php if(isset($_POST['nom'])){ ?>
                <input type="text" name="nom" placeholder="Nom" value="<?php echo $_POST['nom'] ?>">
            <?php }else { ?>
                <input type="text" name="nom" placeholder="Nom">
            <?php } ?>

            <?php if(isset($_POST['prenom'])){ ?>
                <input type="text" name="prenom" placeholder="Prénom" value="<?php echo $_POST['prenom'] ?>">
            <?php }else { ?>
                <input type="text" name="prenom" placeholder="Prénom">
            <?php } ?>

            <?php if(isset($_POST['email'])){ ?>
                <input type="text" name="email" placeholder="Email" value="<?php echo $_POST['email'] ?>">
            <?php }else { ?>
                <input type="text" name="email" placeholder="Email">
            <?php } ?>

            <select name="role_user" >
                <?php for ($i=0; $i < count($roles); $i++) { 

                    if ($role_filter != $roles[$i]['Id']){
                        echo "<option value=".$roles[$i]['Id'].">".$roles[$i]['Nom_role']."</option>";
                    }else{
                        echo "<option value=".$roles[$i]['Id']." selected>".$roles[$i]['Nom_role']."</option>";
                    }

                }?>
            </select>

            <button type="submit" class="btn btn-outline" >Filtrer</button>
            <button type="button" class="btn btn-outline" onclick="window.location.href='utilisateurs.php'" >Reinitialiser</button>

        </form><br>

        <table class="table-offres">
            <tr>
                <th>Utilisateurs</th>
                <th>Emails</th>
                <th>Roles</th>
                <th>Action</th>
            </tr>

            <?php for ($i=0; $i < count($utilisateurs); $i++) { ?>
            <tr>
                <td><?php echo $utilisateurs[$i]['Nom']." ".$utilisateurs[$i]['Prenom'];?></td>
                <td><?php echo $utilisateurs[$i]['Email'];?></td>
                <td><?php echo $utilisateurs[$i]['Nom_role'];?></td>
                <td>

                    <form action="update_utilisateur.php" method="post">
                        <input type="hidden" name="update_id_user" value="<?php echo $utilisateurs[$i]['Id'];?>">
                        <input type="hidden" name="update_nom" value="<?php echo $utilisateurs[$i]['Nom'];?>">
                        <input type="hidden" name="update_prenom" value="<?php echo $utilisateurs[$i]['Prenom'];?>">
                        <input type="hidden" name="update_email" value="<?php echo $utilisateurs[$i]['Email'];?>">
                        <input type="hidden" name="update_role" value="<?php echo $utilisateurs[$i]['Id_role'];?>">
                        <button class="btn btn-outline" type="submit">Modifier</button>
                    </form>

                    <form action="utilisateurs.php" method="post">
                        <input type="hidden" name="delete_user" value="<?php echo $utilisateurs[$i]['Id'] ?>">
                        <button class="btn_delete">Supprimer</button>
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