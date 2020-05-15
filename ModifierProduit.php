<?php
include('php/connect.php');
$sqlSelect = $pdo->query("SELECT `idCategory`, `name` FROM `category`");
$sqlSelectLinkCategory = $pdo->query(
    "SELECT l.*, c.* FROM `link_product_category` AS l, `category` AS  c WHERE l.idProduct = ".$_GET['idProduct']." AND c.idCategory = l.idCategory"
);
$sqlSelect2 = $pdo->query("SELECT * FROM `product` WHERE `idProduct` = ".$_GET['idProduct']."");
?>
<?php require "header.php"; ?>
	<div class="container-form">
		<div class="Content">
			<h3>Modifier un produit</h3>
            <?php
            while ($donnees2 = $sqlSelectLinkCategory->fetch()) {
                echo '<div class="cell-inside"><label id="idLink"> Catégorie actuelle : '.$donnees2['name'].'</label>
			<form class="cell-button" method="post" onclick="return confirm(\'Êtes-vous sûr de vouloir supprimer ?\');" action="php/product.php?idSupprLink='.$donnees2['idLinkProductCategory'].'&id='.$_GET['id'].'"><button name="supprLink" id="btn_supression" value="'.$donnees2['idLinkProductCategory'].'">Supprimer</button></form></div>';
            }
            $sqlSelectLinkCategory->closeCursor();
            ?>
			<form id="form-content" method="post" action="php/product.php?idProduct=<?php echo $_GET['idProduct'] ?>&id=<?php echo $_GET['id']; ?>">
                <?php
                while ($donnees3 = $sqlSelect2->fetch()) {
                    echo '
				<div class="column">
				<div class="column-inside">
                <label for="name">Nom :</label>
	            <input type="text" id="name" name="name" value="'.$donnees3['name'].'" required><br><br>
	            <label for="slug">Slug :</label>
	            <input type="text" id="slug" name="slug" value="'.$donnees3['slug'].'" required><br><br>
	            <label for="description">Description :</label>
	            <input type="text" id="description" name="description" value="'.$donnees3['description'].'" required><br><br>
	            <label for="price">Prix :</label>
	            <input type="number" id="price" name="price" value="'.$donnees3['price'].'" step="0.01" required><br><br>
	            <label for="weight">Poids :</label>
				<input type="number" id="weight" name="weight" value="'.$donnees3['weight'].'" step="0.1" required><br><br>
				</div>
				<div class="column-inside">
	            <label for="height">Hauteur :</label>
	            <input type="number" id="height" name="height" value="'.$donnees3['height'].'" step="0.1" required><br><br>
	            <label for="width">Largeur :</label>
	            <input type="number" id="width" name="width" value="'.$donnees3['width'].'" step="0.1" required><br><br>
	            <label for="quantity">Quantité :</label>
	            <input type="number" id="quantity" name="quantity" value="'.$donnees3['quantity'].'" step="1" required><br><br>
                
                ';
                }
                $sqlSelect2->closeCursor();
                ?>
				<label for="categoryparent">Catégorie</label> <select id="categoryparent" name="categoryparent">
                    <?php
                    while ($donnees = $sqlSelect->fetch()) {
                        echo '
                    <option name="option" value="'.$donnees['idCategory'].'">'.$donnees['name'].'</option>';
                    }
                    $sqlSelect->closeCursor();
                    ?>
				</select> <label for="enable">Activation :</label>
				<input type="checkbox" id="enable" name="enable" value="1">
				<?php echo '</div></div>'?>
				<input type="submit" name="editProduct" value="Modifier">
			</form>
		</div>
	</div>
<?php require "footer.php"; ?>