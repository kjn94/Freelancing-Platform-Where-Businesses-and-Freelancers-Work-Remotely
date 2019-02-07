<?php
    require_once 'core/init.php';
   include 'menu.php';
?>
<html>
<head>
	<title>After Login</title>
<link href="http://localhost/job_board/css/menu.css" rel="stylesheet" type="text/css" /> <!-- Main Menu -->
<link href="http://localhost/job_board/css/footer.css" rel="stylesheet" type="text/css" /> <!-- Footer Menu -->
<link href="http://localhost/job_board/css/buttons.css" rel="stylesheet" type="text/css" /> <!-- Buttons -->
<link href="http://localhost/job_board/css/index.css" rel="stylesheet" type="text/css" /><!-- Other Design -->

<!--- Bootstrap theme - makes the content mobile responsive -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>

<?php
    if(isset($_SESSION ['uid']))
    {
?>
        <nav class="nav-belowmenu">
            <center><h1>Success</h1><center>
        </nav>
    	
        <nav class="thankyou">
    	   <h1>Thank you for being part of the community</h1> 
    	<br>
<?php 
    $message ='';
        if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ):
            $message .= "<h2>".$_SESSION['message']."</h2>";
            echo $message;    

        endif;
?></nav>
        <br>
<?php
    //get the usertype of the user from table row in your database
    $sql = "SELECT * FROM users WHERE id='".$_SESSION['uid']."'";
    $res2 = mysqli_query($db, $sql) or die(mysqli_error($db));
    //redirect based on the type of user
    if(mysqli_num_rows($res2) > 0)
    {     
        while($row2 = mysqli_fetch_assoc($res2))
        {
            $user_type = $row2['type']; //get the usertype of the user from table row in your database

            if( $user_type == "freelancer")
            {
                ?>
                <center>
                    <a href="freelancer/index.php">  
                    <button class="button8 button9"/>Home</button>
                  </a>
                </center>
            <br><br><br>
            <?php
            }
            else if( $user_type == "employer")
            {
                ?>
                <center>
                    <a href="employer/my_jobs.php">  
                    <button class="button8 button9"/>Home</button>
                  </a>
                </center>
            <?php
            }
            else if( $user_type == "admin")
            {
            ?>
                <center>
                    <a href="admin/verify_jobs.php">  
                    <button class="button8 button9"/>Home</button>
                  </a>
                </center>
            <?php
            }
        }
    }
        ?>
<?php
    }
    else{
        echo"
        <nav class='nav-belowmenu'>
            <center><h1>Success</h1><center><br>
            <h2>Thank you for being part of the community</h2>
        </nav>";
              $message ='';
            if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ):
                $message .= "<h2>".$_SESSION['message']."</h2>";
                echo $message;    

            endif;
                echo "<center>
                <a href='login.php'>  
                <button class='button8 button9'/>Login</button>
              </a>
            </center><br>";
}
?>
    <!--------FOOTER-------->
<?php

    include 'includes/footer.php';

?>