<?php

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
    // If the variables aren't set,
    // Redirect to contact.html
    header("Location: ./contact.html");
}

/*****************************/
// VALIDATE INFORMATION

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$errors = [];

if (empty($name)) {
    // Check if name string is empty.
    $errors[] = 'Naam is niet ingevuld.';
} else if (!preg_match("/^[a-zA-Z-']/*$/", $name) || strlen($name) > 50) {
    // Check if name only has letters, dashes apostrophes and whitespaces.
    $errors[] = "Naam mag alleen letters en spaties hebben en niet meer dan 50 karakters hebben.";
}

if (empty($name)) {
    // Check if email string is empty.
    $errors[] = 'E-mail is niet ingevuld.';
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // Check if the email is well-formed.
    $errors[] = "E-mail was niet goed geformatteerd.";
}

// Message needs to be between 10 and 1000 characters.
if (strlen($message) < 10 || strlen($message) > 1000) {
    $errors[] = "Uw bericht moet tussen 10 en 1000 karakters hebben.";
}

/*****************************/
// SEND EMAIL



if (empty($errors)) {
    $toEmail = 'elwinpsn@gmail.com';
    $emailSubject = 'U heeft een nieuwe mail van Axicia Contact.';
    $headers = ["From" => $email, "Reply-To" => $email, "Content-type" => "text/html; charset=iso-8859-1"];

    $bodyParagraphs = ["Name: {$name}", "Email: {$email}", "Message:", $message];
    $body = join(PHP_EOL, $bodyParagraphs);

    if (mail($toEmail, $emailSubject, $body, $headers)) {

    } else {
        $errors[] = "Er iets mis gegaan, probeer later opnieuw.";
    }
}

$card_title = '';

if (!empty($errors)) {
    $allErrors = join("<br />", $errors);
    $errorMessage = "<p class=\'error-message\'>{$allErrors}</p>";
    $card_title = "Uw bericht is niet verstuurd.";
} else {
  $card_title = "Uw bericht is succesvol verstuurd.";
}


if ()

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Normalize.css -->
    <link
      rel="stylesheet"
      href="https://unpkg.com/purecss@1.0.1/build/base-min.css"
    />

    <!-- Purecss Grid System -->
    <link
      rel="stylesheet"
      href="https://unpkg.com/purecss@2.0.6/build/base-min.css"
    />
    <link
      rel="stylesheet"
      href="https://unpkg.com/purecss@2.0.6/build/grids-min.css"
    />
    <link
      rel="stylesheet"
      href="https://unpkg.com/purecss@2.0.6/build/grids-responsive-min.css"
    />

    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
      integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/contact.css" />
    <title>Contact - Axicia</title>
  </head>

  <body>
    <header class="nav">
      <div class="nav__container">
        <div class="nav__logo">
          <a href="../index.html" class="nav__item">Axicia</a>
        </div>
        <nav class="nav__desktop">
          <ul class="nav__desktop-left">
            <li>
              <a href="../index.html" class="nav__item">Home</a>
            </li>
            <li>
              <a href="#pricing" class="nav__item">Tarieven</a>
            </li>
          </ul>
          <ul class="nav__desktop-center">
            <li>
              <a href="../index.html" class="nav__item nav__item-logo"
                >Axicia</a
              >
            </li>
          </ul>
          <ul class="nav__desktop-right">
            <li>
              <a href="../index.html#about-us" class="nav__item">Over Ons</a>
            </li>
            <li>
              <a href="#" class="nav__item">Contact</a>
            </li>
          </ul>
        </nav>
        <div class="nav__mobile">
          <button type="button" class="nav__item" id="nav__mobile-open">
            <i class="fas fa-bars"></i> MENU
          </button>
          <nav class="nav__mobile-side">
            <button type="button" class="nav__item" id="nav__mobile-close">
              &times;
            </button>
            <ul class="nav__mobile-content">
              <li>
                <a href="../index.html" class="nav__item nav__item-home"
                  >Home</a
                >
              </li>
              <li>
                <a href="#pricing" class="nav__item">Tarieven</a>
              </li>
              <li>
                <a href="../index.html#about-us" class="nav__item">Over Ons</a>
              </li>
              <li>
                <a href="#" class="nav__item">Contact</a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </header>

    <main>
      <section class="hero container">
        <div class="hero__content">
          <h1>Contact</h1>
        </div>
      </section>
      <section class="contact">
        <div class="card__wrapper">
          <div class="card contact-card">
            <h3 class="contact-card__title">Bericht Verstuurd</h3>
              
          </div>
        </div>
      </section>
      <section class="call-to-action container">
        <a href="#" class="btn call-to-action__btn">Maak nu een afspraak</a>
      </section>
    </main>

    <footer>
      <div class="footer__main container">
        <div class="pure-g">
          <div class="pure-u-1 pure-u-md-1-2">
            <div class="footer__main-item footer__main-contact">
              <h3>Contact</h3>
              <div class="footer__main-content">
                <ul class="footer__main-list">
                  <li>Julianalaan 97, Leeuwarden</li>
                  <li>Phone<span>06 23 45 67 89</span></li>
                  <li>Email<span>info@axicia.nl</span></li>
                  <li>Web<span>https://axicia.nl</span></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="pure-u-1 pure-u-md-1-2">
            <div class="footer__main-item footer__main-openingtimes">
              <h3>Openingstijden</h3>
              <div class="footer__main-content">
                <ul class="footer__main-list">
                  <li>Zo / Ma<span>Gesloten</span></li>
                  <li>Wo / Vr<span>09:30 tot 18:00</span></li>
                  <li>Di / Do<span>10:00 tot 20:00</span></li>
                  <li>Za<span>09:00 tot 17:00</span></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer__sub container">
        <div class="pure-g">
          <div class="pure-u-1 pure-u-md-1-2">
            <div class="footer__sub-text">
              <p>
                Axicia Hairstyling | Website door
                <a href="#" class="footer__sub-creator">Elwin Jukema</a>
              </p>
            </div>
          </div>
          <div class="pure-u-1 pure-u-md-1-2">
            <div class="footer__sub-socialmedias">
              <a href="#" class="footer__sub-socialmedia">
                <i class="fab fa-facebook-square"></i>
              </a>
              <a href="#" class="footer__sub-socialmedia">
                <i class="fab fa-instagram-square"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <script src="js/script.js"></script>
  </body>
</html>
