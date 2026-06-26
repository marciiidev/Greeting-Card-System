<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer-master/src/Exception.php';
require 'PHPMailer/PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer/PHPMailer-master/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // ✅ Sanitize inputs
    $bgcolor = htmlspecialchars($_POST["color"]);
    $message = htmlspecialchars($_POST["user_message"]);
    $sendersName = htmlspecialchars($_POST["sendersName"]);
    $sendersAddress = htmlspecialchars($_POST["sendersAddress"]);
    $receiversName = htmlspecialchars($_POST["receiversName"]);
    $email = trim($_POST["receiversAddress"]); // receiver email

    // ✅ Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email address");
    }

    $mail = new PHPMailer(true);

    try {
        // ✅ SMTP SETTINGS
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = '@gmail.com'; // FIXED
        $mail->Password   = ''; // App password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = ;

        // ✅ REQUIRED FIX (FROM EMAIL)
        $mail->setFrom('', 'BSIS - Greeting Card');

        $mail->addAddress($email, $receiversName);

        // ✅ EMAIL CONTENT
        $mail->isHTML(true);
        $mail->Subject = 'A message from your loved ones';

        $mail->Body = "
        <div style='background:$bgcolor; padding:30px; width:500px; border:2px double black;'>
            <h2>Dear $receiversName,</h2>
            <p>$message</p>
            <br>
            <h3>Sincerely,</h3>
            <h2>$sendersName</h2>
            <h3>$sendersAddress</h3>
        </div>
        ";

        $mail->send();

        echo "<script>
            alert('Greeting Card sent successfully!');
            window.location='register.php';
        </script>";

    } catch (Exception $e) {
        echo "Email failed: {$mail->ErrorInfo}";
    }
}
?>
