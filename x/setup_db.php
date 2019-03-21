<?php
/**
 * Created by PhpStorm.
 * User: dengero
 * Date: 21/03/2019
 * Time: 1:02 AM
 */

$databaseName = 'project_e_db';
$hostname = 'localhost';
$username = 'root';
$password = '';
echo "<b>Database Installation</b>";

$conn = new mysqli($hostname, $username, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE $databaseName";
if ($conn->query($sql) === TRUE) {
    echo "<br>";
    echo "Database created successfully";
} else {
    echo "<br>";
    echo "Error creating database: " . $conn->error;
}
$conn->close();

$conn = new mysqli($hostname, $username, $password, $databaseName);
$sql = "CREATE TABLE loginCredentials ( `id` BIGINT NOT NULL AUTO_INCREMENT , `username` VARCHAR(50) NOT NULL , `password` VARCHAR(50) NOT NULL , `userId` BIGINT NOT NULL , PRIMARY KEY (`id`))";
if ($conn->query($sql) === TRUE) {
    echo "<br>";
    echo "Database table created successfully";
} else {
    echo "<br>";
    echo "Error creating database table: " . $conn->error;
}
$conn->close();