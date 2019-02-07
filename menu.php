<?php
    require_once 'core/init.php';
    session_start();

    if(!isset($_SESSION['uid']))
    {
    $type = '';
      include 'includes/menu_home.php';          
    }
    else
    {
        $sql = "SELECT * FROM users WHERE id='".$_SESSION['uid']."'";
        $res2 = mysqli_query($db, $sql) or die(mysqli_error($db));

        if(mysqli_num_rows($res2) > 0)
        {
                 
            while($row2 = mysqli_fetch_assoc($res2))
            {
                $aid = $row2['id'];
                $type = $row2['type']; //get the usertype of the user from table row in your database

                if( $type == "freelancer")
                {
                  include 'includes/menu_fr.php';
                }
                else if( $type == "employer")
                {
                  include 'includes/menu_emp.php';
                    
                }
                else if( $type == "admin")
                {
                  include 'includes/menu_admin.php';
                }

            }
        }
    }
?>