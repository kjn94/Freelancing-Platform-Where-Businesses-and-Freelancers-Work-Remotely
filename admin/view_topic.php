 <?php
    require_once '../core/init.php';
      include '../menu.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>View Topic</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="http://localhost/job_board/css/menu.css" rel="stylesheet" type="text/css" /> <!-- Main Menu -->
<link href="http://localhost/job_board/css/footer.css" rel="stylesheet" type="text/css" /> <!-- Footer Menu -->
<link href="http://localhost/job_board/css/buttons.css" rel="stylesheet" type="text/css" /><!-- Buttons -->
<link href="http://localhost/job_board/css/style.css" rel="stylesheet" type="text/css" /> <!-- Main Design Content and Sidebar -->
<link href="http://localhost/job_board/css/index.css" rel="stylesheet" type="text/css" /><!-- Other Design -->
<link href="http://localhost/job_board/css/table_messages_replies.css" rel="stylesheet" type="text/css" /><!-- Table Design -->

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
      <h1>Find Your Dream Job</h1>
      <h2>Grow your business through the top freelancing website. </h2>
    </center>
  </nav>

   		<?php
        $tid = $_GET['tid'];
    if(isset($_GET['tid']) && is_numeric($_GET['tid']))
    {
        //select a conversation
   			$sql = "SELECT * FROM topics WHERE id='".$tid."'";
   			$res = mysqli_query($db, $sql) or die(mysqli_error($db));

   			if(mysqli_num_rows($res) == 1){
          echo "<div class='limiter'>
                  <div class='container-table100'>
                      <div class='wrap-table100'>
                          <div class='table100'><table>
                                  <thead>
                                      <tr class='table100-head'>
                                      <th class='column2'>Image</th>
                                          <th class='column2'>Post_creator</th>
                                          <th class='column3'>Message</th>
                                          <th class='column4'>Date</th>
                                      </tr>
                                  </thead>
                                  <tbody>";



   				while ($row = mysqli_fetch_assoc($res)) {
            //print messages
            $sql3 = "SELECT * FROM posts INNER JOIN users ON posts.post_creator = users.id INNER JOIN topics ON topics.id=posts.topic_id WHERE topic_id = '".$tid."' ORDER BY post_date ASC";
            $res3 = mysqli_query($db, $sql3) or die(mysqli_error($db)); 
            $topic_title = $row['topic_title'];
            echo "<center><h2>Title: <strong>".$topic_title."</strong></h2></center>"; 

   					while($row2 = mysqli_fetch_assoc($res3))
            {
                        
                        $post_date = $row2['post_date'];
                        $post_content = $row2['post_content'];
                        $topic_date = $row2['topic_date'];
                        $username = $row2['username'];
                        $uid = $row2['post_creator'];
                        $image = $row2['image'];

              echo "<tr>
                      <td class='column2'><img src=".$image." class='post-creator'></td>
                        <td class='column2'><a href='../profile.php?aid=".$uid."'>".$username."</a></td>
                        <td class='column3'>".$post_content."</td>
                        <td class='column4'>".$post_date."</td>                     
                    </tr>";
   					}
   				}
   				
   				echo "</tbody></table>";

   			}
        else
        {
   				echo "<h1>This topic does not exist.</h1>";
   			}

   		?> </div></div></div></div>
      <?php
                if(isset($_SESSION['uid']) && $type == "admin")
                {
                  echo "<center><form action='topic_delete.php' method='post'>
                        <br>
                        <input type='hidden' name='tid' value='$tid'/>
                        <input type='submit' name='delete_submit' value='Delete Topic' />
                        </form></center>";
                }
                else
                {
                  echo "<tr><td colspan='2'><center><p class='intro'>Please log in as an admin.</p></center><hr></td></tr>";
                }  
  }
  else
  {
    echo "<h1>This topic does not exist.</h1>";
  }
          ?>

</div>
</center>
</body>
</html>
    <!--------FOOTER-------->
<?php

    include '../includes/footer.php';

?>
