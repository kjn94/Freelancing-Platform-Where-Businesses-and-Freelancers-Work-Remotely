<?php
    require_once '../core/init.php';
    include '../menu.php';
?>


<!DOCTYPE html>
<html>
  <head>
        <title>My Jobs</title>
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
    <center>
      <h1>My Jobs</h1>
      <h2>Grow your business through the top freelancing website. </h2>
    </center>
  </nav>


  <div id="colorlib-container">
            <div class="container">
                <div class="row">
                    <div class="content">
  <div class="border"></div>



<?php
    $jobposts = ""; $jobposts2 = "";
    $total = 0;     $total2 = 0;
      
      if(isset($_SESSION['uid']))
      {
        if($type == "employer")
        {
              //all jobs of the user in session with unread proposals
              $sql = "SELECT DISTINCT(jobposts.id), users.firstname, users.lastname, jobposts.job_title, jobposts.picture, jobposts.client_budget, applications.topic_id, jobpostscategories.category FROM jobposts INNER JOIN applications ON jobposts.id = applications.topic_id INNER JOIN users ON users.id = jobposts.author_id INNER JOIN jobpostscategories ON jobpostscategories.id=jobposts.category_id WHERE applications.current=1 AND author_id=".$_SESSION['uid']." ORDER BY applications.id DESC";
              $res = mysqli_query($db,$sql) or die(mysqli_error($db));

              if(mysqli_num_rows($res) > 0)
              {
    
                  while($row = mysqli_fetch_assoc($res))
                  {
                      $firstname = $row['firstname'];
                      $lastname = $row['lastname'];                                                
                      $tid = $row['topic_id'];
                      $category = $row['category'];                    
                      $title = $row['job_title'];
                      $picture = $row['picture'];
                      $client_budget = $row['client_budget']; 

                      //number of unread proposals
                      $sql3 = "SELECT * FROM applications INNER JOIN jobposts ON jobposts.id=applications.topic_id INNER JOIN users ON users.id=applications.applicant_id INNER JOIN jobpostscategories ON jobpostscategories.id=users.category_user_id WHERE topic_id=".$tid." AND author_id=".$_SESSION['uid']." AND applications.current=1 ";
                      $res3 = mysqli_query($db,$sql3) or die(mysqli_error($db));
                      $num_proposals = mysqli_num_rows($res3);
                      $total += $num_proposals;

                      $jobposts2 .= "
                             <ul id='timeline'>
                                  <a href='candidates.php?tid=".$tid."' target='_blank'>
                                    <li class='listing clearfix'>
                                      <div class='image_wrapper'>
                                        <img src='".$picture."' alt='Twitter'>
                                      </div>
                                      <div class='info'>
                                        <span class='job_title'>".$title."</span><br><br>
                                         <span class='job_info'>Category: <strong>".$category."</strong><span>&bull;</span>Client's budget: $".$client_budget."</span>
                                      </div>
                                      <span class='job_type full_time'>New Proposals: <strong>".$num_proposals."</strong></span>
                                    </li>
                                  </a>                           
                                </ul>";                                    
                  }
                  echo "<h2>Jobs With Unread Proposals: <strong>".$total."</strong></h2>";

                  echo $jobposts2;
                  echo "=================================";
              }else{echo "<h2>You do not have any jobs at the moment.</h2>";} 

              //all jobs of the user in session        
              $sql2 = "SELECT * FROM jobpostscategories INNER JOIN jobposts ON jobposts.category_id=jobpostscategories.id  WHERE author_id = ".$_SESSION['uid']." AND active = 1";
              $res2 = mysqli_query($db,$sql2) or die(mysqli_error($db));
              if(mysqli_num_rows($res2) > 0)
              {                   
                  while($row2 = mysqli_fetch_assoc($res2))
                  {
                      $tid = $row2['id'];
                      $title = $row2['job_title'];
                      $picture = $row2['picture'];
                      $client_budget = $row2['client_budget']; 
                      $category = $row2['category'];
                    
                      //number of proposals
                      $sql3 = "SELECT * FROM applications INNER JOIN jobposts ON jobposts.id=applications.topic_id INNER JOIN users ON users.id=applications.applicant_id INNER JOIN jobpostscategories ON jobpostscategories.id=users.category_user_id WHERE topic_id=".$tid." AND author_id=".$_SESSION['uid']."";
                      $res3 = mysqli_query($db,$sql3) or die(mysqli_error($db));
                      $num_proposals2 = mysqli_num_rows($res3);
                      $total2 += $num_proposals2;

                      $jobposts .= "
                          <ul id='timeline'>
                            <a href='candidates.php?tid=".$tid."' target='_blank'>
                              <li class='listing clearfix'>
                                <div class='image_wrapper'>
                                  <img src='".$picture."' alt='Twitter'>
                                </div>
                                <div class='info'>
                                  <span class='job_title'>".$title."</span><br>
                                  <span class='job_info'>Category: ".$category."<span>Client's Budget: $".$client_budget."</span>
                                </div>
                                <span class='job_type full_time'>Number of Candidates ".$num_proposals2."</span>
                              </li>
                            </a>  
                        </ul>"; 
                  }
                  echo "<h2>All Jobs and Total Number of Proposals: <strong>".$total2."</strong></h2> ";
                  echo $jobposts;
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
    }
    else
    {
      echo "<h2>You are not logged in to the system.</h2>
            <center>
                <a href='../login.php'>
                  <button class='button8 button9'>Login</button>
                </a>
            </center>";
    }
?>

</div>
  <?php include 'includes/sidebar.php'?>
</div></div></div>
 </body>

    <!--------FOOTER-------->
<?php
    include '../includes/footer.php';
?>
</body>
</html>