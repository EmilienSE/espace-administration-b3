<?php
try {
    // se connecter à mysql
    $pdo = new PDO('mysql: host=localhost;dbname=b3-boutique;port=3306','root','MirroR3flect001#!');
} catch (PDOException $exc) {
    echo $exc->getMessage();
    exit();
}
