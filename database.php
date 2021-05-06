<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "hospital_data";

$conn = mysqli_connect($serverName,$dBUsername,$dBPassword,$dBName);

if(!$conn){
    die("Connection Failed");
}
else{

 
}