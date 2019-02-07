<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1" />
<head>
  <link rel="stylesheet" type="text/css" href="css/menu.css">
</head>


<nav id="nav" role="navigation"> <a href="#nav" title="Show navigation">Show navigation</a> <a href="#" title="Hide navigation">Hide navigation</a>
      <ul class="clearfix">
      	
      	<li><a href="http://localhost/job_board/admin/verify_jobs.php"><img src="http://localhost/job_board/img/jobboard_logo.png" class="logo"></a></li>
    <li><a href="#"><span>Jobs</span></a>
      <ul>
        <li><a href="http://localhost/job_board/admin/jobs_all.php">All Jobs</a></li>
        <li><a href="http://localhost/job_board/admin/verify_jobs.php">Verify Jobs</a></li>
      </ul>
    </li>
    <li> <a href="http://localhost/job_board/admin/verify_users.php">Verify Users</a></li>
    <li> <a href="#"><span>Reports</span></a>
          <ul>
        <li><a href="http://localhost/job_board/admin/view_employers.php">Employers</a></li>
        <li><a href="http://localhost/job_board/admin/view_freelancers.php">Freelancers</a></li>
      </ul>
        </li>
    <li><a href="http://localhost/job_board/admin/view_messages.php">Messages</a></li>
    
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
