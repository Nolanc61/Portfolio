<section id="formations">
    <h2>FORMATIONS</h2>
    <div class="content">
        <?php if (isset($formationsData['formations']) && is_array($formationsData['formations'])): ?>
            <?php foreach ($formationsData['formations'] as $formation): ?>
                <div class="formation">
                    <div class="image">
                        <img src="assets/images/<?php echo htmlspecialchars($formation['image'] ?? "default") . '.png'; ?>" 
                             alt="<?php echo htmlspecialchars($formation['etablissement'] ?? "Établissement introuvable"); ?>">
                    </div>
                    <div class="text">
                        <h4>
                            <?php echo htmlspecialchars(($formation['nom'] ?? "Nom introuvable") . " - " . ($formation['etablissement'] ?? "")); ?>
                        </h4>
                        <p><?php echo htmlspecialchars(($formation['date_debut'] ?? "Début inconnu") . " - " . ($formation['date_fin'] ?? "Fin inconnue")); ?></p>
                        <p><?php echo htmlspecialchars($formation['lieu'] ?? "Lieu inconnu"); ?></p>
                        <p><?php echo nl2br(htmlspecialchars($formation['contenu'] ?? "Contenu non disponible")); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucune formation trouvée.</p>
        <?php endif; ?>
    </div>
</section>
