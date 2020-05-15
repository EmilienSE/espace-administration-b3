<?php
include('php/connect.php');
$sqlSelect = $pdo->query("SELECT `idCategory`, `name` FROM `category`");
?>
<?php require "header.php"; ?>
<div class="container-form">
    <div class="Content">
        <h3>Ajouter une Catégorie</h3>
        <form id="form-content" method="post" action="php/category.php?id=<?php echo $_GET['id'] ?>">
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name" required>
            <label for="slug">Slug :</label>
            <input type="text" id="slug" name="slug" required>
            <label for="description">Description :</label>
            <input type="text" id="description" name="description" required>
            <label for="categoryparent">Catégorie parente</label>
	        <select id="categoryparent" name="categoryparent">
		        <option name="option" value="">Accueil</option>
                <?php
                while ($donnees = $sqlSelect->fetch()) {
                    echo '<option name="option" value="'.$donnees['idCategory'].'">'.$donnees['name'].'</option>';
                }
                $sqlSelect->closeCursor();
                ?>
            </select>
            <div class="activation">
                <label for="enable">Activation :</label>
                <input type="checkbox" id="enable" name="enable" value="1">
            </div>
            <input type="hidden" name="createCategory">
            <input type="submit" value="Ajouter">
            <form>
        </form>
    </div>
</div>
<?php require "footer.php"; ?>