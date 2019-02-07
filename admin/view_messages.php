<?php
    require_once '../core/init.php';
      include '../menu.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>View Category</title>
<link href="http://localhost/job_board/css/menu.css" rel="stylesheet" type="text/css" /> <!-- Main Menu -->
<link href="http://localhost/job_board/css/footer.css" rel="stylesheet" type="text/css" /> <!-- Footer Menu -->
<link href="http://localhost/job_board/css/buttons.css" rel="stylesheet" type="text/css" /><!-- Buttons -->
<link href="http://localhost/job_board/css/style.css" rel="stylesheet" type="text/css" /> <!-- Main Design Content and Sidebar -->
<link href="http://localhost/job_board/css/index.css" rel="stylesheet" type="text/css" /><!-- Other Design -->
<link href="http://localhost/job_board/css/table_messages.css" rel="stylesheet" type="text/css" /><!-- Table Design -->

<!--- Bootstrap theme - makes the content mobile responsive -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
  <!--------BANNER-------->
<?php
    include '../includes/register_bar.php';
  ?>
  <nav class="nav-belowmenu">
    <center>
      <h1>
        Find Your Dream Job
      </h1>
      <h2>Grow your business through the top freelancing website. </h2>
    </center>
  </nav>


        <?php   
            $topics = "";


            if(isset($_SESSION['uid'])){
                echo " | <center><h1>Pick a Conversation</h1></center>";
            }else{
                echo " | Please login to view a Conversation.";
            }

            $sql3 = "SELECT * FROM users INNER JOIN topics ON topics.topic_creator=users.id ORDER BY topic_reply_date DESC";
            $res3 = mysqli_query($db, $sql3) or die(mysqli_error($db)); 

            $sql4 = "SELECT * FROM users INNER JOIN topics ON topics.topic_participant=users.id ORDER BY topic_reply_date DESC";
            $res4 = mysqli_query($db, $sql4) or die(mysqli_error($db)); 

                if(mysqli_num_rows($res3) > 0)
                {
                    
                  $topics .= "     
                    <div class='limiter'>
                      <div class='container-table100'>
                          <div class='wrap-table100'>
                              <div class='table100'><table>
                                      <thead>
                                          <tr class='table100-head'>
                                              <th class='column1'>Date</th>
                                              <th class='column2'>Title</th>
                                              <th class='column3'>Employer</th>
                                              <th class='column4'>Freelancer</th>                               
                                              <th class='column5'>Replies</th>   
                                              <th class='column6'>Views</th>                             
                                          </tr>
                                      </thead>
                                      <tbody>";

                    while($row = mysqli_fetch_assoc($res3)){
                        $tid = $row['id'];
                        $title = $row['topic_title'];
                        $replies = $row['topic_replies'];
                        $views = $row['topic_views'];
                        $date = $row['topic_date'];
                        $employer = $row['username'];
                        $eid = $row['topic_creator'];
                        $aid = $row['topic_participant'];                        

                        if($row2 = mysqli_fetch_assoc($res4))
                        {
                        $freelancer = $row2['username'];
                        //$topics .= "<tr> <td><a href='view_topic.php?tid=".$tid."'>".$title."</a><br><span class='post_info'>Posted by: ".$creator." on " .$date."</span></td><td align='center'>".$replies."</td><td align='center'>".$views."</td></tr>";
                        $topics .= "<tr>
                                      <td class='column1'>".$date."</td>
                                        <td class='column2'><a href='view_topic.php?tid=".$tid."'>".$title."</a></td>
                                        <td class='column3'><a href='../profile.php?aid=".$eid."'>".$employer."</a></td>
                                        <td class='column4'><a href='../profile.php?aid=".$aid."'>".$freelancer."</a></td>
                                      <td class='column5'>".$replies."</a></td>
                                      <td class='column6'>".$views."</a></td>
                                    </tr>";
                        //$topics .= "<tr><td colspan='3'><hr></td</tr>";
                                  }
                    }
                    $topics .= "</tbody></table>";
                    echo $topics;
                }else{
                    echo "<center><a href='http://localhost/job_board/admin/jobs_all.php'><button class='button8 button9'>Return to Home</button></a></center><hr>";
                    echo "<h1>There are no Topics Yet.</h1>";
                }

        ?>  
</div></div></div></div>
<br>
    <!--------FOOTER-------->
<?php

    include '../includes/footer.php';

?>
</body>
</html>