<?php
    require_once '../core/init.php';
    include '../menu.php';
?>

<html>
<head>
  <title>My Candidates</title>
<link href="http://localhost/job_board/css/menu.css" rel="stylesheet" type="text/css" /> <!-- Main Menu -->
<link href="http://localhost/job_board/css/footer.css" rel="stylesheet" type="text/css" /> <!-- Footer Menu -->
<link href="http://localhost/job_board/css/jobs.css" rel="stylesheet" type="text/css" /> <!-- Main Menu -->
<link href="http://localhost/job_board/css/buttons.css" rel="stylesheet" type="text/css" /> <!-- Buttons -->
<link href="http://localhost/job_board/css/style.css" rel="stylesheet" type="text/css" /> <!-- Main Design Content and Sidebar -->
<link href="http://localhost/job_board/css/index.css" rel="stylesheet" type="text/css" /><!-- Other Design -->
<link href="http://localhost/job_board/css/freelancers.css" rel="stylesheet" type="text/css" /><!-- Freelancer Design -->
<link href="http://localhost/job_board/css/interviews.css" rel="stylesheet" type="text/css" /><!-- Other Design -->

<!--- Bootstrap theme - makes the content mobile responsive -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="../js/menucat.js"></script><!-- Makes menu cat clickable -->
  </head>
<body>
  <?php
  include '../includes/register_bar.php';
?>
 <nav class="nav-belowmenu">
    <center>
      <h1>My Candidates</h1>
    </center>
  </nav>


<?php
    include '../includes/functions.php';    //get number of stars for feedback            
    if(isset($_SESSION['uid']))
    {
      if($type == "employer")
      {
        if(isset($_GET['tid']) && is_numeric($_GET['tid']))
        {
          $tid = $_GET['tid'];
        echo "<div class='border'></div>
              <table class='rwd-table'><tr>"; 
              //get freelancers who have sent a proposal to a specific job
              $sql4 = "SELECT COALESCE(AVG(emp_experience), 0) as emp_experience_avg, feedback.applicant_id, firstname, lastname, image, description, applications.current, jobpostscategories.category, users.id, applications.topic_id, jobposts.author_id, type, users.active FROM users LEFT JOIN feedback ON users.id=feedback.applicant_id INNER JOIN jobpostscategories ON users.category_user_id=jobpostscategories.id INNER JOIN applications ON users.id=applications.applicant_id INNER JOIN jobposts ON jobposts.id=applications.topic_id WHERE type = 'freelancer' AND users.active=1 AND applications.topic_id=".$tid." GROUP BY users.id";
              $res2 = mysqli_query($db,$sql4) or die(mysqli_error($db));

              if(mysqli_num_rows($res2) > 0)
              {        
                  $counter = 0;   
                  foreach ($res2 as $row2) 
                  {
                        $aid = $row2['id'];
                        $tid = $row2['topic_id'];
                        $eid = $row2['author_id'];
                        $firstname = $row2['firstname'];
                        $lastname = $row2['lastname'];
                        $speciality = $row2['category'];  
                        $image = $row2['image'];
                        $description = substr($row2['description'], 0, 100); //100 characters max
                        $avg_num = $row2['emp_experience_avg'];
                        $current = $row2['current'];
                    if($counter % 3 == 0)
                    {
                         echo "</tr><tr>";
                    }
                    ++$counter;                        
                          echo "<td>
                                  <div class='container2'>
                                      <div class='avatar-flip'>
                                        <img src='".$image."'>
                                      </div>";
                                    if($avg_num == 0)
                                    {
                                        echo "No Feedback Yet!";
                                    }
                                    else
                                    {
                                      echo "<div id='parent'>";
                                        echo toStars($avg_num);
                                      echo "<div id='hover-content'>
                                                <p>Average rating is <strong>".number_format((float)$avg_num, 2, '.', '')."</strong> out of 5.</p>
                                            </div>
                                        </div>";
                                    }
                                        echo "<h2>".$firstname." ".$lastname."</h2>
                                              <h4>".$speciality."</h4>";
                                      if($current == 1)
                                      {
                                        echo "<p>NEW PROPOSAL</p>";                
                                      }
                                        echo "<p>".$description."</p>                 
                                        <a href='proposals.php?tid=".$tid."&aid=".$aid."&eid=".$eid."' target='_blank' class='btn btn-primary btn-custom'>View Proposal</a>
                                  </div>
                                </td>";              
                  }
                       
              }
              else
              {
                echo "<h2>You have 0 applicants for this job.</h2>";
              }  echo "</div>"; 
              echo "<tr></table>";
              }
              else{echo "<h2>You did not select a job.</h2>";} 
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
    echo "<h2>You are not logged in to the system.</h2>
          <center>
              <a href='login.php'>
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
</body>
</html>