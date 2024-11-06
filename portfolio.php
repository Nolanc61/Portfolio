<?php
echo '<!DOCTYPE html>';
echo '<html>';
echo '<head>';
echo '<title>Mon Portfolio</title>';
echo '<link rel="stylesheet" type="text/css" href="assets/css/portfolio.css">';
echo '</head>';
echo '<body>';

require_once("C:/xampp/htdocs/YAML/yaml/yaml.php");
$data = yaml_parse_file('portfolio.yaml');
?>
<header>
<nav class="navbar">
  <ol>
    <li><a href="#accueil">ACCUEIL</a></li>
    <li><a href="#competences">COMPETENCES</a></li>
    <li><a href="#realisations">REALISATIONS</a></li>
    <li><a href="#formations">FORMATIONS</a></li>
    <li><a href="#contact">CONTACT</a></li>
  </ol>
</nav>
</header>

<?php
echo "<section>";
echo "<h1 id='accueil'>Accueil</h1>\n";
echo "<h2>".$data['accueil']['nom']." ".$data['accueil']['prenom']."</h2>\n";
echo "<p>".$data['accueil']['accroche']."</p>\n";
echo "<p>".$data['accueil']['presentation']."</p>\n";
echo "</section>";

echo "<section>";
echo "<h1 id='competences'>Compétences</h1>\n";

foreach ($data['competences']['domaines'] as $domaine) {
    echo "<h3>".$domaine['nom']."</h3>\n";
    echo "<ul>\n";

    foreach ($domaine['items'] as $item) {
        echo "<li>".$item['nom']." : ";

        // Vérifie si c'est un item de certification
        if ($domaine['nom'] == 'Certifications') {
            // Affiche les certifications sans niveau
            echo $item['organisation']." (".$item['date'].")\n";
        } else {
            // Vérifie si le niveau existe
            if (isset($item['niveau'])) {
                // Affichage du niveau sous forme d'étoiles
                $niveau = $item['niveau'];
                $niveauNum = 0;

                // Convertir le niveau en nombre d'étoiles
                switch ($niveau) { // comme un for
                    case 'Débutant': // if 'Débutant'
                        $niveauNum = 1;
                        break;
                    case 'Connaissances de base':
                        $niveauNum = 2;
                        break;
                    case 'Intermédiaire':
                        $niveauNum = 3;
                        break;
                    case 'Avancé':
                        $niveauNum = 4;
                        break;
                    case 'Expert':
                        $niveauNum = 5;
                        break;
                    default:
                        $niveauNum = 0;
                        break;
                }

                // Affichage des étoiles
                for ($i = 1; $i <= 5; $i++) {
                    if ($i <= $niveauNum) {
                        echo "★";
                    } else {
                        echo "☆";
                    }
                }
            }
        }
        echo "</li>\n";
    }
    
    echo "</ul>\n";
}

echo "</section>";

echo "<section>";
echo "<h1 id='realisations'>Réalisations</h1>\n";
echo "<h2>".$data['realisations']['titre']."</h2>\n";
echo "<p>".$data['realisations']['description']."</p>\n";
// ensuite mettre *illustration et *documents qui ne sont pas du texte
// si plusieurs réalisations, mettre une boucle for
echo "</section>";

echo "<section>";
echo "<h1 id='formations'>Formations</h1>\n";
foreach ($data['formations'] as $formation) {
    echo "<h3>".$formation['nom']." - ".$formation['etablissement']."</h3>\n";
    echo "<p>".$formation['date_debut']."-" .$formation['date_fin']."</p>\n";
    echo "<p>".$formation['lieu']."</p>\n";
    echo "<p>".nl2br($formation['contenu'])."</p>\n";
}
echo "</section>";

echo "<section>";
echo "<h1 id='contact'>Contact</h1>\n";

echo "</section>";

echo '</body>';
echo '</html>';
?>
