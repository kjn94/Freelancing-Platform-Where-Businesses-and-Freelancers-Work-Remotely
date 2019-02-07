<?php
    require_once 'core/init.php';
   include 'menu.php';
?>
<html>
<head>
	<title>Login Below</title>
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
      <h1>Join Our Platform</h1>
      <h2>Build Your Freelance Business</h2>
    </center>
  </nav>
  <br><br>  

        <center>
            <form action="<?php echo htmlspecialchars('login_parse.php');?>" method='post' autocomplete="off">
                <input type='text' placeholder="Username" name='username' required autocomplete="off" maxlength="10"><br>
                <input type='password' placeholder="Password" name='password' required autocomplete="off"><br><br>
                <center><h1><a href="forgot.php">Forgot Password?</a></h1></center>
                <br>
                <input type='submit' name='submit' value='Log In'>
                <br><br><br>
            </form>
          </center>
       
    <?php
    }
    else
    {
      echo "
         <nav class='nav-belowmenu'>
          <center>
            <h1>
              Welcome ".$_SESSION['username']."
            </h1>
            
          </center>
        </nav><br><br>
        <p>You are logged in as ".$_SESSION['username']." &bull; <a href='logout_parse.php'><button class='button8 button9'/> Logout</button></a>";
    }
    ?>

    <!--------FOOTER-------->
<?php
    include 'includes/footer.php';
?>