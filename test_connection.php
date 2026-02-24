

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . '/config/database.php';

if (isset($db)) {
    echo "MongoDB connection works!";
} else {
    echo "MongoDB connection failed!";
}