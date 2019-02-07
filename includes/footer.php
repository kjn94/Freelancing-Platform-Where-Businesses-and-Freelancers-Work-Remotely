
<head>
<link href="css/footer2.css" rel="stylesheet" type="text/css" />
<link href="css/footer.css" rel="stylesheet" type="text/css" />
</head>
 		<!--------FOOTER MENU-------->

<footer>
<div class="container">

  <div class="boxes">
    <div class="box-row">
      <div class="box-cell one">
        <div class="box-content">
            <div id="hoverfooter">        
				<h3><b>Job Categories</b></h3>				
			</div>
					
			<?php 
			 	$cat = "";
				$sql = "SELECT * FROM jobpostscategories ORDER BY id ASC";
		        $res = mysqli_query($db, $sql) or die(mysqli_error($db));
		        
		        if(mysqli_num_rows($res) > 0)
		        {
		            while($row = mysqli_fetch_assoc($res))
		            {
		              $id = $row['id'];
		              $title = $row['category'];
		             
			          $cat .="<a href='http://localhost/job_board/freelancer/jobposts_category.php?cid=".$id."' target='_blank'>
									<div id='hoverfooter'>".$title."<br></div>   
							</a>";			                
			         }
			     }echo $cat;
			?>
			            
        </div>
      </div>

      <div class="box-cell two">
        <div class="box-content">
            <div id="hoverfooter">        
 				<h3><b>Recent Jobs</b></h3>
 			</div>
 			<?php
				$jobposts = "";
				$sql2 = "SELECT * FROM jobpostscategories INNER JOIN users ON users.category_user_id=jobpostscategories.id INNER JOIN jobposts ON users.id=jobposts.author_id WHERE jobposts.active=1 ORDER BY jobposts.timestamp DESC LIMIT 8";
                $res2 = mysqli_query($db,$sql2) or die(mysqli_error($db));

		              
	            if(mysqli_num_rows($res2) > 0)
	            {
	                             	                
	                while($row2 = mysqli_fetch_assoc($res2))
	                {
                       	$cid = $row2['category_id'];
                     	$tid = $row2['id'];
	                    $title = $row2['job_title'];
	                    $picture = $row2['picture'];
	                    $author_id = $row2['author_id'];
	                    $firstname = $row2['firstname'];
	                    $lastname = $row2['lastname'];  
	                    $category = $row2['category']; 
	                    $timestamp = $row2['timestamp'];           
								
						$jobposts .= "<a href='http://localhost/job_board/freelancer/jobpost_view.php?cid=".$cid."&tid=".$tid."' target='_blank'>
											<div id='hoverfooter'>".$title."</div>
									</a>";								
					}
						echo $jobposts;
				} 				
		?>
			           
        </div>
      </div>
      
      <div class="box-cell three">
        <div class="box-content">
            <div id="hoverfooter">        
					<h3><b>Best Freelancers</b></h3>					
			</div>
			<?php
               $sql4 = "SELECT COALESCE(SUM(app_experience), 0) as app_experience, COALESCE(COUNT(app_experience), 0) as app_experience_count, applicant_id, firstname, lastname, image, description, jobpostscategories.category, users.id, type, active FROM users LEFT JOIN feedback ON users.id=feedback.applicant_id INNER JOIN jobpostscategories ON users.category_user_id=jobpostscategories.id WHERE type = 'freelancer' AND active=1 GROUP BY users.id ORDER BY app_experience DESC LIMIT 8";
                $res4 = mysqli_query($db,$sql4) or die(mysqli_error($db)); 


               foreach ($res4 as $row2) 
               {
	              $aid = $row2['id'];
	              $firstname = $row2['firstname'];
	              $lastname = $row2['lastname'];

	              echo "<a href='http://localhost/job_board/profile.php?aid=".$aid."' target='_blank'>
	                  		<div id='hoverfooter'>".$firstname." ".$lastname."</div>
	                  	</a>";
               }
            ?>
			             
        </div>
      </div>
      
      
    </div>
  </div>
</div>
</footer>
<footer class="second">
<p>Job Board Website Application 2018</p>
</footer>