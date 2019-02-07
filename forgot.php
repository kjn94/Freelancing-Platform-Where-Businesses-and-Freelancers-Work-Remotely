<?php
    require_once 'core/init.php';
   include 'menu.php';
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
    <center>
      <br>
      <h1>Password Reset</h1>
    </center>
  </nav>
      <br><br><br>
      <center>
      <form action="forgot_parse.php" method="post">
        <div class="field-wrap">
          <input type="email" placeholder="Email Address" required autocomplete="off" name="email"/>
        </div>
        <button class="button8 button9"/>Reset</button>
      </form></center>

<br><br><br>
    <?php
  }
?>
    <!--------FOOTER-------->
<?php

    include 'includes/footer.php';

?>