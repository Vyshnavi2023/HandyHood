
<?php
require __DIR__ . '/../vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");

// ⚠ Use lowercase (because Linux is case sensitive)
$db = $client->handyhood;
?>