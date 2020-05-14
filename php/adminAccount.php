<?php
include('connect.php');
$tableau = array();
if (isset($_POST['mail']) || isset($_POST['password'])) {
    $mail = $_POST['mail'];
    $password = $_POST['password'];
 	
 	// Requête mysql de connexion
    $sql = "SELECT `mail`, `password` FROM `admin_account` WHERE `enabled`=1 AND `mail`=:mail AND `password`=:password";

    $stmt = $pdo->prepare($sql);
	$stmt->bindParam(':mail', $mail);
	$stmt->bindParam(':password', $password);
	$result = $stmt->execute();

	if($result){
		$result->fetchAll(PDO::FETCH_ASSOC);
		$true_pwd = $tableau[1]['password'];
			if(password_verify($password, $true_pwd)){
				echo "Connexion effectuée !";
			}else{
				echo "Mot de passe ou mail incorrects !";
	}
	  
