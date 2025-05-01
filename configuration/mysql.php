<?php
try {
    $mysqlClient = new PDO('mysql:host=localhost;dbname=learn_cyber;charset=utf8', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// On récupère tout le contenu de la table tutorials
$sqlQuery = "SELECT titlee, link, author FROM tutorials WHERE author =:author AND is_enabled = :is_enabled";
$tutorialsStatement = $mysqlClient->prepare($sqlQuery);
$tutorialsStatement->execute([
    'author' => 'lisa.cyber97@google.com',
    'is_enabled' => 1,
]);
$tutorials = $tutorialsStatement->fetchAll();

// On affiche chaque recette une à une
foreach ($tutorials as $tutorial) {
?>
<h3><?php echo $tutorial['title']; ?></h3>
<p><?php echo $tutorial['link']; ?></p>
<a><?php echo $tutorial['author']; ?></a>
</br>
<?php
}