<?php

//Ajoute d'un utilisateur 

if (isset($_POST['insert_prenom']) && isset($_POST['insert_nom']) && isset($_POST['insert_email']) && isset($_POST['insert_password']) && isset($_POST['re_password'])) {

    $Prenom=trim($_POST['insert_prenom']);
    $Nom=trim($_POST['insert_nom']);
    $Email=trim($_POST['insert_email']);
    $Motdepasse=trim($_POST['insert_password']);
    $Remotdepasse=trim($_POST['re_password']);

   
    if (!empty($Prenom) && !empty($Nom) && !empty($Email) && !empty($Motdepasse) && !empty($Remotdepasse)) {

        //Ajout d'un utilisateur si les mots de passes sont identique
        if ($Motdepasse === $Remotdepasse) {

            $sql = "INSERT INTO utilisateurs(Nom,Prenom,Email,Mot_de_passe,Id_role) VALUES(:nom, :prenom, :email, :mdp ,:id_role)"; 
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'nom' => $Nom,
                'prenom' => $Prenom,
                'email' => $Email,
                'mdp' => $Motdepasse,
                'id_role' => 1
            ]);

            echo "<script> alert('Votre compte a été bien créé');</script>";
        }else {
            echo "<script>
                alert('Les mots de passe ne sont pas identique');
                window.location.href = 'Inscription.php';
            </script>";
        }
    }else{
        echo "<script> alert('Veuillez remplir tous les champs');
        window.location.href = 'Inscription.php';</script>";
    }
    
}

//Ajout d'un message

if (isset($_POST['nom_contact']) && isset($_POST['email_contact']) && isset($_POST['sujet_contact']) && isset($_POST['message_contact'])) {

    $nom_contact=trim($_POST['nom_contact']);
    $email_contact=trim($_POST['email_contact']);
    $sujet_contact=trim($_POST['sujet_contact']);
    $message_contact=trim($_POST['message_contact']);

   
    if (!empty($nom_contact) && !empty($email_contact) && !empty($sujet_contact) && !empty($message_contact)) {


        $sql = "INSERT INTO messages(Sujet,Message,Nom,Email) VALUES(:Sujet, :Message, :Nom, :Email)"; 
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'Sujet' => $sujet_contact,
            'Message' => $message_contact,
            'Nom' => $nom_contact,
            'Email' => $email_contact
        ]);

        echo "<script> alert('Votre message a été envoyé');</script>";

    }else{
        echo "<script> alert('Veuillez remplir tous les champs');
        window.location.href = 'contact.php';</script>";
    }
    
}


?>