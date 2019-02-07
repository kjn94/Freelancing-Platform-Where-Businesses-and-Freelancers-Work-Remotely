<?php
    require_once '../core/init.php';
    include '../menu.php';
?> 

  <head>
    <title>Create Topic</title>
  <link rel="stylesheet" type="text/css" href="../css/footer.css">
<link rel="stylesheet" type="text/css" href="../css/footer2.css">
<link rel="stylesheet" type="text/css" href="../css/index.css">
<link rel="stylesheet" type="text/css" href="../css/menu.css">
<link rel="stylesheet" type="text/css" href="../css/buttons.css">
<link rel="stylesheet" type="text/css" href="../css/main.css">
<link rel="stylesheet" type="text/css" href="../style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
<body>
<?php
    include '../includes/register_bar.php';
  ?>
  <nav class="nav-belowmenu">
    <center>
      <h1>Create a New Topic</h1>
      <h2>Grow your business through the top freelancing website. </h2>
    </center>
  </nav>
<?php
    if(isset($_SESSION ['uid']))
    {
    if($type == "admin"){header('Location: http://localhost/job_board/admin/view_messages.php');}
    if($type == "freelancer"){header('Location: http://localhost/job_board/messages/view_category.php');}

?>
<div id="wrapper"> 

    <div id="content"><br><br>
<center>
    <form action="<?php echo htmlspecialchars('create_topic_parse.php');?>" method="post">
        <input type="text" name="topic_title" placeholder='Topic Title' size="98" maxlength="50" required>
    
        <select id="topic_participant" name="topic_participant" required><option value="">Recipient</option>
          <?php
          //only people who have applied for your job
          $sql2 = "SELECT DISTINCT(users.username), users.lastname, users.id FROM applications INNER JOIN jobposts ON applications.topic_id=jobposts.id INNER JOIN users ON users.id=applications.applicant_id WHERE jobposts.author_id = ".$_SESSION['uid']."";
          $res2 = mysqli_query($db,$sql2) or die(mysqli_error($db));
                     while ($row = mysqli_fetch_array($res2)) {
                     $topic_participant = $row['username'];
                     $id_participant = $row['id'];
            ?>
        <option value="<?php echo htmlentities($id_participant, ENT_QUOTES, 'UTF-8'); ?>"><?php echo $topic_participant ?></option>
        <?php
              }

        ?>
      </select>

      <br><br>
      <textarea name="topic_content" placeholder="Topic Content..." required></textarea>
        <br><br>
        <input type="hidden" name="cid" value="<?php echo $cid; ?>">
        <input type="submit" name="topic_submit" value="Create Your Topic">
    </form>
 </center>
    </div>
</div>
<?php
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
    <!--------FOOTER-------->
<?php

    include '../includes/footer.php';

?>
</body>
</html>