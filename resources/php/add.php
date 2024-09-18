<?php

include 'connection.php';

if (isset($_POST['btn_submit'])) {
  $name         = htmlspecialchars($_POST['name']);
  $sex          = htmlspecialchars($_POST['sex']);
  $age          = htmlspecialchars($_POST['age']);
  $phone        = htmlspecialchars($_POST['phone']);
  $body_temp    = htmlspecialchars($_POST['body_temp']);
  $diagnosed    = htmlspecialchars($_POST['diagnosed']);
  $encountered  = htmlspecialchars($_POST['encountered']);
  $vaccinated   = htmlspecialchars($_POST['vaccinated']);
  $nationality  = htmlspecialchars($_POST['nationality']);

  /*query to insert input in the table*/
  $sql = "INSERT INTO `records_tbl` 
  VALUES (null,'$name','$sex','$age',$phone, $body_temp,'$diagnosed','$encountered','$vaccinated','$nationality')";

  if (mysqli_query($conn, $sql)) {
    header("Location: http://covid19dwa.atwebpages.com/records.php");
    exit();
    echo "Successfully Added!";
  } else {
    echo "ERROR: Could not be able to execute $sql. " . mysqli_error($conn);
  }
}