<?php
    require_once '../core/init.php';
    include '../menu.php';
?>


<!DOCTYPE html>
<html>
  <head>
        <title>My Freelancers</title>
<link href="http://localhost/job_board/css/menu.css" rel="stylesheet" type="text/css" /> <!-- Main Menu -->
<link href="http://localhost/job_board/css/catmenu.css" rel="stylesheet" type="text/css" /> <!-- Main Menu -->
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
      <h1>My Freelancers</h1>
    </center>
  </nav>



<?php
                
      //get the total number of jobposts in a search query
      $sql5 = "SELECT COALESCE(AVG(emp_experience), 0) as emp_experience_avg, feedback.applicant_id, users.firstname, users.lastname, users.image, users.description, jobpostscategories.category, feedback.applicant_id, jobposts.author_id, users.id, users.type, users.active FROM users LEFT JOIN feedback ON users.id=feedback.applicant_id INNER JOIN jobpostscategories ON users.category_user_id=jobpostscategories.id INNER JOIN contracts ON users.id=contracts.applicant_id INNER JOIN jobposts ON jobposts.id=contracts.topic_id WHERE users.type = 'freelancer' AND jobposts.author_id = ".$_SESSION['uid']." AND users.active=1 GROUP BY users.id";
          $res5 = mysqli_query($db,$sql5) or die(mysqli_error($db));
      $row5 = mysqli_fetch_assoc($res5);
      // calculate total pages with results
      $total_pages = ceil(mysqli_num_rows($res5) / 6);
      include '../includes/pagination_get_page_freelancers.php';  

include '../includes/functions.php'; //get number of stars for feedback 

    if(isset($_SESSION['uid']))
    {   
        if($type == "employer")
        {
        echo "<div class='border'></div>
              <table class='rwd-table'><tr>"; 
          //get all freelancers who have worked with the user in session
          $sql2 = "SELECT COALESCE(AVG(emp_experience), 0) as emp_experience_avg, feedback.applicant_id, users.firstname, users.lastname, users.image, users.description, jobpostscategories.category, feedback.applicant_id, jobposts.author_id, users.id, users.type, users.active FROM users LEFT JOIN feedback ON users.id=feedback.applicant_id INNER JOIN jobpostscategories ON users.category_user_id=jobpostscategories.id INNER JOIN contracts ON users.id=contracts.applicant_id INNER JOIN jobposts ON jobposts.id=contracts.topic_id WHERE users.type = 'freelancer' AND jobposts.author_id = ".$_SESSION['uid']." AND users.active=1 GROUP BY users.id LIMIT ".$start_from.", 6";
          $res2 = mysqli_query($db,$sql2) or die(mysqli_error($db));
          if(mysqli_num_rows($res2) > 0)
          {
              $counter = 0;
              foreach ($res2 as $row2) 
              {
                 $aid = $row2['id'];
                 $firstname = $row2['firstname'];
                 $lastname = $row2['lastname'];
                 $speciality = $row2['category'];  
                 $image = $row2['image'];
                 $author_id = $row2['author_id'];
                 $description = substr($row2['description'], 0, 100); //100 characters max
                 $avg_num = $row2['emp_experience_avg'];
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
                                <h4>".$speciality."</h4>
                                <p>".$description."</p>                 
                                <a href='../profile.php?aid=".$aid."' target='_blank' class='btn btn-primary btn-custom'>View Profile</a>
                            </div>
                        </td>";
              }
          }   
          echo "</div>";
          echo "<tr></table>";
            //============ PAGINATION ==================//
            include '../includes/pagination.php';
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
 </body>

    <!--------FOOTER-------->
<?php
    include '../includes/footer.php';
?>
</body>
</html>