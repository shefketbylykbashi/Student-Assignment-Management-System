<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Page | FIEK</title>
	    
    <link href="../assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="../assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/lib/unix.css" rel="stylesheet">
    <link href="../assets/css/style.css?v=<?=$version?>?v=<?=$version?>" rel="stylesheet">

	<style>
		.form-control{
			background-color: #ece0d1;
		}
	</style>

</head>

<body style="background-color: #dbc1ac; color:#38220f; " class="unix-login">
	<section id="contact">
		<div class="col-lg-8 col-lg-offset-1">
			<div class="login-content">

				<div class="login-form"> 
					<h2>Contact Us</h2>
					<?php
						// define variables and set to empty values
						$nameErr = $emailErr = $phoneErr = $inquiryErr = "";
						$name = $email = $phone = $inquiry = $email_message = "";
						$submitted = 0;

						if ($_SERVER["REQUEST_METHOD"] == "POST") {
						   if (empty($_POST["name"])) {
							 $nameErr = "Name is required";
						   } else {
							 $name = clean_data($_POST["name"]);
							 $fill["name"] = $name;
							 // check if name only contains letters and whitespace
							 if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
							   $nameErr = "Only letters and white space allowed"; 
							 }
						   }
						   
						   if (empty($_POST["email"])) {
							 $emailErr = "Email is required";
						   } else {
							 $email = clean_data($_POST["email"]);
							 $fill["email"] = $email;
							 // check if e-mail address is well-formed
							 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
							   $emailErr = "Invalid email format"; 
							 }
						   }
							 
						   if (empty($_POST["phone"])) {
							 $phone = "";
						   } else {
							 $phone = clean_data($_POST["phone"]);
							 $fill["phone"] = $phone;
							 // check if phone number format is valid
							 if (ctype_alpha(preg_replace('/[0-9]+/', '',$phone))) {
							   $phoneErr = "Phone Number Cannot Include Letters"; 
							 }
							 if (!ctype_digit(preg_replace('~[^0-9]~', '',$phone))) {
							   $phoneErr = "Your Phone Number Does Not Include Digits"; 
							 }
						   }

						   if (empty($_POST["inquiry"])) {
							 $inquiryErr = "You Cannot Submit an Empty Inquiry";
						   } else {
							 $inquiry = clean_data($_POST["inquiry"]);
							 $fill["inquiry"] = $inquiry;
						   }
						}

						function clean_data($data) {
							// Strip whitespace (or other characters) from the beginning and end of string
							$data = trim($data);
							// Un-quotes quoted string
							$data = stripslashes($data);
							// Convert special characters to HTML entities
							$data = htmlspecialchars($data);
							return $data;
						}
						// Send email if no errors
						if (isset($fill)) {
							if (empty($nameErr) && empty($emailErr) && empty($phoneErr) && empty($inquiryErr)) {
								// Inquiry sent from address below
								$email_from = "shefketbylykbashi11@gmail.com";
								
								// Send form contents to address below
								$email_to = "shefket.bylygbashi@student.uni-pr.edu";
								
								// Email message subject
								$today = date("j F, Y. H:i:s");
								$email_subject = "Website Submission [$today]";
								
								function clean_string($string) {

									$bad = array("content-type","bcc:","to:","cc:","href");

									return str_replace($bad,"",$string);

								}

								$email_message .= "Name: ".clean_string($name)."\n";

								$email_message .= "Email: ".clean_string($email)."\n";

								$email_message .= "Phone: ".clean_string($phone)."\n";

								$email_message .= "Inquiry: ".clean_string($inquiry)."\n";
								
								// create email headers
								$headers = 'From: '.$email_from."\r\n".
								 
								'Reply-To: '.$email_from."\r\n" .
								 
								'X-Mailer: PHP/' . phpversion();
								 
								@mail($email_to, $email_subject, $email_message, $headers);
								
								$submitted = 1;
							}
						}
					?>
					<div>
						<form name="contactus" method="post" action=" " class="form">
							<div>
								<span>* Name, Email and Inquiry are required fields.</span>
							</div>
							<div>
								<div class="form-group">
									<span>Name</span>
								</div>
								<div class="form-group">
									<input class="form-control" type="text" name="name" placeholder="Name" value="<?php
										if (isset($fill["name"]) && $submitted == 0) {
											echo $fill["name"];
										}?>">
									<span class="<?php
										if (empty($nameErr)) {
											 echo "hidden";
										   } else {
											 echo "error";
										}
									?>"><?php echo $nameErr;?></span>
								</div>
							</div>
							<div class="form-group">
								<div class="form-group">
									<span>Email</span>
								</div>
								<div>
									<input class="form-control" type="text" name="email" placeholder="Email Address" value="<?php
										if (isset($fill["email"]) && $submitted == 0) {
											echo $fill["email"];
										}?>">
									<span class="<?php
										if (empty($emailErr)) {
											 echo "hidden";
										   } else {
											 echo "error";
										}
									?>"><?php echo $emailErr;?></span>
								</div>
							</div>
							<div>
								<div class="form-group">
									<span class="prefix">Phone</span>
								</div>
								<div class="form-group">
									<input class="form-control" type="text" name="phone" placeholder="Phone Number" value="<?php
										if (isset($fill["phone"]) && $submitted == 0) {
											echo $fill["phone"];
										}?>">
									<span class="<?php
										if (empty($phoneErr)) {
											 echo "hidden";
										   } else {
											 echo "error";
										}
									?>"><?php echo $phoneErr;?></span>
								</div>
							</div>
							<div>
								<div class="form-group">
									<span>Inquiry</span>
								</div>
								<div class="form-group">
									<textarea class="form-control" name="inquiry" placeholder="Enter Your Inquiry Here"><?php
										if (isset($fill["inquiry"]) && $submitted == 0) {
											echo $fill["inquiry"];
										}?></textarea>
									<span class="<?php
										if (empty($inquiryErr)) {
											 echo "hidden";
										   } else {
											 echo "error";
										}
									?>"><?php echo $inquiryErr;?></span>
									<div class="form-group">
										<br>
										<input class="form-control" style="background-color: #38220f; color:white; font-weight:500" type="submit" value="Submit" class="btn btn-primary btn-flat m-b-30 m-t-30" />
									</div>
								</div>
							</div>
						</form>
								
						<!-- Success message -->
						<span class="success <?php if ($submitted == 0) { echo "hidden"; } ?>" >Inquiry <strong>Successfully sent</strong></span>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>

</html>