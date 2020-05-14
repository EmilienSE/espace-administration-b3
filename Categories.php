<?php
include('php/index.php');
$sqlSelect = $pdo->query("SELECT * FROM `category`");
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
	<a href="Categories.php">Catégories</a> | <a href="Produits.php">Produits</a>
</nav>
<a href="AjoutCategorie.php">
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
            <td><form method="post" action="php/category.php.php?idCategory='.$donnees['idCategory'].'"><button type="submit" name="supprCategory">Supprimer</button></form></td>
            
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