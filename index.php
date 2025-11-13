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
    <input type="text" name="jeux_titre" placeholder="Nom" required>
    <input type="number" name="jeux_prix" placeholder="Prix">
    <input type="text" name="plateforme_nom" placeholder="Plateforme">
    <input type="text" name="pays_origine" placeholder="Pays d'origine">
    <button type="submit">Ajouter</button>
  </form>

  <h2>Liste des jeux</h2>
  <?php
require 'db.php';
$jeux = $pdo->query("
  SELECT jeux.Jeux_Titre AS titre, plateforme.Plateforme_Nom AS plateforme, jeux.Jeux_Prix AS prix, jeux.Jeux_PaysOrigine AS origine
  FROM jeux
  JOIN plateforme ON plateforme.Plateforme_Nom = plateforme.Plateforme_Nom
  ")->fetchAll();


foreach ($jeux as $jeu) {
  $Jeux_Titre = $jeu['titre'] ?? 'Nom inconnu';
  $Jeux_Prix = $jeu['prix'] ?? 'Prix Inconnu';
  $Plateforme_Nom = $jeu['plateforme'] ?? 'Plateforme inconnue';
  $Jeux_PaysOrigine = $jeu['origine'] ?? 'Pays Inconnu';

  echo "<p><strong>" 
  . htmlspecialchars($Jeux_Titre) . "</strong> – " 
  . htmlspecialchars($Jeux_Prix) ." | "
  . htmlspecialchars($Plateforme_Nom) ." | "
  . htmlspecialchars($Jeux_PaysOrigine) ."
  </p>";
}
?>
</body>
</html>


