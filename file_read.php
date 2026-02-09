<?php

$file = fopen("worker_log.txt", "r");

while (!feof($file)) {
    echo fgets($file) . "<br>";
}

fclose($file);

?>
