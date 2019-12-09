<?php
$serverName = "localhost";
$username = "daltonw_events";
$password = "960CgVBnhs";
$database = "daltonw_events";

try {
    $conn = new PDO("mysql:host=$serverName;dbname=$database", $username, $password);
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

?>