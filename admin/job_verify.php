<?php
	if(empty($_GET))
	{
		header("location:index.php");
	}
	
		include "../core/init.php";
		
		$sql="UPDATE jobposts SET active=1 WHERE id=".$_GET['id'];
		mysqli_query($db,$sql);

		$sql2="UPDATE jobposts SET timestamp=now() WHERE id=".$_GET['id'];
		mysqli_query($db,$sql2);
		
		header("location:verify_jobs.php");	
?>