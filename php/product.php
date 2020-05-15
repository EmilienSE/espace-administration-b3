<?php
include('connect.php');

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
    if (empty($_POST['enable'])) {
        $enabled = 0;
    } else {
        $enabled = $_POST['enable'];
    }


}


if (isset($_POST['createProduct'])) {
    // Requête mysql pour création produit
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
        header('location: ../Produits.php?id='.$_GET['id']);
    } else {
        echo "Échec de l'opération d'insertion";
    }

    $idProduct = $pdo->lastInsertId();

    if (!empty($_POST['categoryparent'])) {
        // Requête mysql pour link produit
        $sqlLinkProduct = "INSERT INTO `link_product_category`(`idCategory`, `idProduct`) VALUES (:idCategory, :idProduct)";
        $res = $pdo->prepare($sqlLinkProduct);
        $exec2 = $res->execute(
            array(
                ':idCategory' => $_POST['categoryparent'],
                ':idProduct' => $idProduct
            )
        );
        // vérifier si la requête d'insertion a réussi
        if ($exec2) {
            echo 'Produit lié à la catégorie';
            header('location: ../Produits.php?id='.$_GET['id']);
        } else {
            echo "Échec de l'opération d'insertion";
        }

    }
} else if (isset($_POST['editProduct'])) {
    $idProduct = $_GET['idProduct'];
    // Requête mysql pour update des données
    $sql = "UPDATE `product` SET `name`=:nom, `slug`=:slug, `description`=:description, `price`=:price , `weight`=:weight, `height`=:height, `width`=:width, `quantity`=:quantity, `enabled`=:enabled WHERE `idProduct` = ".$idProduct."";
    $res = $pdo->prepare($sql);
    $exec = $res->execute(array(':nom' =>$name, ':slug' =>$slug, ':description' =>$description, ':price' =>$price , ':weight' =>$weight , ':height' =>$height, ':width' =>$width, ':quantity' =>$quantity, ':enabled' =>$enabled ));
    // vérifier si la requête d'insertion a réussi
    if ($exec) {
        echo 'Produit modifiée';
        header('location: ../Produits.php?id='.$_GET['id']);
    } else {
        echo "Échec de l'opération d'update";
    }
    if (!empty($_POST['categoryparent'])) {
        // Requête msql pour link produit
        $sqlLinkProduct = "INSERT INTO `link_product_category`(`idCategory`, `idProduct`) VALUES (:idCategory, :idProduct)";
        $res = $pdo->prepare($sqlLinkProduct);
        $exec2 = $res->execute(
            array(
                ':idCategory' => $_POST['categoryparent'],
                ':idProduct' => $idProduct
            )
        );
        // vérifier si la requête d'insertion a réussi
        if ($exec2) {
            echo '-Produit lié à la catégorie';
            header('location: ../Produits.php?id='.$_GET['id']);
        } else {
            echo "Échec de l'opération d'insertion";
        }

    }
} else if (isset($_POST['supprProduct'])) {
    $idProduct = $_GET['idProduct'];
    // Requête mysql pour delete des données
    $sql = 'DELETE FROM `product` WHERE `idProduct` = '.$idProduct.'';
    $res = $pdo->prepare($sql);
    $exec = $res->execute();
    // vérifier si la requête d'insertion a réussi
    if ($exec) {
        echo 'Produit supprimée';
        header('location: ../Produits.php?id='.$_GET['id']);
    } else {
        echo "Échec de l'opération delete";
    }
} else if (isset($_POST['supprLink'])) {
    // Requête msql pour link produit
    $sqlSupprLink = 'DELETE FROM `link_product_category` WHERE `idLinkProductCategory` = '.$_GET['idSupprLink'].'';
    $res = $pdo->prepare($sqlSupprLink);
    $exec3 = $res->execute();
    // vérifier si la requête d'insertion a réussi
    if ($exec3) {
        echo 'Lien à la catégorie supprimer';
        header('location: ../Produits.php?id='.$_GET['id']);
    } else {
        echo "Échec de l'opération d'insertion";
    }
}