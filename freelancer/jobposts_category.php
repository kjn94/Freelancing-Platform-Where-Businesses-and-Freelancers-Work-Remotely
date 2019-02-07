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
		<h1>Find Your Dream Job</h1>
		<h2>Grow your business through the top freelancing website. </h2>
	</center>
</nav>


 <!--  Content Area-->
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

<?php   
    $jobposts = "";

	if(isset($_GET['cid']) && is_numeric($_GET['cid']))
	{    $cid = $_GET['cid'];
		$sql5 = "SELECT * FROM jobpostscategories WHERE id='".$cid."'";
	    $res5 = mysqli_query($db, $sql5) or die(mysqli_error($db));
        if($row5 = mysqli_fetch_assoc($res5))
        {
          $category = $row5['category'];
        }
        if(mysqli_num_rows($res5) > 0){
?>
		<div style='padding-left:16px'>
			<h2 align='center'>Jobs From Category <strong><?php echo $category ?></strong></h2>
		</div><hr>
	<?php } ?>

		   	<center>
		      <form action=<?php echo "jobposts_category.php?cid=".$cid."" ?> method="POST">
		        <input type="text" name="name" />
		        <input type="submit" name="search" value="Search a Job" />
		      </form>
		    </center>
	<?php
		//choose a category
	    $sql = "SELECT id FROM jobpostscategories WHERE id='".$cid."' LIMIT 1";
	    $res = mysqli_query($db, $sql) or die(mysqli_error($db));
	}
	    if(mysqli_num_rows($res) == 1)
	    {

	        $prev_page = 0;
			$next_page = 2;
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
		    //check if name is empty
		    if(!empty($name))
		    {
		    	$name_url = "&name=".$name."";
		    	//get the total number of jobposts in a search query
				$sql5 = "SELECT COUNT(ID) AS total FROM jobposts WHERE active = 1 AND category_id=".$cid." AND job_title LIKE '%$name%'";
		        $res5 = mysqli_query($db,$sql5) or die(mysqli_error($db));
				$row5 = mysqli_fetch_assoc($res5);
				$total_pages = round($row5["total"] / 3); // calculate total pages with results
		    }
		    else
		    {
				$name_url="";
				//get the total number of jobposts
				$sql4 = "SELECT COUNT(ID) AS total FROM jobposts WHERE active = 1 AND category_id=".$cid."";
		        $res4 = mysqli_query($db,$sql4) or die(mysqli_error($db));
				$row = mysqli_fetch_assoc($res4);
				$total_pages = round($row["total"] / 3); // calculate total pages with results	
			}	 
			//checking if a page is set
			if (isset($_GET["page"])) { $page  = $_GET["page"]; $prev_page = $page - 1; $next_page = $page + 1;} else { $page=1; }
			$start_from = ($page-1) * 3;
				//check if page is valid
		      if(!is_numeric($page))
		      {
		          echo "<h1>Sorry, page is not a number.</h1>";
		          echo "<center>
		                    <a href='".$_SERVER['PHP_SELF']."?cid=".$cid."&page=1'>
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
	          	//check if user entered wrong page in url
				if (isset($_GET["page"])) 
				{
			        if ($_GET['page'] > $total_pages) 
			        { 
			          echo "<h1>This page does not exist.</h1>";
			          echo "<center>
				                    <a href='".$_SERVER['PHP_SELF']."?cid=".$cid."&page=1'>
				                      <button class='button8 button9'>Go To First Page</button>
				                    </a>
				             </center>
				           </div>";
			           
			          include '../includes/sidebar.php';
			                echo "</div>
			            </div>
			        </div>
			        </body>";
			          include '../includes/footer.php';
			        exit();
			        }	
			    } 
			    		         
				//get the right author of a job
				$sql3 = "SELECT * FROM users INNER JOIN jobposts ON users.id=jobposts.author_id WHERE jobposts.active=1 AND jobposts.category_id=".$cid." ";

				//get all jobposts - 2 per page
	            $sql2 = "SELECT * FROM jobpostscategories INNER JOIN jobposts ON jobpostscategories.id=jobposts.category_id WHERE jobposts.active=1 AND jobposts.category_id=".$cid." ";

				//checking if the search form is submitted
			    if(!empty($name) )
			    {
			    	$sql3 .= " AND (job_title LIKE '%$name%') ";
			    	$sql2 .= " AND (job_title LIKE '%$name%') ";
				}
				$sql3 .= " ORDER BY jobposts.id DESC LIMIT ".$start_from.", 3 ";	 
				$sql2 .= " ORDER BY jobposts.id DESC LIMIT ".$start_from.", 3 ";

	            $res2 = mysqli_query($db,$sql2) or die(mysqli_error($db));
	            $res3 = mysqli_query($db,$sql3) or die(mysqli_error($db));       

	            //check if there are any jobposts in this category              
                if(mysqli_num_rows($res2) > 0)
                {            
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
					             $jobposts .= "<article class='blog-entry'>
										<div class='blog-wrap'>
											<span class='category text-center'>Category: ".$category."</span>
											<h2 class='text-center'>".$title."</h2>
											<div class='blog-image'>
												<div class='owl-carousel owl-carousel2 blog-item'>
													<div class='item'>
														<center><img src='".$picture."' alt='Ash' class='blog'/></center>
													</div>								
												</div>				
											</div>
											<span class='category text-center'>".$timestamp." | <a href='../profile.php?aid=".$author_id."' class='posted-by' target='_blank'>".$firstname." ".$lastname."</a> | Views <strong>".$job_views."</strong></span>
										</div>
										<div class='desc'>
											<p class='first-letra'><a href='#'>".$job_description."</p>
										</div>
										<p class='text-center'><a href='jobpost_view.php?cid=".$cid."&tid=".$tid."' class='btn btn-primary btn-custom' target='_blank'>Continue Reading</a></p>
									</article>							
										";         
			            	}
			        }
						echo $jobposts;

			//============ PAGINATION ==================//
				echo "<div class='row'>
						<div class='col-md-12 text-center'>
							<ul class='pagination'>";
					if ($prev_page == 0) 
					{ //echo "<li class='disabled'><a href='#'>&laquo;</a></li>";
					}
					else
					{	echo "<li><a href='jobposts_category.php?cid=".$cid."&page=".$prev_page."".$name_url."'>&laquo;</a></li>";
					}

						for ($i=1; $i<=$total_pages; $i++) 
						{  // print links for all pages
					            
					        if ($i==$page) 
					        { 
					         	echo "<li class='active'><a href='jobposts_category.php?cid=".$cid."&page=".$i."".$name_url."'>".$i."</a></li>";
					        }
							else
							{	
								echo "<li><a href='jobposts_category.php?cid=".$cid."&page=".$i."".$name_url."'>".$i."</a></li>";
							}
						} 

					if ($next_page == $total_pages + 1) 
					{ 
					//echo "<li class='disabled'><a href='#'>&raquo;</a></li>";
					}
					else
					{	
						echo "<li><a href='jobposts_category.php?cid=".$cid."&page=".$next_page."".$name_url."'>&raquo;</a></li>";
					}
							echo "</ul>
							</div>
						</div>";
			//============ PAGINATION ==================//					
				}   
				else{
					 echo "<br>";
		             echo "<h1>There are no jobs in this category yet.</h1>";
		             echo "<a href='index.php'><button class='button8 button9'>Return to Jobs</button></a>";
				}
			
		}else{
            echo "<h1>You are trying to view a job category that does not exist yet.</h1>";
            echo "<a href='index.php'><button class='button8 button9'>Return to Jobs<button></a>";
		}
    ?> 
    </div>
    <?php
		include '../includes/sidebar.php';
	?>
    			</div>
			</div>
		</div>
		

</body>

<?php

	include '../includes/footer.php';

?>