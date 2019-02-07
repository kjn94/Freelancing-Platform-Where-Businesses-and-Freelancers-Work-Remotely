<?php
    session_start();
include_once("core/init.php");
$_SESSION['message'] = '';

//check if there is image of the user
if($_FILES['fileToUpload']['name'] != "")
{
    if(isset($_POST['save']))
    {
        //get what was posted from edit-profile
        $username=$db->real_escape_string($_POST['username']);
        $firstname=$db->real_escape_string($_POST['firstname']);
        $lastname=$db->real_escape_string($_POST['lastname']);
        $category_user_id=$db->real_escape_string($_POST['category_user_id']);
        $description=$db->real_escape_string($_POST['description']);
            //submit image to 2 folders
            $target_dir = "img/users/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $target_file2 = "http://localhost/job_board/img/users/" . basename($_FILES["fileToUpload"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
        {
            $_SESSION['message'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            header("location: error_update_profile.php");   

        }
        // Check if the file size is above 2MB
        elseif($_FILES["fileToUpload"]["size"] > 2000000)
        {   
            $_SESSION['message'] = "File is Too Big!";
            header("location: error_update_profile.php"); 
        }        
        // Check if file already exists
        elseif (file_exists($target_file) || file_exists($target_file2)) 
        {
            $_SESSION['message'] = "Sorry, file already exists.";
            header("location: error_update_profile.php");   

        }
        //check if image is submitted image to 2 folders
        elseif(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
        {
            //get the category of the user in session
            $query = "SELECT * FROM users INNER JOIN jobpostscategories ON jobpostscategories.id=users.category_user_id WHERE users.id=".$_SESSION['uid']."";
            $result = mysqli_query($db, $query);
            $row = mysqli_fetch_array($result);
            //delete old image of user
            $str = basename($row['image']);
            unlink($target_dir . $str);
        //update data of the user
        $query1 = "UPDATE users SET username='".$username."', firstname='".$firstname."',lastname='".$lastname."',category_user_id='".$category_user_id."',description='".$description."',image='".$target_file2."' WHERE id='".$_SESSION['uid']."'";
    
            if(mysqli_query( $db, $query1 ))
            {
                $_SESSION['message'] = "Data Updated Successfully.";
                header('location:success.php');
            } 
            else 
            {
                echo mysqli_error ($db);
            }
        }

    }
}
else
{
    if(isset($_POST['save']))
    {
        //if image is not submitted, do not update image
        $username=$db->real_escape_string($_POST['username']);
        $firstname=$db->real_escape_string($_POST['firstname']);
        $lastname=$db->real_escape_string($_POST['lastname']);
        $category_user_id=$db->real_escape_string($_POST['category_user_id']);
        $description=$db->real_escape_string($_POST['description']);

        $query1 = "UPDATE users SET username='$username', firstname='$firstname',lastname='$lastname',category_user_id='$category_user_id',description='$description' WHERE id='".$_SESSION['uid']."'";
        if(mysqli_query( $db, $query1 ))
        {
            $_SESSION['message'] = "Data Updated Successfully.";
            header('location:success.php');
        } 
        else 
        {
            echo mysqli_error ($db);
        }
    }
}
    ?>
