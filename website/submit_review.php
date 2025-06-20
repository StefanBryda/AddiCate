<?php

// Enable error reporting for debugging 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/phpmailer/src/Exception.php';
require __DIR__ . '/phpmailer/src/PHPMailer.php';
require __DIR__ . '/phpmailer/src/SMTP.php'; // Required if you use SMTP

// Only process if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $review_text = filter_input(INPUT_POST, 'review', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Make sure the review isn't empty
    if (empty($review_text)) {
        header("Location: game_page.php?status=no_review");
        exit;
    }

    try {
        // Create a new PHPMailer instance (notice we specify the full namespace)
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);

        // Tell PHPMailer to use SMTP
        $mail->isSMTP();
        // Replace with your service's details (e.g., SendGrid, Mailgun):
        $mail->Host       = 'smtp.sendgrid.net';    // which mail server it needs to connect to
        $mail->SMTPAuth   = true;                   // use authentication
        $mail->Username   = 'apikey';               // SendGrid
        $mail->Password   = getenv('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'); 
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS; // Use TLS encryption
        $mail->Port       = 587;                    // Standard port for TLS

        // Who the email is from 
        $mail->setFrom('projectaddicate25@gmail.com', 'Anonymous Game Reviewer');
        // Who the email is going to (your review inbox)
        $mail->addAddress('projectaddicate25@gmail.com');

        // Email content
        $mail->isHTML(false); // Send as plain text
        $mail->Subject = 'New Anonymous Game Review';
        $mail->Body    = $review_text;

        $mail->send();
        
        header("Location: game_page.php?status=review_success");
        exit;
    } catch (PHPMailer\PHPMailer\Exception $e) { // Catch the PHPMailer Exception specifically
        // Log the error 
        error_log("Review email failed: {$e->getMessage()}"); // Using getMessage() for specific error
       
        header("Location: game_page.php?status=review_error");
        exit;
    }
} else {
    header("Location: game_page.php");
    exit;
}
