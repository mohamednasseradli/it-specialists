<?php
	$title	= 'Requests';
    include('../functions.php');
    
    isNotAuthenticated(); // Retun user to home page if not signed in

	$requests	= getRequests($_SESSION['id']); // Getting Client requests

	include('../technician/header.php'); // including header
?>
		<main class="container mt-3" style="min-height: 100vh;">
			<div class="mb-4">
				<div class="fs-4">My Requests</div>
			</div>
			<?php if ($requests == 0) { ?>
			<!-- in case there is no services -->
			<div class="h-100 d-flex justify-content-center align-items-center">
				<h1>No Requests</h1>
			</div>
			<div class="container-fluid mt-5 mb-3">
			<?php } else { 
				foreach ($requests as $request) { ?> 
				<!-- loop here -->
				<div class="row mb-3 service">
					<div class="col-md-9">
						<div class="d-flex border rounded p-3">
							<div class="profile-img ms-4">
								<img src="../assets/imgs/client.jpg" class="rounded-circle" alt=""  width="70" height="70"/>
							</div>
							<div class="d-flex justify-content-between w-100 align-items-center">
								<div>
									<div>
										<span><?=$request['client_name']?></span>
									</div>
									<div class="text-muted date mt-1"><?=$request['date']?></div>
									<!-- <div class="mt-2">التخصص: <span><?=$request['speciality']?></span></div> -->
								</div>
								<?php if ($request['status'] == 0) { ?>
									<div class="text-warning fw-bold">Inprogress</div>
								<?php } elseif ($request['status'] == 1) { ?>
									<div class="text-success fw-bold p-3">Solved</div>
								<?php } elseif ($request['status'] == -1) { ?>
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

	<?php include('../technician/footer.php');?>