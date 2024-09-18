<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../resources/css/style2.css">
  <title>Register</title>
</head>

<body>

  <div class="container w-75 mt-5 shadow">
    <div class="row">

      <div class="col-md-6 text-white p-5 div_1">
        <h2 class="header">Welcome to COVID-19 Declaration Web App</h2>
        <hr class="border border-white border-3 opacity-100 rounded-5 w-25 mb-4">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
        magna aliqua. Facilisis volutpat est velit egestas dui. Sit amet nisl purus in mollis nunc sed id. Iaculis nunc
        sed augue lacus viverra.
      </div>

      <div class="col-md-6 p-5 bg-white">
        <h1 class="text-center header">Register</h1>
        <form>
          <div class="mb-3 mt-5">
            <input type="text" class="form-control" id="username" name="username" maxlength="50" placeholder="Username" required>
          </div>
          <div class="mb-3">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" minlength="8" maxlength="20" aria-describedby="password_help" required>
            <div id="password_help" class="form-text">Must be 8-20 characters long.</div>
          </div>
          <button type="submit" class="btn w-100 fw-bold mt-4" id="btn_register" name="btn_register">Register</button>
        </form>

        <div class="container-fluid text-center mt-5">
          <span class="text-muted">Already have an account? </span>
          <a href="../index.php" class="fw-bold">Login</a>
        </div>

      </div>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <script type="text/javascript">
    $(function() {
      $('form').on('submit', function(e) {

        let username = $('#username').val();
        let password = $('#password').val();

        e.preventDefault();

        $.ajax({
          type: 'POST',
          url: 'check_registration.php',
          data: {
            username: username,
            password: password,
          },
          success: function(data) {
            if (data == "1") {
              let timerInterval
              Swal.fire({
                icon: 'success',
                title: 'Successfully Registered!',
                showConfirmButton: false,
                html: 'You will be redirected to Login Page after <br> <b></b> milliseconds.',
                timer: 3000,
                timerProgressBar: true,
                allowOutsideClick: false,
                allowEscapeKey: false,
                didOpen: () => {
                  Swal.showLoading()
                  const b = Swal.getHtmlContainer().querySelector('b')
                  timerInterval = setInterval(() => {
                    b.textContent = Swal.getTimerLeft()
                  }, 100)
                },
                willClose: () => {
                  window.location.href = "http://covid19dwa.atwebpages.com/";
                }
              })
            } else {
              Swal.fire('Username exists, please choose another!')
            }
          },
        });
      });
    });
  </script>

</body>

</html>