<?php
    $data = yaml_parse_file('accueil.yaml');
?>
<section id='accueil'>
    <h2><?php echo $data['accueil']['nom'] . " " . $data['accueil']['prenom']; ?><br><br></h2>
    <div id="intro">
        <div id="gauche">
            <p><?php echo $data['accueil']['accroche']; ?><br><br></p>
            <p><?php echo $data['accueil']['presentation']; ?></p>
        </div>
        <img id="droite" src="assets/images/nolan.png" alt="Photo de profil">
    </div>
</section>
