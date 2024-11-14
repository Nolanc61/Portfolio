<section id='contact'>
    <div class="contactez-nous">
        <h1>Contact</h1>
        <p>Un problème, une question, envie de m'envoyer un message ? N’hésitez pas à utiliser ce formulaire pour prendre contact avec moi !</p>
        <form action="" method="post">
            <div>
                <label for="nom">Votre nom</label>
                <input type="text" id="nom" name="nom" placeholder="Martin" required>
            </div>
            <div>
                <label for="email">Votre e-mail</label>
                <input type="email" id="email" name="email" placeholder="monadresse@mail.com" required>
            </div>
            <div>
                <label for="sujet">Quel est le sujet de votre message ?</label>
                <select name="sujet" id="sujet" required>
                    <option value="" disabled selected hidden>Choisissez le sujet de votre message</option>
                    <option value="probleme-portfolio">Problème avec mon portfolio</option>
                    <option value="question">Question à propos de moi</option>
                    <option value="collaboration">Demande de collaboration</option>
                    <option value="autre">Autre...</option>
                </select>
            </div>
            <div>
                <label for="message">Votre message</label>
                <textarea id="message" name="message" placeholder="Bonjour, je vous contacte car..." required></textarea>
            </div>
            <div>
                <button type="submit">Envoyer mon message</button>
            </div>
        </form>
    </div>
</section>
