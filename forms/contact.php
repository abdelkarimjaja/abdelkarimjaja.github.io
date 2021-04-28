<?php
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;

   require 'vendor/phpmailer/phpmailer/src/Exception.php';
   require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
   require 'vendor/phpmailer/phpmailer/src/SMTP.php';

   // Include autoload.php file
   require 'vendor/autoload.php';
   // Create object of PHPMailer class
   $mail = new PHPMailer(true);

   $output = '';

   if (isset($_POST['submit'])) {
     $name = $_POST['name'];
     $email = $_POST['email'];
     $subject = $_POST['subject'];
     $message = $_POST['message'];

     try {
       $mail->isSMTP();
       $mail->Host = 'smtp.gmail.com';
       $mail->SMTPAuth = true;
       // Gmail ID which you want to use as SMTP server
       $mail->Username = 'abdelkarim.jajja@gmail.com';
       // Gmail Password
       $mail->Password = '@Japy2019';
       $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
       $mail->Port = 587;

       // Email ID from which you want to send the email
       $mail->setFrom($email,$name);
       // Recipient Email ID where you want to receive emails
       $mail->addAddress('abdelkarimjaja1@gmail.com');

       $mail->isHTML(true);
       $mail->Subject = 'Form Submission';
       $mail->Body = "<h3>Name : $name <br>Email : $email <br>Message : $message</h3>";

       $mail->send();


       header('Location:../index.html#contact');
       echo '<script type="text/javascript">
            document.getElementById("sent-message").innerHTML= "Your message has been sent. Thank you!";
     </script>';
     } catch (Exception $e) {
       $output = $e->getMessage();
     }
   }

?>
