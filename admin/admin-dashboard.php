
<?php
    include('../functions.php');
    
    // isNotAuthenticated();
  if (isset($_GET['do']) && $_GET['do'] === 'delete')
  {
    if (isset($_GET['tech-id']) && intval($_GET['tech-id']))
    {
      $delete = deleteTech($_GET['tech-id']);

      if($delete)
      {
        $success  = '<div class="alert alert-success"> تم حذف المختص بنجاح </div>';
        header('refresh:2;url=./admin-dashboard.php');
      } else {
        $error  = '<div class="alert alert-danger"> حدث خطأ أثناء الحذف </div>';
      }
    }
  }

	$techs		= getTechs();


?>

<!DOCTYPE html>
<html>
  <title>Admin | IT Specialist</title>
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
    <link rel="stylesheet" href="../assets/css/admin-dashboard.css" />
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
        <!--start services section -->
        <div class="services">
          <div class="container">
            <!-- Printing Success Message  -->
            <?php if (isset($success)) { echo $success;} ?>
            <!-- Printing Error Message  -->
            <?php if (isset($error)) { echo $error;} ?>
            <div class="d-flex justify-content-between align-items-center mb-4">
              <div class="technecians"> Technecians </div>
              <div>
                <a href="./add-tech.php" class="py-2 px-1 py-md-2 px-md-3 add">Add technecians</a>
              </div>
            </div>
            <div class="row g-4">
              <?php if (isset($techs)) 
                {
                  foreach ($techs as $tech) 
                  { ?>
                    <div class="col-md-3">
                      <div class="card">
                        <img src="../assets/imgs/tech.jpg" class="card-img-top" alt="User 1 Photo" />
                        <div class="card-body">
                          <h5 class="card-title text-center"><?= $tech['first_name'] . ' ' . $tech['last_name'] ?></h5>
                          <p class="card-text">specialty: <span><?= $tech['speciality']?></span></p>
                      
                          <div class="text-center">
                            <a href="../admin/edit-tech.php?tech-id=<?= $tech['id']?>" class="btn btn-primary text-white py-2 rounded">Editing</a>
                            <a href="../admin/admin-dashboard.php?do=delete&tech-id=<?= $tech['id']?>" class="btn btn-danger text-white py-2 rounded" onclick="return confirm('are you sure you want to delete this technician؟')">delete </a>
                          </div>
                        </div>
                      </div>
                    </div>
                <?php	}
                }
              ?>
            </div>
          </div>
        </div>
        <!--end services section -->
      </div>
    </div>
<!-- admin js file -->
    <script src="../assets/js/admin-dashboard.js"></script>
  </body>
</html>
