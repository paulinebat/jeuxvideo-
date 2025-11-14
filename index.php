<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>CRUD Jeux Vidéo</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Ajouter des jeux</h1>

  <?php
    require 'db.php'; 
    $genre = $pdo->query("SELECT Genre_Id, Genre_Titre FROM genre")->fetchAll();
    $plateformes = $pdo->query("SELECT Plateforme_Id, Plateforme_Nom FROM plateforme")->fetchAll();
  ?>

  <form action="create.php" method="POST">
    <!-- Nom des jeux -->
    <input type="text" name="jeux_titre" placeholder="Nom" required>
    <!-- Prix -->
    <input type="number" name="jeux_prix" placeholder="Prix">
    <!-- Menu déroulant des types de plateforme -->
    <select name="plateforme_id" required>
      <option value="">Plateforme</option>
      <?php foreach ($plateformes as $plateforme): ?>
        <option value="<?= htmlspecialchars($plateforme['Plateforme_Id']) ?>">
          <?= htmlspecialchars($plateforme['Plateforme_Nom']) ?>
        </option>
      <?php endforeach; ?>
    </select>
    <!-- Menu déroulant des genres -->
    <select name="genre_id" required>
      <option value="">Genre</option>
      <?php foreach ($genre as $genre): ?>
        <option value="<?= htmlspecialchars($genre['Genre_Id']) ?>">
          <?= htmlspecialchars($genre['Genre_Titre']) ?>
        </option>
      <?php endforeach; ?>
    </select>
    <!-- Pays d'origine -->
    <input type="text" name="pays_origine" placeholder="Pays d'origine">
    <button type="submit">Ajouter</button>
  </form>

  <h2>Liste des jeux</h2>
  <?php
require 'db.php';
$jeux = $pdo->query("
  SELECT jeux.Jeux_Titre AS titre, 
        plateforme.Plateforme_Nom AS plateforme, 
        jeux.Jeux_Prix AS prix, 
        jeux.Jeux_PaysOrigine AS origine, 
        genre.Genre_Titre AS genre
  FROM jeux
  JOIN plateforme ON plateforme.Plateforme_Id = plateforme.Plateforme_Id
  JOIN genre ON genre.Genre_Titre = genre.Genre_Titre
  ")->fetchAll();

foreach ($jeux as $jeu) {
  $Jeux_Titre = $jeu['titre'] ?? 'Nom inconnu';
  $Jeux_Prix = $jeu['prix'] ?? 'Prix Inconnu';
  $Plateforme_Nom = $jeu['plateforme'] ?? 'Plateforme inconnue';
  $Genre_Titre = $jeu['genre'] ?? 'Genre inconnu';
  $Jeux_PaysOrigine = $jeu['origine'] ?? 'Pays Inconnu';

  echo "<p><strong>" 
  . htmlspecialchars($Jeux_Titre) . "</strong> – " 
  . htmlspecialchars($Jeux_Prix) ." | "
  . htmlspecialchars($Plateforme_Nom) ." | "
  . htmlspecialchars($Genre_Titre) ." | "
  . htmlspecialchars($Jeux_PaysOrigine) ."
  </p>";
}
?>
</body>
</html>

