<?php 
require_once('../asset/configmysql.php');
require_once(__DIR__ . '/select.php');

// verifie si les variables en post existe

if (isset($_POST['update_id_user'])
&& isset($_POST['update_nom'])
&& isset($_POST['update_prenom'])
&& isset($_POST['update_email'])
&& isset($_POST['update_role'])
) {
    $id_user=$_POST['update_id_user'];
    $nom=$_POST['update_nom'];
    $prenom=$_POST['update_prenom'];
    $email=$_POST['update_email'];
    $id_role=$_POST['update_role'];
}else{
    header("Location: utilisateurs.php");
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'utilisateur</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/png" href="../logo/Logo2.png" />
</head>
<body class="container">
    <h1>Modifier l'utilisateur</h1>

    <form action="utilisateurs.php" method="POST" class="form">
        <div class="stack">

            <input type="hidden" name="updated_id_user" value="<?php echo $id_user ?>">

            <div class="row">

                <div>
                    <label for="titre">Nom</label>
                    <input type="text" name="updated_nom" value="<?php echo $nom ?>">
                </div>

                <div>
                    <label for="description">Prenom</label>
                    <input type="text" name="updated_prenom" value="<?php echo $prenom ?>">
                </div>
            </div>

            <div class="stack">
                <div>
                    <label for="email">Email</label>
                    <input type="text" name="updated_email" value="<?php echo $email;?>">
                </div>

                <div>
                    <label for="updated_role_user">Role</label>
                    <select name="updated_role_user" >
                        <?php for ($i=0; $i < count($roles); $i++) { 

                            if ($id_role != $roles[$i]['Id']){
                                echo "<option value=".$roles[$i]['Id'].">".$roles[$i]['Nom_role']."</option>";
                            }else{
                                echo "<option value=".$roles[$i]['Id']." selected>".$roles[$i]['Nom_role']."</option>";
                            }

                        }?>
                    </select>
                </div>

            </div>

            <div class="action">
                <button type="button" onclick="window.location.href='utilisateurs.php'" class="btn btn-outline">Annuler</button>
                <button type="submit" class="btn">Enregistrer</button>
            </div>
        </div>
    </form>
    
</body>
</html>