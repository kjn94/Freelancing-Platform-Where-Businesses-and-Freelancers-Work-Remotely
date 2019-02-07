<?php
    session_start();
    if ($_SESSION['uid'] == "") {
        header("Location: ../login.php");
        exit();
    }

    if(isset($_POST['topic_submit']))
    {
        if(is_numeric($_POST['topic_participant']))
        {
            if(($_POST['topic_title'] == "") && ($_POST['topic_content'] == ""))
            {
                echo "<h2>You did not fill in both fields. Return to the previous page.</h2>";
                exit();
            }
            else
            {
                include_once("../core/init.php");
                $title = $db->real_escape_string($_POST['topic_title']);
                $content = $db->real_escape_string($_POST['topic_content']);          
                $topic_participant = $db->real_escape_string($_POST['topic_participant']);
                $creator = $_SESSION['uid'];
               
                $sql = "INSERT INTO topics (topic_title, topic_creator, topic_participant, topic_date, topic_reply_date) VALUES ('".$title."', '".$creator."', '".$topic_participant."',now(), now())";
                $res = mysqli_query($db, $sql) or die(mysqli_error($db));
                $new_topic_id = mysqli_insert_id($db);

                $sql2 = "INSERT INTO posts (topic_id, post_creator, post_content, post_date) VALUES ('".$new_topic_id."', '".$creator."', '".$content."', now())";
                $res2 = mysqli_query($db, $sql2) or die(mysqli_error($db));

                if (($res) && ($res2)) 
                {
                    header("Location: view_topic.php?tid=".$new_topic_id);
                }
                else
                {
                    echo "There was a problem creating your topic. Try again.";
                }
            }
        }
        else
        {
                echo "<h2>You did not fill a recipient.</h2>";
                exit();            
        }
    }
?>