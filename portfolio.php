<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>portfolio</title>
  <link rel="stylesheet" href="./assets/css/portfolio.css">
</head>
<body>

<?php
require_once("C:/xampp/htdocs/YAML/yaml/yaml.php");
$data = yaml_parse_file('portfolio.yaml');
?>

<header>
    <h1>Portfolio</h1>
</header>
<nav class="navbar">
    <ol>
        <li><a href="#accueil">ACCUEIL</a></li>
        <li><a href="#competences">COMPETENCES</a></li>
        <li><a href="#realisations">REALISATIONS</a></li>
        <li><a href="#formations">FORMATIONS</a></li>
        <li><a href="#contact">CONTACT</a></li>
    </ol>
</nav>

<?php include('includes/accueil.php'); ?>
<?php include('includes/competences.php'); ?>
<?php include('includes/realisations.php'); ?>
<?php include('includes/formations.php'); ?>
<?php include('includes/contact.php'); ?>

</body>
</html>
