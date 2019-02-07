<?php
    require_once '../core/init.php';
    include '../menu.php';
?>

<?php
    if(!isset($_SESSION ['uid']))
    {header("Location: http://localhost/job_board/join-us.php");}
	if($type == "employer")
    {header("Location: http://localhost/job_board/employer/my_jobs.php");}
	if($type == "admin")
    {header("Location: http://localhost/job_board/admin/verify_jobs.php");}
?>



<!DOCTYPE html>
<html>
  <head>
      <title>Apply</title>
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
      <center><h1>Submit a Proposal</h1><center>
  </nav>


  <div id="wrapper">
      <center>
      <br>
      <hr>
      </center>
      <div id="content">
          <center><form action="apply_parse.php" method="post">
          <?php
              $jobposts = '';

          if(isset($_GET['tid']) && is_numeric($_GET['tid']) && isset($_GET['cid']) && is_numeric($_GET['cid']))
          {
              $cid = $_GET['cid'];
              $tid = $_GET['tid'];
              
              $sql = "SELECT * FROM jobposts WHERE category_id='".$cid."' AND id='".$tid."' LIMIT 1";
              $res = mysqli_query($db, $sql) or die(mysqli_error($db));

              if($row2 = mysqli_fetch_assoc($res))
              {
                $title = $row2['job_title'];
                $description = $row2['job_description'];
                $author_id = $row2['author_id'];

                $jobposts.= "
                  <nav class='nav-jobdesc'>
                      <h1>".$title."</h1>
                      <br><br>
                      <p>".nl2br($description)."</p>
                  </nav>
                ";
              }
              echo $jobposts;
              ?>

        <input type='text' placeholder="What is Your Budget?" name='proposed_budget' required autocomplete="off"><br><br>
        <textarea id="description" name="cover_letter" placeholder="Write Your Proposal Here..." required></textarea><br><br>

          <input type="hidden" name="cid" value="<?php echo $cid; ?>"/>
          <input type="hidden" name="tid" value="<?php echo $tid; ?>"/>
          <input type="hidden" name="author_id" value="<?php echo $author_id; ?>"/>
          <input type="submit" name="reply_submit" value="Submit Proposal"/>
          </form></center>
        <?php
          }
          else
          {
            echo "<h1>This Job Does Not Exist.</h1>";
          }
        ?>
      </div>
  </div>
    <!--------FOOTER-------->
<?php
    include '../includes/footer.php';
?>
</body>
</html>