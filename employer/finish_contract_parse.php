<?php
    include_once("../core/init.php");
    session_start();
    if($_SESSION['uid'])
    {
        $aid = $_POST['aid'];
        $tid = $_POST['tid']; 
        $contract_id = $_POST['contract_id'];   
        //check if employer has provided feedback
        if(isset($_POST['emp_experience']) && isset($_POST['emp_summary']))
        {
   
            $emp_experience = $db->real_escape_string($_POST['emp_experience']);
            $emp_summary = $db->real_escape_string($_POST['emp_summary']);
            $date = date('Y-m-d H:i:s'); 
            //add employer's feedback
            $sql = "INSERT INTO feedback (emp_experience, emp_summary, contract_id, applicant_id) VALUES ('".$emp_experience."', '".$emp_summary."', '".$contract_id."', '".$aid."')";
            $res = mysqli_query($db, $sql) or die(mysqli_error($db));

            $sql3 = "UPDATE contracts SET finished=1, endDate='".$date."' WHERE applicant_id=".$aid." AND topic_id=".$tid."";
            $res3 = mysqli_query($db, $sql3) or die(mysqli_error($db));

            if (($res && $res3)) 
            {
                header('Location: success_contract.php');            
            }
            else
            {
                echo "<p>There was a problem in your feedback. </p>";
                echo "<a href='index.php'>
                    <input type='submit' value='Try again.'/></a>
                    </a>";
            }
        }
        //check if freelancer has provided feedback
        elseif(isset($_POST['app_experience']) && isset($_POST['app_summary']))
        {
            $app_experience = $db->real_escape_string($_POST['app_experience']);
            $app_summary = $db->real_escape_string($_POST['app_summary']);
            //add freelancer's feedback
            $sql4 = "UPDATE feedback SET app_experience='".$app_experience."', app_summary='".$app_summary."' WHERE applicant_id=".$aid." AND contract_id=".$contract_id."";
            $res4 = mysqli_query($db, $sql4) or die(mysqli_error($db));

            if($res4)
            {
                header('Location: success_contract.php');
            }
            else
            {
                echo "<p>There was a problem in your feedback. </p>";              
            }
        }
    }else{
        exit();
    }
?>