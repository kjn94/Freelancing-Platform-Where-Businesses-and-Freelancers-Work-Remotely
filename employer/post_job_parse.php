<?php
    session_start();
    $_SESSION['message'] = '';

    if($_SESSION['uid'])
    {
        if(isset($_POST['jobpost_submit']))
        {
            include_once("../core/init.php");

            $job_title = $db->real_escape_string($_POST['job_title']);
            $job_description = $db->real_escape_string($_POST['job_description']);
            $client_budget = $db->real_escape_string($_POST['client_budget']);
            if(!is_numeric($client_budget))
            {
                $_SESSION['message'] = "Sorry, Price is not a number.";
                header("location: error.php");
                exit(); 
            }
            $category_id = $_POST['category_id'];

            $target_file = "../img/jobs/" . basename($_FILES["fileToUpload"]["name"]);//where the image will be stored
            $target_file2 = "http://localhost/job_board/img/jobs/" . basename($_FILES["fileToUpload"]["name"]);//link to insert in database
            str_replace(" ","",$target_file2); //remove any blank spaces of the file name
            $uploadOk = 1;//0 - error; 1 - success
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));//get image type

            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
            {
                $_SESSION['message'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
                header("location: error.php"); exit();  
            }
            // Check if file already exists
            elseif (file_exists($target_file) || file_exists($target_file2)) 
            {
                $_SESSION['message'] = "Sorry, file already exists.";
                $uploadOk = 0;
                header("location: error.php");   exit();

            }
            // Check if $uploadOk is set to 0 by an error
            elseif ($uploadOk == 0) 
            {
                $_SESSION['message'] = "Sorry, your file was not uploaded.";
                header("location: error.php");   exit();
            }
            // Check if the file size is above 2MB
            elseif($_FILES["fileToUpload"]["size"] > 2000000)
            {
                $_SESSION['message'] = "File is Too Big!";
                header("location: error.php"); exit();
            }
            // if everything is ok, try to upload file
            else
            {   //check if image is uploaded to the folder
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
                {
                    $sql = "INSERT INTO jobposts (job_title, job_description, client_budget, picture, author_id, category_id) VALUES ('".$job_title."', '".$job_description."', '".$client_budget."', '".$target_file2."', '".$_SESSION['uid']."', '".$category_id."')";
                    $res = mysqli_query($db, $sql) or die(mysqli_error($db));
                    if (($res)) 
                    {
                        header("Location: success_job_post.php");              
                    }
                    else
                    {
                        echo "<p>There was a problem in your application.</p>";
                        echo "<a href='my_jobs.php'>
                                <input type='submit' value='View Other Job Offers'/></a>
                            </a>";
                    }    
                } 
                else 
                {
                    $_SESSION['message'] = "Unknown error. ".$target_file."";
                    header("location: error.php");   exit();
                }
            }    
        }else{
            exit();
        }
    }else{
        exit();
    }
?>