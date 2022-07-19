<?php
$servername = "localhost";
$username = "root";
$password = "root";
$database = "users";

$conn = mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    die("Couldn't connect to DB. Error =>".mysqli_connect_error());
}
?>
