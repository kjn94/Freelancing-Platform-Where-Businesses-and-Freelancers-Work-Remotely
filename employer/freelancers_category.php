<?php
	require '../core/init.php';
	include '../menu.php';
?>

<?php
				$sql = "SELECT * FROM jobpostscategories ORDER BY id ASC";
		        $res = mysqli_query($db, $sql) or die(mysqli_error($db));
		        $categories = "";
		        if(mysqli_num_rows($res) > 0){
		            while($row = mysqli_fetch_assoc($res)){
		              $id = $row['id'];
		              $title = $row['category'];
		              $categories .= "<a href='freelancers_category.php?cid=".$id."'>".$title." <font size='-1'></font></a>";

		            }
		        }else{
		          echo "<p> There are no categories available yet.</p>";
		        }
			
		    ?>

<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="http://localhost/job_board/css/menu.css" rel="stylesheet" type="text/css" /> <!-- Main Menu -->
<link href="http://localhost/job_board/css/catmenu.css" rel="stylesheet" type="text/css" /> <!-- Main Menu -->
<link href="http://localhost/job_board/css/footer.css" rel="stylesheet" type="text/css" /> <!-- Footer Menu -->
<link href="http://localhost/job_board/css/jobs.css" rel="stylesheet" type="text/css" /> <!-- Main Menu -->
<link href="http://localhost/job_board/css/buttons.css" rel="stylesheet" type="text/css" /> <!-- Buttons -->
<link href="http://localhost/job_board/css/style.css" rel="stylesheet" type="text/css" /> <!-- Main Design Content and Sidebar -->
<link href="http://localhost/job_board/css/index.css" rel="stylesheet" type="text/css" /><!-- Other Design -->
<link href="http://localhost/job_board/css/freelancers.css" rel="stylesheet" type="text/css" /><!-- Freelancer Design -->
<link href="http://localhost/job_board/css/interviews.css" rel="stylesheet" type="text/css" />
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
			<h1>Find Your Dream Job</h1>
			<h2>Grow your business through the top freelancing website. </h2>
		</center>
	</nav>


 <!--  Category Menu-->
<div class="topnav" id="myTopnav">
  <?php echo $categories ?>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
<br><br>

 <!--  Content Area-->
   
<?php
                
include '../includes/functions.php';

//check if you are logged in
if(isset($_SESSION['uid']))
{   //check if category isset
    if(isset($_GET['cid']) && is_numeric($_GET['cid']))
    {
    $cid = $_GET['cid'];

?>
      <center>
      <form action=<?php echo "freelancers_category.php?cid=".$cid."" ?> method="POST">
        <input type="text" name="name" />
        <input type="submit" name="search" value="Search a Freelancer" />
      </form>
    </center>
<?php
echo "<div class='border'></div>
      <table class='rwd-table'><tr>"; 
            if(isset($_POST["name"]))
            {
              $name = $_POST['name']; 
            }
            //checking if the search form isset
            if (isset($_GET["name"]))
            {
              $name = $_GET['name'];
            }
            if(!empty($name))
            {
              $name_url = "&name=".$name."";
              //get the total number of jobposts in a search query
              $sql5 = "SELECT COALESCE(AVG(emp_experience), 0) as emp_experience_avg, applicant_id, firstname, lastname, image, description, jobpostscategories.category, users.id, type, active FROM users LEFT JOIN feedback ON users.id=feedback.applicant_id INNER JOIN jobpostscategories ON users.category_user_id=jobpostscategories.id WHERE type = 'freelancer' AND active=1 AND jobpostscategories.id=".$cid." AND (firstname LIKE '%$name%' OR lastname LIKE '%$name%' OR username LIKE '%$name%') GROUP BY users.id";
                  $res5 = mysqli_query($db,$sql5) or die(mysqli_error($db));
              $row5 = mysqli_fetch_assoc($res5);
              // calculate total pages with results
              $total_pages = ceil(mysqli_num_rows($res5) / 6); 
            }
            else
            {
              $name_url="";
              //get the total number of jobposts in a search query
              $sql5 = "SELECT COALESCE(AVG(emp_experience), 0) as emp_experience_avg, applicant_id, firstname, lastname, image, description, jobpostscategories.category, users.id, type, active FROM users LEFT JOIN feedback ON users.id=feedback.applicant_id INNER JOIN jobpostscategories ON users.category_user_id=jobpostscategories.id WHERE type = 'freelancer' AND active=1 AND jobpostscategories.id=".$cid." GROUP BY users.id";
                  $res5 = mysqli_query($db,$sql5) or die(mysqli_error($db));
              $row5 = mysqli_fetch_assoc($res5);
              // calculate total pages with results
              $total_pages = ceil(mysqli_num_rows($res5) / 6); 
            }
            $prev_page = 0;
            $next_page = 2;
          //checking if a page is set
          if (isset($_GET["page"])) 
          { 
            $page  = $_GET["page"]; $prev_page = $page - 1; $next_page = $page + 1;
                  //check if user entered wrong page in url
                if ($_GET['page'] > $total_pages) 
                { 
                  echo "<h1>This page does not exist.</h1>";
                  echo "<center>
                            <a href='".$_SERVER['PHP_SELF']."?page=1'>
                              <button class='button8 button9'>Go To First Page</button>
                            </a>
                        </center>";
                  include '../includes/footer.php';
                exit();
                } 
           } 
           else 
           { $page=1; }
          $start_from = ($page-1) * 6;


            $sql = "SELECT * FROM jobpostscategories WHERE id='".$cid."' LIMIT 1";
            $res = mysqli_query($db, $sql) or die(mysqli_error($db));
          
            //check if there is a category
            if(mysqli_num_rows($res) == 1)
            {
                $sql2 = "SELECT COALESCE(AVG(emp_experience), 0) as emp_experience_avg, applicant_id, firstname, lastname, image, description, jobpostscategories.category, users.id, type, active FROM users LEFT JOIN feedback ON users.id=feedback.applicant_id INNER JOIN jobpostscategories ON users.category_user_id=jobpostscategories.id WHERE type = 'freelancer' AND active=1 AND jobpostscategories.id=".$cid." ";
                  if(!empty($name) )
                  {         
                    $sql2 .= " AND (firstname LIKE '%$name%' OR lastname LIKE '%$name%' OR username LIKE '%$name%') ";
                  } 
                  $sql2 .= " GROUP BY users.id LIMIT ".$start_from.", 6";    
                $res2 = mysqli_query($db, $sql2) or die(mysqli_error($db));

                $counter = 0;
                //check if there are freelancers
                if(mysqli_num_rows($res2) > 0)
                {
                    foreach ($res2 as $row2) 
                    {
                        $aid = $row2['id'];
                         $firstname = $row2['firstname'];
                         $lastname = $row2['lastname'];
                         $speciality = $row2['category'];  
                         $image = $row2['image'];
                         $description = substr($row2['description'], 0, 100);
                         $avg_num = max($row2['emp_experience_avg'], 1);

                          if($counter % 3 == 0)
                          {
                               echo "</tr><tr>";
                          }
                          ++$counter; 
                            echo "
                            <td>
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
                              </div></td>"; 
                    }echo "<tr></table>";

                  //============ PAGINATION ==================//
                        echo "<div class='row'>
                                <div class='col-md-12 text-center'>
                                  <ul class='pagination'>";
                          if ($prev_page == 0) 
                          { 
                            //echo "<li class='disabled'><a href='#'>&laquo;</a></li>";
                          }
                          else
                          { 
                            echo "<li><a href='".$_SERVER['PHP_SELF']."?page=".$prev_page."".$name_url."'>&laquo;</a></li>";
                          }

                              for ($i=1; $i<=$total_pages; $i++) 
                              {  // print links for all pages
                                        if ($i==$page) 
                                        { 
                                          echo "<li class='active'><a href='".$_SERVER['PHP_SELF']."?page=".$i."".$name_url."'>".$i."</a></li>";
                                        }
                                  else
                                  { 
                                    echo "<li><a href='".$_SERVER['PHP_SELF']."?page=".$i."".$name_url."'>".$i."</a></li>";
                                  }
                              } 

                          if ($next_page == $total_pages + 1) 
                          { 
                            //echo "<li class='disabled'><a href='#'>&raquo;</a></li>";
                          }
                          else
                          {
                            echo "<li><a href='".$_SERVER['PHP_SELF']."?page=".$next_page."".$name_url."'>&raquo;</a></li>";
                          }
                            echo "</ul>
                          </div>
                        </div>";
                  //============ PAGINATION ==================//                                                    
              }   
              else
              {
                 echo "<br>";
                 echo "<h2>There are no freelancers.</h2>";
                 echo "<center><a href='http://localhost/job_board/employer/search_freelancers.php'><button class='button8 button9'>See All Freelancers</button></a></center>";
              }
        }
        else
        {
                echo "<h2>You are trying to view a category that does not exist yet.</h2>";
                echo "<center><a href='http://localhost/job_board/employer/search_freelancers.php'><button class='button8 button9'>See All Freelancers</button></a></center>";
        }
    }
    else
    {
            echo "<h2>You are trying to view a category that does not exist yet.</h2>";
            echo "<center><a href='http://localhost/job_board/employer/search_freelancers.php'><button class='button8 button9'>See All Freelancers</button></a></center>";
    }
 
}
else
{
  echo "<h2>You have to login.</h2>
        <center>
            <a href='login.php'>
              <button class='button8 button9'>Login</button>
            </a>
        </center>";
}
?> 
   
      </div>
  </center>
</body>

<?php
	include '../includes/footer.php';
?>