<?php
	if(empty($_GET))
	{
		header("location:index.php");
	}
	
		include "../core/init.php";

		$tid = $_POST['tid'];

		$sql2="DELETE FROM posts WHERE topic_id=".$tid."";
		mysqli_query($db,$sql2);

		$sql="DELETE FROM topics WHERE id=".$tid."";
		mysqli_query($db,$sql);

		header("location:view_messages.php");	
?>