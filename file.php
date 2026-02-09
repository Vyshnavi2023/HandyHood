

<?php
$file = fopen("story.txt", "w");
fwrite($file, "Hello PHP File Handling");
fclose($file);

echo "File created and data written!";
?>

