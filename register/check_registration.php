<?php

include '../resources/php/connection.php';

if (isset($_POST)) {
  // to check if the account with that username exists.
  if ($stmt = $conn->prepare('SELECT id, password FROM users_tbl WHERE username = ?')) {
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
      // the username already exist.
      echo '0';
    } else {
      if ($stmt = $conn->prepare('INSERT INTO users_tbl (username, password) VALUES (?, ?)')) {
        // hashing the password for security.
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $stmt->bind_param('ss', $_POST['username'], $password);
        $stmt->execute();
        echo '1';
      } else {
        echo 'Could not prepare statement!';
      }
    }
    $stmt->close();
  } else {
    echo 'Could not prepare statement!';
  }
  $conn->close();
}
