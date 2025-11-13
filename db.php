<?php
$host = 'localhost'; // ou l'IP si ta base est distante
$dbname = 'jeuxvideo'; // le nom de ta base dans DBeaver
$username = 'root'; // ou ton identifiant
$password = 'root';     // ton mot de passe MySQL

try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
} catch (PDOException $e) {
  die("Erreur de connexion : " . $e->getMessage());
}
?>
