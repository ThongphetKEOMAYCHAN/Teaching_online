<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "online_workshop";

$conn = mysqli_connect($server, $user, $password, $database);

if(!$conn){
     echo "Connect failed". mysqli_connect_error();
}else{
     // echo "Connect successfully";
}