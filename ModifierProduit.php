<!DOCTYPE html>
<html>
    <head>
        <title>Espace Administration</title>
        <link href="./resources/css/index.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <header>
            <h2>Espace Administration</h2>
        </header>
        <nav>
            <a href="/EspaceAdministration/Categories.html/">Catégories</a> |
            <a href="/EspaceAdministration/Produits.html/">Produits</a>
        </nav>

        <div class="Content">
            <form>
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
                <label for="enable">Activation :</label>
                <input type="checkbox" id="enable" name="enable" value="1"><br><br>
                <input type="submit" value="Modifier">
            </form>
        </div>
    </body>
</html>