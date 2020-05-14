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
    <form action="php/product.php" method="post">
        <label for="name">Nom :</label>
        <input type="text" id="name" name="name"><br><br>
        <label for="slug">Slug :</label>
        <input type="text" id="slug" name="slug"><br><br>
        <label for="description">Description :</label>
        <input type="text" id="description" name="description"><br><br>
        <label for="price">Prix :</label>
        <input type="number" id="price" name="price" step="0.01"><br><br>
        <label for="weight">Poids :</label>
        <input type="number" id="weight" name="weight" step="0.1"><br><br>
        <label for="height">Hauteur :</label>
        <input type="number" id="height" name="height" step="0.1"><br><br>
        <label for="width">Largeur :</label>
        <input type="number" id="width" name="width" step="0.1"><br><br>
        <label for="quantity">Quantité :</label>
        <input type="number" id="quantity" name="quantity" step="1"><br><br>
        <label for="enable">Activation :</label>
        <input type="checkbox" id="enable" name="enable" value="1"><br><br>
        <input type="submit" name="createProduct" value="Ajouter">
    </form>
</div>
</body>
</html>