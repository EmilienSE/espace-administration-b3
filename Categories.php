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

        <a href="/EspaceAdministration/AjoutCategorie.html/"><button class="Gestion">Ajouter une catégorie</button></a>

        <div class="Content">
            <table>
                <thead>
                <tr>
                    <th><span>Id</span></th>
                    <th><span>Nom</span></th>
                    <th><span>Slug</span></th>
                    <th><span>Description</span></th>
                    <th><span>État</span></th>
                    <th><span>Modifier</span></th>
                    <th><span>Supprimer</span></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><span>1</span></td>
                    <td><span>Chaussettes</span></td>
                    <td><span>www.boutique.com/chaussettes</span></td>
                    <td><span>Lorem Ipsum</span></td>
                    <td><span>Désactivé</span></td>
                    <td><a href="/EspaceAdministration/ModifierCategorie.html/"><button>Modifier</button></a></td>
                    <td><button>Supprimer</button></td>
                </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>