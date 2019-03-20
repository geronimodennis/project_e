<?php
/**
 * Created by PhpStorm.
 * User: dengero
 * Date: 21/03/2019
 * Time: 1:02 AM
 */

$databaseName = 'xyz    _db';

$conn = new mysqli('localhost', 'root');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE $databaseName";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}



$conn->close();