<?php
include('index.php');

if (isset($_POST['createProduct']) || isset($_POST['editProduct'])) {
    // récupérer les valeurs
    $slug = $_POST['slug'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $width = $_POST['width'];
    $quantity = $_POST['quantity'];
    $enabled = $_POST['enable'];
}


if (isset($_POST['createProduct'])) {
    // Requête mysql pour insérer des données
    $sql = "INSERT INTO `product`(`name`, `slug`, `description`, `price`, `weight`, `height`, `width`, `quantity`, `enabled`) VALUES (:nom, :slug, :description, :price, :weight, :height, :width, :quantity, :enabled)";
    $res = $pdo->prepare($sql);
    $exec = $res->execute(
        array(
            ':nom' => $name,
            ':slug' => $slug,
            ':description' => $description,
            ':price' => $price,
            ':weight' => $weight,
            ':height' => $height,
            ':width' => $width,
            ':quantity' => $quantity,
            ':enabled' => $enabled
        )
    );
    // vérifier si la requête d'insertion a réussi
    if ($exec) {
        echo 'Données insérées';
    } else {
        echo "Échec de l'opération d'insertion";
    }
} else if (isset($_POST['editProduct'])) {
    $idProduct = $_GET['idProduct'];
    // Requête mysql pour update des données
    $sql = "UPDATE `product` SET `name`=:nom, `slug`=:slug, `description`=:description, `price`=:price , `weight`=:weight, `height`=:height, `width`=:width, `quantity`=:quantity, `enabled`=:enabled WHERE `idProduct` = ".$idProduct."";
    $res = $pdo->prepare($sql);
    $exec = $res->execute(array(':nom' =>$name, ':slug' =>$slug, ':description' =>$description, ':price' =>$price , ':weight' =>$weight , ':height' =>$height, ':width' =>$width, ':quantity' =>$quantity, ':enabled' =>$enabled ));
    // vérifier si la requête d'insertion a réussi
    if ($exec) {
        echo 'Données modifiées';
    } else {
        echo "Échec de l'opération d'update";
    }
} else if (isset($_POST['supprProduct'])) {
    $idProduct = $_GET['idProduct'];
    // Requête mysql pour delete des données
    $sql = 'DELETE FROM `product` WHERE `idProduct` = '.$idProduct.'';
    $res = $pdo->prepare($sql);
    $exec = $res->execute();
    // vérifier si la requête d'insertion a réussi
    if ($exec) {
        echo 'Données supprimées';
    } else {
        echo "Échec de l'opération delete";
    }
}

