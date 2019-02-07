<?php
    require_once 'core/init.php';
   include 'menu.php';

/* The password reset form, the link to this page is included
   from the forgot.php email message
*/
// Make sure email and hash variables aren't empty
if( isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']) )
{
    $email = $db->escape_string($_GET['email']); 
    $hash = $db->escape_string($_GET['hash']); 

    // Make sure user email with matching hash exist
    $result = $db->query("SELECT * FROM users WHERE email='$email' AND hash='$hash'");

    if ( $result->num_rows == 0 )
    { 
        $_SESSION['message'] = "You have entered invalid URL for password reset!";
        header("location: error.php");
    }
}
else {
    $_SESSION['message'] = "Sorry, verification failed, try again!";
    header("location: error.php");  
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Reset Your Password</title>
<link href="http://localhost/job_board/css/menu.css" rel="stylesheet" type="text/css" /> <!-- Main Menu -->
<link href="http://localhost/job_board/css/footer.css" rel="stylesheet" type="text/css" /> <!-- Footer Menu -->
<link href="http://localhost/job_board/css/buttons.css" rel="stylesheet" type="text/css" /> <!-- Buttons -->
<link href="http://localhost/job_board/css/index.css" rel="stylesheet" type="text/css" /><!-- Other Design -->

<!--- Bootstrap theme - makes the content mobile responsive -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<?php
    if(!isset($_SESSION ['uid']))
    {
      ?>
          <nav class="nav-belowmenu">
            <center><h1>Password Reset</h1><center>
          </nav>
      <br><br>
<h2>Please Enter New Password</h2>
<center>
        <form action="reset_password.php" method="post">
            <div class="field-wrap">
              <label>
                <span class="req">*</span>
              </label>
            <input type="password"required placeholder="New Password" name="newpassword" autocomplete="off"/>
            </div>
                
            <div class="field-wrap">
              <label>
                <span class="req">*</span>
              </label>
              <input type="password"required placeholder="Confirm New Password" name="confirmpassword" autocomplete="off"/>
            </div>
            
            <!-- This input field is needed, to get the email of the user -->
            <input type="hidden" name="email" value="<?= $email ?>">    
            <input type="hidden" name="hash" value="<?= $hash ?>">    
            <center>  
              <button class="button8 button9"/>Apply</button>
            </center> 
        </form>
</center>
<br><br><br>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>
    <?php
  }
?>
    <!--------FOOTER-------->
<?php

  include 'includes/footer.php';

?>

