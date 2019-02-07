<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1" />
<head>
  <link rel="stylesheet" type="text/css" href="css/menu.css">
</head>

<nav id="nav" role="navigation"> <a href="#nav" title="Show navigation">Show navigation</a> <a href="#" title="Hide navigation">Hide navigation</a>
    <ul class="clearfix">
      <li><a href="http://localhost/job_board/join-us.php"><img src="http://localhost/job_board/img/jobboard_logo.png" class="logo"></a></li>
      <li><a href="http://localhost/job_board/login.php"><span>Login</span></a></li>
      <li> <a href="http://localhost/job_board/register.php"><span>Register</span></a> </li>  
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
