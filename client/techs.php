<?php
	$title	= 'Technicians';
    include('../functions.php');
    
    isNotAuthenticated(); // Retun user to home page if not signed in

	$techs		= getTechs(false); // getting all techs
	$incomingMessages	= incomingMessagesClient($_SESSION['id']); // getting incoming messages 
    include('../client/header.php')
?>

		<!--start services section -->
		<div class="services">
			<div class="container py-5">
				<div class="d-flex justify-content-center align-items-center mb-4">
					<h1 class="fs-4">Technicians</h1>
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
											<p class="card-text">Specification: <span><?= $tech['speciality']?></span></p>
										
											<div class="text-center">
												<a href="../client/tech-profile.php?tech-id=<?= $tech['id']?>" class="btn btn-outline-warning rounded-0 text-center py-2 w-100">Contact me</a>
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