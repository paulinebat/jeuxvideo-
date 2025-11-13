<?php
$host = 'localhost'; // l'IP 
$dbname = 'jeuxvideo'; // le nom de la base dans DBeaver
$username = 'root'; // identifiant
$password = 'root';     // mot de passe MySQL

try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
} catch (PDOException $e) {
  die("Erreur de connexion : " . $e->getMessage());
}
?>
