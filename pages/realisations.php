<section id="realisations">
    <h2>RÉALISATIONS</h2>
    <div class="content">
        <?php if (isset($realisationsData['realisations']) && is_array($realisationsData['realisations'])): ?>
            <?php foreach ($realisationsData['realisations'] as $realisation): ?>
                <div class="realisation">
                    <img src="<?php echo htmlspecialchars($realisation['illustration'] ?? "assets/images/default.png"); ?>" 
                         alt="<?php echo htmlspecialchars($realisation['titre'] ?? "Titre inconnu"); ?>" 
                         class="illustration">
                    <h3><?php echo htmlspecialchars($realisation['titre'] ?? "Titre inconnu"); ?></h3>
                    <p><?php echo htmlspecialchars($realisation['description'] ?? "Description indisponible"); ?></p>
                </div>
            <?php endforeach; ?>
            <a href="./assets/pdf/Nolan CV.pdf" class="download-btn" target="_blank">Télécharger mon CV</a>
        <?php else: ?>
            <p>Aucune réalisation trouvée.</p>
        <?php endif; ?>
    </div>
</section>
