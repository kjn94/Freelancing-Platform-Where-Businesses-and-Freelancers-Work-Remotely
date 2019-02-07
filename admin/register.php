<?php
    require_once '../core/init.php';
   include '../menu.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Register Below</title>
        <link href="../css/index.css" rel="stylesheet" type="text/css">
        <link href="../css/buttons.css" rel="stylesheet" type="text/css" />
        <link href="../style.css" rel="stylesheet" type="text/css">
        <link href="../css/menu.css" rel="stylesheet" type="text/css">
         <link href="../css/footer.css" rel="stylesheet" type="text/css">
          <link href="../css/footer2.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="../css/style.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<?php


    if(!isset($_SESSION ['uid']))
    {
    	?>
  <nav class="nav-belowmenu">
    <center>
      <h1>
        Find Your Dream Job
      </h1><br>
      <h2>Grow your business through the top freelancing website. </h2>
    </center>
  </nav>
        <br><br>
        <center><form action="register_parse.php" method="post" enctype="multipart/form-data">
        <input type='text' placeholder="Username" name='username' required autocomplete="off" maxlength="10"><br>
        <input type='email' placeholder="Email" name='email' required autocomplete="off"><br>
        <input type='password' placeholder="Password" name='password' required autocomplete="off"><br>
        <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required /><br>
        <input type='text' placeholder="Firstname" name='firstname' required autocomplete="off" maxlength="15"><br>
        <input type='text' placeholder="Lastname" name='lastname' required autocomplete="off" maxlength="15"><br>

        <input type="hidden" name="type" value="admin"/>

        <div class="avatar"><p>Upload a picture: </p><input type="file" name="fileToUpload" id="fileToUpload" required></div>

        <br><br>
        <input type='submit' name='submit' value='Register'>
    </center><br><br>

    <?php
    }
    else{
      echo "<p>You are logged in as ".$_SESSION['username']." &bull; <a href='logout_parse.php'> Logout</a>";
    }
    ?>
    <!--------FOOTER-------->
<?php

    include '../includes/footer.php';

?>