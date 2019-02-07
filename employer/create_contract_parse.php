<?php
    session_start();
    $tid = $_GET['tid'];
    $aid = $_GET['aid'];
    $eid = $_GET['eid'];

    if($_SESSION['uid']){
        if(isset($_POST['create_contract'])){
            include_once("../core/init.php");
            $date = date('Y-m-d H:i:s');          
            $agreed_price = $db->real_escape_string($_POST['agreed_price']);
            if(!is_numeric($agreed_price))
            {
                $_SESSION['message'] = "Sorry, Price is not a number.";
                header("location: error.php");
                exit(); 
            }

            $sql2 = "INSERT INTO contracts (topic_id, applicant_id, agreed_price, startDate, finished)VALUES('".$tid."','".$aid."', '".$agreed_price."', '".$date."', 0)";
            $res2 = mysqli_query($db, $sql2) or die(mysqli_error($db));

            if (($res2)) 
            {
                header("Location: ../view_contract.php?tid=".$tid."&aid=".$aid."&eid=".$eid."");            
            }
            else
            {
                echo "<h2>There was a problem in your application. </h2>";
                echo "<a href='error.php'>
                        <input type='submit' value='View Other Job Offers'/></a>
                    </a>";
            }
        }
    }
?>

