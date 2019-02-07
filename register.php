<?php
    require_once 'core/init.php';
   include 'menu.php';
   ?>
<html>
<head>
	<title>Register Below</title>

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
      <h1>Find Your Dream Job</h1><br>
      <h2>Grow your business through the top freelancing website. </h2>
    </center>
  </nav>
        <br><br>
        <center>
            <form action="register_parse.php" method="post" enctype="multipart/form-data">
              <input type='text' placeholder="Username" name='username' required autocomplete="off" maxlength="10"><br>
              <input type='email' placeholder="Email" name='email' required autocomplete="off"><br>
              <input type='password' placeholder="Password" name='password' required autocomplete="off"><br>
              <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required /><br>
              <input type='text' placeholder="Firstname" name='firstname' required autocomplete="off" maxlength="15"><br>
              <input type='text' placeholder="Lastname" name='lastname' required autocomplete="off" maxlength="15"><br>
              
              <select name="category_user_id" id="category_user_id" required=""><option value="">Pick a Category</option>
              <?php
                    //get all job categories
                    $sql2 = "SELECT * FROM jobpostscategories";
                    $res2 = mysqli_query($db, $sql2) or die(mysqli_error($db));
                 while ($row2 = mysqli_fetch_array($res2)) 
                 {
                  ?>
                    <option value=<?php echo $row2['id']?>><?php echo $row2['category']?></option>
              <?php
                  }
              
              ?>
              </select><br><br>

              <select name='type' required>
                <option value="">Choose Employer vs Freelancer</option>
                <option value="employer">Employer</option>
                <option value="freelancer">Freelancer</option>
              </select><br><br>

              <div class="avatar"><p>Upload a picture: </p><input type="file" name="fileToUpload" id="fileToUpload" required></div>

              <br><br>
              <input type='submit' name='submit' value='Register'>
            </form>
        </center><br><br>

  <?php
    }
    else
    {
      echo "<p>You are logged in as ".$_SESSION['username']." &bull; <a href='logout_parse.php'> Logout</a>";
    }
  ?>
<!--------FOOTER-------->
<?php

    include 'includes/footer.php';

?>