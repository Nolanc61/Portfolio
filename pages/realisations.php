<section id='realisations'>
    <h2><?php echo $data['realisations']['titre']; ?></h2>
    <p><?php echo $data['realisations']['description']; ?></p>
    <div class="content">
        <img class="illustration" src="<?php echo $data['realisations']['illustration']; ?>" alt="Illustration de la réalisation">
        <div class="documents">
            <p><?php echo nl2br($data['realisations']['documents']); ?></p>
        </div>
    </div>
</section>