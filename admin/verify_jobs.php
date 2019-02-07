<?php
	require '../core/init.php';
	include '../menu.php';
?>
        
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="http://localhost/job_board/css/menu.css" rel="stylesheet" type="text/css" /> <!-- Main Menu -->
<link href="http://localhost/job_board/css/catmenu.css" rel="stylesheet" type="text/css" /> <!-- Category Menu -->
<link href="http://localhost/job_board/css/footer.css" rel="stylesheet" type="text/css" /> <!-- Footer Menu -->
<link href="http://localhost/job_board/css/jobs.css" rel="stylesheet" type="text/css" /> <!-- Main Menu -->
<link href="http://localhost/job_board/css/buttons.css" rel="stylesheet" type="text/css" /> <!-- Buttons -->
<link href="http://localhost/job_board/css/style.css" rel="stylesheet" type="text/css" /> <!-- Main Design Content and Sidebar -->
<link href="http://localhost/job_board/css/index.css" rel="stylesheet" type="text/css" /><!-- Other Design -->

<!--- Bootstrap theme - makes the content mobile responsive -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
     <?php
  include '../includes/register_bar.php';
?>
	<nav class="nav-belowmenu">
		<center>
			<h1>Admin Panel</h1>
			<h2>Jobs That Need Your Review</h2>
		</center>
	</nav>

<?php
  if(isset($_SESSION['uid']))
  {  
      if($type == "admin")
      {
?>
        
 <div id="colorlib-container">
            <div class="container">
                <div class="row">
                    <div class="content">
	<div class="border"></div>
    <?php
          $jobposts = "";

            //get the total number of jobposts in a search query
      $sql5 = "SELECT COUNT(jobposts.id) AS total FROM jobpostscategories INNER JOIN jobposts ON jobpostscategories.id=jobposts.category_id WHERE jobposts.active=0";
          $res5 = mysqli_query($db,$sql5) or die(mysqli_error($db));
      $row5 = mysqli_fetch_assoc($res5);
      $total_pages = ceil($row5["total"] / 15); // calculate total pages with results

      include '../includes/pagination_get_page.php';   


          $sql9 = "SELECT * FROM users INNER JOIN jobposts ON users.id=jobposts.author_id WHERE jobposts.active=0 ORDER BY jobposts.id DESC LIMIT ".$start_from.", 15";
          $res9 = mysqli_query($db,$sql9) or die(mysqli_error($db));
          //select all jobs that have to be approved
          $sql2 = "SELECT * FROM jobpostscategories INNER JOIN jobposts ON jobpostscategories.id=jobposts.category_id WHERE jobposts.active=0 ORDER BY jobposts.id DESC LIMIT ".$start_from.", 15";
          $res2 = mysqli_query($db,$sql2) or die(mysqli_error($db));
          if(mysqli_num_rows($res2) > 0)
          {
           
              while($row2 = mysqli_fetch_assoc($res2))
              {
                $cid = $row2['category_id'];
                $tid = $row2['id'];
                $title = $row2['job_title'];
                $picture = $row2['picture'];
                $client_budget = $row2['client_budget'];
                $category = $row2['category'];    

                if($row9 = mysqli_fetch_assoc($res9))
                {
                  $firstname = $row9['firstname'];
                  $lastname = $row9['lastname'];                  

                $jobposts .= "
                 <ul id='timeline'>
                      <a href='job_view.php?cid=".$cid."&tid=".$tid."' target='_blank'>
                        <li class='listing clearfix'>
                          <div class='image_wrapper'>
                            <img src=".$picture.">
                          </div>
                          <div class='info'>
                            <span class='job_title'>".$title."</span>
                            <span class='job_info'>Employer: <strong>".$firstname." ".$lastname."</strong><span>&bull;</span>Category: <strong>".$category."</strong>
                          </div>
                          <span class='job_type full_time'>Client's Budget: $".$client_budget."</span>
                        </li>
                      </a>
                 </ul>                          
                    ";
                }                      
            }
            echo $jobposts;
            //============ PAGINATION ==================//
            include '../includes/pagination.php';            
          }
          else
          {
            echo "<h2>There are not any jobs at the moment.</h2>
                  <center><a href='http://localhost/job_board/admin/jobs_all.php'><button class='button8 button9'>Return to Home</button></a></center><hr>";
          }      
    ?>       
    </div>
    <?php include 'includes/sidebar.php'; ?>
     </div> </div> </div>
<?php
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
    echo "<h1>You are not logged in to the system.</h1>
          <center>
              <a href='../login.php'>
                <button class='button8 button9'>Login</button>
              </a>
          </center>";
    }
?>
</body>

<?php

	include '../includes/footer.php';

?>