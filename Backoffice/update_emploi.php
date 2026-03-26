<?php 
require_once('../asset/configmysql.php');
require_once(__DIR__ . '/select.php');


if (isset($_POST['update_id'])
&& isset($_POST['update_titre'])
&& isset($_POST['update_status'])
&& isset($_POST['update_contrat'])
&& isset($_POST['update_description'])
) {
    $id_emploie=$_POST['update_id'];
    $titre=$_POST['update_titre'];
    $id_status=$_POST['update_status'];
    $id_contrat=$_POST['update_contrat'];
    $descrip=$_POST['update_description'];
}else{
    header("Location: offres.php");
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'offre</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/png" href="../logo/Logo2.png" />
</head>
<body class="container">
    <h1>Modifier l'offre</h1>

    <form action="gestion_offre.php" method="POST" class="form">
        <div class="stack">
            <div class="stack">
                <div>
                    <input type="hidden" name="updated_id_offre" value="<?php echo $id_emploie;?>">
                </div>

                <div>
                    <label for="titre">Titre</label>
                    <input type="text" name="updated_titre" value="<?php echo $titre;?>">
                </div>

                <div>
                    <label for="description">Description</label>
                    <input type="text" name="updated_descript" value="<?php echo $descrip;?>">
                </div>
            </div>

            <div class="row">
                <div>
                    <label for="status">Status</label>
                    <select name="updated_id_status" >
                        <?php for ($i=0; $i < count($status); $i++) { 
                            if ($status[$i]['Id'] === intval($id_status)) {
                                echo "<option value=".$status[$i]['Id']." selected>".$status[$i]['Status']."</option>";
                            }else{
                                echo "<option value=".$status[$i]['Id'].">".$status[$i]['Status']."</option>";
                            }
                        }?>
                    </select>
                </div>

                <div>
                    <label for="Categorie">Catégorie</label>
                    <select name="updated_id_contrat" >
                        <?php for ($i=0; $i < count($categories); $i++) { 
                            if ($categories[$i]['Id'] === intval($id_contrat)) {
                                echo "<option value=".$categories[$i]['Id']." selected>".$categories[$i]['Contrat']."</option>";
                            }else{
                                echo "<option value=".$categories[$i]['Id'].">".$categories[$i]['Contrat']."</option>";
                            }
                        }?>
                    </select>
                </div>
            </div>

            <div class="action">
                <button type="button" onclick="window.location.href='gestion_offre.php'" class="btn btn-outline">Annuler</button>
                <button type="submit" class="btn">Enregistrer</button>
            </div>
        </div>
    </form>
    
</body>
</html>