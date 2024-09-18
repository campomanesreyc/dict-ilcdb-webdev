<?php

include 'connection.php';

//TOTAL NUMBER OF RECORDS
$total_rec_query = "SELECT COUNT(*) FROM records_tbl";
$total_rec_result = mysqli_query($conn, $total_rec_query);
$total_rec = mysqli_fetch_array($total_rec_result);

//TOTAL AND PERCENTAGE OF VACCINATED PEOPLE
$vaccinated_query = "SELECT COUNT(*) FROM records_tbl WHERE vaccinated = 'Yes'";
$vaccinated_result = mysqli_query($conn, $vaccinated_query);
$vaccinated = mysqli_fetch_array($vaccinated_result);
if ($vaccinated[0] > 0) {
  $vaccinated_percent = intval(($vaccinated[0] / $total_rec[0]) * 100);
}

//TOTAL NUMBER OF ENCOUNTERED
$total_encount_query = "SELECT COUNT(*) FROM records_tbl WHERE encountered = 'Yes'";
$total_encount_result = mysqli_query($conn, $total_encount_query);
$total_encount = mysqli_fetch_array($total_encount_result);

//TOTAL NUMBER OF DIAGNOSED
$total_dx_query = "SELECT COUNT(*) FROM records_tbl WHERE diagnosed = 'Yes'";
$total_dx_result = mysqli_query($conn, $total_dx_query);
$total_dx = mysqli_fetch_array($total_dx_result);

//TOTAL NUMBER OF ADULT
$total_adult_query = "SELECT COUNT(*) FROM records_tbl WHERE age >= 18";
$total_adult_result = mysqli_query($conn, $total_adult_query);
$total_adult = mysqli_fetch_array($total_adult_result);

//TOTAL NUMBER OF PEOPLE WHO HAVE FEVER
$total_fever_query = "SELECT COUNT(*) FROM records_tbl WHERE body_temp NOT BETWEEN 36.4 AND 37.6";
$total_fever_result = mysqli_query($conn, $total_fever_query);
$total_fever = mysqli_fetch_array($total_fever_result);

//TOTAL NUMBER OF ADULT
$total_minor_query = "SELECT COUNT(*) FROM records_tbl WHERE age <= 18";
$total_minor_result = mysqli_query($conn, $total_minor_query);
$total_minor = mysqli_fetch_array($total_minor_result);

//TOTAL NUMBER OF FOREIGNER
$total_4nr_query = "SELECT COUNT(*) FROM records_tbl WHERE nationality != 'Filipino'";
$total_4nr_result = mysqli_query($conn, $total_4nr_query);
$total_4nr = mysqli_fetch_array($total_4nr_result);
