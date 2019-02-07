<?php
   require_once '../core/init.php';
    session_start();

    if($_SESSION['uid'])
    {
        if(isset($_POST['reply_submit']))
        {
            $creator = $_SESSION['uid'];

            $tid = $_POST['tid'];
            $reply_content = $db->real_escape_string($_POST['reply_content']);
            //add the message to posts table
            $sql = "INSERT INTO posts (topic_id, post_creator, post_content, post_date) VALUES ('".$tid."', '".$creator."', '".$reply_content."', now())";
            $res = mysqli_query($db, $sql) or die(mysqli_error($db));

            //update date
            $sql3 = "UPDATE topics SET topic_reply_date=now() WHERE id='".$tid."' LIMIT 1";
            $res3 = mysqli_query($db, $sql3) or die(mysqli_error($db));

            //Update topic replies
            $sql6 = "SELECT * FROM topics WHERE id='".$tid."' LIMIT 1";
            $res6 = mysqli_query($db, $sql6) or die(mysqli_error($db));
            if($row = mysqli_fetch_assoc($res6)) 
            {
                $old_replies = $row['topic_replies'];
                $new_replies = $old_replies + 1;
                $sql4 = "UPDATE topics SET topic_replies='".$new_replies."' WHERE id='".$tid."' LIMIT 1";
                $res4 = mysqli_query($db, $sql4) or die(mysqli_error($db));
                header("Location: view_topic.php?tid=".$tid.""); 
            }
        }else{
            exit();
        }
    }else{
        exit();
    }
?>