<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>portfolio</title>
    <link rel="stylesheet" href="./assets/css/portfolio.css">
</head>
<body>

<?php
require_once("vendor/autoload.php");

use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;

try {
    $accueilData = Yaml::parseFile('yaml/accueil.yaml');
    $competencesData = Yaml::parseFile('yaml/competences.yaml');
    $realisationsData = Yaml::parseFile('yaml/realisations.yaml');
    $formationsData = Yaml::parseFile('yaml/formations.yaml');
    $contactData = Yaml::parseFile('contact.yaml');
} catch (Exception $e) {
    die("Erreur : Impossible de lire un fichier YAML. " . $e->getMessage());
}
?>

<header>
    <nav class="navbar">
        <ol>
            <li><a href="#accueil"><?php echo $accueilData['menu']['accueil'] ?? 'Accueil'; ?></a></li>
            <li><a href="#competences"><?php echo $accueilData['menu']['competences'] ?? 'Compétences'; ?></a></li>
            <li><a href="#realisations"><?php echo $accueilData['menu']['realisations'] ?? 'Réalisations'; ?></a></li>
            <li><a href="#formations"><?php echo $accueilData['menu']['formations'] ?? 'Formations'; ?></a></li>
            <li><a href="#contact"><?php echo $accueilData['menu']['contact'] ?? 'Contact'; ?></a></li>
        </ol>
    </nav>
</header>

<?php include("./pages/accueil.php"); ?>
<?php include("./pages/competences.php"); ?>
<?php include("./pages/realisations.php"); ?>
<?php include("./pages/formations.php"); ?>
<?php include("./pages/contact.php"); ?>

</body>
</html>
