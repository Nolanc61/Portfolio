<section id='competences'>
    <h2>COMPETENCES</h2>
    <div class="competences">
        <?php if (isset($competencesData['competences']['domaines']) && is_array($competencesData['competences']['domaines'])): ?>
            <?php foreach ($competencesData['competences']['domaines'] as $domaine): ?>
                <div id="competences_bloc">
                    <h3><?php echo htmlspecialchars($domaine['nom'] ?? "Nom du domaine introuvable"); ?></h3>
                    <ul>
                        <?php if (isset($domaine['items']) && is_array($domaine['items'])): ?>
                            <?php foreach ($domaine['items'] as $item): ?>
                                <li>
                                    <?php echo htmlspecialchars($item['nom'] ?? "Nom de l'item introuvable") . " : "; ?>
                                    <?php
                                    if ($domaine['nom'] == 'Certifications' && isset($item['organisation'], $item['date'])) {
                                        echo htmlspecialchars($item['organisation']) . " (" . htmlspecialchars($item['date']) . ")";
                                    } elseif (isset($item['niveau'])) {
                                        $niveauNum = match ($item['niveau']) {
                                            'Débutant' => 1,
                                            'Connaissances de base' => 2,
                                            'Intermédiaire' => 3,
                                            'Avancé' => 4,
                                            'Expert' => 5,
                                            default => 0,
                                        };
                                        for ($i = 1; $i <= 5; $i++) {
                                            echo $i <= $niveauNum ? "★" : "☆";
                                        }
                                    }
                                    ?>
                                </li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li>Items introuvables pour ce domaine.</li>
                        <?php endif; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucune compétence trouvée.</p>
        <?php endif; ?>
    </div>
</section>
