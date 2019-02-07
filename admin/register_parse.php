
<?php

session_start();
include_once("../core/init.php");
$mysqli = new mysqli("localhost", "root", "root", "jobs");

$_SESSION['message'] = '';

		if ($_POST['password'] == $_POST['confirmpassword']) {
			$username = $mysqli->real_escape_string($_POST['username']);
			$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
	        $hash = md5($_POST['password']); //md5 has password for security
			$email = $mysqli->real_escape_string($_POST['email']);
			$firstname = $mysqli->real_escape_string($_POST['firstname']);
			$lastname = $mysqli->real_escape_string($_POST['lastname']);


			$type = $mysqli->real_escape_string($_POST['type']);

			$target_dir = "img/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$target_file2 = "../img/users/" . basename($_FILES["fileToUpload"]["name"]);
			$target_file3 = "http://localhost/job_board/img/users/" . basename($_FILES["fileToUpload"]["name"]);

			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

			// Check if user with that email already exists
			$result = $mysqli->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());
			// Check if user with that username already exists
			$result2 = $mysqli->query("SELECT * FROM users WHERE username='$username'") or die($mysqli->error());
			// We know user email exists if the rows returned are more than 0
			if ( $result->num_rows > 0 ) {
			    $_SESSION['message'] = 'User with this email already exists!';
			    header("location: ../error.php");	 
			}

			// We know user email exists if the rows returned are more than 0
			elseif ( $result2->num_rows > 0 ) {
			    $_SESSION['message'] = 'This username is already taken!';
			    header("location: ../error.php");	 
			}
	
			// Allow certain file formats
			elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			    $_SESSION['message'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			    $uploadOk = 0;
			            			    header("location: ../error.php");	 

			}
						// Check if file already exists
			elseif (file_exists($target_file) || file_exists($target_file2)) {
			    $_SESSION['message'] = "Sorry, file already exists.";
			    $uploadOk = 0;
			            			    header("location: ../error.php");	 

			}
// Check if $uploadOk is set to 0 by an error
			elseif ($uploadOk == 0) {
			    $_SESSION['message'] = "Sorry, your file was not uploaded.";
			            			    header("location: ../error.php");	 

			// if everything is ok, try to upload file
			}

		else{
				
		    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file) && copy($target_file, $target_file2)) {
					$sql = "INSERT INTO users (username, password, hash, email, firstname, lastname,category_user_id, type, image) VALUES ('".$username."', '".$password."', '".$hash."', '".$email."', '".$firstname."', '".$lastname."', 8, '".$type."','".$target_file3."')";

					$res = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
		        

		        if($res){
					$_SESSION['active'] = 0; //0 until user activates their account with verify.php
					$_SESSION['message'] = "<h2>Confirmation link has been sent to $email, please verify
	                 your account by clicking on the link in the message!</h2>";
	        
			        // Send registration confirmation link (verify.php)

					require '../phpmailer/src/Exception.php';
					require '../phpmailer/src/PHPMailer.php';
					require '../phpmailer/src/SMTP.php';
					$mail = new PHPMailer\PHPMailer\PHPMailer();
					$mail->isSMTP();
					$mail->SMTPDebug = 2;
					$mail->Host = 'ssl://smtp.gmail.com';
					$mail->Port = 465;
					$mail->SMTPSecure = 'ssl';
					$mail->SMTPAuth = true;
					$mail->Username = "knikolov4521@gmail.com";
					$mail->Password = "K1540rznikolov";
					$mail->setFrom('knikolov4521@gmail.com', 'Job Board Registration');
					$mail->addAddress($email, 'Job Board Registration');
					$mail->Subject = 'Account Verification';
					$mail->Body =  '
						        Hello '.$username.',

						        Thank you for signing up!

						        Please click this link to activate your account:

						        http://localhost/job_board/verify.php?email='.$email.'&hash='.$hash; 
						if($mail->send())
						{
							$_SESSION['message'] = "<h2>Confirmation link has been sent to $email, please verify your account by clicking on the link in the message!</h2>";
                          	header("Location: ../success.php");
                        }
                        else
                        {
							$_SESSION['message'] = "<h3>Confirmation link failed to send!</h3>";
                          	header("Location: ../error.php");
                        }

			}else{
		        $_SESSION['message'] = "Invalid Registration.";
        		header("location: ../error.php");
				exit();
			}


		    } else {
		        $_SESSION['message'] = "Unknown error.";
		        			    header("location: ../error.php");	 

		    }
		}		
	}
	else {
		$_SESSION['message'] = "Two passwords do not match! Please Try Again";
        header("location: ../error.php");
        }

?>