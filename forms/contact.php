<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  */

  $receiving_email_address = 'gabrielakinshola3@gmail.com';

  // Load library
  $php_email_form = '../assets/vendor/php-email-form/php-email-form.php';
  if( file_exists($php_email_form) ) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  // Validate POST data
  if ($_SERVER['REQUEST_METHOD'] !== 'POST' ||
      !isset($_POST['name'], $_POST['email'], $_POST['subject'], $_POST['message'])) {
    die('Invalid or missing form data.');
  }

  // Sanitize input
  $name = htmlspecialchars(trim($_POST['name']));
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $subject = htmlspecialchars(trim($_POST['subject']));
  $message = htmlspecialchars(trim($_POST['message']));

  // Setup contact form
  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  $contact->to = $receiving_email_address;
  $contact->from_name = $name;
  $contact->from_email = $email;
  $contact->subject = $subject;

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  $contact->add_message($name, 'From');
  $contact->add_message($email, 'Email');
  $contact->add_message($message, 'Message', 10);

  echo $contact->send();
?>
