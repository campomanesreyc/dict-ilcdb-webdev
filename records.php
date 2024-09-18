<?php

include 'login/check_login.php';
include 'resources/php/dashboard_data.php';

if (!isset($_SESSION['loggedin'])) {
  header('Location: index.php');
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
            <a class="nav-link text-white" aria-current="page" href="dashboard.php">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white active" href="records.php">Records</a>
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

  <!--HEADER-->
  <div class="container mt-4 rounded" id="records_header">
    <div class="row">
      <div class="col-md-12">
        <h3 class="header">
          <i class="bi bi-list-columns"></i>
          Records List
        </h3>
      </div>
    </div>
  </div>

  <!--ADD NEW BTN-->
  <div class="container-fluid mt-4 text-end">
    <button class="btn text-white" id="btn_add_new" data-bs-toggle="modal" data-bs-target="#add_modal">
      <i class="bi bi-person-fill-add"></i>
      Add new
    </button>
  </div>

  <!--ADD RECORD MODAL-->
  <div class="modal fade" id="add_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="add_modal_label">Add New Record</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="resources/php/add.php" method="POST">

            <div class="mb-3">
              <label for="name" class="form-label">Full Name</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
              <label for="sex" class="form-label">Sex</label>
              <select class="form-select" name="sex" required>
                <option selected disabled value="">--Click to select--</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div>

            <div class="mb-3">
              <label for="age" class="form-label">Age</label>
              <input type="number" class="form-control" id="age" name="age" min=0 max=100 required>
            </div>

            <div class="mb-3">
              <label for="phone" class="form-label">Mobile Number</label>
              <input type="text" class="form-control" id="phone" name="phone" required>
            </div>

            <div class="mb-3">
              <label for="body_temp" class="form-label">Body Temperature (&#8451;)</label>
              <input type="number" step="any" class="form-control" id="body_temp" name="body_temp" required>
            </div>

            <div class="mb-3">
              <label for="diagnosed" class="form-label">Diagnosed with COVID-19?</label>
              <select class="form-select" name="diagnosed" required>
                <option selected disabled value="">--Click to select--</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
              </select>
            </div>

            <div class="mb-3">
              <label for="encountered" class="form-label">Encountered COVID-19?</label>
              <select class="form-select" name="encountered" required>
                <option selected disabled value="">--Click to select--</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
              </select>
            </div>

            <div class="mb-3">
              <label for="vaccinated" class="form-label">Vaccinated?</label>
              <select class="form-select" name="vaccinated" required>
                <option selected disabled value="">--Click to select--</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
              </select>
            </div>

            <div class="mb-3">
              <label for="nationality" class="form-label">Nationality</label>
              <?php
              $filename = 'resources/txt/nationalities_list.txt';
              $eachlines = file($filename, FILE_IGNORE_NEW_LINES);
              echo '<select class="form-select" name="nationality" id="nationality" required>';
              echo '<option selected disabled value="">--Click to Select--</option>';
              foreach ($eachlines as $lines) {
                echo "<option>{$lines}</option>";
              }
              echo '</select>';
              ?>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" name="btn_submit" id="btn_submit" class="btn btn-success">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!--TABLE-->
  <div class="container-fluid mt-4 table-responsive-md" id="records_table">
    <table class="table text-center rounded-5 shadow">
      <thead>
        <tr>
          <th scope="col">Full Name</th>
          <th scope="col">Sex</th>
          <th scope="col">Age</th>
          <th scope="col">Mobile No.</th>
          <th scope="col">Temp</th>
          <th scope="col">Diagnosed</th>
          <th scope="col">Encountered</th>
          <th scope="col">Vaccinated</th>
          <th scope="col">Nationality</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php

        $sel_query = "SELECT * FROM records_tbl;";
        $result = mysqli_query($conn, $sel_query); /*query to select all data in table*/

        while ($row = mysqli_fetch_assoc($result)) { ?>

          <!--data output from the table-->
          <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['sex']; ?></td>
            <td><?php echo $row['age']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['body_temp']; ?></td>
            <td><?php echo $row['diagnosed']; ?></td>
            <td><?php echo $row['encountered']; ?></td>
            <td><?php echo $row['vaccinated']; ?></td>
            <td><?php echo $row['nationality']; ?></td>

            <td>
              <button type="button" class="btn btn-primary" id="btn_update" data-bs-toggle="modal" data-bs-target="#update_modal<?php echo $row['id']; ?>">Update</button>
              <a class="btn btn-danger" href="resources/php/delete.php?id=<?php echo $row["id"]; ?>">Delete</a>
            </td>
          </tr>
        <?php
          include 'resources/php/update_modal.php';
        } ?>
      </tbody>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>