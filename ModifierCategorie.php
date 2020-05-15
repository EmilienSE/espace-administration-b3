<?php
include('php/connect.php');
$sqlSelect = $pdo->query("SELECT * FROM `category`");
$sqlSelect2 = $pdo->query("SELECT * FROM `category` WHERE `idCategory` = ".$_GET['idCategory']."");
?>
<?php require "header.php"; ?>
    <nav>
        <a href="Categories.php">Catégories</a> |
        <a href="Produits.php">Produits</a>
    </nav>
<div class="container-form">
    <div class="Content">
        <h3>Modifier catégorie</h3>
        <form id="form-content" method="post" data-action="php/category.php?idCategory=<?php echo $_GET['idCategory']?>">
            <label for="name">Nom :</label>
            <?php
                while ($donnees = $sqlSelect2->fetch()) {
                    echo '<input type="text" id="name" name="name" value="'.$donnees['name'].'"><br><br>';
                    echo '<label for="slug">Slug :</label>';
                    echo '<input type="text" id="slug" name="slug" value="'.$donnees['slug'].'"><br><br>';
                    echo '<label for="description">Description :</label>';
                    echo '<input type="text" id="description" name="description" value="'.$donnees['description'].'"><br><br>';
                }
                $sqlSelect2->closeCursor();
                ?>
	        <select id="categoryparent" name="categoryparent">
                <?php
                while ($donnees = $sqlSelect->fetch()) {
                    echo '<option name="option" value="'.$donnees['idCategory'].'">'.$donnees['name'].'</option>';
                }
                $sqlSelect->closeCursor();
                ?>
	        </select>
            <label for="enable">Activation :</label>
            <input type="checkbox" id="enable" name="enable" value="1"><br><br>
            <input type="hidden" name="editCategory">
            <input type="submit" value="Modifier">
        </form>
    </div>
</div>
<?php require "footer.php"; ?>