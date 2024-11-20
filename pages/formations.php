<section id='formations'>
    <?php foreach ($data['formations'] as $formation): ?>
        <h3><?php echo $formation['nom'] . " - " . $formation['etablissement']; ?></h3>
        <p><?php echo $formation['date_debut'] . " - " . $formation['date_fin']; ?></p>
        <p><?php echo $formation['lieu']; ?></p>
        <p><?php echo nl2br($formation['contenu']); ?></p>
    <?php endforeach; ?>
</section>
