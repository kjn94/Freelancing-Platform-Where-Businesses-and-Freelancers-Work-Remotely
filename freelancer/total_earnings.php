<body>
   
<h1>Total Earnings</h1>
  <?php
    $jobs = "";
    $total = 0;
    
    $sql = "SELECT * FROM jobposts INNER JOIN users ON jobposts.author_id=users.id INNER JOIN contracts ON contracts.topic_id=jobposts.id WHERE contracts.finished=1 AND contracts.applicant_id=".$_SESSION['uid']." ORDER BY contracts.endDate DESC";
    $res = mysqli_query($db, $sql) or die(mysqli_error($db));
    $count = mysqli_num_rows($res);
    if(mysqli_num_rows($res) > 0)
    {
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
                            while($row = mysqli_fetch_assoc($res))
                            {
                              $cid = $row['category_id'];
                              $tid = $row['topic_id'];
                              $eid = $row['author_id'];
                              $aid = $row['applicant_id'];
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
                                          <td class='column3'><a href='../view_contract.php?tid=".$tid."&aid=".$aid."&eid=".$eid."'target='_blank'>".$title."</a></td>
                                          <td class='column4'>$".$price." </td>
                                          <td class='column5'><a href='proposal_view.php?cid=".$cid."&tid=".$tid."'target='_blank'>Go To Job</a></td>                                       
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
                        echo "<h2>You have earned: $".$total.".</h2>";
                        ?>         
</body>

