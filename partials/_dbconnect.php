<?php
$servername = "localhost";
$username = "root";
$password = "root";
$database = "restomang";

$conn = mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    die("Couldn't connect to DB. Error =>".mysqli_connect_error());
}
?>
