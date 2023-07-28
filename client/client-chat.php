<?php
	$title	= 'Messages';
    include('../functions.php');
    
    isNotAuthenticated();

	if ($_SERVER['REQUEST_METHOD'] === 'POST')
	{
		if (isset($_POST['add-request']))
		{
			addRequest(
				[
					'client_id'     => $_SESSION['id'],
					'tech_id'       => $_POST['tech_id'],
					'speciality'    => $_POST['speciality'],
					]
				);

		} elseif (isset($_POST['solved']))
		{

			problemSolved($_POST['request_id'], $_POST['tech_id']);

		} elseif (isset($_POST['unsolved'])) 
		{
			
			$test = problemNotSolved($_POST['request_id'], $_POST['tech_id']);
		}

		header("Refresh:0");
				
	}
	if (isset($_GET['tech-id']) && intval($_GET['tech-id']))
	{
		$tech	= getTech($_GET['tech-id']);

		$hasDoingRequest	= hasDoingRequest($_SESSION['id'], $tech['id']);

		$messages 			= getMessages($_SESSION['id'], $tech['id']);
		
	} else {

		header('location: ./home.php');
	}


	include('../client/header.php'); // including header
?>
		<!-- Defining Tech and Client Ids to be used in Ajax Request -->
		<input type="hidden" id="tech-id" value="<?=$tech['id'] ?>">
		<input type="hidden" id="tech-name" value="<?=$tech['first_name'] . ' ' . $tech['last_name']?>">
		<input type="hidden" id="client-id" value="<?=$_SESSION['id'] ?>">
		<input type="hidden" id="client-name" value="<?=$_SESSION['first_name'] . ' ' . $_SESSION['last_name'] ?>">
		
		<div class="container mt-5" id="messages-container">
			<!-- start chat -->
			<!-- Printing Messages -->
			<?php if (isset($messages)) {
				if ($messages == 0) { ?>
					<!-- in case there is no msgs -->
					<div class="h-100 d-flex justify-content-center align-items-center">
						<h1>No Messages</h1>
					</div>

				<?php } else {
					foreach ($messages as $message) { ?>
						<div class="row mb-4">
							<div class="col-10">
								<div class="msgs-area">
									<div class="border-bottom">
										<div class="d-flex justify-content-start">
											<?php if ($message['sender_id'] == $tech['id']) {?>
												<!-- <div class="user-img"> -->
													<span ><img src="../assets/imgs/tech.jpg" alt="" class="img-fluid rounded-circle" width="50" /></span>
												<!-- </div> -->
												<div class="user-name pe-3">
													<h6 ><?=$tech['first_name'] . ' '. $tech['last_name'] ?></h6>
													<p class="text-muted"> <span><?=$message['date']?></span></p>
												</div>
												<?php } else { ?>
													<span ><img src="../assets/imgs/client.jpg" alt="" class="img-fluid rounded-circle" width="50" /></span>
													<div class="user-name pe-3">
														<h6 ><?=$_SESSION['first_name'] . ' '. $_SESSION['last_name'] ?></h6>
														<p class="text-muted"> <span><?=$message['date']?></span></p>
													</div>
												<?php }?>
										</div>
										<div class="msg-text mb-3 mt-4"><?=$message['message']?></div>
									</div>
								</div>
							</div>
						</div>
			<?php }
				}
			}?>
		</div>
		<!-- msg box -->
		<div class="container mt-5">
			<div class="row mb-4">
				<div class="col-10">
					<div>
						<form action="" class="msg-box"  onsubmit="return false" method="POST">
							<textarea name="msg_text" class="form-control" id="message" cols="30" rows="10" required></textarea>
							<input type="hidden" name="sender" id="sender-id" value="<?=$_SESSION['id']?>">
							<input type="hidden" name="receiver" id="receiver-id" value="<?=$tech['id']?>">
							<input type="submit" value="Send" class="btn mt-3" onclick="sendMessage()"/>
						</form>
						<!-- ask for service -->
						<?php if ($hasDoingRequest) { ?>
							<div class="mt-5 text-center">
								<form action="" method="POST" class="d-inline mx-3" id="form-solved">
									<input type="hidden" name="solved">
									<input type="hidden" name="tech_id" value="<?=$tech['id']?>">
									<input type="hidden" name="request_id" value="<?=$hasDoingRequest['id']?>">
									<input type="submit" value="Solved" class="btn btn-success px-5" form="form-solved">
								</form>
								<form action="" method="POST" class="d-inline mx-3" id="form-unsolved">
									<input type="hidden" name="unsolved">
									<input type="hidden" name="tech_id" value="<?=$tech['id']?>">
									<input type="hidden" name="request_id" value="<?=$hasDoingRequest['id']?>">
									<input type="submit" value="Not Solved" class="btn btn-danger px-5" form="form-unsolved">
								</form>
							</div>
						<?php } else { ?>
							<form action="" method="POST">
								<input type="hidden" name="add-request">
								<input type="hidden" id="" name="tech_id" value="<?=$tech['id']?>"/>
								<input type="hidden" id="" name="speciality" value="<?=$tech['speciality']?>"/>
								<input type="submit" class="my-2 btn btn-success" value="Requset a service " />
							</form>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<!-- end chat -->

<?php include('../client/footer.php');?>