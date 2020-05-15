<?php
include('php/connect.php');
$sqlSelect = $pdo->query("SELECT * FROM `category`");
?>
<?php require "header.php"; ?>
<a href="AjoutCategorie.php?id=<?php echo $_GET['id']; ?>"  class="Ajout">
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
            <td><a href="ModifierCategorie.php?idCategory='.$donnees['idCategory'].'&id='.$_GET['id'].'"><button>Modifier</button></a></td>
			<td><form class=cell-button method="post" action="php/category.php?idCategory='.$donnees['idCategory'].'&id='.$_GET['id'].'"><button type="submit" name="supprCategory" class="suppress" id="btn_supression">Supprimer</button></form></td>
            
		</tr>
		';
        }
		$sqlSelect->closeCursor();
		?>
		</tbody>
	</table>
</div>
<?php require "footer.php"; ?>