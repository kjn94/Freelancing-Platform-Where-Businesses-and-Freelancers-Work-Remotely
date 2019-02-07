<?php
	$sql = "SELECT * FROM jobpostscategories ORDER BY id ASC";
    $res = mysqli_query($db, $sql) or die(mysqli_error($db));
    $categories = "";
    if(mysqli_num_rows($res) > 0)
    {
        while($row = mysqli_fetch_assoc($res))
        {
          $id = $row['id'];
          $title = $row['category'];
          $categories .= "<a href='job_view_category.php?cid=".$id."'>".$title." <font size='-1'></font></a>";
        }
    }
    else
    {
      echo "<p>There are no categories available yet.</p>";
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
              $description = $row3['description'];     
            }
            echo "<div class='side-wrap'>
                        <h2 class='sidebar-heading'><p>You are logged in as ".$_SESSION['username']." &bull; <a href='../logout_parse.php'>
                          <button class='button8 button9'>Logout</button></a>
                        </h2>
                        <center><img class='avatar' src='".$image."' alt='Ash'/></center>
                        <center><h2>".$firstname." ".$lastname."</h2>
                        <h3><strong>".$type."</strong></h3></center>";
                echo "</div>";
        }
	?>
	<div class="side-wrap">
		<h2 class="sidebar-heading">Job Categories</h2>
		<ul class="category">
			<li><a href="#"> <?php echo $categories ?></a></li>
			
		</ul>
	</div>

	<div class="side-wrap">
		<center>
		<h2 class="sidebar-heading">Jobs To Verify</h2>							
		<a href="verify_jobs.php" target="_blank"><button class="button8 button9">Jobs</button></a>
		<br><br>
		<h2 class="sidebar-heading">Users To Verify</h2>							
		<a href="verify_users.php" target="_blank"><button class="button8 button9">Users</button></a>
		</center>
	</div>			
</aside>
<?php
	}
?>