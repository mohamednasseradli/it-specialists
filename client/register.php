<?php

    include('../functions.php');
    // Checking if the comming request is POST request
    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
		
		if (emailExists($_POST['email'])) // checking if email exists in database
		{
			$email_exists	= '<div class="alert alert-warning"> Email exists already </div>';

		} else {

			$success    = registerClient(
				[
					'first_name'    => $_POST['first_name'],
					'last_name'     => $_POST['last_name'],
					'email'         => $_POST['email'],
					'password'      => sha1($_POST['password']),
				]
			);
	
			if($success)
			{
				$register_success = '<div class="alert alert-success"> Signed up successfully, You\'ll be redirected to login page. </div>';
				header('refresh:3;url=login-client.php'); // if registering was successful then redirect to client homepage
	
			} else
			{
				// if registering was unsuccessful then return register_error
				$register_error = '<div class="alert alert-danger"> Something went wrong </div>';
			}
		}
    }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>IT Specialist</title>
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
		<link rel="stylesheet" href="../assets/css/login.css" />
	</head>
	<body>
		<!-- start header -->
		<header class="position-fixed top-0 w-100 py-3 container-fluid bg-dark text-black">
			<nav class="d-flex justify-content-between align-items-center">
				<div>
					<div class="logo text-light">
						<a href="../index.php">IT Specialist</a>
					</div>
				</div>
				<div class="login">
					<a href="./login-client.php" class="ms-1 ms-md-2 px-2 py-1 px-md-3 py-md-2">
						<span class="ps-1"><i class="fa-solid fa-right-to-bracket"></i></span> Sign In
					</a>
					<a href="./register.php" class="px-2 py-1 px-md-3 py-md-2">
						<span class="ps-1"><i class="fa-solid fa-user-plus"></i></span> Sign Up
					</a>
				</div>
			</nav>
		</header>
		<!-- end header -->
		<section class="p-md-5 bg-light container">
			<form action="" method="POST">
				<h2 class="mb-5">Sign Up</h2>
				<!-- Printing Register Warning Message if email exists -->
				<?php if (isset($email_exists)) { echo $email_exists;}?> 
				<!-- Printing Register Success Message if it exists -->
				<?php if (isset($register_success)) { echo $register_success;}?> 
                <!-- Printing Register Error if it exists -->
                <?php if (isset($register_error)) { echo $register_error;}?> 
				<div class="row">
					<div class="col-md-6">
						<div class="mb-3">
							<label for="fn" class="mb-2">First Name<span class="text-danger">*</span></label>
							<input type="text" id="fn" name="first_name" class="form-control" required />
						</div>
					</div>
					<div class="col-md-6">
						<div class="mb-3">
							<label for="fam-n" class="mb-2">Last Name<span class="text-danger">*</span></label>
							<input type="text" id="fam-n" name="last_name" class="form-control" required />
						</div>
					</div>
				</div>
				<div class="mb-3">
					<label for="email" class="mb-2">Email<span class="text-danger">*</span></label>
					<input type="email" id="email" name="email" class="form-control" required />
				</div>
				<div>
					<label for="pass" class="mb-2">Password<span class="text-danger">*</span></label>
					<input type="password" id="pass" name="password" class="form-control" required />
				</div>
				<input type="submit" class="px-md-5 px-4 py-1 rounded mt-3" value="Sign" />
			</form>
		</section>
	</body>
</html>
