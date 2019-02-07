<?php
	require '../core/init.php';
	include '../menu.php';
?>
<?php
    if(!isset($_SESSION ['uid']))
    {header("Location: http://localhost/job_board/join-us.php");}
    if($type == "freelancer")
      {header("Location: http://localhost/job_board/freelancer/earnings.php");}
    if($type == "admin")
      {header("Location: http://localhost/job_board/admin/verify_jobs.php");}
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="http://localhost/job_board/css/menu.css" rel="stylesheet" type="text/css" /> <!-- Main Menu -->
<link href="http://localhost/job_board/css/footer.css" rel="stylesheet" type="text/css" /> <!-- Footer Menu -->
<link href="http://localhost/job_board/css/buttons.css" rel="stylesheet" type="text/css" /> <!-- Buttons -->
<link href="http://localhost/job_board/css/style.css" rel="stylesheet" type="text/css" /> <!-- Main Design Content and Sidebar -->
<link href="http://localhost/job_board/css/index.css" rel="stylesheet" type="text/css" /><!-- Other Design -->
<link href="http://localhost/job_board/css/table_earnings.css" rel="stylesheet" type="text/css" /><!-- Table Design -->

<!--- Bootstrap theme - makes the content mobile responsive -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<?php
  include '../includes/register_bar.php';
if(!isset($_SESSION['uid']))
{}
else{
?>

<!-- Form to search data --->
<center>
  <form method="post">
    <input type="date" name="startDate" value="">
    <input type="date" name="endDate" value="">
    <select name="freelancer" id="freelancer" ><option value="">---Choose an Employer---</option>
          <?php                   
            $sql = "SELECT DISTINCT(users.firstname), users.lastname, users.id FROM users INNER JOIN contracts ON users.id=contracts.applicant_id INNER JOIN jobposts ON contracts.topic_id=jobposts.id WHERE contracts.finished = 1 AND jobposts.author_id=".$_SESSION['uid']."";
            $res = mysqli_query($db, $sql) or die(mysqli_error($db));
                   while ($row = mysqli_fetch_array($res)) {
          ?>
                  <option value=<?php echo $row['id']?>><?php echo $row['firstname'] . " " . $row['lastname'] ?></option>
        <?php
                      }
        ?>
    </select><br><br>
    <input type="submit" name="search" value="Search">
  </form>
</center>

<?php
}
    $jobs = "";
    $total = 0; //total amount of money earned
    if(isset($_POST['search']))
    {
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
        $freelancer = $_POST['freelancer'];

        //get all finished contracts
        $sql = "SELECT * FROM jobpostscategories INNER JOIN jobposts ON jobposts.category_id=jobpostscategories.id INNER JOIN contracts ON contracts.topic_id=jobposts.id INNER JOIN users ON contracts.applicant_id=users.id WHERE contracts.finished=1 AND jobposts.author_id=".$_SESSION['uid']." ";

        ////////// Including freelancer field search ////
        if(strlen($freelancer) > 0 ){
        $sql.= " AND contracts.applicant_id='$freelancer' "; 
        }
        //// End of freelancer field search ///////////

        ////////// Including date range field search ////
        if(strlen($startDate) > 0 && strlen($endDate) > 0){
        $sql.= " AND (contracts.endDate BETWEEN '$startDate' AND '$endDate')"; 
        }
        $sql .= " ORDER BY contracts.endDate DESC";
        //// End of date range field search ///////////

        $res = mysqli_query($db, $sql) or die(mysqli_error($db));

        //check if start date is after end date
        if($startDate > $endDate && strlen($endDate) > 0)
        {
           echo "<center><h1>Start date cannot be after end date.</h1></center><br>";
           include '../includes/footer.php';
           exit;
        }

        date_default_timezone_set('Europe/Sofia'); //set default timezone
        $date = date('Y-m-d H:i:s'); //set current date

        //check if start date is after current date
        if($startDate > $date)
        {
           echo "<center><h1>Start date cannot be after current date.</h1></center><br>";
           include '../includes/footer.php';
           exit;
        }

        //check if there are finished contracts that match the search
        if(strlen($freelancer) == 0 && (strlen($startDate) == 0 || strlen($endDate) == 0))
        {
           echo "<center><h1>There are no jobs that match this range date.</h1></center><br>";
        }
        else
        {                   
            //check if there are finished contracts that match the search
            if(mysqli_num_rows($res) > 0)
            {
              echo "   
                  <div class='limiter'>
                  <div class='container-table100'>
                      <div class='wrap-table100'>
                          <div class='table100'>
                              <table>
                                  <thead>
                                      <tr class='table100-head'>
                                          <th class='column1'>Date</th>
                                          <th class='column2'>Client</th>
                                          <th class='column3'>Job</th>
                                          <th class='column4'>Price</th>
                                          <th class='column5'>Link</th>         
                                      </tr>
                                  </thead>
                                  <tbody>";
                                //extract the data
                                while($row = mysqli_fetch_assoc($res))
                                {
                                  $cid = $row['category_id'];
                                  $tid = $row['topic_id'];
                                  $aid = $row['applicant_id'];
                                  $eid = $row['author_id'];
                                  $firstname = $row['firstname'];
                                  $lastname = $row['lastname'];
                                  $title = $row['job_title'];
                                  $date = $row['endDate'];
                                  $price = $row['agreed_price'];
                                  $total += $price;
                                  $jobs .= "                              
                                    <tr>
                                        <td class='column1'>".$date."</td>
                                        <td class='column2'><a href='../profile.php?aid=".$aid."' target='_blank'>".$firstname." ".$lastname."</a></td>
                                        <td class='column3'><a href='../view_contract.php?tid=".$tid."&aid=".$aid."&eid=".$eid."' target='_blank'>".$title."</a></td>
                                        <td class='column4'>$".$price." </td>
                                        <td class='column5'><a href='proposals.php?tid=".$tid."&aid=".$aid."&eid=".$eid."' target='_blank'>Go To Job </a></td>                                       
                                    </tr>";
                                }   
           }  
                          echo $jobs;
                          echo "</tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>";
            ////////// Including date range field search ////
            if(strlen($startDate) > 0 && strlen($endDate) > 0 && strlen($freelancer) == 0){
              echo "<h2>You have paid <strong>$".$total."</strong> from: <strong>".$startDate." to ".$endDate."</strong>.</h2>";
              include '../includes/footer.php';
              exit;
            }
            //// End of date range field search ///////////

            //initialize firstname and lastname if there is no data
            if(mysqli_num_rows($res) == 0)
            {
                  $sql2 = "SELECT * FROM users WHERE id=$freelancer";   
                  $res2 = mysqli_query($db, $sql2) or die(mysqli_error($db));
                if(mysqli_num_rows($res2) > 0)
                {
                    while($row2 = mysqli_fetch_assoc($res2))
                    {        
                      $firstname = $row2['firstname'];
                      $lastname = $row2['lastname'];
                           
                    }
                }
            }

            ////////// Including freelancer field search ////
            if(strlen($freelancer) > 0 && (strlen($startDate) == 0 || strlen($endDate) == 0)){
              echo "<h2>You have paid <strong>$".$total."</strong> to freelancer: <strong>".$firstname." ".$lastname."</strong>.</h2>";
            }
            //// End of freelancer field search ///////////

            if(strlen($freelancer) > 0 && strlen($startDate) > 0 && strlen($endDate) > 0){
                  echo "<h2>You have paid <strong>$".$total."</strong> to freelancer: <strong>".$firstname." ".$lastname."</strong> from: <strong>".$startDate." to ".$endDate."</strong>.</h2>";
            }
        }
    }
    //if the user has not used the search form yet.
    else
    {
            include 'total_earnings.php';
    }
?>           

</body>

<?php
	include '../includes/footer.php';
?>