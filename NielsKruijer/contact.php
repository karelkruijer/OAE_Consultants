<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact</title>
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="icon" href="img/logo_oae_klein.png" type="image/png">
</head>
<body>
    <div id="wit-contact"></div>
    <nav class="container">
        <a href="index.html"> <img src="img/logo_oae.png" alt="logo_oae"></a>
         <div class="hamburger-menu">
             <div class="line"></div>
             <div class="line"></div>
             <div class="line"></div>
         </div>
         <ul class="nav-links">
             <li><a href="projecten.html">Projecten</a></li>
             <li><a href="nielsKruijer.html">Niels Kruijer</a></li>
             <li><a href="contact.html">Contact</a></li>
         </ul>
     </nav>
    
    <div class="container contact-form">
        <h1>contact</h1>
        <p>Heb je een vraag? Maak bij voorkeur gebruik van ons contactformulier. Of stuur een berichtje via Whatsapp. We nemen zo spoedig mogelijk contact op.s
        </p>
        <form action="/submit-form" method="POST">
            <div class="form-group">
                <label for="name">Naam:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="message">Bericht:</label>
                <textarea id="message" name="message" rows="4" required></textarea>
            </div>
            <button type="submit">Verstuur</button>
        </form>
    </div>



    <footer id="contact">
        <div class="blur-section">
        </div>
        <div class="gradient-section">
        </div>
        <div class="footer-info container">
            <img src="img/logo_oae.png" alt="logo_oae">
            <div class="footer-nav">
                <a href="#" class="active">Home</a>
                <a href="projecten.html">Projecten</a>
                <a href="#">Contact</a>
                <a href="#">Algemene voorwaarden</a>
                <a href="boeken.html">Boeken</a>
                <a href="FAQ.html">FAQ's</a>
            </div>
            <div class="contact-footer">
                <br><br>
                <span>info@oae.nl</span>
                <span>+316283748727</span>
            </div>
        </div>
    </footer>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = strip_tags(trim($_POST["message"]));

  
    $to = 'karelkruijer@gmail.com';
    $subject = 'Nieuw Bericht van Contactformulier';
    $email_content = "Naam: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Bericht:\n$message\n";


    $headers = "From: $name <$email>";


    if (mail($to, $subject, $email_content, $headers)) {

        echo "Dank u! Uw bericht is verzonden.";
    } else {

        echo "Oops! Er is iets misgegaan en we konden uw bericht niet versturen.";
    }
}
?>