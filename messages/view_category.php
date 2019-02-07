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
<link href="http://localhost/job_board/css/buttons.css" rel="stylesheet" type="text/css" /> <!-- Buttons Menu -->
<link href="http://localhost/job_board/css/style.css" rel="stylesheet" type="text/css" /> <!-- Main Design Content and Sidebar -->
<link href="http://localhost/job_board/css/index.css" rel="stylesheet" type="text/css" /><!-- Other Design -->
<link href="http://localhost/job_board/css/table_messages.css" rel="stylesheet" type="text/css" /><!-- Table Design -->

<!--- Bootstrap theme - makes the content mobile responsive -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="../js/menucat.js"></script><!-- Makes menu cat clickable -->
</head>
<body>
  <!--------BANNER-------->
<?php
    include '../includes/register_bar.php';
  ?>
  <nav class="nav-belowmenu">
    <center>
      <h1>Communication Chat App</h1>
      <h2>Grow your business through the top freelancing website.</h2>
    </center>
  </nav>


        <?php  
        if(isset($_SESSION['uid']))
        { 
            if($type == "admin"){header('Location: http://localhost/job_board/admin/view_messages.php');}
            $topics = "";
            $total_unread_messages = 0;

            if($type == "employer")
            {
                echo "<center><a href='create_topic.php' target='_blank'><h1>Click here to Create a Topic</h1></a></center>";
            }
            //get the topics of employer
            $sql3 = "SELECT * FROM users INNER JOIN topics ON topics.topic_creator=users.id WHERE topics.topic_creator=".$_SESSION['uid']." OR topics.topic_participant=".$_SESSION['uid']." ORDER BY topic_reply_date DESC";
            $res3 = mysqli_query($db, $sql3) or die(mysqli_error($db)); 

            //get the topics of applicant
            $sql4 = "SELECT * FROM users INNER JOIN topics ON topics.topic_participant=users.id WHERE topics.topic_creator=".$_SESSION['uid']." OR topics.topic_participant=".$_SESSION['uid']." ORDER BY topic_reply_date DESC";
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
                                              <th class='column7'>Unread Messages</th>                               
                                          </tr>
                                      </thead>
                                      <tbody>";

                    while($row = mysqli_fetch_assoc($res3)){
                        $tid = $row['id'];
                        $title = $row['topic_title'];
                        $replies = $row['topic_replies'];
                        $views = $row['topic_views'];
                        $date = $row['topic_date'];
                        $employer = $row['firstname'];
                        $eid = $row['topic_creator'];
                        $aid = $row['topic_participant'];

            //number of unread messages
            $sql5 = "SELECT COUNT(*) FROM posts WHERE topic_id=".$tid." AND post_creator!=".$_SESSION['uid']." AND post_read='no'";
            $res5 = mysqli_query($db, $sql5) or die(mysqli_error($db));
            $row5 = mysqli_fetch_array($res5);

            $num_unread_messages = $row5[0];            
            $total_unread_messages += $num_unread_messages;

            
                        if($row2 = mysqli_fetch_assoc($res4))
                        {
                        $freelancer = $row2['firstname'];
                        $topics .= "<tr>
                                      <td class='column1'>".$date."</td>
                                        <td class='column2'><a href='view_topic.php?tid=".$tid."'>".$title."</a></td>
                                        <td class='column3'><a href='../profile.php?aid=".$eid."'>".$employer."</a></td>
                                        <td class='column4'><a href='../profile.php?aid=".$aid."'>".$freelancer."</a></td>
                                      <td class='column5'>".$replies."</a></td>
                                      <td class='column6'>".$views."</a></td>
                                      <td class='column7'>".$num_unread_messages."</a></td>
                                    </tr>";
                        //$topics .= "<tr><td colspan='3'><hr></td</tr>";
                                  }
                    }
                    $topics .= "</tbody></table>";
                    echo $topics;
                }else{
                    echo "<center><a href='index.php'><button class='button8 button9'>Return to Home</button></a></center><hr>";
                    echo "<h1>There are no Topics Yet.</h1>";
                }
echo "<h2>Total Unread Messages: (".$total_unread_messages.")</h2>";
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
</div></div></div></div>
<br>
    <!--------FOOTER-------->
<?php

    include '../includes/footer.php';

?>
</body>
</html>