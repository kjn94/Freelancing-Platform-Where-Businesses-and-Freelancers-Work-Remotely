<?php
	require '../core/init.php';
	include '../menu.php';
?>
<head>
  <title>Proposal View</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="http://localhost/job_board/css/menu.css" rel="stylesheet" type="text/css" /> <!-- Main Menu -->
<link href="http://localhost/job_board/css/footer.css" rel="stylesheet" type="text/css" /> <!-- Footer Menu -->
<link href="http://localhost/job_board/css/jobs.css" rel="stylesheet" type="text/css" /> <!-- Main Menu -->
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
      <h1>View Proposal</h1>
      <h2>Here is the proposals that I have sent.</h2>
    </center>
  </nav>

  <div id="colorlib-container">
            <div class="container">
                <div class="row">
                    <div class="content">

 <?php
    if(isset($_GET['tid']) && is_numeric($_GET['tid']) && isset($_GET['cid']) && is_numeric($_GET['cid']))
    {
            $cid = $_GET['cid'];
            $tid = $_GET['tid'];            

            $sql = "SELECT * FROM jobposts INNER JOIN jobpostscategories ON jobposts.category_id=jobpostscategories.id INNER JOIN users ON users.id=jobposts.author_id INNER JOIN applications ON jobposts.id = applications.topic_id  WHERE jobposts.category_id='".$cid."' AND jobposts.id='".$tid."' AND applications.applicant_id=".$_SESSION['uid']." LIMIT 1";
            $res = mysqli_query($db, $sql) or die(mysqli_error($db));           
                if(mysqli_num_rows($res) > 0)
                {
                    while ($row = mysqli_fetch_assoc($res)) 
                    {
                        $picture = $row['picture'];
                        $title = $row['job_title'];
                        $description = $row['job_description'];
                        $client_budget = $row['client_budget'];
                        $cover_letter = $row['cover_letter'];
                        $proposed_budget = $row['proposed_budget'];
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
                                      <center><img src=".$picture." class='blog'></center>
                                    </div><br>
                                  </div>        
                                </div>
                                <span class='category text-center'>".$timestamp." | ".$firstname." ".$lastname." | <h5>Employer's Budget: <strong></i>$".$client_budget."</strong></h5>
                              </div>
                                <h2 class='desctitle'>Description:</h2>
                                <p class='desc'> ".nl2br($description)."</p> 
                              
                            </article>

                            <hr>
                            <div class='job'>

                              <div class='my-proposal'>
                                <h1 align='center'>Here is your proposal</h1>
                              </div>
                              <br><br>
                              <h2 class='desctitle'>Cover Letter:</h2>
                              <p class='desc'> ".nl2br($cover_letter)."</p> 
                              <h3>Offered Price: <strong>$".$proposed_budget."</strong></h3><br>
                              <center>
                                <a href='index.php'>
                                  <button class='button8 button9'>View Other Job Offers</button>
                                </a></center><br>
    	                    </div>";  
                    }
                }
                else
                {
                  echo "<h1>The Proposal Does Not Exist.</h1>";
                }                
          }
          else
          {
            echo "<h1>The Proposal Does Not Exist.</h1>";
          }
        ?> 
</body>
</div>
<?php include '../includes/sidebar.php'?>
</div></div></div>

<?php

	include '../includes/footer.php';

?>