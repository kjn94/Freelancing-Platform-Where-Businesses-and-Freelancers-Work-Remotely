<?php
    require_once '../core/init.php';
    include '../menu.php';
?>


<!DOCTYPE html>
<html>
  <head>
        <title>Invitation</title>
<link href="http://localhost/job_board/css/menu.css" rel="stylesheet" type="text/css" /> <!-- Main Menu -->
<link href="http://localhost/job_board/css/footer.css" rel="stylesheet" type="text/css" /> <!-- Footer Menu -->
<link href="http://localhost/job_board/css/buttons.css" rel="stylesheet" type="text/css" /> <!-- Buttons -->
<link href="http://localhost/job_board/css/index.css" rel="stylesheet" type="text/css" /><!-- Other Design -->

<!--- Bootstrap theme - makes the content mobile responsive -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
<body>
  <?php
  include '../includes/register_bar.php';
?>
  <nav class="nav-belowmenu">
      <center><h1>Create Invitation</h1></center>
  </nav>


<?php

    if($_SESSION['uid']){
        if(isset($_POST['send_invitation'])){
            include_once("../core/init.php");

            $aid = $_GET['aid'];
            $tid = $_POST['tid'];

            $sql3 = "SELECT * FROM applications WHERE topic_id=".$tid." AND applicant_id=".$aid."";
            $res3 = mysqli_query($db, $sql3) or die(mysqli_error($db)); 
            $sql4 = "SELECT * FROM invitations WHERE topic_id=".$tid." AND applicant_id=".$aid."";
            $res4 = mysqli_query($db, $sql4) or die(mysqli_error($db)); 

            if(mysqli_num_rows($res3) == 1)
            {
                echo "<h1 align='center'>This person has already applied for the job!</h1>
                        <center><a href='proposals.php?tid=".$tid."&aid=".$aid."&eid=".$_SESSION['uid']."' target='_blank'>
                                    <button class='button8 button9'>View His Proposal</button>
                                </a>
                        </center><br>";
            }
            else if(mysqli_num_rows($res3) == 0 && mysqli_num_rows($res4) == 0){
                 $sql2 = "INSERT INTO invitations (topic_id, applicant_id)VALUES('".$tid."','".$aid."')";
                $res2 = mysqli_query($db, $sql2) or die(mysqli_error($db));
                header('Location: success_invitation.php');
            }
            else{
                echo "<center><h1>This person has received an invitation for the job!</h1>";
                echo "<a href='error.php'>
                    <input type='submit' value='View Other Job Offers'/></a>
                    </a></center>";                        
            }
        }
    }
?>
</body>
    <!--------FOOTER-------->
<?php
    include '../includes/footer.php';
?>