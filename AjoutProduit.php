<?php
include('php/connect.php');
$sqlSelect = $pdo->query("SELECT idCategory, name FROM category");
?>
<?php require "header.php"; ?>

<div class="container-form">
    <div class="Content">
        <h3>Ajouter un produit</h3>
        <form id="form-content" method="post" action="php/product.php?id=<?php echo $_GET['id'] ?>">
        <div class="column">
            <div class="column-inside">
                <label for="name">Nom :</label>
                <input type="text" id="name" name="name" required>
                <label for="slug">Slug :</label>
                <input type="text" id="slug" name="slug" required>
                <label for="description">Description :</label>
                <input type="text" id="description" name="description" required>
                <label for="price">Prix :</label>
                <input type="number" id="price" name="price" step="0.01" required>
                <label for="weight">Poids :</label>
                <input type="number" id="weight" name="weight" step="0.1" required>
            
            </div>
            <div class="column-inside">
                <label for="height">Hauteur :</label>
                <input type="number" id="height" name="height" step="0.1" required>
                <label for="width">Largeur :</label>
                <input type="number" id="width" name="width" step="0.1" required>
                <label for="quantity">Quantité :</label>
                <input type="number" id="quantity" name="quantity" step="1" required>
                <label for="categoryparent">Catégorie</label>
                <select id="categoryparent" name="categoryparent">
                    <?php
                    while ($donnees = $sqlSelect->fetch()) {
                        echo '<option name="option" value="'.$donnees['idCategory'].'">'.$donnees['name'].'</option>';
                    }
                    $sqlSelect->closeCursor();
                    ?>
                </select>
                
                    <label for="enable">Activation :</label>
                    <input type="checkbox" id="enable" name="enable" value="1">
                
            
            </div>
        </div>
            <input type="hidden" name="createProduct">
            <input type="submit" value="AJOUTER">
        </form>
    </div>
</div>
<?php require "footer.php"; ?>