<?php
include('index.php');

// récupérer les valeurs
if (isset($_POST['createCategory']) || isset($_POST['editCategory'])) {
    $slug = $_POST['slug'];
    $name = $_POST['name'];
    $enabled = $_POST['enable'];
    $description = $_POST['description'];
    $categoryParent = $_POST['categoryparent'];
}


if (isset($_POST['createCategory'])) {
    // Requête mysql pour insérer des données
    $sql = "INSERT INTO `category`(`name`, `slug`, `description`, `idParentCategory`, `enabled`) VALUES (:nom, :slug, :description, :idParentCategory, :enabled)";
    $res = $pdo->prepare($sql);
    $exec = $res->execute(array(':nom' =>$name, ':slug' =>$slug, ':description' =>$description, ':idParentCategory' =>$categoryParent, ':enabled' =>$enabled));
    // vérifier si la requête d'insertion a réussi
    if ($exec) {
        echo 'Données insérées';
    } else {
        echo "Échec de l'opération d'insertion";
    }
} else if (isset($_POST['editCategory'])) {
    $idCategory = $_GET['idCategory'];
    // Requête mysql pour udpate des données
    $sql = "UPDATE `category` SET `name`=:nom, `slug`=:slug, `description`=:description, `idParentCategory`=:idParentCategory, `enabled`=:enabled WHERE `idCategory` = ".$idCategory."";
    $res = $pdo->prepare($sql);
    $exec = $res->execute(array(':nom' =>$name, ':slug' =>$slug, ':description' =>$description, ':idParentCategory' =>$categoryParent, ':enabled' =>$enabled));
    // vérifier si la requête d'insertion a réussi
    if ($exec) {
        echo 'Données modifiées';
    } else {
        echo "Échec de l'opération d'update";
    }
} else if (isset($_POST['supprCategory'])) {
    $idCategory = $_GET['idCategory'];
    // Requête mysql pour delete des données
    $sql = 'DELETE FROM `category` WHERE `idCategory` = '.$idCategory.'';
    $res = $pdo->prepare($sql);
    $exec = $res->execute();
    // vérifier si la requête d'insertion a réussi
    if ($exec) {
        echo 'Données supprimées';
    } else {
        echo "Échec de l'opération delete";
    }
}
