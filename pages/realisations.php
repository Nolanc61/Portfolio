<?php
    $data = yaml_parse_file('yaml/realisations.yaml');
?>
<section id="realisations">
    <h2>RÉALISATIONS</h2>
    <div class="content">
        <?php foreach ($data['realisations'] as $realisation): ?>
            <div class="realisation">
                <?php if (isset($realisation['pdf'])): ?>
                    <a href="<?php echo $realisation['pdf']; ?>" target="_blank">
                        <img src="<?php echo $realisation['illustration']; ?>" alt="<?php echo htmlspecialchars($realisation['titre']); ?>" class="illustration">
                    </a>
                <?php else: ?>
                    <img src="<?php echo $realisation['illustration']; ?>" alt="<?php echo htmlspecialchars($realisation['titre']); ?>" class="illustration">
                <?php endif; ?>
                <h3><?php echo htmlspecialchars($realisation['titre']); ?></h3>
                <p><?php echo htmlspecialchars($realisation['description']); ?></p>
            </div>
        <?php endforeach; ?>
        <a href="./assets/pdf/Nolan CV.pdf" class="download-btn" target="_blank">Télécharger mon CV</a>
    </div>
</section>

