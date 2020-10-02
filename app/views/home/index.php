<?php
echo "<h1>$title</h1>";

?>
<ul>
    <?php
    foreach ($users as $user) {
        echo "<li>$user->name</li>";
    }
    ?>
</ul>