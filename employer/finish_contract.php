<?php
    require_once '../core/init.php';
    include '../menu.php';
?>


<!DOCTYPE html>
<html>
  <head>
        <title>Finish Contract</title>
<link href="http://localhost/job_board/css/menu.css" rel="stylesheet" type="text/css" /> <!-- Main Menu -->
<link href="http://localhost/job_board/css/footer.css" rel="stylesheet" type="text/css" /> <!-- Footer Menu -->
<link href="http://localhost/job_board/css/jobs.css" rel="stylesheet" type="text/css" /> <!-- Main Menu -->
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
      <center><h1>Submit Feedback</h1>
  </nav>

<?php

        $sql = "SELECT type FROM users WHERE id='".$_SESSION['uid']."'";     
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));

if(isset($_GET['tid']) && is_numeric($_GET['tid']) && isset($_GET['aid']) && is_numeric($_GET['aid']))
{
        $aid = $_GET['aid'];
        $tid = $_GET['tid'];
        $contract_id = $_GET['contract_id'];
  if(isset($_SESSION['uid']))
  {
      $sql2 = "SELECT * FROM contracts INNER JOIN users ON users.id=contracts.applicant_id WHERE topic_id=".$tid." AND contracts.applicant_id=".$aid."";
      $res2 = mysqli_query($db,$sql2) or die(mysqli_error($db));
      if(mysqli_num_rows($res2) > 0){
       
        while($row2 = mysqli_fetch_assoc($res2))
        {
          $aid = $row2['applicant_id'];
          $tid = $row2['topic_id'];

            if($row = mysqli_fetch_assoc($res))
            {

                $a = $row['type']; //get the usertype of the user from table row in your database
                if( $a == "freelancer")
                {
                    include 'feedback_form.php';
                }
                else if( $a == "employer")
                {
                   include 'emp_feedback_form.php';
                }
            }
        }
      }
  }
  else
  {
    echo "<h2>You have to login.</h2>
          <center>
              <a href='login.php'>
                <button class='button8 button9'>Login</button>
              </a>
          </center>";
  }
}
else
{
  echo "<h1>The Contract Does Not Exist.</h1>";
}
?>

 </body>

    <!--------FOOTER-------->
<?php
    include '../includes/footer.php';
?>
</body>
</html>