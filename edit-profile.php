<?php
    require_once 'core/init.php';
    include 'menu.php';
?>
<html>
<head>
	<title>Profile</title>
<link href="http://localhost/job_board/css/menu.css" rel="stylesheet" type="text/css" /> <!-- Main Menu -->
<link href="http://localhost/job_board/css/footer.css" rel="stylesheet" type="text/css" /> <!-- Footer Menu -->
<link href="http://localhost/job_board/css/buttons.css" rel="stylesheet" type="text/css" /> <!-- Buttons -->
<link href="http://localhost/job_board/css/index.css" rel="stylesheet" type="text/css" /><!-- Other Design -->
<link href="http://localhost/job_board/css/style.css" rel="stylesheet" type="text/css" /><!-- Other Design -->

<!--- Bootstrap theme - makes the content mobile responsive -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<?php

if(isset($_SESSION['uid']))
{
    //get the category of the user in session
    $query = "SELECT * FROM users INNER JOIN jobpostscategories ON jobpostscategories.id=users.category_user_id WHERE users.id=".$_SESSION['uid']."";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_array($result);
?>
<body>
 <?php
  include 'includes/register_bar.php';
?>
    <nav class="nav-belowmenu">
        <center>
            <h1>Edit Your Profile</h1>
        </center>
    </nav>
    <br>
<center>
	<form action="<?php echo htmlspecialchars('edit-profile_parse.php');?>" method="post" enctype="multipart/form-data">
<br>
        <input type="text" id="username" name="username" value="<?php echo $row['username']; ?>" placeholder="Username" required/><br>
        <br>
        <input type="text" id="firstname" name="firstname" value="<?php echo $row['firstname']; ?>" placeholder="firstname" required/><br>
        <br>
        <input type="text" id="lastname" name="lastname" value="<?php echo $row['lastname']; ?>" placeholder="lastname" required/><br>
        <br>

 		<textarea id="description" name="description" placeholder="description"><?php echo strip_tags($row['description'])?></textarea>

        <select name="category_user_id" id="category_user_id" ><option value=<?php echo $row['id']?>><?php echo $row['category']?></option>
        <?php
          $sql2 = "SELECT * FROM jobpostscategories";
          $res2 = mysqli_query($db, $sql2) or die(mysqli_error($db));
           while ($row2 = mysqli_fetch_array($res2)) 
           {
            ?>
              <option value=<?php echo $row2['id']?>><?php echo $row2['category']?></option>
        <?php
            }
}
        ?>
  		</select><br><br>
		<input type="file" name="fileToUpload" id="fileToUpload">
		<img src="<?php echo $row['image']; ?>" class="post-creator">
       	<br><br>

        <input type='submit' value='SAVE' name='save'>
    </form>
</center>

<br><br><br>
</body>
    <!--------FOOTER-------->
<?php

    include 'includes/footer.php';

?>