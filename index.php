<!-- index.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>CRUD Jeux Vidéo</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Ajouter un utilisateur</h1>

  <form action="create.php" method="POST">
    <input type="text" name="nom" placeholder="Nom" required>
    <input type="text" name="genre" placeholder="Genre" required>
    <button type="submit">Ajouter</button>
  </form>

  <h2>Liste des utilisateurs</h2>
  <?php
    require 'db.php';
    $users = $pdo->query("SELECT * FROM utilisateurs")->fetchAll();

    foreach ($users as $user) {
      echo "<p><strong>" . htmlspecialchars($user['nom']) . "</strong> – " . htmlspecialchars($user['email']) . "</p>";
    }
  ?>
</body>
</html>

