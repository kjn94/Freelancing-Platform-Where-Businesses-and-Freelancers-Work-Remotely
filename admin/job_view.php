<?php
	require '../core/init.php';
	include '../menu.php';
?>



<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="http://localhost/job_board/css/menu.css" rel="stylesheet" type="text/css" /> <!-- Main Menu -->
<link href="http://localhost/job_board/css/catmenu.css" rel="stylesheet" type="text/css" /> <!-- Category Menu -->
<link href="http://localhost/job_board/css/footer.css" rel="stylesheet" type="text/css" /> <!-- Footer Menu -->
<link href="http://localhost/job_board/css/jobs.css" rel="stylesheet" type="text/css" /> <!-- Main Menu -->
<link href="http://localhost/job_board/css/buttons.css" rel="stylesheet" type="text/css" /> <!-- Buttons -->
<link href="http://localhost/job_board/css/style.css" rel="stylesheet" type="text/css" /> <!-- Main Design Content and Sidebar -->
<link href="http://localhost/job_board/css/index.css" rel="stylesheet" type="text/css" /><!-- Other Design -->

<!--- Bootstrap theme - makes the content mobile responsive -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
 

	<nav class="nav-belowmenu">
		<center>
			<h1>
				Find Your Dream Job
			</h1>
			<h2>Grow your business through the top freelancing website. </h2>
		</center>
	</nav>


 <?php 

    if(isset($_SESSION['uid']))
    {      
          if($type == "admin")
          {      
            $cid = $_GET['cid'];
            $tid = $_GET['tid'];
            if(isset($_GET['tid']) && is_numeric($_GET['tid']) && isset($_GET['cid']) && is_numeric($_GET['cid']))
            {
                $sql = "SELECT * FROM jobposts WHERE category_id='".$cid."' AND id='".$tid."' LIMIT 1";
                $res = mysqli_query($db, $sql) or die(mysqli_error($db));
     
              while ($row = mysqli_fetch_assoc($res)) {
                        $picture = $row['picture'];
                        $active = $row['active'];
                        $title = $row['job_title'];
                        $description = $row['job_description'];
                        //$description = str_replace("\r", "", $row['job_description']);
                        //$description = trim(preg_replace('/\s\s+/', ' ', $row['job_description']));
                        //$description = preg_replace('/\s+/', ' ', trim($row['job_description']));
                        //$description = str_replace(array("\n", "\r"), '', $row['job_description']);
                        //$description = trim(preg_replace('/(?![ ])\s+/', ' ', $row['job_description']));
                        //$description = str_replace(array('.', ' ', "\n", "\t", "\r"), '', $row['job_description']);
//str_replace('<br>',' ',$description);
                        /*$description = preg_replace('~\s*<br ?/?>\s*~',"<br />",$description);
                        $description = nl2br($description);*/
                        //$description = nl2br($description);
                        $client_budget = $row['client_budget'];
                            echo "
                            <hr>
                            <div class='job'>
    	                        <h2><strong>Title:</strong> ".$title."</h2> <hr> 
    	                        <h3><strong>Description:</strong></h3><p>".nl2br($description)."</p>
    	                        <br>
    	                        	<h3 align='center'>Employer's Budget: <strong>$".$client_budget."</strong></h3>
    	                        <br><hr><br>
                                <center><img src='".$picture."' alt='Picture' class='blog'/></center>
    	                    </div>";
    	                    if($active == 0)
    	                    {
                            echo "<br><center><input type='submit' value='Verify The Job' onClick=\"window.location = 'job_verify.php?id=".$row['id']."'\"/>
                            <input type='submit' value='Delete The Job' onClick=\"window.location = 'job_delete.php?id=".$row['id']."'\"/><hr></center>";  
                        	}
                        	elseif($active == 1)
                        	{
                            echo "<br><center>
                            <input type='submit' value='Delete The Job' onClick=\"window.location = 'job_delete.php?id=".$row['id']."'\"/><hr></center>";  
                        	}
                    }
            }
            else
            {
                echo "<h1>This Job Post Does Not Exist.</h1>";
            }
        }
        else
        {
          echo "<h2>You are not logged in to the system as an admin.</h2>
                <center>
                    <a href='../login.php'>
                      <button class='button8 button9'>Login</button>
                    </a>
                </center>";
        }
    }
    else
    {
      echo "<h1>You are not logged in to the system.</h1>
            <center>
                <a href='../login.php'>
                  <button class='button8 button9'>Login</button>
                </a>
            </center>";
    } 
?> 

</body>

<?php

	include '../includes/footer.php';

?>