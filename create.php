<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nom = $_POST['nom'];
  $genre = $_POST['genre'];

  $stmt = $pdo->prepare("INSERT INTO utilisateurs (nom, email) VALUES (?, ?)");
  $stmt->execute([$nom, $email]);

  header("Location: index.php"); // Recharge la liste
  exit();
}
?>

