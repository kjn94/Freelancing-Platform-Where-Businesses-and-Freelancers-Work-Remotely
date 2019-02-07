<?php 
/* Reset your password form, sends reset.php password link */
/* Database connection settings */
include_once("core/init.php");
session_start();

// Check if form submitted with method="post"
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) 
{   
    $email = $db->escape_string($_POST['email']);
    $result = $db->query("SELECT * FROM users WHERE email='$email'");

    if ( $result->num_rows == 0 ) // User doesn't exist
    { 
        $_SESSION['message'] = "User with that email doesn't exist!";
        header("location: error.php");
    }
    else { // User exists (num_rows != 0)

        $user = $result->fetch_assoc(); // $user becomes array with user data
        
        $email = $user['email'];
        $hash = $user['hash'];
        $username = $user['username'];

        // Session message to display on success.php
        $_SESSION['message'] = "<h2>Please check your email <span>$email</span>"
        . " for a confirmation link to complete your password reset!</h2>";

          // Send password forgot link (reset.php)

          require 'phpmailer/src/Exception.php';
          require 'phpmailer/src/PHPMailer.php';
          require 'phpmailer/src/SMTP.php';
          $mail = new PHPMailer\PHPMailer\PHPMailer();
          $mail->isSMTP();
          $mail->SMTPDebug = 3;
          $mail->Host = 'ssl://smtp.gmail.com';
          $mail->Port = 465;
          $mail->SMTPSecure = 'ssl';
          $mail->SMTPAuth = true;
          $mail->Username = "knikolov4521@gmail.com";
          $mail->Password = "K1540rznikolov";
          $mail->setFrom('knikolov4521@gmail.com', 'Job Board Password Reset');
          $mail->addAddress($email, 'Job Board Password Reset');
          $mail->Subject = 'Account New Password';
          $mail->Body =  '
                        Hello '.$username.',

                        You have requested password reset!

                        Please click this link to reset your password:

                        http://localhost/job_board/reset.php?email='.$email.'&hash='.$hash; 
                        //echo "".$email.""; 
                        if($mail->send()){
                          echo "success";
                        }else{
                          echo "failed";
                        }
                                             header("Location: success.php");
  }
}
?>