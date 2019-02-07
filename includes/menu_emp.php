
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1" />
<head>
  <link rel="stylesheet" type="text/css" href="css/menu.css">
</head>


<nav id="nav" role="navigation" style="position:relative; z-index:10"> <a href="#nav" title="Show navigation">Show navigation</a> <a href="#" title="Hide navigation">Hide navigation</a>
      <ul class="clearfix">
      	
    <li><a href="http://localhost/job_board/employer/my_jobs.php"><img src="http://localhost/job_board/img/jobboard_logo.png" class="logo"></a>
    <li><a href=""><span>Freelancers</span></a>
        <ul>
          <li><a href="http://localhost/job_board/employer/search_freelancers.php">Find a Freelancer</a></li>
          <li><a href="http://localhost/job_board/employer/my_freelancers.php">My Freelancers</a></li>
          <li><a href=<?php echo 'http://localhost/job_board/profile.php?aid='.$aid.''?>>Profile</a> </li>
        </ul>
    </li>
    <li> <a href="http://localhost/job_board/employer/my_jobs.php"><span>My Jobs</span></a>
        <ul>
          <li><a href="http://localhost/job_board/employer/emp_current_jobs.php">Current Jobs</a></li>
          <li><a href="http://localhost/job_board/employer/emp_finished_jobs.php">Finished Contracts</a></li>
          <li><a href="http://localhost/job_board/employer/post_job.php">Post a Job</a></li>
          <li><a href="http://localhost/job_board/freelancer/index.php">View Other Jobs</a></li>
        </ul>
    </li>
    <li><a href="http://localhost/job_board/employer/earnings.php">Reports</a></li>
    <li><a href="http://localhost/job_board/messages/view_category.php">Messages</a></li>
    
  </ul>
</nav>
  
<script src="http://osvaldas.info/examples/main.js"></script>
<script src="http://osvaldas.info/examples/drop-down-navigation-touch-friendly-and-responsive/doubletaptogo.js"></script> 
  
<script>
	$( function()
	{
		$( '#nav li:has(ul)' ).doubleTapToGo();
	});
</script>
