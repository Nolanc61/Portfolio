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

  <nav class="navbar">
      <ol>
          <li><a href="#accueil"><?php echo $data['menu']['accueil']?></a></li>
          <li><a href="#competences"><?php echo $data['menu']['competences']?></a></li>
          <li><a href="#realisations"><?php echo $data['menu']['realisations']?></a></li>
          <li><a href="#formations"><?php echo $data['menu']['formations']?></a></li>
          <li><a href="#contact"><?php echo $data['menu']['contact']?></a></li>
      </ol>
  </nav>

<?php include("./pages/accueil.php"); ?>
<?php include("./pages/competences.php"); ?>
<?php include("./pages/realisations.php"); ?>
<?php include("./pages/formations.php"); ?>
<?php include("./pages/contact.php"); ?>

</body>
</html>
