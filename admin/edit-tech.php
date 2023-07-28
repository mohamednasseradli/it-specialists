<?php
    include('../functions.php');
    
    // isNotAuthenticated();
    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
      $updateTech = updateTech(
        [
          'first_name'    => $_POST['first_name'],
          'last_name'     => $_POST['last_name'],
          'speciality'    => $_POST['speciality'],
          'bio'           => $_POST['bio'],
        ],
        $_GET['tech-id'],
      );

      if($updateTech)
      {
        $success  = '<div class="alert alert-success"> Specialist updated successfully </div>';
      } else {
        $error  = '<div class="alert alert-danger"> Please make sure to enter all required information </div>';
      }
    } 
    
    if (isset($_GET['tech-id']) && intval($_GET['tech-id']))
    {
      if(!getTech($_GET['tech-id']))

      {
        header('location: ./admin-dashboard');

      } else {

        $tech = getTech($_GET['tech-id']);
        
      }
    }
    
  
?>
<!DOCTYPE html>
<html>
  <title> Add technician | IT Specialist</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
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
  <link rel="stylesheet" href="../assets/css/add-tech.css" />
  <body class="bg-light">
  <?php include('../admin/sidebar.php') ?>

    <div class="w3-main" style="margin-right: 200px">
      <div class="w3-teal">
        <button
          class="w3-button w3-teal w3-xlarge w3-right w3-hide-large sidebar-btn"
          onclick="w3_open()"
        >
          &#9776;
        </button>
      </div>

      <div class="w3-container">
        <div class="container pt-5 d-flex justify-content-center">
          <div>
            <h1>Add technician</h1>
            <!-- Printing Success Message  -->
            <?php if (isset($success)) { echo $success;} ?>
            <!-- Printing Error Message  -->
            <?php if (isset($error)) { echo $error;} ?>
            <form action="" method="POST" class="mt-5 p-3">
              <div class="row">
                <div class="col-6 mb-3">
                  <div>
                    <label for="first-name" class="mb-1"> First name</label>
                    <input
                      id="first-name"
                      type="text"
                      class="form-control border-0 border-bottom rounded-0"
                      name="first_name"
                      value="<?=$tech['first_name'] ?>"
                      required
                    />
                  </div>
                </div>
                <div class="col-6 mb-3">
                  <div>
                    <label for="last-name" class="mb-1">Family name</label>
                    <input
                      id="last-name"
                      type="text"
                      class="form-control border-0 border-bottom rounded-0"
                      name="last_name"
                      value="<?=$tech['last_name'] ?>"
                      required
                    />
                  </div>
                </div>
                <div class="col-12 mb-3">
                  <div>
                    <label for="speciality" class="mb-1">speciality</label>
                    <input
                      id="speciality"
                      type="text"
                      class="form-control border-0 border-bottom rounded-0"
                      name="speciality"
                      value="<?=$tech['speciality'] ?>"
                      required
                    />
                  </div>
                </div>
                <div class="col-12 mb-3">
                  <div>
                    <label for="emil" class="mb-1">Email</label>
                    <input
                      id="email"
                      type="email"
                      disabled
                      class="form-control border-0 border-bottom rounded-0"
                      name="email"
                      value="<?=$tech['email'] ?>"
                      required
                    />
                  </div>
                </div>
                <div class="col-12 mb-3">
                  <div>
                    <label for="bio" class="mb-1">Bio</label>
                    <textarea
                      name="bio"
                      id="bio"
                      class="form-control border-0 rounded-0 border-bottom"
                      rows="8"
                      required
                    ><?=$tech['bio'] ?></textarea>
                  </div>
                </div>
              </div>
              <input type="submit" value="submit" class="px-4 py-2" />
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- admin js file -->
    <script src="../assets/js/admin-dashboard.js"></script>
  </body>
</html>
