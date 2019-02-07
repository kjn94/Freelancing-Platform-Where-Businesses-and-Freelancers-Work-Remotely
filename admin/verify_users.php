<?php
	require '../core/init.php';
	include '../menu.php';
?>
        
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="http://localhost/job_board/css/menu.css" rel="stylesheet" type="text/css" /> <!-- Main Menu -->
<link href="http://localhost/job_board/css/catmenu.css" rel="stylesheet" type="text/css" /> <!-- Main Menu -->
<link href="http://localhost/job_board/css/footer.css" rel="stylesheet" type="text/css" /> <!-- Footer Menu -->
<link href="http://localhost/job_board/css/jobs.css" rel="stylesheet" type="text/css" /> <!-- Main Menu -->
<link href="http://localhost/job_board/css/buttons.css" rel="stylesheet" type="text/css" /> <!-- Buttons -->
<link href="http://localhost/job_board/css/style.css" rel="stylesheet" type="text/css" /> <!-- Main Design Content and Sidebar -->
<link href="http://localhost/job_board/css/index.css" rel="stylesheet" type="text/css" /><!-- Other Design -->
<link href="http://localhost/job_board/css/freelancers.css" rel="stylesheet" type="text/css" /><!-- Freelancer Design -->
<link href="http://localhost/job_board/css/interviews.css" rel="stylesheet" type="text/css" /><!-- Other Design -->

<!--- Bootstrap theme - makes the content mobile responsive -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="../js/menucat.js"></script><!-- Makes menu cat clickable -->
</head>
<body>
     <?php
  include '../includes/register_bar.php';
?>
	<nav class="nav-belowmenu">
		<center>
			<h1>Admin Panel</h1>
			<h2>Users That Need To Be Verified</h2>
		</center>
	</nav>




<?php
       //get the total number of jobposts in a search query
      $sql5 = "SELECT firstname, lastname, image, description, jobpostscategories.category, users.id, type, active FROM users INNER JOIN jobpostscategories ON users.category_user_id=jobpostscategories.id WHERE active=3 AND (type='freelancer' OR type='employer') GROUP BY users.id";
          $res5 = mysqli_query($db,$sql5) or die(mysqli_error($db));
      $row5 = mysqli_fetch_assoc($res5);
      // calculate total pages with results
      $total_pages = ceil(mysqli_num_rows($res5) / 6);
      include '../includes/pagination_get_page_freelancers.php';  

        if(isset($_SESSION['uid']))
        {
          //get all freelancers with their stats who have to be approved
          echo " <div class='border'></div>
                  <table class='rwd-table'><tr>";
            $sql4 = "SELECT firstname, lastname, image, description, jobpostscategories.category, users.id, type, active FROM users INNER JOIN jobpostscategories ON users.category_user_id=jobpostscategories.id WHERE active=3 AND (type='freelancer' OR type='employer') GROUP BY users.id ORDER BY users.id DESC LIMIT ".$start_from.", 6";
            $res2 = mysqli_query($db,$sql4) or die(mysqli_error($db));
            if(mysqli_num_rows($res2) > 0)
            {   
                $counter = 0;
                $avgRating = 0;
                $totalRating = 0;

                foreach ($res2 as $row2) 
                {
                   $aid = $row2['id'];
                   $firstname = $row2['firstname'];
                   $lastname = $row2['lastname'];
                   $speciality = $row2['category'];  
                   $image = $row2['image'];
                   $description = substr($row2['description'], 0, 100);

                    if($counter % 3 == 0)
                    {
                         echo "</tr><tr>";
                    }
                    ++$counter; 
                    echo "
                    <td>                             
                        <div class='container2'>
                            <div class='avatar-flip'>
                              <img src='".$image."'>
                            </div>";
                            echo "<h2>".$firstname." ".$lastname."</h2>
                            <h4>".$speciality."</h4>
                            <p>".$description."</p>                 
                            <a href='../profile.php?aid=".$aid."' target='_blank' class='btn btn-primary btn-custom'>View Profile</a>
                        </div>
                    </td>";
                  }
                  echo "<tr></table>";
            //============ PAGINATION ==================//
            include '../includes/pagination.php';   
            }  
            
            else
            {
                echo "<h2>All Users Have Been Verified.</h2>";
            }echo "</div>";echo "<tr></table><br>";
        }
        else
        {
          echo "<h2>You are not logged in to the system.</h2>
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