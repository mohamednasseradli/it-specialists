<?php
		$title	= 'Technician Page';
    include('../functions.php');
	// include('../includes/header.php');
    isNotAuthenticated();

	if (isset($_GET['tech-id']) && intval($_GET['tech-id']))
	{
		$tech		= getTech($_GET['tech-id']);
		$canRate	= hasRequestBefore($_SESSION['id'], $tech['id']);

	} else {

		header('location: ./home.php');
	}

	include('../client/header.php'); // including header
?>
		<!-- end header -->
		<main class="mb-lg-4">
			<!-- profile section -->
			<div class="container profile">
				<div class="d-flex justify-content-center align-content-center">
					<div class="profile-img">
						<img src="../assets/imgs/tech.jpg" class="w-100" alt="" />
					</div>
				</div>
				<h3 class="text-center my-2"><?= $tech['first_name'] . ' ' . $tech['last_name'] ?></h3>
				<p class="text-center">Specification: <span><?= $tech['speciality']?></span></p>
				<div class="d-flex justify-content-center">
					<a href="../client/client-chat.php?tech-id=<?= $tech['id']?>" class="text-center contact-me btn btn-outline-warning">Contact me</a>
				</div>
			</div>
			<div class="container about-me">
				<div class="row mb-3 mb-md-0">
					<div class="col-md-8 mb-4 mb-md-0">
						<div>
							<h4 class="pb-2 border-bottom">About Me</h4>
						</div>
						<div class="pt-3">
						<?= $tech['bio']?>
						</div>

		</main>

		<?php include('../client/footer.php');?>