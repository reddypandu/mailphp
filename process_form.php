<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Adjust the path if needed

header('Content-Type: application/json');

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Initialize PHPMailer
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; // Replace with your SMTP server
    $mail->SMTPAuth   = true;
    $mail->Username   = 'pandureddypatterns@gmaul.com'; // Replace with your email
    $mail->Password   = 'Pandu@12'; // Replace with your email password
    $mail->SMTPSecure = 'tls'; // Use 'tls' or 'ssl' depending on your server
    $mail->Port       = 587; // Adjust the port based on your server settings

    // Recipients
    $mail->setFrom('pandureddypatterns@gmaul.com', 'pandu'); // Replace with your email and name
    $mail->addAddress('recipient@example.com', 'Recipient Name'); // Replace with the recipient's email and name

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'New Form Submission';
    $mail->Body    = "Name: $name<br>Email: $email<br>Message: $message";

    $mail->send();

    // Return success message
    $response = array('success' => true, 'message' => 'Email sent successfully');
    echo json_encode($response);
} catch (Exception $e) {
    // Return error message
    $response = array('success' => false, 'message' => 'Error sending email. ' . $mail->ErrorInfo);
    echo json_encode($response);
}
