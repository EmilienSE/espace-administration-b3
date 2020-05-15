<?php
include('php/connect.php');
$sqlSelect = $pdo->query("SELECT * FROM `category`");
?>
<?php require "header.php"; ?>
<nav>
	<a href="Categories.php">Catégories</a> | <a href="Produits.php">Produits</a>
</nav>
<a href="AjoutCategorie.php"  class="Ajout">
	<button class="Gestion">Ajouter une catégorie</button>
</a>
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
        <?php

        while ($donnees = $sqlSelect->fetch()) {
        	echo ' 
		<tr>
                
            <td><span>'.$donnees['idCategory'].'</span></td>
            <td><span>'.$donnees['name'].'</span></td>
            <td><span>'.$donnees['slug'].'</span></td>
            <td><span>'.$donnees['description'].'</span></td>
            <td><span>'.$donnees['enabled'].'</span></td>
            <td><a href="ModifierCategorie.php?idCategory='.$donnees['idCategory'].'"><button>Modifier</button></a></td>
			<td><form class=cell-button id="form-content" method="post" data-action="php/category.php?idCategory='.$donnees['idCategory'].'"><button type="submit" name="supprCategory" class="suppress" id="btn_supression">Supprimer</button></form></td>
            
		</tr>
		';
        }
		$sqlSelect->closeCursor();
		?>
		</tbody>
	</table>
</div>
<?php require "footer.php"; ?>