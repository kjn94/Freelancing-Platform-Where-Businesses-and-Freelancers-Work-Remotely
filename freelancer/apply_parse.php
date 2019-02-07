<?php
    session_start();
    if($_SESSION['uid'])
    {
        if(isset($_POST['reply_submit']))
        {
            include_once("../core/init.php");
            $applicant = $_SESSION['uid'];
            $tid = $_POST['tid'];
            $cover_letter = $db->real_escape_string($_POST['cover_letter']);
            $proposed_budget = $db->real_escape_string($_POST['proposed_budget']);

            if(!is_numeric($proposed_budget))
            {
                $_SESSION['message'] = "Sorry, Proposed budget is not a number.";
                header("location: error.php");
                exit(); 
            }

            $sql = "INSERT INTO applications (topic_id, applicant_id, cover_letter, proposed_budget, current) VALUES ('".$tid."', '".$applicant."', '".$cover_letter."', '".$proposed_budget."', 1)";
            $res = mysqli_query($db, $sql) or die(mysqli_error($db));
            
            //check if freelancer has been invited for this job
            $sql2 = "UPDATE invitations SET current=0 WHERE topic_id=".$tid." AND applicant_id=".$applicant."";
            $res2 = mysqli_query($db, $sql2) or die(mysqli_error($db));

            if (($res & $res2)) 
            {
                header("Location: success_proposal.php");              
            }
            else
            {
                echo "<p>There was a problem in your application. </p>";
                echo "<a href='index.php'>
                    <input type='submit' value='View Other Job Offers'/></a>
                    </a>";
            }
        }else{
            exit();
        }
    }else{
        exit();
    }
?>