<!DOCTYPE html>
<html>
<head>
	<title>Error</title>
<link href="http://localhost/job_board/css/menu.css" rel="stylesheet" type="text/css" /> <!-- Main Menu -->
<link href="http://localhost/job_board/css/footer.css" rel="stylesheet" type="text/css" /> <!-- Footer Menu -->
<link href="http://localhost/job_board/css/buttons.css" rel="stylesheet" type="text/css" /> <!-- Buttons -->
<link href="http://localhost/job_board/css/index.css" rel="stylesheet" type="text/css" /><!-- Other Design -->

<!--- Bootstrap theme - makes the content mobile responsive -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>

<?php
    require_once '../core/init.php';
   include '../menu.php';

    if(isset($_SESSION ['uid']))
    {
    	?>
        
        <nav class="nav-belowmenu">
            <center><h1>Error Page</h1><center>
        </nav>
    	
    	<br>
        <nav class="thankyou">
        <?php 
            $message = '';
                if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ):
                    $message .= "<h1>".$_SESSION['message']."</h1>";    
                    echo $message;
                endif;
            ?>
        </nav>
        <br>
        <center>  
            <a href="post_job.php">
                <button class="button8 button9"/>Try Again</button>
            </a>
            <a href="my_jobs.php">
                <button class="button8 button9"/>My Jobs</button>
            </a>
        </center>
        <br><br><br>

    <?php
    }
    else{
      echo "<h1>You are logged in as ".$_SESSION['username']."</h1> <a href='../logout_parse.php'> Logout</a>";
    }
    ?>

    <!--------FOOTER-------->
<?php

    include '../includes/footer.php';

?>