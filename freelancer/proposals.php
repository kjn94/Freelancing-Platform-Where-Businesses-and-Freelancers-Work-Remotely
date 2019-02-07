<?php
	require '../core/init.php';
	include '../menu.php';
?>

<head>
  <title>My Proposals</title>
  <meta charset="utf-8">
<link href="http://localhost/job_board/css/menu.css" rel="stylesheet" type="text/css" /> <!-- Main Menu -->
<link href="http://localhost/job_board/css/catmenu.css" rel="stylesheet" type="text/css" /> <!-- Category Menu -->
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
			<h1>My Proposals</h1>
			<h2>Here are all of the proposals that I have sent. </h2>
		</center>
	</nav>

<div id="colorlib-container">
      <div class="container">
          <div class="row">
              <div class="content">
                <div class="border"></div>
		
<?php
//check if person is logged in
if(isset($_SESSION['uid']))
{
    if($type == "freelancer")
    {
          $jobposts = "";
          //============ PAGINATION ==================//
            //get the total number of jobposts in a search query
          $sql5 = "SELECT COUNT(jobposts.id) AS total FROM jobpostscategories INNER JOIN users ON users.category_user_id=jobpostscategories.id INNER JOIN jobposts ON users.id=jobposts.author_id INNER JOIN applications ON applications.topic_id=jobposts.id WHERE applications.applicant_id='".$_SESSION['uid']."'";
              $res5 = mysqli_query($db,$sql5) or die(mysqli_error($db));
          $row5 = mysqli_fetch_assoc($res5);
          $total_pages = ceil($row5["total"] / 15); // calculate total pages with results
          include '../includes/pagination_get_page.php';                  

          //get all submitted proposals of the logged person
          $sql2 = "SELECT * FROM jobpostscategories INNER JOIN users ON users.category_user_id=jobpostscategories.id INNER JOIN jobposts ON users.id=jobposts.author_id INNER JOIN applications ON applications.topic_id=jobposts.id WHERE applications.applicant_id='".$_SESSION['uid']."' ORDER BY applications.id DESC LIMIT ".$start_from.", 15";
          $res2 = mysqli_query($db,$sql2) or die(mysqli_error($db));

          //check if there are any submitted proposals
          if(mysqli_num_rows($res2) > 0)
          {        
              //extract all data for the submitted proposals
              while($row2 = mysqli_fetch_assoc($res2))
              {
                  $cid = $row2['category_id'];
                  $tid = $row2['topic_id'];
                  $title = $row2['job_title'];
                  $picture = $row2['picture'];
                  $proposed_price = $row2['proposed_budget'];
                  $client_budget = $row2['client_budget'];                                    
                     $category = $row2['category']; 
                        $firstname = $row2['firstname'];
                        $lastname = $row2['lastname']; 			
                        $jobposts .= "
                           <ul id='timeline'>
                                <a href='proposal_view.php?cid=".$cid."&tid=".$tid."' target='_blank'>
                                  <li class='listing clearfix'>
                                    <div class='image_wrapper'>
                                      <img src=".$picture." alt='Image'>
                                    </div>
                                    <div class='info'>
                                      <span class='job_title'>".$title."</span>
                                      <span class='job_info'><br>Employer: <strong>".$firstname." ".$lastname." </strong><span>&bull;</span>Client's budget: <strong>$".$client_budget."</strong></span><br>Category: <strong>".$category."</strong>
                                    </div>
                                    <span class='job_type full_time'>Offered Price: $".$proposed_price."</span>
                                  </li>
                                </a>                           
                              </ul>";                         
              }
            echo $jobposts;
            include '../includes/pagination.php';
          } 
          else
          {
          	echo "<h1>You have not submitted any proposals yet.</h1>";
          }
    }
    else
    {
      echo "<h2>You are not logged in to the system as a freelancer.</h2>
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
 <?php include '../includes/sidebar.php'?>
        </div>
    </div>
</div>
</body>

<?php
	include '../includes/footer.php';
?>