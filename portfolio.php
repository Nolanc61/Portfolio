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
echo "<section id='accueil'>";
echo "<h1>Accueil</h1>\n";
echo "<h2>".$data['accueil']['nom']." ".$data['accueil']['prenom']."</h2>\n";
echo "<p>".$data['accueil']['accroche']."</p>\n";
echo "<p>".$data['accueil']['presentation']."</p>\n";
echo "</section>";

echo "<section id='competences'>";
echo "<h1>Compétences</h1>\n";

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

echo "<section id='realisations'>";
echo "<h1>Réalisations</h1>\n";
echo "<h2>".$data['realisations']['titre']."</h2>\n";
echo "<p>".$data['realisations']['description']."</p>\n";
// ensuite mettre *illustration et *documents qui ne sont pas du texte
// si plusieurs réalisations, mettre une boucle for
echo "</section>";

echo "<section id='formations'>";
echo "<h1>Formations</h1>\n";
foreach ($data['formations'] as $formation) {
    echo "<h3>".$formation['nom']." - ".$formation['etablissement']."</h3>\n";
    echo "<p>".$formation['date_debut']."-" .$formation['date_fin']."</p>\n";
    echo "<p>".$formation['lieu']."</p>\n";
    echo "<p>".nl2br($formation['contenu'])."</p>\n";
}
<<<<<<< HEAD
echo "</section>";

echo "<section>";
echo "<h1 id='contact'>Contact</h1>\n";

echo "</section>";
?>

=======
?>

</section>

<section id='contact'>
    <div class="contactez-nous">
        <h1>Contact</h1>
        <p>Un problème, une question, envie de m'envoyer un message ? N’hésitez pas à utiliser ce formulaire pour prendre contact avec moi !</p>
        <form action="" method="post">
            <div>
                <label for="nom">Votre nom</label>
                <input type="text" id="nom" name="nom" placeholder="Martin" required>
            </div>
            <div>
                <label for="email">Votre e-mail</label>
                <input type="email" id="email" name="email" placeholder="monadresse@mail.com" required>
            </div>
            <div>
                <label for="sujet">Quel est le sujet de votre message ?</label>
                <select name="sujet" id="sujet" required>
                    <option value="" disabled selected hidden>Choisissez le sujet de votre message</option>
                    <option value="probleme-portfolio">Problème avec mon portfolio</option>
                    <option value="question">Question à propos de moi</option>
                    <option value="autre">Autre...</option>
                </select>
            </div>
            <div>
                <label for="message">Votre message</label>
                <textarea id="message" name="message" placeholder="Bonjour, je vous contacte car...." required></textarea>
            </div>
            <div>
                <button type="submit">Envoyer mon message</button>
            </div>
        </form>
    </div>
</section>

>>>>>>> 3b933c525602adfa6fb492bfc3a34ce40a70e988
</body>
</html>
