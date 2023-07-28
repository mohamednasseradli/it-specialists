<?php
	$title	= 'Requests';
    include('../functions.php');
    
    isNotAuthenticated(); // Retun user to home page if not signed in

	$purchases	= getPurchases($_SESSION['id']); // Getting Client Request

	include('../client/header.php'); // including header
?>

		<main class="container mt-3">
			<div class="mb-4">
				<div class="fs-4">My Request</div>
			</div>
			<?php if ($purchases == 0) { ?>
			<!-- in case there is no services -->
			<div class="h-100 d-flex justify-content-center align-items-center">
				<h1>No Request</h1>
			</div>
			<div class="container-fluid mt-5 mb-3">
			<?php } else { 
				foreach ($purchases as $purchase) { ?> 
				<!-- loop here -->
				<div class="row mb-3 service">
					<div class="col-md-9">
						<div class="d-flex border rounded p-3">
							<div class="profile-img ms-4">
								<img src="../assets/imgs/tech.jpg" class="" alt=""  width="70" height="70"/>
							</div>
							<div class="d-flex justify-content-between w-100 align-items-center">
								<div>
									<div>
										<a href="../client/tech-profile.php?tech-id=<?=$purchase['tech_id']?>"><?=$purchase['tech_name']?></a>
									</div>
									<div class="text-muted date mt-1"><?=$purchase['date']?></div>
									<div class="mt-2">Specification: <span><?=$purchase['speciality']?></span></div>
								</div>
								<?php if ($purchase['status'] == 0) { ?>
									<div class="text-warning fw-bold">Doing</div>
								<?php } elseif ($purchase['status'] == 1) { ?>
									<div class="text-success fw-bold p-3">Solved</div>
								<?php } elseif ($purchase['status'] == -1) { ?>
								<div class="text-danger fw-bold">Not Solved</div>
								<?php }?>
							</div>
						</div>
					</div>
				</div>
			<?php }
				}?>
				<!-- loop here -->
			</div>
		</main>

		<?php include('../client/footer.php');?>