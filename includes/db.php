<?php

//defining variable
$servername = "127.0.0.1:3306";
$username = "u586257779_hhschooldb";
$password = "Happyheartschool2022";
$dbname = "u586257779_hhschooldb";


// Create connection
$conn = new mysqli ($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    echo 'Connected successfully<br>';
}

?>
