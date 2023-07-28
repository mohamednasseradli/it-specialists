<?php
    include('../functions.php');
    
    // isNotAuthenticated();

    if (isset($_GET['status'])) {

      if ($_GET['status'] == 'doing')
      {
        $requests = getRequestsAdmin();
        
      } elseif ($_GET['status'] == 'solved')
      {
        $requests = getRequestsAdmin(1);
        
      } elseif ($_GET['status'] == 'unsolved')
      {
        $requests = getRequestsAdmin(-1);
        
      }

    } else {

      header('location: ./admin-dashboard');
    }

  
?>
<!DOCTYPE html>
<html>
  <title>reports| IT Specialist</title>
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
    <link rel="stylesheet" href="../assets/css/requests.css" />
  <body class="bg-light">
    <div
      class="w3-sidebar w3-bar-block w3-collapse w3-card w3-animate-right"
      style="width: 200px; right: 0"
      id="mySidebar"
    >
      <button
        class="w3-bar-item w3-button w3-large w3-hide-large p-0 text-light close-btn"
        onclick="w3_close()"
      >
        <i class="fa-solid fa-xmark fs-3 px-4 py-3 sidebar-close"></i>
      </button>
      <div class="text-center mt-4 ps-2 fs-4 logo">IT Specialist</div>
      <div class="position-absolute w-100 links">
        <a href="admin-dashboard.php" class="w3-bar-item w3-button text-end"
          ><i class="fa-solid fa-users"></i>Technecians</a
        >

        <button
          onclick="myFunction('Demo1')"
          class="w3-button w3-block w3-right-align requests-btn active"
        >
          <i class="fa-solid fa-user-plus"></i> requests
        </button>

        <div id="Demo1" class="w3-hide">
          <a
            class="w3-button w3-block w3-right-align text-warning"
            href="requests.php?status=doing"
            >working in progress</a
          >
          <a
            class="w3-button w3-block w3-right-align text-success"
            href="requests.php?status=solved"
            >Solved</a
          >
          <a
            class="w3-button w3-block w3-right-align text-danger"
            href="requests.php?status=unsolved"
            >Not solved</a
          >
        </div>

        <a href="#" class="w3-bar-item w3-button text-end"
          ><i class="fa-solid fa-arrow-right-from-bracket"></i>Sign Out</a
        >
      </div>
    </div>

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
        <div class="container pt-5">
          <h2 class="text-center text-muted fs-1">requests </h2>
          <!-- loop here -->
          <?php if (isset($requests)) { 
            foreach ($requests as $request) { ?>
            <div class="row mb-3 service bg-white shadow">
              <div class="col-12">
                <div class="d-flex rounded p-2 bg-white shadow">
                  <div
                    class="d-flex justify-content-between w-100 align-items-center"
                  >
                    <div>
                      <div class="">
                      Technician name
                        <a href="tech-profile.php" class="technecian"
                          ><?=$request['tech_name'] ?></a
                        >
                      </div>
                      <div>Technician : <span><?=$request['client_name'] ?></span></div>
                      <div>
                      Starting date :
                        <span class="text-muted date"><?=$request['date']?></span>
                      </div>
                      <div>Service name : <span><?=$request['speciality']?></span></div>
                    </div>
                      <?php if ($request['status'] == 0)
                      {
                        echo '<div class="text-warning fw-bold ms-3">Working in progress</div>';
                      } elseif ($request['status'] == 1)
                      {
                        echo '<div class="text-success fw-bold ms-3">Solved</div>';
                        
                      } else {
                        
                        echo '<div class="text-danger fw-bold ms-3">Not solved</div>';
                      }
                      
                      ?>
                  </div>
                </div>
              </div>
            </div>
          <?php }
          }?>
        </div>
      </div>
    </div>

    <!-- admin js file -->
    <script src="../assets/js/admin-dashboard.js"></script>
  </body>
</html>
