<?php

$file = fopen("worker_log.txt", "a");

$data = "New worker registered on " . date("Y-m-d H:i:s") . "\n";

fwrite($file, $data);

fclose($file);

echo "Data written successfully";

?>
