<!-- index.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>CRUD Jeux Vidéo</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Ajouter des jeux</h1>

  <form action="create.php" method="POST">
    <input type="text" name="nom" placeholder="Nom" required>
    <input type="text" name="genre" placeholder="Genre" required>
    <button type="submit">Ajouter</button>
  </form>

  <h2>Liste des jeux</h2>
  <?php
require 'db.php';
$jeux = $pdo->query("
  SELECT jeux.Jeux_Titre AS titre, genre.Genre_Id AS genre
  FROM jeux
  JOIN genre ON jeux.Genre_Id = genre.Genre_Id
")->fetchAll();


foreach ($jeux as $jeu) {
  $Jeux_Titre = $jeu['titre'] ?? 'Nom inconnu';
  $Genre_Id = $jeu['genre'] ?? 'Genre inconnu';

  echo "<p><strong>" . htmlspecialchars($Jeux_Titre) . "</strong> – " . htmlspecialchars($Genre_Id) . "</p>";
}
?>
</body>
</html>

