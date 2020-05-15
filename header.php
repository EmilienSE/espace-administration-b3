<?php
include('php/connect.php');

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $getid = (int)$_GET['id'];
    $requser = $pdo->prepare('SELECT * FROM admin_account WHERE idAdminAccount = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Espace Administration</title>
    <link href="resources/css/index.css" type="text/css" rel="stylesheet">
</head>
<body id="body">
<header>
    <a href="index.php"><h2>Espace Administration</h2></a>
</header>
<?php if (isset($_GET['id']) && $_GET['id'] > 0) {

?>
<nav>
	<a href="php/deconnexion.php"> se déconnecter</a>
	<a href="Categories.php?id=<?php echo $_GET['id']; ?>">Catégories</a> | <a href="Produits.php?id=<?php echo $_GET['id']; ?>">Produits</a>
</nav>

<?php } else {
	//echo "<script type='text/javascript'>document.location.replace('index.php');</script>";
} ?>