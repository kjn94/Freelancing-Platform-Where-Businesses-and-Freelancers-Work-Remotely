<?php
      $prev_page = 0;
      $next_page = 2;
      //checking if a page is set
      if (isset($_GET["page"])) 
      { 
        $page  = $_GET["page"]; $prev_page = $page - 1; $next_page = $page + 1;

        //check if user entered wrong page in url
        if ($_GET['page'] > $total_pages) 
        { 
          echo "<h1>This page does not exist.</h1>";
          echo "<center>
                    <a href='".$_SERVER['PHP_SELF']."?page=1'>
                      <button class='button8 button9'>Go To First Page</button>
                    </a>
                </center>";
          include '../includes/footer.php';
        exit();
        }
      } 
      else 
      { 
        $page=1; 
      }
      $start_from = ($page-1) * 6;

      if(!is_numeric($page))
      {
          echo "<h1>Sorry, page is not a number.</h1>";
          echo "<center>
                    <a href='".$_SERVER['PHP_SELF']."?page=1'>
                      <button class='button8 button9'>Go To First Page</button>
                    </a>
                </center>";
          include '../includes/footer.php';          
          exit(); 
      }
?>