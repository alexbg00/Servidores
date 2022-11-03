<ul>
<?php
    $n = $_GET["numero"];

    for ($i = 1; $i <= $n; $i++) {
        echo "<li>$i</li>";
    }
?>
</ul>