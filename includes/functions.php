<?php 

function toStars ($n)
{
    for($x=1;$x<=$n;$x++) 
    {
        echo '<img src="http://localhost/job_board/img/fullstar.png" class="stars">';
    }
    if (strpos($n,'.')) 
    {
        echo '<img src="http://localhost/job_board/img/halfstar.png" class="stars">';
        $x++;
    }
    while ($x<=5) 
    {
        echo '<img src="http://localhost/job_board/img/blankstar.png" class="stars">';
        $x++;
    }
}
?>