<?php
session_start();
include_once("core/init.php");

if(isset($_POST['username']))
{
	$username = $db->real_escape_string($_POST['username']);
	$password = $db->real_escape_string($_POST['password']);

		//check if username exist
		$sql = "SELECT * FROM users WHERE username='".$username."' LIMIT 1";
		$res = mysqli_query($db, $sql) or die(mysqli_error($db));
		//check if username matches
		if(mysqli_num_rows($res) == 1)
		{
			$sql2 = "SELECT * FROM users WHERE username='".$username."' AND active='1' LIMIT 1";
			$res2 = mysqli_query($db, $sql2) or die(mysqli_error($db));

			$sql3 = "SELECT * FROM users WHERE username='".$username."' AND active='2' LIMIT 1";
			$res3 = mysqli_query($db, $sql3) or die(mysqli_error($db));
			//check if user is deleted
			if(mysqli_num_rows($res3) == 1)
			{
				$_SESSION['message'] = "Your account has been deleted!";
				header("Location: error.php");	
			}
			else
			{	//check if user is activated		
				if(mysqli_num_rows($res2) == 1)
				{
					$row = mysqli_fetch_assoc($res);

					//check if passwords match
					if(password_verify($_POST['password'], $row['password']))
					{
						$_SESSION['uid'] = $row['id'];
						$_SESSION['username'] = $row['username'];
						$_SESSION['message'] = "Hello $username. <br> You are successfully logged in! ";
						header("Location: success.php");
						exit();
					}
					else
					{
						$_SESSION['message'] = "Invalid Login Details. Please try again!";
						header("Location: error.php");
					}
				}
				else 
				{
					$_SESSION['message'] = "Your account has not been activated!";
					header("Location: error.php");
				}
			}
		}
		else
		{
			$_SESSION['message'] = "There is no user with that username";
			header("Location: error.php");
		}
}
?>