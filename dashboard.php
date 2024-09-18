<?php

include 'login/check_login.php';
include 'resources/php/dashboard_data.php';

if (!isset($_SESSION['loggedin'])) {
  header('Location: http://covid19dwa.atwebpages.com/');
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="resources/css/style.css">
  <title>Case Study 2</title>
</head>

<body>

  <!--NAVBAR-->
  <nav class="navbar navbar-expand-lg">
    <div class="container">

      <a class="navbar-brand text-white" href="#">
        <img class="img-fluid" src="resources/images/logo_sm.png" alt="Logo" width="200">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="bi bi-list navbar-toggler text-white fs-1"></i>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link text-white active" aria-current="page" href="dashboard.php">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="records.php">Records</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Settings
            </a>
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item" href="login/logout.php">
                  <i class="bi bi-box-arrow-right"></i>
                  Logout
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>

    </div>
  </nav>

  <!--DASHBOARD HEADER-->
  <div class="container mt-4 rounded" id="dashboard_header">
    <div class="row">
      <div class="col-md-12">
        <h3 class="header">
          <i class="bi bi-bar-chart-fill"></i>
          Dashboard
        </h3>
        <span>Welcome Back! Here is the summary of your records.</span>
      </div>
    </div>
  </div>

  <!--DASHBOARD CONTENTS-->
  <div class="container mt-4" id="dashboard_content">

    <div class="row">

      <div class="col-md-6 p-2">
        <div class="row container bg-white rounded-3 shadow p-2">
          <div class="col-7 mt-4">
            <span class="fs-3 fw-bold">
              <?php
              if ($vaccinated[0] > 0) {
                echo $vaccinated_percent;
              } else {
                echo "0";
              }
              ?>% are vaccinated</span>
            <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="height: 20px">
              <div class="progress-bar" style="width: 
              <?php
              if ($vaccinated[0] > 0) {
                echo $vaccinated_percent;
              } else {
                echo "0";
              }
              ?>%"></div>
            </div>
            <span><?php echo $vaccinated[0]; ?> people are already vaccinated.</span>
          </div>
          <div class="col-5">
            <img class="img-fluid w-100" src="resources/images/icon1.png" alt="Receiving a vaccine">
          </div>
        </div>
      </div>

      <div class="col-md-6 p-2">
        <div class="row container bg-white rounded-3 shadow p-2">
          <div class="col-7 mt-4">
            <span class="fs-3 fw-bold"><?php echo $total_rec[0]; ?></span>
            <br>
            <span>Total number of records</span>
          </div>
          <div class="col-5">
            <img class="img-fluid w-100" src="resources/images/icon2.png" alt="Group of people">
          </div>
        </div>
      </div>

    </div>

    <div class="row">

      <div class="col-md-2 p-2">
        <div class="row container bg-white rounded shadow p-2 text-center">
          <h1><?php echo $total_encount[0]; ?></h1>
          <br>
          <span>had Encountered</span>
        </div>
      </div>

      <div class="col-md-2 p-2">
        <div class="row container bg-white rounded shadow p-2 text-center">
          <h1><?php echo $total_dx[0]; ?></h1>
          <br>
          <span>are Diagnosed</span>
        </div>
      </div>

      <div class="col-md-2 p-2">
        <div class="row container bg-white rounded shadow p-2 text-center">
          <h1><?php echo $total_fever[0]; ?></h1>
          <br>
          <span>has Fever</span>
        </div>
      </div>

      <div class="col-md-2 p-2">
        <div class="row container bg-white rounded shadow p-2 text-center">
          <h1><?php echo $total_adult[0]; ?></h1>
          <br>
          <span>are Adult</span>
        </div>
      </div>

      <div class="col-md-2 p-2">
        <div class="row container bg-white rounded shadow p-2 text-center">
          <h1><?php echo $total_minor[0]; ?></h1>
          <br>
          <span>are Minor</span>
        </div>
      </div>

      <div class="col-md-2 p-2">
        <div class="row container bg-white rounded shadow p-2 text-center">
          <h1><?php echo $total_4nr[0]; ?></h1>
          <br>
          <span>are Foreigners</span>
        </div>
      </div>

    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>