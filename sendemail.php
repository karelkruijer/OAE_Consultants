<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verzamel de ingevoerde gegevens uit het formulier
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    // Controleer of de data geldig is
    if (empty($name) OR !filter_var($email, FILTER_VALIDATE_EMAIL) OR empty($message)) {
        // Onjuiste data, stuur de gebruiker terug naar het formulier
        header("Location: contact.html?success=0");
        exit;
    }

    // Ontvanger e-mail instellen
    $to = 'karelkruijer@gmail.com';

    // Onderwerp van de e-mail
    $subject = "Nieuw bericht van $name";

    // Bericht opstellen
    $email_content = "Naam: $name\n";
    $email_content .= "E-mail: $email\n\n";
    $email_content .= "Bericht:\n$message\n";

    // E-mail headers
    $headers = "From: $name <$email>";

    // E-mail versturen
    mail($to, $subject, $email_content, $headers);
    
    // Stuur de gebruiker terug naar de contactpagina met een succesmelding
    header("Location: contact.html?success=1");
} else {
    // Niet POST verzoek, stuur de gebruiker terug naar het formulier
    header("Location: contact.html");
}
?>