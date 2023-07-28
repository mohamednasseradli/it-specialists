<?php
    include('../functions.php');

    isAuthenticated(); // checking if user already logged in

    if ($_SERVER['REQUEST_METHOD'] === "POST")
    {
        // Calling Auth Function
        $login  = authAdmin($_POST['email'], $_POST['password']);
        if ($login)
        {
            header('location: ./admin-dashboard.php'); // redirecting to home page
            
        } else {

            $login_error    = '<div class="alert alert-danger"> Incorrect email or password! </div>';
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Login | IT Specialist</title>
    <!-- CDN bootstrap -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css"
      integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js"
      integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <!-- CDN font awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
      integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!-- main css file -->
    <link rel="stylesheet" href="../assets/css/admin-login.css" />
  </head>
  <body>
    <section class="p-5 bg-light container">
      <form action="" method="POST">
        <h2 class="mb-5">Login</h2>
                        <!-- Printing Login Error if it exists -->
				<?php if (isset($login_error)) { echo $login_error;}?> 
        <div class="mb-3">
          <label for="email" class="mb-2">Email</label>
          <input
            type="email"
            id="email"
            name="email"
            class="form-control"
          />
        </div>
        <div>
          <label for="pass" class="mb-2">Password</label>
          <input
            type="password"
            id="pass"
            name="password"
            class="form-control"
          />
        </div>
        <input
          type="submit"
          class="px-md-5 px-4 py-1 rounded mt-3"
          value="Login"
        />
      </form>
    </section>
  </body>
</html>
