<?php
	require '../core/init.php';
	include '../menu.php';
  include('../includes/job_cat_link.php');
?>

<head>
	<title>Job Post View</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="http://localhost/job_board/css/menu.css" rel="stylesheet" type="text/css" /> <!-- Main Menu -->
<link href="http://localhost/job_board/css/catmenu.css" rel="stylesheet" type="text/css" /> <!-- Category Menu -->
<link href="http://localhost/job_board/css/footer.css" rel="stylesheet" type="text/css" /> <!-- Footer Menu -->
<link href="http://localhost/job_board/css/buttons.css" rel="stylesheet" type="text/css" /> <!-- Buttons -->
<link href="http://localhost/job_board/css/style.css" rel="stylesheet" type="text/css" /> <!-- Main Design Content and Sidebar -->
<link href="http://localhost/job_board/css/index.css" rel="stylesheet" type="text/css" /><!-- Other Design -->

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
			<h1>Find Your Dream Job</h1>
			<h2>Grow your business through the top freelancing website. </h2>
		</center>
	</nav>
    <!--  Category Jobs-->
<div class="topnav" id="myTopnav">
  <?php echo $categories ?>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()"><img src="../img/menu_icon.png" height="30px" width="30px">
    <i class="fa fa-bars"></i>
  </a>
</div>

<div id="colorlib-container">
            <div class="container">
                <div class="row">
                    <div class="content">
 <?php
  $row2='';

  if(isset($_GET['tid']) && is_numeric($_GET['tid']) && isset($_GET['cid']) && is_numeric($_GET['cid']))
  {
        $cid = $_GET['cid'];
        $tid = $_GET['tid'];
       //select a conversation
        $sql2 = "SELECT * FROM jobposts WHERE id='".$tid."' AND category_id='".$cid."'";
        $res2 = mysqli_query($db, $sql2) or die(mysqli_error($db));

          while ($row2 = mysqli_fetch_assoc($res2)) 
          {
            //increase number of views
            $old_views = $row2['job_views'];
            $new_views = $old_views + 1;
            if($type != "admin")
            {
            	$sql3 = "UPDATE jobposts SET job_views='".$new_views."' WHERE id='".$tid."' AND category_id='".$cid."'";
            	$res3 = mysqli_query($db, $sql3) or die(mysqli_error($db));
            }
          }

      //select the right job by cid and tid
      $sql = "SELECT * FROM jobposts INNER JOIN jobpostscategories ON jobposts.category_id=jobpostscategories.id INNER JOIN users ON users.id=jobposts.author_id WHERE category_id='".$cid."' AND jobposts.id='".$tid."' LIMIT 1";
      $res = mysqli_query($db, $sql) or die(mysqli_error($db));
   
      if(isset($_SESSION['uid']))
      {
        $sql5 = "SELECT * FROM applications WHERE topic_id='".$tid."' AND applicant_id='".$_SESSION['uid']."'";
        $res5 = mysqli_query($db, $sql5) or die(mysqli_error($db)); 
      }
      //checking if the person has applied for that job
      if( isset($_SESSION['uid']) && (mysqli_num_rows($res5) > 0))
      {
              echo "<h1 align='center'>You have already applied for the job!</h1>
                    <center>
                      <a href='index.php'>
                        <button class='button8 button9'>View Other Job Offers</button>
                      </a>
                    </center>";
      }

      if(mysqli_num_rows($res) == 1)
      {   
          //if user is not in session, he cannot apply  
          if(!isset($_SESSION['uid']))
          {
             echo "<center><h2>Please log in to Apply for the job</h2><hr>
                    <a href='../login.php'>
                      <button class='button8 button9'>Login</button>
                    </a>
                  </center>";       
          }  

          while ($row = mysqli_fetch_assoc($res)) 
          {
              $image = $row['image'];
              $title = $row['job_title'];
              $description = $row['job_description'];
              $client_budget = $row['client_budget'];
              $author_id = $row['author_id'];
              $picture = $row['picture'];
              $firstname = $row['firstname'];
              $lastname = $row['lastname'];  
              $category = $row['category']; 
              $timestamp = $row['timestamp']; 
              echo "
                  <article class='blog-entry'>
                      <div class='blog-wrap'>
                        <span class='category text-center'>Category: ".$category."</span>
                        <h2 class='text-center'>".$title."</h2>
                        <div class='blog-image'>
                          <div class='owl-carousel owl-carousel2 blog-item'>
                            <div class='item'>
                              <center><img src='".$picture."' alt='Ash' class='blog'/></center>
                            </div><br>
                          </div>        
                        </div>
                        <span class='category text-center'>".$timestamp." | <a href='../profile.php?aid=".$author_id."' class='posted-by' target='_blank'>Employer's Name: ".$firstname." ".$lastname."</a> | <h5>Employer's Budget: <strong>$".$client_budget."</strong></h5>
                      </div>
                      
                      		<h2 class='desctitle'>Description:</h2>
                      		<p class='desc'> ".nl2br($description)."</p> 
                             
                  </article> <hr>";  
          }
          //checking if the user is logged in
          if(!isset($_SESSION['uid']))
          {

          }
          else
          {
              //query for getting the type of the user
              $sql15 = "SELECT type FROM users WHERE id='".$_SESSION['uid']."'";     
              $res15 = mysqli_query($db, $sql15) or die(mysqli_error($db));

              //only freelancers can apply for a job
              if($row15 = mysqli_fetch_assoc($res15))
              {
                  $type = $row15['type']; //get the usertype of the user who is logged in
                  
                  if( $type == "employer" || $type == "admin")
                  {
                    echo "<center><h2>Please log in as a freelancer to Apply for the job</h2></center><hr>"; 

                  }
                  else
                  {
                      if (isset($_SESSION['uid']) && (mysqli_num_rows($res5) == 0))
                      {
                          echo "<br><center><input type='submit' value='Apply For The Job' onClick=\"window.location = 'apply.php?cid=".$cid."&tid=".$tid."'\"/><hr></center>";
                      }
                  }
              }
          }
      }
      else
      {
          echo "<p>This Job Does Not Exist.</p>";
      }
  }
  else
  {
    echo "<h1>This Job Does Not Exist.</h1>";
  }
  ?> 
              </div>
<?php include '../includes/sidebar.php'?>
        </div>
    </div>
</div>

</body>

<?php
	include '../includes/footer.php';
?>