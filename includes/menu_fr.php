


<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1" />
<head>
  <link rel="stylesheet" type="text/css" href="css/menu.css">
</head>


<nav id="nav" role="navigation" > <a href="#nav" title="Show navigation">Show navigation</a> <a href="#" title="Hide navigation">Hide navigation</a>
      <ul class="clearfix">
      	
      	<li><a href="http://localhost/job_board/freelancer/index.php"><img src="http://localhost/job_board/img/jobboard_logo.png" class="logo"></a></li>
    <li><a href=""><span>Find Work</span></a>
      <ul>
        <li><a href=<?php echo 'http://localhost/job_board/profile.php?aid='.$aid.''?>>Profile</a></li>
        <li><a href="http://localhost/job_board/freelancer/proposals.php">Proposals</a></li>
        <li><a href="http://localhost/job_board/employer/search_freelancers.php">View Competition</a></li>
      </ul>
    </li>
    <li> <a href=""><span>My Jobs</span></a>
          <ul>
        <li><a href="http://localhost/job_board/freelancer/current_jobs.php">Current Jobs</a></li>
        <li><a href="http://localhost/job_board/freelancer/finished_jobs.php">Finished Contracts</a></li>
      </ul>
        </li>
    <li> <a href="http://localhost/job_board/freelancer/earnings.php">Reports</a>

        </li>
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
