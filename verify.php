<head>
    <title>Verify Profile</title>
<link href="http://localhost/job_board/css/menu.css" rel="stylesheet" type="text/css" /> <!-- Main Menu -->
<link href="http://localhost/job_board/css/footer.css" rel="stylesheet" type="text/css" /> <!-- Footer Menu -->
<link href="http://localhost/job_board/css/buttons.css" rel="stylesheet" type="text/css" /> <!-- Buttons -->
<link href="http://localhost/job_board/css/index.css" rel="stylesheet" type="text/css" /><!-- Other Design -->

<!--- Bootstrap theme - makes the content mobile responsive -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<?php 
/* Verifies registered user email, the link to this page
   is included in the register.php email message 
*/
/* Database connection settings */
$host = 'localhost';
$user = 'root';
$pass = 'root';
$db = 'jobs';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
session_start();

// Make sure email and hash variables aren't empty
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']))
{
    $email = $mysqli->escape_string($_GET['email']); 
    $hash = $mysqli->escape_string($_GET['hash']); 
    
    // Select user with matching email and hash, who hasn't verified their account yet (active = 0)
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email' AND hash='$hash' AND active='0'");

    if ( $result->num_rows == 0 )
    { 
        $_SESSION['message'] = "Account has already been activated or admin has not approved you yet!";
        header("location: error.php");
    }
    else {
        while($row = mysqli_fetch_assoc($result))
        {$type = $row['type'];}
        
        if($type == "admin")
        {
            $_SESSION['message'] = "Your account is activated!";           
            // Set the user status to active (active = 1)
            $mysqli->query("UPDATE users SET active='1' WHERE email='$email'") or die($mysqli->error);
        }
        else
        {
            $_SESSION['message'] = "Your account is almost activated! Our team is going to review your registration.";   
            // Set the user status to active (active = 3)
            $mysqli->query("UPDATE users SET active='3' WHERE email='$email'") or die($mysqli->error);
        }
        header("location: success.php");
    }
}
else {
    $_SESSION['message'] = "Invalid parameters provided for account verification!";
    header("location: error.php");
}     
?>