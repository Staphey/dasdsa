<!DOCTYPE html>
<html lang="en">

<head>
	<title> KNCHS - SPED ID</title>
	<link rel='stylesheet'
		href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css'>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
	<link rel="stylesheet" href="scss/index.css">
	<link rel="stylesheet" href="css/index.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
		rel="stylesheet">
	<script src="js/app.js" defer></script>
</head>

<body>
	<div class="container py-3">

		<div class="row">
			<div class="col-md-12">

				<div class="row justify-content-center">
					<div class="col-md-6">
						<div class="card card-outline-secondary">
							<div class="card-header">
								<h3 class="mb-0">User Information</h3>
							</div>
							<?php
							$name = "";
							$emergency_number = "";
							$age = "";
							$email = "";
							$address = "";
							$health = "";

							if (isset($_POST["btnsubmit"])) {
								$name = $_POST["name"];
								$emergency_number = $_POST["emergency_number"];
								$age = $_POST["age"];
								$address = $_POST["address"];
								$health = $_POST["health"];

								/*echo "<pre>";
								var_dump($_POST);
								echo "</pre>";*/
							}

							?>
							<div class="card-body">
								<form autocomplete="off" class="form" role="form" action="index.php" method="post">
									<div class="form-group row">
										<label   class="col-lg-3 col-form-label form-control-label">Name</label>
										<div class="col-lg-9">
											<input class="form-control" type="text" value="<?php echo $name; Name: ?>"
												name="name">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label form-control-label">Emergency Contact Number</label>
										<div class="col-lg-9">
											<input class="form-control" type="text" value="<?php echo $emergency_number; ?>"
												name="emergency_number">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label form-control-label">Age</label>
										<div class="col-lg-9">
											<input class="form-control" type="text" value="<?php echo $age; ?>"
												name="age">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label form-control-label">Email</label>
										<div class="col-lg-9">
											<input class="form-control" type="email" value=""
												name="email">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label form-control-label">Address</label>
										<div class="col-lg-9">
											<input class="form-control" type="text" value="<?php echo $address; ?>"
												name="address">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label form-control-label">Health Information</label>
										<div class="col-lg-9">
											<input class="form-control" type="text" value="<?php echo $health; ?>"
												name="health">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-1g-3 col-form-label form-control-label"></label>
										<div class="col-lg-9">
											<input class="btn btn-primary" type="submit" name="btnsubmit"
												value="Generate QR Code">
										</div>
									</div>
								</form>
								<?php
								include "phpqrcode/qrlib.php";
								$PNG_TEMP_DIR = 'temp/';
								if (!file_exists($PNG_TEMP_DIR))
									mkdir($PNG_TEMP_DIR);

								$filename = $PNG_TEMP_DIR . 'test.png';
								if (isset($_POST["btnsubmit"])) {

									$codeString = $_POST["name"] . "\n";
									$codeString .= $_POST["emergency_number"] . "\n";
									$codeString .= $_POST["age"] . "\n";
									$codeString .= $_POST["address"] . "\n";
									$codeString .= $_POST["health"] . "\n";

									$filename = $PNG_TEMP_DIR . 'test' .
										md5($codeString) . ' .png';

									QRCode::png($codeString, $filename);

									echo '<img src="' . $PNG_TEMP_DIR .
										basename($filename) . '"/><hr/>';
								}
								?>
							</div>
						</div>

					</div>
				</div>

			</div>
		</div>

		<body>

</html>