<?php
require_once('../asset/configmysql.php');
require_once(__DIR__ . '/delete.php');
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
        <a href="utilisateurs.php">Utilisateur</a>
    </nav>

  </header>

    <main class="container">

        <h1>Gestion des Utilisateurs</h1>

        <table border="2px">
            <tr>
                <th>Utilisateurs</th>
                <th>Emails</th>
                <th>Action</th>
            </tr>

            <?php for ($i=0; $i < count($utilisateurs); $i++) { ?>
            <tr>
                <td><?php echo $utilisateurs[$i]['Nom']." ".$utilisateurs[$i]['Prenom'];?></td>
                <td><?php echo $utilisateurs[$i]['Email'];?></td>
                <td>
                    </button><form action="utilisateurs.php" method="get">
                        <input type="hidden" name="delete_user" value="<?php echo $utilisateurs[$i]['Id'] ?>">
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