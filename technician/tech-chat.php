<?php
	$title	= 'Messages';
    include('../functions.php');
    
    isNotAuthenticated();

	if (isset($_GET['client-id']) && intval($_GET['client-id']))
	{
		$client	= getClient($_GET['client-id']);

		$messages 			= getMessages($_SESSION['id'], $client['id']);
		
	} else {

		header('location: ./home.php');
	}


	include('../technician/header.php'); // including header
?>
		<!-- Defining Tech and Client Ids to be used in Ajax Request -->
		<input type="hidden" id="client-id" value="<?=$client['id'] ?>">
		<input type="hidden" id="client-name" value="<?=$client['first_name'] . ' ' . $client['last_name']?>">
		<input type="hidden" id="tech-id" value="<?=$_SESSION['id'] ?>">
		<input type="hidden" id="tech-name" value="<?=$_SESSION['first_name'] . ' ' . $_SESSION['last_name'] ?>">

		<!-- start chat -->
		<!-- in case there are msgs -->
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
											<?php if ($message['sender_id'] == $client['id']) {?>
												<!-- <div class="user-img"> -->
													<span ><img src="../assets/imgs/client.jpg" alt="" class="img-fluid rounded-circle" width="50" /></span>
												<!-- </div> -->
												<div class="user-name pe-3">
													<h6 ><?=$client['first_name'] . ' '. $client['last_name'] ?></h6>
													<p class="text-muted"> <span><?=$message['date']?></span></p>
												</div>
												<?php } else { ?>
													<span ><img src="../assets/imgs/tech.jpg" alt="" class="img-fluid rounded-circle" width="50" /></span>
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
							<input type="hidden" name="receiver" id="receiver-id" value="<?=$client['id']?>">
							<input type="submit" value="Send" class="btn mt-3" onclick="sendMessage()"/>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- end chat -->

		<?php include('../technician/footer.php');?>