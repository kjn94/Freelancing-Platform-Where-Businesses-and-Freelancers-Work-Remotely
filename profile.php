<?php
    require 'core/init.php';
    require 'menu.php';
?>

<head>
<title>Profile</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="http://localhost/job_board/css/menu.css" rel="stylesheet" type="text/css" /> <!-- Main Menu -->
<link href="http://localhost/job_board/css/catmenu.css" rel="stylesheet" type="text/css" /> <!-- Category Menu -->
<link href="http://localhost/job_board/css/footer.css" rel="stylesheet" type="text/css" /> <!-- Footer Menu -->
<link href="http://localhost/job_board/css/buttons.css" rel="stylesheet" type="text/css" /> <!-- Buttons -->
<link href="http://localhost/job_board/css/style.css" rel="stylesheet" type="text/css" /> <!-- Main Design Content and Sidebar -->
<link href="http://localhost/job_board/css/index.css" rel="stylesheet" type="text/css" /><!-- Other Design -->
<link href="http://localhost/job_board/css/profile.css" rel="stylesheet" type="text/css" /><!-- Other Design -->
<link href="http://localhost/job_board/css/feedback.css" rel="stylesheet" type="text/css" /> <!-- Main Menu -->
<link href="http://localhost/job_board/css/freelancers.css" rel="stylesheet" type="text/css" /><!-- Freelancer Design -->
<link href="http://localhost/job_board/css/interviews.css" rel="stylesheet" type="text/css" /><!-- Other Design -->


<!--- Bootstrap theme - makes the content mobile responsive -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<?php
  include 'includes/register_bar.php';
?>

<nav class="nav-belowmenu">
	<center>
		<h1>Find Your Dream Job</h1>
		<h2>Grow your business through the top freelancing website.</h2>
	</center>
</nav><br>
    

 <?php
        
    if(isset($_GET['aid']) && is_numeric($_GET['aid']))
    {$aid = $_GET['aid'];
        //select the user by id
        $sql = "SELECT * FROM users WHERE id='".$aid."'";     
        $res2 = mysqli_query($db, $sql) or die(mysqli_error($db));
	      if(mysqli_num_rows($res2) > 0)
	      {
    
        $sql16 = "SELECT active FROM users WHERE id='".$aid."'";     
        $res16 = mysqli_query($db, $sql16) or die(mysqli_error($db));
    
        if($row16 = mysqli_fetch_assoc($res16))
        {           
            $active = $row16['active'];
        } 
if($active == 2)
{
    echo "<h1>The User Has Been Deleted</h1>";
}
else
{

    if($type != "admin" && $active == 0)
    {
        echo "<h1>The User Does Not Exist</h1>";
    }
    else
    {
        if($type == "admin" && $active == 3)
        {                 
         echo "<center>
                    <input type='submit' value='Verify User' onClick=\"window.location = 'admin/user_verify.php?id=".$aid."'\"/>
                    <input type='submit' value='Delete User' onClick=\"window.location = 'admin/user_delete.php?id=".$aid."'\"/><hr>
             </center>";
        }
        elseif($type == "admin" && $active == 1)
        {                 
         echo "<center>
                    <input type='submit' value='Delete User' onClick=\"window.location = 'admin/user_delete.php?id=".$aid."'\"/><hr>
             </center>";
        }

    }
        //get data of the user by id
        $sql5 = "SELECT * FROM jobpostscategories INNER JOIN users ON users.category_user_id=jobpostscategories.id WHERE users.id=".$aid."";
        $res5 = mysqli_query($db, $sql5) or die(mysqli_error($db)); 

        //number of finished contracts by applicant
        $sql8 = "SELECT COUNT(*) FROM contracts WHERE finished=1 AND applicant_id=".$aid."";
        $res8 = mysqli_query($db, $sql8) or die(mysqli_error($db));
        $row8 = mysqli_fetch_array($res8);      
        $num_jobs = $row8[0];

        //number of finished contracts by employer
        $sql12 = "SELECT COUNT(*) FROM contracts INNER JOIN jobposts ON contracts.topic_id = jobposts.id WHERE finished=1 AND author_id=".$aid."";
        $res12 = mysqli_query($db, $sql12) or die(mysqli_error($db));
        $row12 = mysqli_fetch_array($res12);        
        $num_jobs_emp = $row12[0];

        //total amount of money earned by applicant
        
        $sql9 = "SELECT SUM(agreed_price) FROM contracts WHERE finished=1 AND applicant_id=".$aid."";
        $res9 = mysqli_query($db, $sql9) or die(mysqli_error($db));
        $row9 = mysqli_fetch_array($res9);
        $sum = $row9[0];

        //total amount of money spent by employer
        $sql11 = "SELECT SUM(agreed_price) FROM contracts INNER JOIN jobposts ON contracts.topic_id = jobposts.id WHERE finished=1 AND author_id=".$aid."";
        $res11 = mysqli_query($db, $sql11) or die(mysqli_error($db));
        $row11 = mysqli_fetch_array($res11);
        $sum_emp = $row11[0];

        //freelancer - number of submitted proposals
        $sql10 = "SELECT COUNT(*) FROM applications WHERE applicant_id=".$aid."";
        $res10 = mysqli_query($db, $sql10) or die(mysqli_error($db));
        $row10 = mysqli_fetch_array($res10);
        $num_current_jobs = $row10[0];

        //employer - numeber of received proposals
        $sql13 = "SELECT COUNT(*) FROM applications INNER JOIN jobposts ON applications.topic_id=jobposts.id WHERE author_id=".$aid."";
        $res13 = mysqli_query($db, $sql13) or die(mysqli_error($db));
        $row13 = mysqli_fetch_array($res13);
        $num_current_jobs_emp = $row13[0];
    

        //extract data of the user by id
        while($row5 = mysqli_fetch_assoc($res5))
        {
          $aid = $row5['id'];
          $firstname = $row5['firstname'];
          $lastname = $row5['lastname'];
          $speciality = $row5['category'];
          $type_aid = $row5['type'];
          $image = $row5['image'];
          $description = $row5['description'];    
        }      
?>   
<!--- Print data of the user by id --->
<div class='container'>
    <div class='innerwrap'>
        <section class='section1 clearfix'>
                <div class='row grid clearfix'>
                    <div class='col2 first'>
                        <img src= <?php echo $image ?>>
                        <h1 class="name"><?php echo $firstname ?> <?php echo $lastname ?></h1>
                        <h3><?php echo $speciality?> - <?php echo $type_aid?></h3>
                    </div>
                    <div class='col2 last'>
                        <div class='grid clearfix'>       
                            <?php
                                if($row2 = mysqli_fetch_assoc($res2))
                                {
                                    $user_type = $row2['type']; //get the usertype of the user by id
                                
                                    if( $user_type == "freelancer")
                                    {
                                        echo "
                                        <div class='col3 first'>
                                            <h1>".$num_jobs."</h1>
                                            <span>Completed Jobs</span>
                                        </div>
                                        <div class='col3'><h1>".$num_current_jobs."</h1>
                                        <span>Proposals Sent</span></div>
                                        <div class='col3 last'>
                                        <h1>$".$sum." </h1>
                                        <span>Total Earned</span></div><br><br><br><br><br><br>";
                                    }
                                    else if( $user_type == "employer")
                                    {
                                       echo "
                                       <div class='col3 first'>
                                            <h1>".$num_jobs_emp."</h1>
                                            <span>Completed Jobs</span>
                                        </div>
                                        <div class='col3'><h1>".$num_current_jobs_emp."</h1>
                                        <span>Proposals Received</span></div>
                                        <div class='col3 last'>
                                        <h1>$".$sum_emp." </h1>
                                       <span>Total Spent</span></div><br><br><br><br><br><br>";
                                    }
                                }
                            ?>                          
                        </div>
                    </div>
                <?php
                    //check if the user by id is logged in - if yes, then he can edit his profile
                    if(!isset($_SESSION['uid']))
                    {

                    }
                    else
                    {
                        //if user id is in session
                        if($aid == $_SESSION['uid'] && $type == "freelancer")
                        {
                            echo "<a href='edit-profile.php?id=".$aid."'><button class='button8 button9'>Edit Profile</button></a><br><br>";
                            echo "<div class='row clearfix'>
                                    <ul class='row2tab clearfix'>
                                        <a href='freelancer/proposals.php' target='_blank'><li><i class='fa fa-list-alt'></i> Proposals </li></a>
                                        <a href='freelancer/current_jobs.php' target='_blank'><li><i class='fa fa-heart'></i> Jobs </li></a>
                                        <a href='freelancer/earnings.php' target='_blank'><li><i class='fa fa-check'></i> Reports </li></a>
                                        <a href='messages/view_category.php' target='_blank'><li><i class='fa fa-thumbs-o-up'></i> Messages </li></a>
                                    </ul>
                                </div>";                              
                        }
                        if($aid == $_SESSION['uid'] && $type == "employer")
                        {
                            echo "<a href='edit-profile.php?id=".$aid."'><button class='button8 button9'>Edit Profile</button></a><br><br>";
                            echo "<div class='row clearfix'>
                                    <ul class='row2tab clearfix'>
                                        <a href='employer/my_freelancers.php' target='_blank'><li><i class='fa fa-list-alt'></i> My Freelancers </li></a>
                                        <a href='employer/current_jobs.php' target='_blank'><li><i class='fa fa-heart'></i> Jobs </li></a>
                                        <a href='employer/earnings.php' target='_blank'><li><i class='fa fa-check'></i> Reports </li></a>
                                        <a href='messages/view_category.php' target='_blank'><li><i class='fa fa-thumbs-o-up'></i> Messages </li></a>
                                    </ul>
                                </div>";                              
                        }                 
                        //if user by id is freelancer and user in session is employer - then, we have an invite button
                        if( $user_type == "freelancer" && $type == "employer")
                        {                                   
                            echo "<a href='employer/invitation.php?aid=".$aid."' target='_blank'>
                            <button class='button8 button9'>Invite To Job</button></a><br><br>";
                        }
                    }
                    
                ?>

             <hr>
            </div>
        </section>
        <h1><strong>What I do!</strong></h1><hr>
    </div><h3><?php echo nl2br($description) ?></h3><hr>
</div> 
        <center>
            <div>
                <nav class='nav-belowmenu'>
                  <center><h1>Feedback Section</h1>
                  <h2>Previous Jobs</h2>
                </nav>          
            </div>
        </center> 
     
<div class="row">
    <?php
    include 'includes/functions.php';    
            	//number of returned finished contracts
        $sql16 = "SELECT COUNT(contracts.id) as Total_Foo FROM contracts INNER JOIN feedback ON contracts.id=feedback.contract_id INNER JOIN jobposts ON contracts.topic_id=jobposts.id INNER JOIN jobpostscategories ON jobposts.category_id=jobpostscategories.id INNER JOIN users ON jobposts.author_id=users.id WHERE contracts.applicant_id=".$aid." AND finished=1";
        $res16 = mysqli_query($db, $sql16) or die(mysqli_error($db));
        $Total_Foo = mysqli_fetch_array($res16); 
		$last_row = $Total_Foo['Total_Foo'];

//get number of start for feedback
        $sql6 = "SELECT * FROM contracts INNER JOIN feedback ON contracts.id=feedback.contract_id INNER JOIN jobposts ON contracts.topic_id=jobposts.id INNER JOIN jobpostscategories ON jobposts.category_id=jobpostscategories.id INNER JOIN users ON jobposts.author_id=users.id WHERE contracts.applicant_id=".$aid." AND finished=1 ORDER BY contracts.endDate DESC";
        $res6 = mysqli_query($db, $sql6) or die(mysqli_error($db));

	      $avgRating = 0;
	      $totalRating = 0;
	      $experience_count = 0;                
        //get data of previous jobs of user by id if he is a freelancer
        if( $user_type == "freelancer")
        {  echo "<div class='border'></div>
			    <table class='rwd-table'><tr>
			    "; 
       $counter=0;

          	while($row6 = mysqli_fetch_assoc($res6))
            {
                $cid = $row6['category_id'];
                $tid = $row6['topic_id'];
                $job_title = $row6['job_title'];
                $empfirstname = $row6['firstname'];
                $emplastname = $row6['lastname'];
                $job_experience2 = $row6['emp_experience'];
                $job_summary2 = $row6['emp_summary'];
                $agreed_price = $row6['agreed_price'];
                $category = $row6['category'];
                $eid = $row6['author_id'];
                $picture = $row6['picture'];
                $image = $row6['image'];
                $endDate = $row6['endDate'];

                          $totalRating += $row6['emp_experience'];
                          if($job_experience2 != NULL)
                          {
                          	$experience_count++; //number of received feedbacks
                          }
                          $avgRating = $totalRating / max($experience_count, 1); //average rating per user, avoid division by 0 
					if($counter % 3 == 0)
					{
                         echo "</tr><tr>";
                    }
                    ++$counter;	
    if($avgRating > 0 && $counter == $last_row)
	{
		echo "<h1>Your average score is <strong>".number_format((float)$avgRating, 2, '.', '')."</strong> out of <strong>5</strong></h1>"; 
	}
                echo " <td>  
                            <div class='wrapper'>     
                                <div class='card radius shadowDepth1'>
                                  <div class='card__image border-tlr-radius'>
                                    <img src=".$picture." alt='image' class='border-tlr-radius' width='242' height='363'>
                                  </div>

                                  <div class='card__content card__padding'>
                                    <div class='card__meta'>
                                      <a>".$category."</a>
                                                <time>".$endDate."</time>
                                    </div>

                                    <article class='card__article'>
                                        <h2><a href='freelancer/proposal_view.php?cid=".$cid."&tid=".$tid."' target='_blank'>".$job_title."</a></h2>
                                        
										        <p>".$job_summary2."</p>
										    


                                        <p>Total Earned: <strong>$".$agreed_price."</strong></p>
                                        <div id='parent'>";
                                    		echo toStars($job_experience2);

                                    echo "
										    <div id='hover-content'>
										        Score is <strong>".$job_experience2."</strong> out of 5
										    </div>
										</div>
									</article>
                                  </div>

                                  <div class='card__action'>
                                    
                                    <div class='card__author'>
                                      <img src=".$image." width='242' height='363' alt='user'>
                                      <div class='card__author-content'>
                                        By <a href='profile.php?aid=".$eid."' target='_blank'>".$empfirstname." ".$emplastname."</a>
                                      </div>
                                    </div><br>
                                    <p class='text-center'><a href='view_contract.php?tid=".$tid."&aid=".$aid."&eid=".$eid."' class='btn btn-primary btn-custom' target='_blank'> View Contract</a></p>
                                  </div>
                                </div>
                            </div>
                        </td>"; 
            } echo "<tr></table>";

        } 


        //get data of previous jobs of user by id if he is an employer
        else if( $user_type == "employer")
        {
        	//number of returned finished contracts
        $sql17 = "SELECT COUNT(contracts.id) as Total_Foo FROM contracts INNER JOIN feedback ON contracts.id=feedback.contract_id INNER JOIN jobposts ON contracts.topic_id=jobposts.id INNER JOIN jobpostscategories ON jobposts.category_id=jobpostscategories.id INNER JOIN users ON contracts.applicant_id=users.id WHERE jobposts.author_id=".$aid." AND finished=1";
        $res17 = mysqli_query($db, $sql17) or die(mysqli_error($db));
        $Total_Foo = mysqli_fetch_array($res17); 
		$last_row_emp = $Total_Foo['Total_Foo'];

                    //feedback and previous job for employers
        $sql14 = "SELECT * FROM contracts LEFT JOIN feedback ON contracts.id=feedback.contract_id INNER JOIN jobposts ON contracts.topic_id=jobposts.id INNER JOIN jobpostscategories ON jobposts.category_id=jobpostscategories.id INNER JOIN users ON contracts.applicant_id=users.id WHERE jobposts.author_id=".$aid." AND finished=1 ORDER BY contracts.endDate DESC";
        $res14 = mysqli_query($db, $sql14) or die(mysqli_error($db));

            echo "<div class='border'></div>
            <table class='rwd-table'><tr>
              <div class='container3'>"; $counter = 0;
            while($row14 = mysqli_fetch_assoc($res14))
            {
                $tid = $row14['topic_id'];
                $job_title = $row14['job_title'];
                $empfirstname = $row14['firstname'];
                $emplastname = $row14['lastname'];
                $job_experience2 = $row14['app_experience'];
                $job_summary2 = $row14['app_summary'];
                $agreed_price = $row14['agreed_price'];
                $category = $row14['category'];
                $aid = $row14['applicant_id'];
                $eid = $row14['author_id'];
                $picture = $row14['picture'];
                $image = $row14['image'];
                $timestamp = $row14['timestamp'];

                          $totalRating += $row14['app_experience'];
                          if($job_experience2 != NULL)
                          {
                          	$experience_count++; //number of received feedbacks
                          }
                          $avgRating = $totalRating / max($experience_count, 1); //average rating per user, avoid division by 0 
					if($counter % 3 == 0)
					{
                         echo "</tr><tr>";
                    }
                    ++$counter;
    if($avgRating > 0 && $counter == $last_row_emp)
	{
		echo "<h1>Average score is <strong>".number_format((float)$avgRating, 2, '.', '')."</strong> out of <strong>5</strong></h1>"; 
	}
                echo " <td>  
                            <div class='wrapper'>     
                                <div class='card radius shadowDepth1'>
                                  <div class='card__image border-tlr-radius'>
                                    <img src=".$picture." alt='image' class='border-tlr-radius' width='242' height='363'>
                                    </div>

                                  <div class='card__content card__padding'>
                                    <div class='card__meta'>
                                      <a>".$category."</a>
                                      <time>".$timestamp."</time>
                                    </div>

                                    <article class='card__article'>
                                      <h2><a href='employer/proposals.php?tid=".$tid."&aid=".$aid."&eid=".$eid."' target='_blank'>".$job_title."</a></h2>";
                                    if($job_summary2 != NULL)
                                    {
                                    	echo "<div id='parent'>
		                                      		<p>See Feedback</p>
													<div id='hover-content'>
												        <p>".$job_summary2."</p>
												    </div>
												</div>";
                                    }
                                        
                                      echo "<p>Total Earned: <strong>$".$agreed_price."</strong></p>";
                                    if($job_experience2 == NULL)
                                    {
                                        echo "No Feedback Given!";
                                    }
                                    else
                                    {
                                    	echo "<div id='parent'>";
	                                        echo toStars($job_experience2);
	                                        echo "<div id='hover-content'>
												        Rating is <strong>".$job_experience2."</strong> out of 5
											    </div>
										</div>";
                                    }

                                echo "</article>
                                  </div>

                                  <div class='card__action'>
                                    
                                    <div class='card__author'>
                                      <img src=".$image." width='242' height='363' alt='user'>
                                      <div class='card__author-content'>
                                        By <a href='profile.php?aid=".$aid."' target='_blank'>".$empfirstname." ".$emplastname."</a>
                                      </div>
                                    </div><br>
                                    <p class='text-center'><a href='view_contract.php?tid=".$tid."&aid=".$aid."&eid=".$eid."' class='btn btn-primary btn-custom' target='_blank'> View Contract</a></p>
                                  </div>
                                </div>
                            </div>
                        </td>"; 

            }echo "</div><tr></table>";
        }   
    }
}
else
{
	echo "<h1>The User Does Not Exist.</h1>";}
}
else
{
    echo "<h1>The User Does Not Exist.</h1>";
}
?> 

</div>

</body>

<?php
	include 'includes/footer.php';
?>