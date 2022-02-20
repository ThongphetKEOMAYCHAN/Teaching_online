<?php
include_once 'inclu/connect.php';
$emID = $_POST['em_id'];
$sql = "DELETE FROM employee WHERE em_id = '$emID'";

 mysqli_query($conn,$sql);




