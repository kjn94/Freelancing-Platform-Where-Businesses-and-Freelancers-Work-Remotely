<?php
    echo "<div class='row'>
        <div class='col-md-12 text-center'>
          <ul class='pagination'>";
        if ($prev_page == 0) 
        { 
          //echo "<li class='disabled'><a href='#'>&laquo;</a></li>";
        }
        else
        { 
          echo "<li><a href='".$_SERVER['PHP_SELF']."?page=".$prev_page."'>&laquo;</a></li>";
        }

          for ($i=1; $i<=$total_pages; $i++) 
          {  // print links for all pages
              if ($i==$page) 
              { 
                echo "<li class='active'><a href='".$_SERVER['PHP_SELF']."?page=".$i."'>".$i."</a></li>";
              }
              else
              { 
                echo "<li><a href='".$_SERVER['PHP_SELF']."?page=".$i."'>".$i."</a></li>";
              }
          } 

        if ($next_page == $total_pages + 1) 
        { 
          //echo "<li class='disabled'><a href='#'>&raquo;</a></li>";
        }
        else
        {
          echo "<li><a href='".$_SERVER['PHP_SELF']."?page=".$next_page."'>&raquo;</a></li>";
        }
          echo "</ul>
        </div>
      </div>"; 

?>