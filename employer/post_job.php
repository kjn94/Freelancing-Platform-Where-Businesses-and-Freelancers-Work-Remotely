<?php
    require_once '../core/init.php';
    include '../menu.php';
?>

<html>
  <head>
        <title>Submit a Job</title>
<link href="http://localhost/job_board/css/menu.css" rel="stylesheet" type="text/css" /> <!-- Main Menu -->
<link href="http://localhost/job_board/css/footer.css" rel="stylesheet" type="text/css" /> <!-- Footer Menu -->
<link href="http://localhost/job_board/css/buttons.css" rel="stylesheet" type="text/css" /> <!-- Buttons -->
<link href="http://localhost/job_board/css/style.css" rel="stylesheet" type="text/css" /> <!-- Main Design Content and Sidebar -->
<link href="http://localhost/job_board/css/index.css" rel="stylesheet" type="text/css" /><!-- Other Design -->

<!--- Bootstrap theme - makes the content mobile responsive -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="../js/menucat.js"></script><!-- Makes menu cat clickable -->
  </head>
<body>
 <?php
  include '../includes/register_bar.php';
?>
  <nav class="nav-belowmenu">
      <center><h1>Submit a Job</h1><center>
  </nav>

 <?php
   if(isset($_SESSION['uid']))
   {
      if($type == "employer")
      {
       ?>
  <div id="wrapper">
      <center>
      <br>
      <hr>
      </center>
      <div id="content">
      <center>
           <form action="post_job_parse.php" method="post" enctype="multipart/form-data">
	           <select name="category_id" id="category_id" ><option>---Избери---</option>
		<?php
	           $sql = "SELECT * FROM jobpostscategories";
	           $res = mysqli_query($db, $sql) or die(mysqli_error($db));
	           while ($row = mysqli_fetch_array($res)) 
	           {
			?>
	              <option value=<?php echo $row['id']?>><?php echo $row['category']?></option>
		<?php
	           }
			?>
	  </select><br><br>

	        <input type='text' placeholder="Title" name='job_title' required autocomplete="off"><br><br>
	        <textarea id="description" name="job_description" placeholder="Description"></textarea><br><br>
	        <input type='text' placeholder="Your Budget" name='client_budget' required autocomplete="off"><br><br>
	        <div class="avatar"><input type="file" name="fileToUpload" id="fileToUpload" required></div><br>
	        <input type="submit" name="jobpost_submit" value="Submit a Job"/>
         </form>
      </center>

      </div>
  </div>
    <?php
        }
            else
            {
              echo "<h2>You are not logged in to the system as an employer.</h2>
                    <center>
                        <a href='../login.php'>
                          <button class='button8 button9'>Login</button>
                        </a>
                    </center>";
            }
        }
        else
        {
          echo "<h2>You are not logged in to the system as an employer.</h2>
                <center>
                    <a href='../login.php'>
                      <button class='button8 button9'>Login</button>
                    </a>
                </center>";
        }
    ?>
        </body>
    <!--------FOOTER-------->
<?php
    include '../includes/footer.php';
?>

</html>