<?php

session_start();

// Load the .env file
$envFilePath = __DIR__ . '/../.env';
loadEnv($envFilePath);

$GLOBALS['SITE_URL'] = "http://localhost/sht_management/";

// $GLOBALS['conn'] = mysqli_connect('localhost', 'root', '', 'sht_management');

$DB_CONNECTION = getenv('DB_CONNECTION');
$DB_HOST = getenv('DB_HOST');
$DB_PORT = getenv('DB_PORT');
$DB_DATABASE = getenv('DB_DATABASE');
$DB_USERNAME = getenv('DB_USERNAME');
$DB_PASSWORD = getenv('DB_PASSWORD');

$GLOBALS['pdo'] = new PDO("mysql:host=$DB_HOST;dbname=$DB_DATABASE", "$DB_USERNAME", "$DB_PASSWORD");


// Function to parse the .env file and set environment variables
function loadEnv($filePath) {
    if (!file_exists($filePath)) {
        return false;
    }

    // Read the contents of the .env file
    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        // Skip lines that start with # (comments)
        if (strpos(trim($line), '#') === 0) {
            continue;
        }
        
        // Split each line into key and value
        list($key, $value) = explode('=', $line, 2);
        $key = trim($key);
        $value = trim($value);

        // Set environment variable
        putenv("$key=$value");
    }
}
