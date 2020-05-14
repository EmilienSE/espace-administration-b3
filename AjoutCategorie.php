<?php
include('php/index.php');
$sqlSelect = $pdo->query("SELECT `idCategory`, `name` FROM `category`");
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
        <form action="php/category.php" method="post">
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name"><br><br>
            <label for="slug">Slug :</label>
            <input type="text" id="slug" name="slug"><br><br>
            <label for="description">Description :</label>
            <input type="text" id="description" name="description"><br><br>
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
            <input type="submit" name="createCategory" value="Ajouter">
        </form>
    </div>
</body>
</html>