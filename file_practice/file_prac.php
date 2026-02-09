<?php
/*
//writing in file
$file = fopen("sample.txt", "r");

while (!feof($file)) {
    echo fgets($file) . "<br>";
}

fclose($file);

?>
*/


/*
//reading a file
<?php
  $file=fopen("sample.txt","a");
  fwrite($file,"hello! this is my php filehandling writing practice.\n") ;
  fclose($file);
  echo"data written sucessfullu";



echo "write file page opened";
?>
*/



 //reading all file at once
 /*
$file = fopen("sample.txt", "r");
$content = fread($file, filesize("sample.txt"));
echo $content;
fclose($file);
*/



/*
<?php
file_put_contents("sample.txt", "Hello! This is a shortcut write.\nSecond line here.");
$content = file_get_contents("sample.txt");
echo nl2br($content); 
?>
*/