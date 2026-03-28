<?php 

session_start();
require_once('../asset/configmysql.php');
require_once('../Frontoffice/session.php');
require_once(__DIR__ . '/select.php');

if (!isset($_SESSION['LOG_ADMIN'])) {
    header("Location: ../Frontoffice/connexion.php");
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
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

        <h1>Les Messages reçus</h1>


        <table class="table-offres">
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Sujet</th>
                <th>Message</th>
                <th>Date</th>
                <th>Statut</th>
                <th>Action</th>
                
            </tr>

            <?php for ($i=0; $i < count($messages); $i++) { ?>
            <tr>
                <td><?php echo $messages[$i]['Nom'];?></td>
                <td><?php echo $messages[$i]['Email'];?></td>
                <td><?php echo $messages[$i]['Sujet'];?></td>
                <td><?php echo $messages[$i]['Message'];?></td>
                <td><?php echo $messages[$i]['Date'];?></td>
                <td><?php echo $messages[$i]['Statut'];?></td>
                <td>
                    <form action="update_utilisateur.php" method="post">
                        <input type="hidden" name="mes_nom" value="<?php echo $messages[$i]['Nom'];?>">
                        <input type="hidden" name="mes_sujet" value="<?php echo $messages[$i]['Sujet'];?>">
                        <input type="hidden" name="mes_email" value="<?php echo $messages[$i]['Email'];?>">
                        <input type="hidden" name="mes_message" value="<?php echo $messages[$i]['Message'];?>">
                        <input type="hidden" name="mes_date" value="<?php echo $messages[$i]['Date'];?>">
                        <input type="hidden" name="mes_statut" value="<?php echo $messages[$i]['Statut'];?>">
                        <button class="btn btn-outline" type="submit">Détail</button>
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