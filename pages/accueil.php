<section id='accueil'>
    <h2>
        <?php 
        if (isset($accueilData['accueil']['nom'], $accueilData['accueil']['prenom'])) {
            echo htmlspecialchars($accueilData['accueil']['nom'] . " " . $accueilData['accueil']['prenom']) . "<br><br>";
        } else {
            echo "Nom ou prénom introuvable.";
        }
        ?>
    </h2>
    <div id="intro">
        <div id="gauche">
            <p>
                <?php echo htmlspecialchars($accueilData['accueil']['accroche'] ?? "Accroche introuvable.") . "<br><br>"; ?>
            </p>
            <p>
                <?php echo htmlspecialchars($accueilData['accueil']['presentation'] ?? "Présentation introuvable."); ?>
            </p>
        </div>
        <img id="droite" src="assets/images/nolan.png" alt="Photo de profil">
    </div>
</section>

