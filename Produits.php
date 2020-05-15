<?php
include('php/connect.php');
$sqlSelect = $pdo->query("SELECT * FROM `product`");
?>
<?php require "header.php"; ?>
        <nav>
            <a href="Categories.php">Catégories</a> |
            <a href="Produits.php">Produits</a>
        </nav>

        <a href="AjoutProduit.php" class="Ajout"><button class="Gestion">Ajouter un produit</button></a>

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
		            <td><form class="cell-button" method="post" action="php/product.php?idProduct='.$donnees['idProduct'].'"><button type="submit" name="supprProduct" id="btn_supression">Supprimer</button></form></td>
		            
				</tr>
				';
                }
                $sqlSelect->closeCursor();
                ?>
                </tbody>
            </table>
        </div>
        <?php require "footer.php"; ?>