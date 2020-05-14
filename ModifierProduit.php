<?php
include('php/connect.php');
$sqlSelect = $pdo->query("SELECT `idCategory`, `name` FROM `category`");
$sqlSelectLinkCategory = $pdo->query("SELECT l.*, c.* FROM `link_product_category` AS l, `category` AS  c WHERE l.idProduct = ".$_GET['idProduct']." AND c.idCategory = l.idCategory");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Espace Administration</title>
    <link href="resources/css/index.css" type="text/css" rel="stylesheet">
</head>
<body>
<header>
    <h2>Espace Administration</h2>
</header>
<nav>
    <a href="Categories.php">Catégories</a> |
    <a href="Produits.php">Produits</a>
</nav>

<div class="Content">
    
    
    <form id="form-content" method="post" data-action="php/product.php?idProduct=<?php echo $_GET['idProduct']?>">
        <label for="name">Nom :</label>
        <input type="text" id="name" name="name" value="Chaussettes rouges domyos"><br><br>
        <label for="slug">Slug :</label>
        <input type="text" id="slug" name="slug" value="www.boutique.com/chaussettes/Chaussettes-rouges-domyos"><br><br>
        <label for="description">Description :</label>
        <input type="text" id="description" name="description" value="Lorem Ipsum"><br><br>
        <label for="price">Prix :</label>
        <input type="number" id="price" name="price" value="50.00" step="0.01"><br><br>
        <label for="weight">Poids :</label>
        <input type="number" id="weight" name="weight" value="0.200" step="0.1"><br><br>
        <label for="height">Hauteur :</label>
        <input type="number" id="height" name="height" value="0.20" step="0.1"><br><br>
        <label for="width">Largeur :</label>
        <input type="number" id="width" name="width" value="0.20" step="0.1"><br><br>
        <label for="quantity">Quantité :</label>
        <input type="number" id="quantity" name="quantity" value="120" step="1"><br><br>
            <?php
            while ($donnees2 = $sqlSelectLinkCategory->fetch()) {
                echo '<div id="idLink"> Catégorie:  '.$donnees2['name'].'</div>
                    <a href="php/product.php?idSupprLink='.$donnees2['idLinkProductCategory'].'" ><button name="supprLink" value="'.$donnees2['idLinkProductCategory'].'">Supprimer</button></a>
';
            }
            $sqlSelectLinkCategory->closeCursor();
            ?>
        <select id="categoryparent" name="categoryparent">
            <option name="option" value="default"></option>
            <?php
            while ($donnees = $sqlSelect->fetch()) {
                echo '
                <option name="option" value="'.$donnees['idCategory'].'">'.$donnees['name'].'</option>';
            }
            $sqlSelect->closeCursor();
            ?>
        </select>
        <label for="enable">Activation :</label>
        <input type="checkbox" id="enable" name="enable" value="1"><br><br>
        <input type="submit" name="editProduct" value="Modifier">
    </form>
</div>
</body>
</html>