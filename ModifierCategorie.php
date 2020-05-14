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
                <input type="text" id="name" name="name" value="Chaussette"><br><br>
                <label for="slug">Slug :</label>
                <input type="text" id="slug" name="slug" value="www.boutique.com/chaussettes"><br><br>
                <label for="description">Description :</label>
                <input type="text" id="description" name="description" value="Lorem Ipsum"><br><br>
                <label for="enable">Activation :</label>
                <input type="checkbox" id="enable" name="enable" value="1"><br><br>
                <input type="submit" value="Modifier">
            </form>
        </div>
    </body>
</html>