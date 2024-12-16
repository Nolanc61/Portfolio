<?php
$data = yaml_parse_file('yaml/competences.yaml');
?>
<section id='competences'>
    <h2>COMPETENCES</h2>
    <div class="competences">
        <?php foreach ($data['competences']['domaines'] as $domaine): ?>
            <div id="competences_bloc">
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
            </div>
        <?php endforeach; ?>
    </div>
</section>
