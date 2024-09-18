<?php

include 'connection.php';

if (isset($_POST['btn_save'])) {
  $id           = htmlspecialchars($_POST['id']); 
  $name         = htmlspecialchars($_POST['name']);
  $sex          = htmlspecialchars($_POST['sex']);
  $age          = htmlspecialchars($_POST['age']);
  $phone        = htmlspecialchars($_POST['phone']);
  $body_temp    = htmlspecialchars($_POST['body_temp']);
  $diagnosed    = htmlspecialchars($_POST['diagnosed']);
  $encountered  = htmlspecialchars($_POST['encountered']);
  $vaccinated   = htmlspecialchars($_POST['vaccinated']);
  $nationality  = htmlspecialchars($_POST['nationality']);

  /*query to update the data*/
  $sql = "UPDATE records_tbl 
      set 
      id='$id',
      name='$name',
      sex='$sex',
      age='$age', 
      phone='$phone',
      body_temp='$body_temp',
      diagnosed='$diagnosed',
      encountered='$encountered',
      vaccinated='$vaccinated',
      nationality='$nationality'
      WHERE id = '$id'";

  if (mysqli_query($conn, $sql)) {
    header("Location: http://covid19dwa.atwebpages.com/records.php");
    exit();
    echo "Record was successfully updated.";      
  } else {
    echo "ERROR: Could not be able to execute $sql. " . mysqli_error($conn);
  }
}
