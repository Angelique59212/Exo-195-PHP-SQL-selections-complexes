<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sélection complexe</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
require 'Connect.php';
require 'Config.php';

$myConnexion = Connect::dbConnect();

// TODO Commencez par créer votre objet de connexion à la base de données, vous pouvez aussi utiliser l'objet statique ou autre qu'on a créé ensemble.

/* 1. Sélectionnez et affichez tous les utilisateurs dont le nom est 'Conor' */
$stmt = $myConnexion->prepare("SELECT * FROM user WHERE nom='Conor'");
$state = $stmt->execute();

if ($state) {
    foreach ($stmt->fetchAll() as $user) {
        echo "<div class='classe-css-utilisateur'>". "Utilisateur: id: ". $user['id'] ." ".$user['nom'];
    }
}

/* 2. Sélectionnez et affichez tous les utilisateurs dont le prénom est différent de 'John' */
$stmt = $myConnexion->prepare("SELECT * FROM user WHERE prenom != 'John'");
$state = $stmt->execute();

if ($state) {
    foreach ($stmt->fetchAll() as $user) {
        echo "<div class='classe-css-utilisateur'>". "Utilisateur: id: ". $user['id'] ." ".$user['prenom'];
    }
}

/* 3. Sélectionnez et affichez tous les utilisateurs dont l'id est plus petit ou égal à 2 */
$stmt = $myConnexion->prepare("SELECT * FROM user WHERE id <= 2");
$state = $stmt->execute();

if ($state) {
    foreach ($stmt->fetchAll() as $user) {
        echo "<div class='classe-css-utilisateur'>". "Utilisateur: id: ". $user['id'] ." ".$user['nom']." ". $user['prenom'];
    }
}

/* 4. Sélectionnez et affichez tous les utilisateurs dont l'id est plus grand ou égal à 2 */
$stmt = $myConnexion->prepare("SELECT * FROM user WHERE id >=2");
$state= $stmt->execute();

if ($state) {
    foreach ($stmt->fetchAll() as $user) {
        echo "<div class='classe-css-utilisateur'>". "Utilisateur: id: ". $user['id'] ." ".$user['nom']." ". $user['prenom'];
    }
}

/* 5. Sélectionnez et affichez tous les utilisateurs dont l'id est égal à 1 */
$stmt = $myConnexion->prepare("SELECT * FROM user WHERE id = 1");
$state= $stmt->execute();

if ($state) {
    foreach ($stmt->fetchAll() as $user) {
        echo "<div class='classe-css-utilisateur'>". "Utilisateur: id: ". $user['id'] ." ".$user['nom']." ". $user['prenom'];
    }
}

/* 6. Sélectionnez et affichez tous les utilisateurs dont l'id est plus grand que 1 ET le nom est égal à 'Doe' */
$stmt = $myConnexion->prepare("SELECT * FROM user WHERE id >1 AND nom ='Doe'");
$state= $stmt->execute();

if ($state) {
    foreach ($stmt->fetchAll() as $user) {
        echo "<div class='classe-css-utilisateur'>". "Utilisateur: id: ". $user['id'] ." ".$user['nom']." ". $user['prenom'];
    }
}

/* 7. Sélectionnez et affichez tous les utilisateurs dont le nom est 'Doe' ET le prénom est 'John'*/
$stmt = $myConnexion->prepare("SELECT * FROM user WHERE nom ='Doe' AND prenom ='John'");
$state= $stmt->execute();

if ($state) {
    foreach ($stmt->fetchAll() as $user) {
        echo "<div class='classe-css-utilisateur'>". "Utilisateur: id: ". $user['id'] ." ".$user['nom']." ". $user['prenom'];
    }
}

/* 8. Sélectionnez et affichez tous les utilisateurs dont le nom est 'Conor' OU le prénom est 'Jane' */
$stmt = $myConnexion->prepare("SELECT * FROM user WHERE nom ='Conor' OR prenom ='Jane'");
$state= $stmt->execute();

if ($state) {
    foreach ($stmt->fetchAll() as $user) {
        echo "<div class='classe-css-utilisateur'>". "Utilisateur: id: ". $user['id'] ." ".$user['nom']." ". $user['prenom'];
    }
}

/* 9. Sélectionnez et affichez tous les utilisateurs en limitant les réultats à 2 résultats */
$stmt = $myConnexion->prepare("SELECT * FROM user LIMIT 2");
$state= $stmt->execute();

if ($state) {
    foreach ($stmt->fetchAll() as $user) {
        echo "<div class='classe-css-utilisateur'>". "Utilisateur: id: ". $user['id'] ." ".$user['nom']." ". $user['prenom'];
    }
}

/* 10. Sélectionnez et affichez tous les utilisateurs par ordre croissant, en limitant le résultat à 1 seul enregistrement */
$stmt = $myConnexion->prepare("SELECT * FROM user ORDER BY nom ASC LIMIT 1");
$state= $stmt->execute();

if ($state) {
    foreach ($stmt->fetchAll() as $user) {
        echo "<div class='classe-css-utilisateur'>". "Utilisateur: id: ". $user['id'] ." ".$user['nom']." ". $user['prenom'];
    }
}

/* 11. Sélectionnez et affichez tous les utilisateurs dont le nom commence par C, fini par r et contient 5 caractères ( voir LIKE )*/
$stmt = $myConnexion->prepare("SELECT * FROM user WHERE nom LIKE 'C___r'");
$state= $stmt->execute();

if ($state) {
    foreach ($stmt->fetchAll() as $user) {
        echo "<div class='classe-css-utilisateur'>". "Utilisateur: id: ". $user['id'] ." ".$user['nom']." ". $user['prenom'];
    }
}

/* 12. Sélectionnez et affichez tous les utilisateurs dont le nom contient au moins un 'e' */
$stmt = $myConnexion->prepare("SELECT * FROM user WHERE nom LIKE '%e%'");
$state= $stmt->execute();

if ($state) {
    foreach ($stmt->fetchAll() as $user) {
        echo "<div class='classe-css-utilisateur'>". "Utilisateur: id: ". $user['id'] ." ".$user['nom']." ". $user['prenom'];
    }
}

/* 13. Sélectionnez et affichez tous les utilisateurs dont le prénom est ( IN ) (John, Sarah) ... voir IN , pas OR '' */
$stmt = $myConnexion->prepare("SELECT * FROM user WHERE prenom IN ('John', 'Sarah')");
$state= $stmt->execute();

if ($state) {
    foreach ($stmt->fetchAll() as $user) {
        echo "<div class='classe-css-utilisateur'>". "Utilisateur: id: ". $user['id'] ." ".$user['nom']." ". $user['prenom'];
    }
}

/* 14. Sélectionnez et affichez tous les utilisateurs dont l'id est situé entre 2 et 4 */
$stmt = $myConnexion->prepare("SELECT * FROM user WHERE id BETWEEN 2 and 4");
$state= $stmt->execute();

if ($state) {
    foreach ($stmt->fetchAll() as $user) {
        echo "<div class='classe-css-utilisateur'>". "Utilisateur: id: ". $user['id'] ." ".$user['nom']." ". $user['prenom'];
    }
}

?></body>
</html>