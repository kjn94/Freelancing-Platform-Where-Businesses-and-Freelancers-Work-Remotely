<?php
    require_once '../core/init.php';
    include '../menu.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Congratulations</title>
<link href="http://localhost/job_board/css/menu.css" rel="stylesheet" type="text/css" /> <!-- Main Menu -->
<link href="http://localhost/job_board/css/footer.css" rel="stylesheet" type="text/css" /> <!-- Footer Menu -->
<link href="http://localhost/job_board/css/buttons.css" rel="stylesheet" type="text/css" /> <!-- Buttons -->
<link href="http://localhost/job_board/css/style.css" rel="stylesheet" type="text/css" /> <!-- Main Design Content and Sidebar -->
<link href="http://localhost/job_board/css/index.css" rel="stylesheet" type="text/css" /><!-- Other Design -->

<!--- Bootstrap theme - makes the content mobile responsive -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
<body>
<?php
    include '../includes/register_bar.php';
?>
    <nav class="nav-belowmenu">
        <center><h1>Congratulations</h1><center>
    </nav>
     <div id="wrapper">
    <center>
        <hr>
  <?php
        $sql = "SELECT type FROM users WHERE id='".$_SESSION['uid']."'";     
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));
        if($row = mysqli_fetch_assoc($res))
        {

            $user_type = $row['type']; //get the usertype of the user from table row in your database
            if( $user_type == "freelancer")
            {
                echo "<h2 align='center'>Your job has been completed.</h2>
                <hr>
            
                <a href='../freelancer/finished_jobs.php'>
                  <input type='submit' name='reply_submit' value='Go To Contracts.'/>
                </a>";
            }
            else if( $user_type == "employer")
            {
                echo "<h2 align='center'>Your job has been completed.</h2>
                <hr>
            
                <a href='post_job.php'>
                  <input type='submit' name='reply_submit' value='Create a new job.'/>
                </a>";
            }
        }

  ?>


            </center>
    </div>
    <!--------FOOTER-------->
<?php

    include '../includes/footer.php';

?>
</body>
</html>