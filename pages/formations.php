<?php
    $data = yaml_parse_file('formations.yaml');
?>
<section id="formations">
    <h2>FORMATIONS</h2>
    <div class="content">
        <?php foreach ($data['formations'] as $formation): ?>
            <div class="formation">
                <div class="image">
                    <img src="assets/images/<?php echo htmlspecialchars($formation['image']) . '.png'; ?>" alt="<?php echo htmlspecialchars($formation['etablissement']); ?>">
                </div>
                <div class="text">
                    <h4><?php echo $formation['nom'] . " - " . $formation['etablissement']; ?></h4>
                    <p><?php echo $formation['date_debut'] . " - " . $formation['date_fin']; ?></p>
                    <p><?php echo $formation['lieu']; ?></p>
                    <p><?php echo nl2br($formation['contenu']); ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
