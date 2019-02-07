<?php
	if(empty($_GET))
	{
		header("location:index.php");
	}
	
		include "../core/init.php";
		
		$sql="DELETE FROM jobposts WHERE id=".$_GET['id'];
		mysqli_query($db,$sql);

		header("location:verify_jobs.php");	
?>