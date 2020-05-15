<?php
include('connect.php');

// récupérer les valeurs
if (isset($_POST['createCategory']) || isset($_POST['editCategory'])) {
    $slug = $_POST['slug'];
    $name = $_POST['name'];
    if (empty($_POST['enable'])) {
        $enabled = 0;
    } else {
        $enabled = $_POST['enable'];
    }
    $description = $_POST['description'];
    if (empty($_POST['categoryparent'])) {
        $categoryParent = null;
    } else {
        $categoryParent = $_POST['categoryparent'];
    }

}


if (isset($_POST['createCategory'])) {
    // Requête mysql pour insérer des données
    $sql = "INSERT INTO `category`(`name`, `slug`, `description`, `idParentCategory`, `enabled`) VALUES (:nom, :slug, :description, :idParentCategory, :enabled)";
    $res = $pdo->prepare($sql);
    $exec = $res->execute(array(':nom' =>$name, ':slug' =>$slug, ':description' =>$description, ':idParentCategory' =>$categoryParent, ':enabled' =>$enabled));
    // vérifier si la requête d'insertion a réussi
    if ($exec) {
        echo 'Catégorie créer';
        header('location: ../Categories.php?id='.$_GET['id']);
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
        echo 'Catégorie modifiée';
        header('location: ../Categories.php?id='.$_GET['id']);
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
        echo 'Catégorie supprimer';
        header('location: ../Categories.php?id='.$_GET['id']);
    } else {
        echo "Échec de l'opération delete";
    }
}
