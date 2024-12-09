<?php
// Database connection settings
$servername = "localhost";  // Usually localhost for local servers
$username = "root";         // Default MySQL username for XAMPP
$password = "";             // Default MySQL password for XAMPP is empty
$dbname = "contact_form";   // Database name created earlier

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the form data
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Prepare the SQL statement to insert data into the table
$sql = "INSERT INTO messages (name, email, subject, message) 
        VALUES ('$name', '$email', '$subject', '$message')";

// Check if the query was successful
if ($conn->query($sql) === TRUE) {
    // Data inserted successfully into the database

    // Prepare the email content
    $email_subject = "Thank You for Contacting Us!";
    $email_body = "Dear $name,\n\n";
    $email_body .= "Thank you for reaching out to us. We have received your message with the following details:\n\n";
    $email_body .= "Subject: $subject\n";
    $email_body .= "Message: $message\n\n";
    $email_body .= "We will get back to you as soon as possible.\n\n";
    $email_body .= "Best regards,\nYour Company Name";

    // Set the headers for the email
    $headers = "From: noreply@yourcompany.com\r\n";
    $headers .= "Reply-To: support@yourcompany.com\r\n";

    // Send the email
    if (mail($email, $email_subject, $email_body, $headers)) {
        echo "Message sent successfully and email sent to $email!";
    } else {
        echo "Error: Email could not be sent.";
    }

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>
