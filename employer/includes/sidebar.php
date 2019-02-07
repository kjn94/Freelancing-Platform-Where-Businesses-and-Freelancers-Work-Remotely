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
<aside class="sidebar">
<?php
	if(!isset($_SESSION ['uid']))
	{
?>
	    <p class="haha">You are currently viewing a preview of the Platform. <br> To unlock all features 
	    <a href="../login.php"><button class="button8 button9">Login</button></a>
	    or
	    <a href="../register.php">
	    <button class="button8 button9">Register</button></a></p>

<?php
}		    
	else
	{
		//number of new new proposals
        $sql8 = "SELECT COUNT(*) FROM applications INNER JOIN jobposts ON applications.topic_id=jobposts.id WHERE current=1 AND author_id='".$_SESSION['uid']."'";
        $res8 = mysqli_query($db, $sql8) or die(mysqli_error($db));
        $row8 = mysqli_fetch_array($res8);
        $num_inv = $row8[0];
		//get the logged user
  		$sql3 = "SELECT * FROM users INNER JOIN jobpostscategories ON users.category_user_id=jobpostscategories.id WHERE users.id = ".$_SESSION['uid']." AND type = 'employer'";
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
						<h2 class='sidebar-heading'><p class='haha'>You are logged in as ".$_SESSION['username']." &bull; <a href='../logout_parse.php'>
				          <button class='button8 button9'>Logout</button></a>
				        </h2>
						<center><img class='avatar' src='".$image."' alt='Ash' /></center>
						<center><h2>".$firstname." ".$lastname."</h2></center>
				        <h3 class='sidebar-heading'>Category - <strong>".$speciality."</strong></h3>					
						<p>Hi! My Name is <strong>".$firstname." ".$lastname."</strong> and ".$description."...</p>
							<a href='../profile.php?aid=".$id."'>
						        <button class='button8 button9'>View Your Profile</button>
						    </a><br>
					        <a href='my_jobs.php'>
					          <button class='button8 button9'>You have ".$num_inv." new proposals.</button>
					        </a>
				</div>";
		}
	}
?>
	<div class="side-wrap">
		<h2 class="sidebar-heading">Freelancer - Categories</h2>
		<ul class="category">
			<li><?php echo $categories ?></li>
		</ul>
	</div>

	<div class="side-wrap">
		<h2 class="sidebar-heading">My Jobs</h2>
		<center>
		<a href="my_jobs.php"><button class="button8 button9">My Jobs</button></a>
		</center>
	</div>			
</aside>