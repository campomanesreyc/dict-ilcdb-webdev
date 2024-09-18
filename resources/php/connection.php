<?php

$servername = "[servername]";
$username = "[username]";
$password = "[password]";
$database = "[database]";

/*creating connection*/
$conn = mysqli_connect($servername, $username, $password, $database);

/*if the connection failed it will die otherwise it's successful.*/
if (mysqli_connect_error()) {
	die("Conection Failed: " . mysqli_connect_error());
}
