<?php
    require_once '../core/init.php';
    include '../menu.php';
?>


<!DOCTYPE html>
<html>
  <head>
        <title>Proposals</title>
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
      <h1> View Proposal</h1>
      <h2>Here is the proposals that I received.</h2>
    </center>
  </nav>

  <div id="colorlib-container">
            <div class="container">
                <div class="row">
                    <div class="content">
<?php
    $jobposts = "";

    if(isset($_SESSION['uid']))
    {
        if(isset($_GET['tid']) && is_numeric($_GET['tid']) && isset($_GET['aid']) && is_numeric($_GET['aid']) && isset($_GET['eid']) && is_numeric($_GET['eid']))
        {
          $tid = $_GET['tid'];
          $aid = $_GET['aid'];
          $eid = $_GET['eid'];
          //Update the employer has read the proposal
          $sql = "UPDATE applications SET current=0 WHERE topic_id=".$tid." AND applicant_id=".$aid."";
          $res = mysqli_query($db, $sql) or die(mysqli_error($db));

          //check if the the employer has hired the freelancer for this job
          $sql3 = "SELECT * FROM contracts INNER JOIN users ON users.id=contracts.applicant_id WHERE contracts.topic_id=".$tid." AND contracts.applicant_id=".$aid."";
          $res3 = mysqli_query($db,$sql3) or die(mysqli_error($db));

          //hora kandidatsvali za opredelena rabota
          $sql2 = "SELECT * FROM applications INNER JOIN users ON users.id=applications.applicant_id INNER JOIN jobpostscategories ON jobpostscategories.id=users.category_user_id INNER JOIN jobposts ON jobposts.id=applications.topic_id WHERE applications.topic_id=".$tid." AND applications.applicant_id=".$aid."";
          $res2 = mysqli_query($db,$sql2) or die(mysqli_error($db));

          //check if someone has applied for the job
          if(mysqli_num_rows($res2) > 0)
          {
                     
            while($row2 = mysqli_fetch_assoc($res2))
            {
                $image = $row2['image'];
                $picture = $row2['picture'];
                $title = $row2['job_title'];
                $description = $row2['job_description'];
                $client_budget = $row2['client_budget'];
                $timestamp = $row2['timestamp']; 
                $category = $row2['category']; 
                $firstname = $row2['firstname'];
                $lastname = $row2['lastname'];
                $speciality = $row2['category'];                             
                $cover_letter = $row2['cover_letter'];
                $proposed_budget = $row2['proposed_budget']; 
                $picture = $row2['picture'];
 
                $jobposts .= "
                      <article class='blog-entry'>
                          <div class='blog-wrap'>
                              <span class='category text-center'>Category: <strong>".$category."</strong></span>
                              <h2 class='text-center'>".$title."</h2>
                              <div class='blog-image'>
                                  <div class='owl-carousel owl-carousel2 blog-item'>
                                      <div class='item'>
                                      <center><img src=".$picture." class='blog'></center>
                                      </div><br>              
                                  </div>        
                              </div>
                              <span class='category text-center'>Date Posted: ".$timestamp."| <h5>Employer's Budget: <strong></i>$".$client_budget."</strong></h5>
                          </div>
                            <h2 class='desctitle'>Description:</h2>
                          <p class='desc'> ".nl2br($description)."</p> 
                      </article>
                      <hr>
                      <div class='job'>
                          <div class='my-proposal'>
                              <h1 align='center'>Freelancer Proposal</h1>
                              <h2>".$firstname." ".$lastname." - ".$speciality."</h2>
                              <center><img src=".$image." class='blog'></center>
                          </div>
                          <br><br>
                          <h2 class='desctitle'>Cover Letter:</h2>
                          <p class='desc'> ".nl2br($cover_letter)."</p> <br>
                          <h3>Offered Price: <strong>$".$proposed_budget."</strong></h3><br>
                          <center>
                              <a href='../profile.php?aid=".$aid."' target='_blank'>
                                <button class='button8 button9'>View Profile</button>
                              </a>
                          </center><br>
                      </div>                                   
                  ";    
                  }
                  echo $jobposts;
                  if( $type == "admin" || $type == "freelancer")
                  {
                    
                  }
                  else
                  {
                      //check if the the employer has hired the freelancer for this job
                      if(mysqli_num_rows($res3) > 0)
                      {
                          echo "<center><h1>You have already hired this freelancer.</h1></center>";
                      }
                      else
                      {
                          echo "<center><a href='create_contract.php?tid=".$tid."&aid=".$aid."&eid=".$eid."' target='_blank'><button class='button8 button9'>Hire Me</button></a></center>";
                      }
                  }
            }  
        }
        else
        {
          echo "<h1>The Proposal Does Not Exist.</h1>";
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
<?php 
    if($type == "employer")
    {
      include 'includes/sidebar.php';
    }
    elseif( $type == "freelancer")
    {
      include '../includes/sidebar.php';
    }
?>
</div></div></div>
 </body>

    <!--------FOOTER-------->
<?php
    include '../includes/footer.php';
?>
</body>
</html>