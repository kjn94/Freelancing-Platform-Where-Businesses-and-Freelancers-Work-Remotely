<?php

	require 'core/init.php';
	include 'menu.php';

?>
		<?php
				$sql = "SELECT * FROM jobpostscategories ORDER BY id ASC";
		        $res = mysqli_query($db, $sql) or die(mysqli_error($db));
		        $categories = "";
		        if(mysqli_num_rows($res) > 0){
		            while($row = mysqli_fetch_assoc($res)){
		              $id = $row['id'];
		              $title = $row['category'];
		              $categories .= "<a href='freelancer/jobposts_category.php?cid=".$id."'>".$title." <font size='-1'></font></a>";

		            }
		        }else{
		          echo "<p> There are no categories available yet.</p>";
		        }
include 'includes/functions.php';
               
		    ?>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

<link href="http://localhost/job_board/css/join-us.css" rel="stylesheet" type="text/css" /><!-- Other Design -->
<link href="http://localhost/job_board/css/menu.css" rel="stylesheet" type="text/css" /> <!-- Main Menu -->
<link href="http://localhost/job_board/css/catmenu.css" rel="stylesheet" type="text/css" /> <!-- Category Menu -->
<link href="http://localhost/job_board/css/footer.css" rel="stylesheet" type="text/css" /> <!-- Footer Menu -->
<link href="http://localhost/job_board/css/buttons.css" rel="stylesheet" type="text/css" /> <!-- Buttons -->
<link href="http://localhost/job_board/css/style.css" rel="stylesheet" type="text/css" /> <!-- Main Design Content and Sidebar -->
<link href="http://localhost/job_board/css/index.css" rel="stylesheet" type="text/css" /><!-- Other Design -->
<link href="http://localhost/job_board/css/freelancers.css" rel="stylesheet" type="text/css" /><!-- Other Design -->
<link href="http://localhost/job_board/css/Interviews.css" rel="stylesheet" type="text/css" /><!-- Other Design -->

<!--- Bootstrap theme - makes the content mobile responsive -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="../js/menucat.js"></script><!-- Makes menu cat clickable -->
</head>
<body>

	<nav class="nav-book">
			<nav class="title">
				<center>
				<h1>Get it done with a freelancer</h1>
			</nav>
			<br>
			<nav class="parag">
				<p>
					Grow your business through the top freelancing website. Hire talent nearby or worldwide. <br>Millions of small businesses use Freelancer to turn their ideas into reality.
				</p>
				</center>
			</nav>
			<br><br>
			<center>  
	            <a href="login.php">
	                <button class="button8 button9"/>Login</button>
	            </a>
	            <a href="register.php">
	                <button class="button8 button9"/>Register</button>
	            </a>
        	</center>
	</nav>

  <!--  Content Area-->
<div class="topnav" id="myTopnav">
  <?php echo $categories ?>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

	<center>
		<nav class="nav-home">
			
	<nav class="nav-belowcat">
		<center>
			<h1 class="text">How It Works
			</h1>
		</center>
	</nav>
				  <div class="row">
				    <div class="col-sm-3" style="background-color:lavender;">
				    	<h3>Post a job (it’s free)</h3>
				    	<p>Tell us about your project. Our platform connects you with top talent around the world, or near you.</p>
				    </div>
				    <div class="col-sm-3" style="background-color:lavenderblush;"><h3>Freelancers come to you</h3>
				    	<p>Get qualified proposals within 24 hours. Compare bids, reviews, and prior work. Interview and hire.</p></div>
				    
				    <div class="col-sm-3" style="background-color:lavender;"><h3>Collaborate easily</h3>
				    	<p>Use our platform to chat and track project milestones from your desktop or mobile.</p></div>
				    
				    <div class="col-sm-3" style="background-color:lavenderblush;"><h3>Payment simplified</h3>
				    	<p>Pay fixed-price and receive invoices through the platform. Only pay for work you authorize.</p></div>

				  </div>
			
		</nav>
</center>

	<nav class="nav-belowvideo">
		<center>
			<h1 class="text">Hire For Any Scope Of Work
			</h1>
		</center>
	</nav>
<nav class="nav-founders">
	<div class="container">

  <div class="boxes">
    <div class="box-row">
      <div class="box-cell one">
        <div class="box-content">
            <div id="polina">
		<div class="gallery">
			<center><img src="img/short_term.png"></center>
		</div>
		<h1>Short Term Tasks</h1>
		<p>Build a pool of diverse experts for one-off tasks.</p><br>
		</div>
        </div>
      </div>

      <div class="box-cell two">
        <div class="box-content">
		<div id="polina">
		<div class="gallery">
			<center><img src="img/recurring.png"></center>
		</div>
		<h1>Recurring Projects</h1>
		<p>Have a go-to team with specialized skills in many fields.</p><br>
		</div>	
        </div>
      </div>
      
      <div class="box-cell three">
        <div class="box-content">
        <div id="polina">
		<div class="gallery">
			<center><img src="img/contract.png"></center>
		</div>
		<h1>Full Time Contract</h1>
		<p>Expand your staff with a dedicated team that you can rely on.</p><br>
		</div>	
        </div>
      </div>
    </div>
  </div>
</div>
</nav>

		<?php
               $sql4 = "SELECT COALESCE(AVG(emp_experience), 0) as emp_experience_avg, applicant_id, firstname, lastname, image, description, jobpostscategories.category, users.id, type, active FROM users LEFT JOIN feedback ON users.id=feedback.applicant_id INNER JOIN jobpostscategories ON users.category_user_id=jobpostscategories.id WHERE type = 'freelancer' AND active=1 GROUP BY users.id ORDER BY emp_experience_avg DESC LIMIT 3";
                $res4 = mysqli_query($db,$sql4) or die(mysqli_error($db)); 
                $avgRating = 0;
                $totalRating = 0;
               if(mysqli_num_rows($res4) > 0) 
               { 
            ?>
					<nav class="nav-book">
								<nav class="title">
									<center>
									<h1>Top 3 Freelancers You Can Hire Straight Away
									</h1>
									</center>
								</nav>
						</nav>
						
						<nav class="nav-founders">
							<h1 class="darkfont">
								Build a pool of trusted experts for your team.<br>
								You'll receive free bids from our talented freelancers within seconds. 
							</h1>
					<div class="container">

             <?php
         }
               foreach ($res4 as $row2) 
               {
                       $aid = $row2['id'];
                       $firstname = $row2['firstname'];
                       $lastname = $row2['lastname'];
                       $speciality = $row2['category'];  
                       $image = $row2['image'];
                       $description = substr($row2['description'], 0, 115);
                       $avg_num = max($row2['emp_experience_avg'], 1);

                          echo "
                          <div class='col-sm-4'>
                          
                            <div class='container2'>
                              <div class='avatar-flip'>
                                <img src='".$image."'>
                              </div><div class='imagestar'>";

                          echo toStars($avg_num);
                                      
                             echo "</div><center><h2>".$firstname." ".$lastname."</center></h2>
                              <h4>".$speciality."</h4>
                              <h5>".$description."...</h5><br>                 
                              <a href='profile.php?aid=".$aid."' target='_blank' class='btn btn-primary btn-custom'>View Profile</a>

                            </div>

                            </div>
                          ";
                  }
              
		?>
<center>
  <a href="register.php">
    <button class="button8 button9">Click Here To Get Access</button>
  </a></center>
</div>

	
	</nav>

	<nav class="nav-book">
			<nav class="title">
				<center>
				<h1>
				Hire Expert Freelancers For Any Job Online
				</h1>
				</center>
			</nav>
	</nav>

<nav class="entrepreneur2014">
<div class="container">
  <div class="boxes">
    <div class="box-row">
      <div class="box-cell one">
        <div class="box-content">
        <center>
        	<div class="entrepreneur">
        		<img src="img/laptop2.png">
	        </div>  
	    </center>
        </div>
      </div>

      <div class="box-cell two">
        <div class="box-content">

			<h1 class="title">Need work done?</h1>
	            <center><h1>Post a job and receive bids from freelancers </h1></center>
	            <p> Whatever your needs, there will be a freelancer to get it done: from web design, mobile app development, virtual assistants, product manufacturing, and graphic design (and a whole lot more).With secure payments and thousands of reviewed professionals to choose from, Freelancer.com is the simplest and safest way to get work done online. </p>
        </div>
      </div>

     
    </div>
  </div>
</div>
</nav>





	<center>
<br>
  <div class="row">
    <div class="col-sm-2"><img src="img/dropbox.png" class="pic"></div>
    <div class="col-sm-2"><img src="img/airbnb.png" class="pic"></div>
    <div class="col-sm-2"><img src="img/zendesk.png" class="pic"></div>
    <div class="col-sm-2" ><img src="img/microsoft.png" class="pic"></div>
        <div class="col-sm-2"><img src="img/upwork.png" class="pic"></div>
        <div class="col-sm-2"><img src="img/freelancer.png" class="pic"></div>
  </div></center>

<br>




</body>

<?php

	include 'includes/footer.php';

?>