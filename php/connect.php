<?php
  $host_name = 'db5000455838.hosting-data.io';
  $database = 'dbs436544';
  $user_name = 'dbu770980';
  $password = 'Testb3dev_';
  $pdo = null;

  try {
    $pdo = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
  } catch (PDOException $e) {
    echo "Erreur!: " . $e->getMessage() . "<br/>";
    die();
  }
?>