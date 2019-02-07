<?php
    require_once '../core/init.php';
    include '../menu.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Success Proposal</title>
        <link href="../css/index.css" rel="stylesheet" type="text/css">
        <link href="../css/buttons.css" rel="stylesheet" type="text/css" />
        <link href="../style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" type="text/css" href="../css/menu.css">
<link rel="stylesheet" type="text/css" href="../css/footer.css">
<link rel="stylesheet" type="text/css" href="../css/footer2.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
<body>
  <?php
    include '../includes/register_bar.php';
  ?>
    <nav class="nav-belowmenu">
        <center><h1>Congratulations</h1><center>
    </nav>

    <div id="wrapper">
        <center>
            <hr>
            <h2 align="center">Your proposal has been sent.</h2>
            <hr>
        
            <a href="index.php">
              <input type="submit" name="reply_submit" value="View Other Job Offers"/>
            </a>
            </center>
    </div>
    <!--------FOOTER-------->
<?php

    include '../includes/footer.php';

?>
</body>
</html>