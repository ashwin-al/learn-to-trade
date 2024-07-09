<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Set the recipient email address
    $recipient = "youremail@example.com";

    // Set the email subject
    $subject = "New Contact Form Submission";

    // Set the email headers
    $headers = "From: $name <$email>";

    // Send the email
    if (mail($recipient, $subject, $message, $headers)) {
        $response = array("success" => true);
    } else {
        $response = array("success" => false);
    }

    // Output the JSON response
    header("Content-Type: application/json");
    echo json_encode($response);
} else {
    // If the request method is not POST, return an error
    $response = array("success" => false);
    header("Content-Type: application/json");
    echo json_encode($response);
}
?>