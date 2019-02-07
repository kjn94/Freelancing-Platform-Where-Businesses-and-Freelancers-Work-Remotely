<?php
	require '../core/init.php';
	include '../menu.php';
	include('../includes/job_cat_link.php');
?>

<head>
	<title>Job Posts</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="http://localhost/job_board/css/menu.css" rel="stylesheet" type="text/css" /> <!-- Main Menu -->
<link href="http://localhost/job_board/css/catmenu.css" rel="stylesheet" type="text/css" /> <!-- Category Menu -->
<link href="http://localhost/job_board/css/footer.css" rel="stylesheet" type="text/css" /> <!-- Footer Menu -->
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
			<h1>
				Find Your Dream Job
			</h1>
			<h2>Grow your business through the top freelancing website. </h2>
		</center>
	</nav>

  <!--  Category Jobs-->
<div class="topnav" id="myTopnav">
  <?php echo $categories ?>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()"><img src="../img/menu_icon.png" height="30px" width="30px">
    <i class="fa fa-bars"></i>
  </a>
</div>

 <!--  Content Area-->
<div id="colorlib-container">
			<div class="container">
				<div class="row">
					<div class="content">
					<!---Search Form --->
					<center>
				      <form action="index.php" method="POST">
				        <input type="text" name="name" />
				        <input type="submit" name="search" value="Search a Job" />
				      </form>
				    </center>

	<?php 
	    $jobposts = "";
		//checking if the search form is submitted
	    if(isset($_POST["name"]) )
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
			$sql5 = "SELECT COUNT(ID) AS total FROM jobposts WHERE active = 1 AND  job_title LIKE '%$name%'";
	        $res5 = mysqli_query($db,$sql5) or die(mysqli_error($db));
			$row5 = mysqli_fetch_assoc($res5);
			$total_pages = ceil($row5["total"] / 5); // calculate total pages with results
	    }
	    else
	    {
	    	$name_url="";
	    	//get the total number of jobposts
			$sql4 = "SELECT COUNT(ID) AS total FROM jobposts WHERE active = 1";
	        $res4 = mysqli_query($db,$sql4) or die(mysqli_error($db));
			$row = mysqli_fetch_assoc($res4);
			$total_pages = ceil($row["total"] / 5); //calculate total pages with results	
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
	                      echo "</div>";
	          if($type == "freelancer")
	          {
	              include '../includes/sidebar.php';
	          }
	          elseif($type == "employer")
	          {
	            include 'includes/sidebar.php';
	          }
	          elseif($type == "admin")
	          {
	            include 'includes/sidebar.php';
	          }
	                echo "</div>
	            </div>
	        </div>
	        </body>";
	          include '../includes/footer.php';
	        exit();
	        } 
		 } 
		 else 
		 { $page=1; }
		$start_from = ($page-1) * 5;
		
	      if(!is_numeric($page))
	      {
	          echo "<h1>Sorry, page is not a number.</h1>";
	          echo "<center>
	                    <a href='".$_SERVER['PHP_SELF']."?page=1'>
	                      <button class='button8 button9'>Go To First Page</button>
	                    </a>
	                </center>
	                </div>";
	          if($type == "freelancer")
	          {
	              include '../includes/sidebar.php';
	          }
	          elseif($type == "employer")
	          {
	            include 'includes/sidebar.php';
	          }
	          elseif($type == "admin")
	          {
	            include 'includes/sidebar.php';
	          }
	             echo" </div>
	            </div>
	        </div>
	        </body>";
	          include '../includes/footer.php';          
	          exit(); 
	      }

				//get the right author of a job
				$sql3 = "SELECT * FROM users INNER JOIN jobposts ON users.id=jobposts.author_id WHERE jobposts.active=1 ";

				//get all jobposts - 5 per page
	        	$sql2 = "SELECT * FROM jobpostscategories INNER JOIN jobposts ON jobpostscategories.id=jobposts.category_id WHERE jobposts.active=1 ";


			    if(!empty($name) )
			    {		
			    	$sql3 .= " AND (job_title LIKE '%$name%') ";	    
			    	$sql2 .= " AND (job_title LIKE '%$name%') ";
				}	 
				$sql3 .= " ORDER BY jobposts.id DESC LIMIT ".$start_from.", 5 ";
				$sql2 .= " ORDER BY jobposts.id DESC LIMIT ".$start_from.", 5 ";

	            $res2 = mysqli_query($db,$sql2) or die(mysqli_error($db));
	            $res3 = mysqli_query($db,$sql3) or die(mysqli_error($db));
        
	            //check if there are any jobposts
	            if(mysqli_num_rows($res2) > 0)
	            {		
	            	//extract data of a jobpost	            	                 	 	             
	                 while($row2 = mysqli_fetch_assoc($res2))
	                 {
	                   	 $cid = $row2['category_id']; 
	                     $tid = $row2['id'];	
            	                        
	                     $title = $row2['job_title'];
	                     $picture = $row2['picture'];
	                     $job_description = substr($row2['job_description'], 0, 250);  
	                     $author_id = $row2['author_id'];
	                    
	                     $category = $row2['category']; 
	                     $timestamp = $row2['timestamp']; 
	                     $job_views = $row2['job_views'];

			 				if($row3 = mysqli_fetch_assoc($res3))
			                { 
			                 	 $firstname = $row3['firstname'];
			                     $lastname = $row3['lastname'];  
					             $jobposts .= "
									<article class='blog-entry'>
										<div class='blog-wrap'>
											<span class='category text-center'>Category: ".$category."</span>
											<h2 class='text-center'>".$title."</h2>
											<div class='blog-image'>
												<div class='owl-carousel owl-carousel2 blog-item'>
													<div class='item'>
														<center><img src='".$picture."' alt='Ash' class='blog'/></center>
													</div>								
												</div>				
											</div><br>
											<span class='category text-center'>".$timestamp."| <a href='../profile.php?aid=".$author_id."' class='posted-by' target='_blank'>".$firstname." ".$lastname."</a> | Views: <strong>".$job_views."</strong></span>
										</div>
										<div class='desc'>
											<p class='first-letra'><a href='#'>".$job_description."</a></p>
										</div>
										<p class='text-center'><a href='jobpost_view.php?cid=".$cid."&tid=".$tid."' class='btn btn-primary btn-custom' target='_blank'>Continue Reading</a></p>
									</article>";         
		            		}
	       			  }echo $jobposts;

				}
				else
				{
					echo "<h1>There are not any jobs yet.</h1>";
				}
			
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
					echo "<li><a href='index.php?page=".$prev_page."".$name_url."'>&laquo;</a></li>";
				}

					for ($i=1; $i<=$total_pages; $i++) 
					{  // print links for all pages
				            if ($i==$page) 
				            { 
				            	echo "<li class='active'><a href='index.php?page=".$i."".$name_url."'>".$i."</a></li>";
				            }
							else
							{	
								echo "<li><a href='index.php?page=".$i."".$name_url."'>".$i."</a></li>";
							}
					} 

				if ($next_page == $total_pages + 1) 
				{ 
					//echo "<li class='disabled'><a href='#'>&raquo;</a></li>";
				}
				else
				{
					echo "<li><a href='index.php?page=".$next_page."".$name_url."'>&raquo;</a></li>";
				}
					echo "</ul>
				</div>
				</div>";										
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