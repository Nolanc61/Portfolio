<section id='competences'>
    <h1>Compétences</h1>
    <?php foreach ($data['competences']['domaines'] as $domaine): ?>
        <h3><?php echo $domaine['nom']; ?></h3>
        <ul>
            <?php foreach ($domaine['items'] as $item): ?>
                <li>
                    <?php echo $item['nom']; ?> : 
                    <?php
                    if ($domaine['nom'] == 'Certifications') {
                        echo $item['organisation'] . " (" . $item['date'] . ")";
                    } else {
                        if (isset($item['niveau'])) {
                            $niveauNum = 0;
                            switch ($item['niveau']) {
                                case 'Débutant': $niveauNum = 1; break;
                                case 'Connaissances de base': $niveauNum = 2; break;
                                case 'Intermédiaire': $niveauNum = 3; break;
                                case 'Avancé': $niveauNum = 4; break;
                                case 'Expert': $niveauNum = 5; break;
                            }
                            for ($i = 1; $i <= 5; $i++) {
                                echo $i <= $niveauNum ? "★" : "☆";
                            }
                        }
                    }
                    ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endforeach; ?>
</section>
