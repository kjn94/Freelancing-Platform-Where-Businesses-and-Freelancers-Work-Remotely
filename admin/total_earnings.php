
      <?php

          if(isset($_SESSION['uid']))
          {     
                $sql3 = "SELECT type FROM users WHERE id='".$_SESSION['uid']."'";     
                $res3 = mysqli_query($db, $sql3) or die(mysqli_error($db));
                if($row3 = mysqli_fetch_assoc($res3))
                {
                    $type_user = $row3['type']; //get the usertype of the user in session
                }
                    if($type_user == "admin")
                    {
                      echo "<h1>Total Earnings</h1>";


        ?>

<?php
          
                $jobs = ""; $jobs_emp = "";
                $total = 0; $total_emp = 0;
                $aid = $_GET['tid'];

                $sql3 = "SELECT type, firstname, lastname FROM users WHERE id='".$aid."'";     
                $res3 = mysqli_query($db, $sql3) or die(mysqli_error($db));


                
                $sql = "SELECT * FROM jobposts INNER JOIN jobpostscategories ON jobposts.category_id=jobpostscategories.id INNER JOIN users ON jobposts.author_id=users.id INNER JOIN contracts ON contracts.topic_id=jobposts.id WHERE contracts.finished=1 AND contracts.applicant_id=".$aid." ORDER BY contracts.endDate DESC";
                $res = mysqli_query($db, $sql) or die(mysqli_error($db));
                $count = mysqli_num_rows($res);

                $sql2 = "SELECT * FROM jobposts INNER JOIN jobpostscategories ON jobposts.category_id=jobpostscategories.id INNER JOIN contracts ON contracts.topic_id=jobposts.id INNER JOIN users ON contracts.applicant_id=users.id WHERE contracts.finished=1 AND jobposts.author_id=".$aid." ORDER BY contracts.endDate DESC";
                $res2 = mysqli_query($db, $sql2) or die(mysqli_error($db));
                $count = mysqli_num_rows($res2);

                if(mysqli_num_rows($res) > 0){
                  echo "<div class='limiter'>
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
                    while($row = mysqli_fetch_assoc($res)){
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
                                        <td class='column2'><a href='../profile.php?aid=".$eid."' target='_blank'>".$firstname." ".$lastname."</a></td>
                                        <td class='column3'><a href='../view_contract.php?tid=".$tid."&aid=".$aid."&eid=".$eid."' target='_blank'>".$title."</a></td>
                                        <td class='column4'>$".$price." </td>
                                        <td class='column5'><a href='../employer/proposals.php?tid=".$tid."&aid=".$aid."&eid=".$eid."' target='_blank'>Go To Job</a></td>                                         
                                    </tr>                              
                       ";
                    }   
                } 

                if(mysqli_num_rows($res2) > 0){
                  echo "<div class='limiter'>
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
                    while($row2 = mysqli_fetch_assoc($res2)){
                      $cid = $row2['category_id'];
                      $tid = $row2['topic_id'];
                      $aid = $row2['applicant_id'];
                      $eid = $row2['author_id'];
                      $firstname = $row2['firstname'];
                      $lastname = $row2['lastname'];
                      $title = $row2['job_title'];
                      $date = $row2['endDate'];
                      $price = $row2['agreed_price'];
                      //$firstname = $row['firstname'];
                      $total_emp += $price;
                      $jobs_emp .= "                              
                                    <tr>
                                        <td class='column1'>".$date."</td>
                                        <td class='column2'><a href='../profile.php?aid=".$aid."' target='_blank'>".$firstname." ".$lastname."</a></td>
                                        <td class='column3'><a href='../view_contract.php?tid=".$tid."&aid=".$aid."&eid=".$eid."' target='_blank'>".$title."</a></td>
                                        <td class='column4'>$".$price." </td>
                                        <td class='column5'><a href='../employer/proposals.php?tid=".$tid."&aid=".$aid."&eid=".$eid."' target='_blank'>Go To Job</a></td>                                         
                                    </tr>                              
                       ";
                    }   
                } 

                if($row3 = mysqli_fetch_assoc($res3))
                {
                    $type = $row3['type']; //get the usertype of the user from table row in your database
                    $firstname2 = $row3['firstname'];
                    $lastname2 = $row3['lastname'];                    
                    if( $type == "freelancer")
                    {
                      echo $jobs;
                      echo "<h2>".$firstname2." ".$lastname2." have earned: $".$total.".</h2>";
                    }
                    else if( $type == "employer")
                    {
                      echo $jobs_emp;
                      echo "<h2>".$firstname2." ".$lastname2." have paid: $".$total_emp.".</h2>";
                    }
                }                    
      
            ?>   
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

              <?php

                      }
                      else
                      {
                        echo "<h2>You are not logged in to the system as an admin.</h2>
                              <center>
                                  <a href='../login.php'>
                                    <button class='button8 button9'>Login</button>
                                  </a>
                              </center>";
                      }
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