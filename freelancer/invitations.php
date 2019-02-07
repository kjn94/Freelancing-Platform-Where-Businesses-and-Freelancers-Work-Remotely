<?php
	require '../core/init.php';
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
<head>
	<title>Invitations</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../css/index.css">
<link rel="stylesheet" type="text/css" href="../css/catmenu.css">
<link rel="stylesheet" type="text/css" href="../css/jobs.css">

<link rel="stylesheet" type="text/css" href="../css/buttons.css">
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" type="text/css" href="../css/menu.css">
<link rel="stylesheet" type="text/css" href="../css/footer.css">
<link rel="stylesheet" type="text/css" href="../css/footer2.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <?php
  include '../includes/register_bar.php';
?>
	<nav class="nav-belowmenu">
		<center>
			<h1>My Invitations</h1><br>
			<h2>Here are all of the invitations. </h2>
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
            //get the author of the job
            $sql3 = "SELECT * FROM jobposts INNER JOIN invitations ON jobposts.id = invitations.topic_id INNER JOIN users ON users.id = jobposts.author_id";
            $res3 = mysqli_query($db,$sql3) or die(mysqli_error($db));
            //extract all jobs that the freelancer is invited to
            $sql2 = "SELECT * FROM jobposts INNER JOIN invitations ON jobposts.id = invitations.topic_id INNER JOIN users ON users.id =invitations.applicant_id WHERE users.id = '".$_SESSION['uid']."' AND current=1 ORDER BY invitations.id DESC";
            $res2 = mysqli_query($db,$sql2) or die(mysqli_error($db));

              if(mysqli_num_rows($res2) > 0)
              {   
                  while($row3 = mysqli_fetch_assoc($res3))
                  {
                      $firstname = $row3['firstname'];
                      $lastname = $row3['lastname'];                                                
						           if($row2 = mysqli_fetch_assoc($res2))
                       {
                          $cid = $row2['category_id'];
                          $tid = $row2['topic_id'];
                          $title = $row2['job_title'];
                          $image = $row2['picture'];
                          $client_budget = $row2['client_budget']; 
                          $picture = $row2['picture'];

                          $jobposts .= "<ul id='timeline'>
                                              <a href='apply.php?cid=".$cid."&tid=".$tid."' target='_blank'>
                                                <li class='listing clearfix'>
                                                  <div class='image_wrapper'>
                                                      <img src=".$picture." alt='Image'>
                                                  </div>
                                                  <div class='info'>
                                                    <span class='job_title'>".$title."</span>
                                                    <span class='job_info'>".$firstname." <span>&bull;</span> ".$lastname." <span>&bull;</span>Client's budget: $".$client_budget."</span>
                                                  </div>
                                                  <span class='job_type full_time'>Apply For The Job</span>
                                                </li>
                                              </a>                           
                                            </ul>";                         
                      }
                  }
                  echo $jobposts;
              } 
              else
              {
              	echo "<h1>You do not have any invitations for interviews.</h1>
                      <a href='index.php'>
                        <button class='button8 button9'>View Other Jobs</button>
                      </a>";
              }
      }
      else
      {
      	echo "<h1>You are not logged in.</h1>";
      }  
?>
</div>

  <?php include '../includes/sidebar.php'?>
</div></div></div>
 
	<nav class="nav-belowmenu">
    <center>
      <h1>
        My Proposals
      </h1><br>
      <h2>Here are all of the proposals that I have sent. </h2>
    </center>
	</nav>
</body>

<?php

	include '../menu/footer.php';

?>