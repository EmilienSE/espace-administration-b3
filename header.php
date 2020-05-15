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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" type="text/css" rel="stylesheet">
</head>
<body id="body">
<header>
    <a href="index.php"><h2>Espace Administration</h2></a>
    <span>
        <a href="php/deconnexion.php" style="font-size: 3em; color: Crimson; margin-right: 15px"><i class="fas fa-power-off"></i></a>
    </span>
</header>
<?php if (isset($_GET['id']) && $_GET['id'] > 0) {

?>
<nav>
	<a href="Categories.php?id=<?php echo $_GET['id']; ?>">Catégories</a> | <a href="Produits.php?id=<?php echo $_GET['id']; ?>">Produits</a>
</nav>

<?php } else {
	//echo "<script type='text/javascript'>document.location.replace('index.php');</script>";
} ?>