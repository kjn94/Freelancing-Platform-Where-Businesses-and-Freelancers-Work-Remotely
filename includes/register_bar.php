
<nav class="nav-register">
    <?php
      if(!isset($_SESSION ['uid']))
      {
    ?>
        <p class="register-bar">You are currently viewing a preview of the platform. To unlock all features, please 
        <a href="http://localhost/job_board/login.php"><button class="button8 button9">Login</button></a>
        or
        <a href="http://localhost/job_board/register.php">
        <button class="button8 button9">Register</button></a></p>

    <?php
      }
      else
      {
          echo "<p class='register-bar'>You are logged in as ".$_SESSION['username']." &bull; <a href='http://localhost/job_board/logout_parse.php'>
          <button class='button8 button9'>Logout</button></a>";
      }
    ?>
</nav>