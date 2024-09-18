<?php

session_start();
include '/home/www/covid19dwa.atwebpages.com/resources/php/connection.php';

if (isset($_POST)) {

  if ($stmt = $conn->prepare('SELECT id, password FROM users_tbl WHERE username = ?')) {

    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
      $stmt->bind_result($id, $password);
      $stmt->fetch();
      // Account exists proceed to verification of password.
      if (password_verify($_POST['password'], $password)) {
        // creating sessions
        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['name'] = $_POST['username'];
        $_SESSION['id'] = $id;
        echo '1';
      } else {
        // Incorrect password
        echo '0';
      }
    }
    $stmt->close();
  }
}
