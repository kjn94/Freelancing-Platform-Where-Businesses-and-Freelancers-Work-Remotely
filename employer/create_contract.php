<?php
    require_once '../core/init.php';
    include '../menu.php';
?>


<!DOCTYPE html>
<html>
  <head>
        <title>Create Contract</title>
<link href="http://localhost/job_board/css/menu.css" rel="stylesheet" type="text/css" /> <!-- Main Menu -->
<link href="http://localhost/job_board/css/footer.css" rel="stylesheet" type="text/css" /> <!-- Footer Menu -->
<link href="http://localhost/job_board/css/buttons.css" rel="stylesheet" type="text/css" /> <!-- Buttons -->
<link href="http://localhost/job_board/css/index.css" rel="stylesheet" type="text/css" /><!-- Other Design -->

<!--- Bootstrap theme - makes the content mobile responsive -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
<body>
  <?php
  include '../includes/register_bar.php';
?>
  <nav class="nav-belowmenu">
      <center><h1>Create Contract</h1><center>
  </nav>

 <?php

    $tid = $_GET['tid'];
    $aid = $_GET['aid'];
    $eid = $_GET['eid'];
    if(isset($_SESSION['uid']))
    {
  ?>
        <div id="wrapper">
            <center>
            <br>
            <hr>
            </center>
            <div id="content">
                <center><form action=<?php echo "create_contract_parse.php?tid=".$tid."&aid=".$aid."&eid=".$eid."" ?> method="post">
                <input type='text' placeholder="Final Price" name='agreed_price' required autocomplete="off"><br><br>
                <input type="submit" name="create_contract" value="Create Contract"/>
                </form></center>
            </div>
        </div>
    <?php
    }
    else
    {
        echo "You are not logged in as an employer.
        <a href='../login.php'><button class='button8 button9'>Login</button></a>";
    }
        ?>
    <!--------FOOTER-------->
<?php
    include '../includes/footer.php';
?>
</body>
</html>