<?php
	include "job_cat_link.php";

?>
	<aside class="sidebar">
<?php
	if(!isset($_SESSION ['uid']))
	{
?>
        <p>You are currently viewing a preview of the Platform. <br> To unlock all features 
        <a href="../login.php"><button class="button8 button9">Login</button></a>
        or
        <a href="../register.php">
        <button class="button8 button9">Register</button></a></p>

	<?php
	}		    
	else
	{
		//number of invitations
	    $sql8 = "SELECT COUNT(*) FROM invitations WHERE current=1 AND applicant_id='".$_SESSION['uid']."'";
	    $res8 = mysqli_query($db, $sql8) or die(mysqli_error($db));
	    $row8 = mysqli_fetch_array($res8);
	    $num_inv = $row8[0];

	    //get the logged user
		$sql3 = "SELECT * FROM jobpostscategories INNER JOIN users ON users.category_user_id=jobpostscategories.id WHERE users.id = ".$_SESSION['uid']."";
	    $res3 = mysqli_query($db, $sql3) or die(mysqli_error($db));


	    if(mysqli_num_rows($res3) > 0)
	    {
            while($row3 = mysqli_fetch_assoc($res3))
            {
              $id = $_SESSION['uid'];
              $firstname = $row3['firstname'];
              $lastname = $row3['lastname'];
              $speciality = $row3['category'];
              $image = $row3['image'];
              $description = substr($row3['description'], 0, 170);	 
            }
			echo "<div class='side-wrap'>
						<h2 class='sidebar-heading'><p>You are logged in as ".$_SESSION['username']." &bull; <a href='../logout_parse.php'>
				          <button class='button8 button9'>Logout</button></a>
				        </h2>
						<center><img class='avatar' src='".$image."' alt='Ash'/></center>
						<center><h2>".$firstname." ".$lastname."</h2></center>
					        <h3 class='sidebar-heading'>Category - <strong>".$speciality."</strong></h3>					
							<p>Hi! My Name is <strong>".$firstname." ".$lastname."</strong> and ".$description."...</p>
							<a href='../profile.php?aid=".$id."'>
						          <button class='button8 button9'>View Your Profile</button>
						    </a><br>";
						if($type == "freelancer")
						{
					        echo "<a href='invitations.php'>
					          <button class='button8 button9'>You have ".$num_inv." invitations.</button>
					        </a>";
					    }
				echo "</div>";
		}
	}
	?>
	<!--CATEGORIES -->
	<div class="side-wrap">
		<h2 class="sidebar-heading">Categories</h2>
		<ul class="category">
			<li><?php echo $categories ?></li>							
		</ul>
	</div>

	<div class="side-wrap">
		<h2 class="sidebar-heading">Recent Jobs</h2>
		<div class="f-entry">
			<?php 
				$jobposts = "";
				$sql2 = "SELECT * FROM jobpostscategories INNER JOIN users ON users.category_user_id=jobpostscategories.id INNER JOIN jobposts ON users.id=jobposts.author_id WHERE jobposts.active=1 ORDER BY jobposts.timestamp DESC LIMIT 5";
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
								
						$jobposts .= "	
								<center>
									<div class='desc'>
										
										<h3><a href='jobpost_view.php?cid=".$cid."&tid=".$tid."'>".$title."</a></h3>
										<a href='#'><img src='".$picture."' class='featured-img'></a>
										<span><i class='icon-calendar3'></i>".$timestamp."</span><hr>
									</div>
								</center>";								
					}
						echo $jobposts;
				}
			?>
		</div>
	</div>			
</aside>