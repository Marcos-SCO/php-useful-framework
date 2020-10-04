<?php 

// User info
extract((array)$userInfo);

echo "<h1>$title</h1>";

?>

<ul>
    <?php
        echo "<li>$name</li>";
        echo "<li>$last_name</li>";
    ?>
</ul>