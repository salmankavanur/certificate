<?php
session_start();

// Check if user submitted the form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get the credentials from the POST request
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Check if credentials are correct (replace this with your own authentication logic)
  if ($username === 'myusername' && $password === 'mypassword') {
    // Set session variables
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;

    // Redirect user to the dashboard page
    header('Location: dashboard.php');
    exit;
  } else {
    // Authentication failed, redirect back to the login page with an error message
    $_SESSION['error'] = 'Incorrect username or password';
    header('Location: login.php');
    exit;
  }
} else {
  // If user didn't submit the form, redirect back to the login page
  header('Location: login.php');
  exit;
}
?>
