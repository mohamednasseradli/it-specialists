<?php
    include('../functions.php');
    
    isNotAuthenticated(); // Retun user to home page if not signed in

	$techs		= getTechs(); // getting all techs
	$incomingMessages	= incomingMessagesClient($_SESSION['id']); // getting incoming messages 
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title> IT Specialist</title>
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
		<link rel="stylesheet" href="../assets/css/client.css" />
	</head>
	<body>
		<!-- start header -->
		<header class="position-fixed w-100 container-fluid">
			<nav class="d-flex justify-content-between align-items-center">
				<div>
					<div class="logo text-light">
						<a href="../client/home.php">IT Specialist</a>
					</div>
				</div>
				<div class="nav-links d-flex justify-content-center align-items-center">
					<a href="../client/client-basket.php" class="text-light basket">
						<span><i class="fa-solid fa-cart-shopping"></i></span>
					</a>
					<div class="text-light msg-parent position-relative">
						<span><i class="fa-solid fa-envelope"></i></span>
						<div class="bg-light msg position-absolute d-none"  style="max-height: 300px; overflow-y: scroll">
							<!-- Displaying messages in navbar messages box -->
							<?php if ($incomingMessages == 0) { ?>
									<!-- in case there is no messages -->
									<div class="text-center p-3">No messages</div>
								<?php } else {
									
									foreach ($incomingMessages as $message) { ?>
									<a href="../client/client-chat.php?tech-id=<?=$message['sender_id']?>" class="d-block">
										<div class="container">
											<!-- in case there are messages -->
											<div class="row border-bottom mb-1 overflow-hidden p-2">
												<div class="col-2">
													<div class="msg-img overflow-hidden">
														<img src="../assets/imgs/tech.jpg" class="w-100 h-100" alt="" />
													</div>
												</div>
												<div class="col-10">
													<h6><?= $message['tech_name']?></h6>
													<p class="p-0">
														<?= $message['message']?>
													</p>
												</div>
											</div>
										</div>
									</a>
									<?php }
								}
							?>
						</div>
					</div>
					<div class="position-relative nav-img me-md-4" title="user-name">
						<img src="../assets/imgs/client.jpg" class="w-100 rounded-circle" alt="" />
						<a  href="../logout.php" class="bg-light log-out position-absolute d-none">
							Sign Out
						</a>
					</div>
				</div>
			</nav>
		</header>
		<!-- end header -->
		<!-- start hero -->
		<div class="hero position-relative">
			<div class="overlay position-absolute d-flex justify-content-center align-items-center">
				<div class="container text-light">
					<h1 class="text-center mb-3">Welcome to IT Specialist website
</h1>
					<p class="text-center">
                    Our specialists are ready to serve you at any time for any inquiries or technical services 
					</p>
				</div>
			</div>
		</div>
		<!-- end hero -->
		<!--start services section -->
		<div class="services">
			<div class="container">
				<div class="d-flex justify-content-between align-items-center mb-4">
					<div class="fs-4">Our Specialists</div>

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
											<p class="card-text">specialization: <span><?= $tech['speciality']?></span></p>
										
											<div>
												<a href="../client/tech-profile.php?tech-id=<?= $tech['id']?>" class="card-btn text-center py-2 rounded">Contact me</a>
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

		<?php include('../client/footer.php');?>