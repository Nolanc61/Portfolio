<?php
    $data = yaml_parse_file('realisations.yaml');
?>
<section id="realisations">
    <h2>RÉALISATIONS</h2>
    <div class="content">
        <?php foreach ($data['realisations'] as $realisation): ?>
            <div class="realisation">
                <img src="<?php echo $realisation['illustration']; ?>" alt="<?php echo htmlspecialchars($realisation['titre']); ?>" class="illustration">
                <h3><?php echo htmlspecialchars($realisation['titre']); ?></h3>
                <p><?php echo htmlspecialchars($realisation['description']); ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>
