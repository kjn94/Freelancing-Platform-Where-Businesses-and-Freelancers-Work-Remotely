<?php
	if(empty($_GET))
	{
		header("location:index.php");
	}
	
		include "../core/init.php";
		
		$sql="UPDATE users SET active=2 WHERE id=".$_GET['id'];
		mysqli_query($db,$sql);

		$sql2="SELECT * FROM users WHERE id=".$_GET['id'];
		$res = mysqli_query($db,$sql2);
		if($row = mysqli_fetch_assoc($res))
        {
        	$username = $row['username'];
        	$email = $row['email'];
        }   
			        // Send Account Deletion
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
					$mail->Subject = 'Account Approval Notice';
					$mail->Body =  '
						        Hello '.$username.',

						        We are sorry, you your account is be deleted.'; 
					$mail->send();
		header("location:verify_users.php");	
?>