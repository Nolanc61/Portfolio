<?php
$data = yaml_parse_file('yaml/contact.yaml');

// Inclure les fichiers nécessaires de PHPMailer
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


$sujet_defaut = 'Sujet par défaut';

// Variable pour afficher le message de confirmation
$confirmation = ''; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = $_POST['Nom'] ?? '';
    $Lastname = $_POST['Lastname'] ?? '';
    $email = $_POST['Email'] ?? '';
    $objet = $_POST['Objet'] ?? $sujet_defaut;
    $message = $_POST['Message'] ?? '';
    $captchaResponse = $_POST['g-recaptcha-response'] ?? '';

    // Validation
    if (empty($captchaResponse)) {
        $confirmation = "<p class='error'>Veuillez vérifier que vous n'êtes pas un robot.</p>";
    } else {
        // Vérification reCAPTCHA
        $secretKey = '6LeDcp8qAAAAAFwE7oAJ2oetUc4RPsi4lhpmUhiq';
        $remoteIp = $_SERVER['REMOTE_ADDR'];
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = [
            'secret' => $secretKey,
            'response' => $captchaResponse,
            'remoteip' => $remoteIp
        ];

        $options = [
            'http' => [
                'method'  => 'POST',
                'content' => http_build_query($data),
                'header'  => "Content-Type: application/x-www-form-urlencoded\r\n"
            ]
        ];
        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        $responseKeys = json_decode($response, true);

        if (intval($responseKeys["success"]) !== 1) {
            $confirmation = "<p class='error'>Vérification reCAPTCHA échouée. Veuillez réessayer.</p>";
        } else {
            // Envoi de l'email
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'nolan.charpentier@sts-sio-caen.info';
                $mail->Password = 'hxgfrgtumowklhuu';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                $mail->setFrom($email, "$nom $Lastname");
                $mail->addAddress('nolan.charpentier@sts-sio-caen.info');
                $mail->addReplyTo($email, "$nom $Lastname");
                $mail->isHTML(true);
                $mail->Subject = $objet;
                $mail->Body = "<p><strong>From:</strong> $nom $Lastname</p>
                                <p><strong>Email:</strong> $email</p>
                                <p><strong>Objet:</strong> $objet</p>
                                <p><strong>Message:</strong></p>
                                <p>$message</p>";
                $mail->send();
                $confirmation_message = "Votre message a été envoyé avec succès !";
                $confirmation = "<p class='confirmation'>$confirmation_message</p>";

            } catch (Exception $e) {
                $confirmation = "<p class='error'>Le message n'a pas pu être envoyé. Erreur : {$mail->ErrorInfo}</p>";
            }
        }
    }
}
?>

<div id="notification" class="notification <?php echo (!empty($confirmation) && strpos($confirmation, 'error') !== false) ? 'error' : ''; ?>">
    <?php echo $confirmation; ?>
</div>

<!-- Formulaire de contact -->

<section id='contact'>
    <div class="container">
        <div class="contact-left">
            <h1>Me <br>contacter</h1>
            <p><strong>Je serai ravi de vous lire...</strong></p>
        </div>
        <div class="contact-right">
            <form id="contactForm" action="" method="POST" autocomplete="on">
                <label for="Nom">Prénom&nbsp;:</label>
                <input type="text" id="Nom" name="Nom" placeholder="Entrez votre prénom" required pattern="[A-Za-zÀ-ÖØ-öø-ÿ\s'-]+" title="Le prénom ne doit contenir que des lettres, espaces, apostrophes ou tirets." autocomplete="given-name"/>
                
                <label for="Lastname">Nom&nbsp;:</label>
                <input type="text" id="Lastname" name="Lastname" placeholder="Entrez votre nom" required pattern="[A-Za-zÀ-ÖØ-öø-ÿ\s'-]+" title="Le nom ne doit contenir que des lettres, espaces, apostrophes ou tirets." autocomplete="family-name"/>
                
                <label for="Email">Mail&nbsp;:</label>
                <input type="email" id="Email" name="Email" placeholder="Entrez votre e-mail" required autocomplete="email"/>
                
                <label for="Objet">Quel est l'objet de votre message&nbsp;?</label>
                <input type="text" id="Objet" name="Objet" placeholder="Entrez l'objet de votre message" autocomplete="off"/>
                
                <label for="Message">Message&nbsp;:</label>
                <textarea id="Message" name="Message" placeholder="Entrez un commentaire" maxlength="500" required autocomplete="off"></textarea>

                <!-- Champ caché pour le jeton ReCAPTCHA -->
            
                <div class="g-recaptcha" data-sitekey="6LeDcp8qAAAAAPsdj3V-WXqVgB5F4wgbJQOQULNe"></div>
               
                <br>
                <!-- Bouton de soumission -->
                <input type="submit" value="Soumettre" />
            </form>
        </div>
    </div>
</section>

<!-- Script reCAPTCHA -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
    // Afficher la notification si un message est présent
    const notification = document.getElementById('notification');
    if (notification.innerHTML.trim() !== '') {
        notification.style.display = 'block';
        setTimeout(() => {
            notification.style.display = 'none';
        }, 5000); // Cache la notification après 5 secondes
    }
</script>