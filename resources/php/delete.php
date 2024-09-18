<?php

include 'connection.php';

/*getting the user ID of the selected row.*/
$id = $_REQUEST['id'];

/*query to delete a selected row using user_ID*/
$sql = "DELETE FROM records_tbl WHERE id = '$id'";

if (mysqli_query($conn, $sql)) {
  header("Location: http://covid19dwa.atwebpages.com/records.php");
  exit();
  echo "Record was successfully deleted.";
} else {
  echo "ERROR: Could not be able to execute $sql. " . mysqli_error($conn);
}


$conn->close();
