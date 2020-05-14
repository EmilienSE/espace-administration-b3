<?php
include('php/index.php');
$sqlSelect = $pdo->query("SELECT * FROM `product`");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
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

        <a href="AjoutProduit.php"><button class="Gestion">Ajouter un produit</button></a>

        <div class="Content">
            <table>
                <thead>
                <tr>
                    <th><span>Id</span></th>
                    <th><span>Nom</span></th>
                    <th><span>Slug</span></th>
                    <th><span>Description</span></th>
                    <th><span>Prix</span></th>
                    <th><span>Poids</span></th>
                    <th><span>Hauteur</span></th>
                    <th><span>Largeur</span></th>
                    <th><span>Quantité</span></th>
                    <th><span>État</span></th>
                    <th><span>Modifier</span></th>
                    <th><span>Supprimer</span></th>
                </tr>
                </thead>
                <tbody>
                <?php
                while ($donnees = $sqlSelect->fetch()) {
                    echo ' 
				<tr>
		                
		            <td><span>'.$donnees['idProduct'].'</span></td>
		            <td><span>'.$donnees['name'].'</span></td>
		            <td><span>'.$donnees['slug'].'</span></td>
		            <td><span>'.$donnees['description'].'</span></td>
		            <td><span>'.$donnees['price'].'</span></td>
		            <td><span>'.$donnees['weight'].'</span></td>
		            <td><span>'.$donnees['height'].'</span></td>
		            <td><span>'.$donnees['width'].'</span></td>
		            <td><span>'.$donnees['quantity'].'</span></td>
		            <td><span>'.$donnees['enabled'].'</span></td>
		            <td><a href="ModifierProduit.php?idProduct='.$donnees['idProduct'].'"><button>Modifier</button></a></td>
		            <td><form method="post" action="php/product.php?idProduct='.$donnees['idProduct'].'"><button type="submit" name="supprProduct">Supprimer</button></form></td>
		            
				</tr>
				';
                }
                $sqlSelect->closeCursor();
                ?>
                </tbody>
            </table>
        </div>
    </body>
</html>