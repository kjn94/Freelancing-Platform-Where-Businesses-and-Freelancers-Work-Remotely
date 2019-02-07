<?php
    require_once '../core/init.php';
    include '../menu.php';
?>
<?php
    if(!isset($_SESSION ['uid']))
    {header("Location: http://localhost/job_board/join-us.php");}
    if($type == "freelancer")
      {header("Location: http://localhost/job_board/freelancer/index.php");}
    if($type == "admin")
      {header("Location: http://localhost/job_board/admin/verify_jobs.php");}
?>

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

  $aid = $_GET['aid'];
  if(isset($_SESSION['uid']))
  {
      if(isset($_GET['aid']) && is_numeric($_GET['aid']))
      {
?>
  <div id="wrapper">
      <br>
      <hr>
      <div id="content">
      <center>
        <form action=<?php echo "invitation_parse.php?aid=".$aid."" ?> method="post">
            <select id="tid" name="tid"><option>Pick a job: </option>

        <?php
            //samo tesi, koito sa kandidatstvali za kakvato i da e rabota
            $sql2 = "SELECT * FROM jobposts WHERE author_id = ".$_SESSION['uid']." AND active=1";
            $res2 = mysqli_query($db,$sql2) or die(mysqli_error($db));
            while ($row = mysqli_fetch_array($res2)) 
            {
               $title = $row['job_title'];
               $tid = $row['id'];
        ?>
            <option value=<?php echo $tid ?>><?php echo $title ?></option>
          <?php
            }
          ?>
            </select>
            <br><br>
            <input type="submit" name="send_invitation" value="Send Invitation"/>
        </form>
      </center>

      </div>
  </div>
<?php
        }
        else
        {
          echo "<h1>This Freelancer Does Not Exist.</h1>";
        }
  }
  else
  {
        echo "<h2>You are not logged in as an employer.</h2>
        <a href='../login.php'><button class='button8 button9'>Login</button></a>";

  }
?>

</body>

    <!--------FOOTER-------->
<?php
    include '../includes/footer.php';
?>