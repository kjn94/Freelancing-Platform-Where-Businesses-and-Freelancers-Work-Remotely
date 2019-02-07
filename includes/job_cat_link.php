<?php
		$sql = "SELECT * FROM jobpostscategories ORDER BY id ASC";
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));
        $categories = "";
        if(mysqli_num_rows($res) > 0)
        {
            while($row = mysqli_fetch_assoc($res))
            {
              $id = $row['id'];
              $title = $row['category'];
              $categories .= "<a href='jobposts_category.php?cid=".$id."'>".$title." <font size='-1'></font></a>";

            }
        }else{
          echo "<p> There are no categories available yet.</p>";
        }
	
    ?>