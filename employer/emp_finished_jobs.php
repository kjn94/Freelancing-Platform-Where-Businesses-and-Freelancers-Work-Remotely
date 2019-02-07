<?php
	require '../core/init.php';
    include '../menu.php';
?>
<?php
    if(!isset($_SESSION ['uid']))
    {header("Location: http://localhost/job_board/join-us.php");}
    if($type == "freelancer")
      {header("Location: http://localhost/job_board/freelancer/finished_jobs.php");}
    if($type == "admin")
      {header("Location: http://localhost/job_board/admin/verify_jobs.php");}
?>
<head>
	<title>Finished Jobs</title>
<meta charset="utf-8">
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
		if(isset($_SESSION['uid']))
    {
      $jobposts = "";

      //get the total number of jobposts in a search query
      $sql5 = "SELECT COUNT(jobposts.id) AS total FROM jobposts INNER JOIN contracts ON jobposts.id = contracts.topic_id INNER JOIN users ON users.id = contracts.applicant_id WHERE contracts.finished = 1 AND jobposts.author_id=".$_SESSION['uid']."";
      $res5 = mysqli_query($db,$sql5) or die(mysqli_error($db));
      $row5 = mysqli_fetch_assoc($res5);
      $total_pages = ceil($row5["total"] / 15); // calculate total pages with results
      include '../includes/pagination_get_page.php';        
              //all finished contracts for employer in session
              $sql2 = "SELECT * FROM jobposts INNER JOIN contracts ON jobposts.id = contracts.topic_id INNER JOIN users ON users.id = contracts.applicant_id WHERE contracts.finished = 1 AND jobposts.author_id=".$_SESSION['uid']." ORDER BY contracts.endDate DESC LIMIT ".$start_from.", 15";
              $res2 = mysqli_query($db,$sql2) or die(mysqli_error($db));
              //checks if query res2 returns a row
              if(mysqli_num_rows($res2) > 0)
              {
                  //extract all data for all finished contracts
                  while($row2 = mysqli_fetch_assoc($res2))
                  {
                    $cid = $row2['category_id'];
                    $aid = $row2['applicant_id'];
                    $tid = $row2['topic_id'];
                    $eid = $row2['author_id'];
                    $title = $row2['job_title'];
                    $picture = $row2['picture'];
                    $firstname = $row2['firstname'];
                    $lastname = $row2['lastname'];                           
                    $client_budget = $row2['client_budget']; 
                    $agreed_price = $row2['agreed_price']; 
                
                    $jobposts .= "
                         <ul id='timeline'>
                              <a href='proposals.php?tid=".$tid."&aid=".$aid."&eid=".$eid."'>
                                <li class='listing clearfix'>
                                  <div class='image_wrapper'>
                                    <img src=".$picture.">
                                  </div>
                                  <div class='info'>
                                    <span class='job_title'>".$title."</span>
                                    <span class='job_info'>".$firstname."<span>&bull;</span>".$lastname."<span>&bull;</span> Client's Budget: $".$client_budget."</span>
                                    <a href='../view_contract.php?tid=".$tid."&aid=".$aid."&eid=".$eid."' target='_blank'><button class='button8 button9'>View Contract</button></a>
                                  </div>
                                  <span class='job_type full_time'>Agreed Price: $".$agreed_price."</span>
                                </li>
                              </a>  
                          </ul>";  
             
                  }
                  echo $jobposts;
                  //============ PAGINATION ==================//
                  include '../includes/pagination.php';                  
              } 
              else
              {
                echo "<h2>You do not have finished jobs yet.</h2>";
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

<?php

	include '../includes/footer.php';

?>