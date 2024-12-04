<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérification des données du formulaire
    $name = htmlspecialchars($_POST['name']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $mail = htmlspecialchars($_POST['mail']);
    $objet = htmlspecialchars($_POST['objet']);
    $msg = htmlspecialchars($_POST['msg']);
}
?>

<section id='contact'>
    <div class="container">
        <div class="contact-left">
            <h1>Me <br>contacter</h1>
            <p><strong>Je serai ravis de vous lire...</strong></p>
        </div>
        <div class="contact-right">
            <form id="contactForm" action="" method="post">
                <label for="name">Prénom&nbsp;:</label>
                <input type="text" id="name" name="name" placeholder="Entrez votre prénom" required pattern="[A-Za-zÀ-ÖØ-öø-ÿ\s'-]+" title="Le prénom ne doit contenir que des lettres, espaces, apostrophes ou tirets." />
                <span class="error-message" id="error-name"></span>

                <label for="lastname">Nom&nbsp;:</label>
                <input type="text" id="lastname" name="lastname" placeholder="Entrez votre nom" required pattern="[A-Za-zÀ-ÖØ-öø-ÿ\s'-]+" title="Le nom ne doit contenir que des lettres, espaces, apostrophes ou tirets." />
                <span class="error-message" id="error-lastname"></span>

                <label for="mail">Mail&nbsp;:</label>
                <input type="email" id="mail" name="mail" placeholder="Entrez votre e-mail" required />
                <span class="error-message" id="error-mail"></span>

                <label for="objet">Quel est l'objet de votre message&nbsp;?</label>
                <input type="text" id="objet" name="objet" placeholder="Entrez l'objet de votre message" />
                <span class="objet" id="error-name"></span>

                <label for="msg">Message&nbsp;:</label>
                <textarea id="msg" name="message" placeholder="Entrez un commentaire" maxlength="500" required></textarea>
                <span class="error-message" id="error-message"></span>

                <input type="submit" value="Soumettre" />
            </form>
        </div>
    </div>
</section>

