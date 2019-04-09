<?php
/**
 * Created by PhpStorm.
 * User: dengero
 * Date: 21/03/2019
 * Time: 1:02 AM
 */

$config = include ("config.php");

$databaseName = $config->database;
$hostname = $config->host;
$username = $config->username;
$password = $config->password;

echo "<b>Database Installation</b>";

$conn = new mysqli($hostname, $username, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE $databaseName";
if ($conn->query($sql) === TRUE) {
    echo "<br>Database created successfully";
} else {
    echo "<br>Error creating database: " . $conn->error;
}

$conn->select_db($databaseName);
$fl = file_get_contents('setup_db.sql');
if($conn->multi_query($fl)== true){
    echo "<br>SQL execution has been successful";
}else{
    echo "<br>" . $conn->error;
}