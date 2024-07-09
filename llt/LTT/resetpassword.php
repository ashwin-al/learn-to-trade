// resetpassword.php
<?php
require_once 'config.php';

// Create a new MySQL connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
  die('Connection failed: ' . $conn->connect_error);
}

// Define the get_user_by_email() function
function get_user_by_email($email) {
  global $conn; // use the global $conn variable

  $query = "SELECT * FROM users WHERE email = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    return $result->fetch_assoc();
  } else {
    return null;
  }
}

// Use the get_user_by_email() function
$email = 'dhinakaranmani2@gmail.com';
$user = get_user_by_email($email);

if ($user) {
  // The user exists, do something with their account
} else {
  // The user does not exist
}
?>