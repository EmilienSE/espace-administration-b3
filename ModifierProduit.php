<?php
include('php/connect.php');
$sqlSelect = $pdo->query("SELECT `idCategory`, `name` FROM `category`");
$sqlSelectLinkCategory = $pdo->query("SELECT l.*, c.* FROM `link_product_category` AS l, `category` AS  c WHERE l.idProduct = ".$_GET['idProduct']." AND c.idCategory = l.idCategory");
?>
<?php require "header.php"; ?>
<nav>
    <a href="Categories.php">Catégories</a> |
    <a href="Produits.php">Produits</a>
</nav>
<div class="container-form">
    <div class="Content">
        <h3>Modifier un produit</h3>
        
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
                    echo '<div class="cell-inside"><label id="idLink"> Catégorie actuelle:  '.$donnees2['name'].'</label>
                        <a href="php/product.php?idSupprLink='.$donnees2['idLinkProductCategory'].'" class="cell-button" ><button name="supprLink" id="btn_supression" value="'.$donnees2['idLinkProductCategory'].'">Supprimer</button></a></div>';
                }
                $sqlSelectLinkCategory->closeCursor();
                ?>
            <label for="categoryparent">Catégorie</label>    
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
</div>
<?php require "footer.php"; ?>