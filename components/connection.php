<?php

$hostname = "localhost";
$username = "nexus";
$password = "thuyumyat";
$database = "blog_db";
$connection = new mysqli($hostname, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: {$connection->connect_error}");
}

?>