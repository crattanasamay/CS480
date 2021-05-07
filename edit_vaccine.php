<?php
include "database.php";
$company = $_GET['rn'];

$sql = "SELECT * FROM vaccine WHERE Company = '$company'";


$vaccineArray = mysqli_fetch_array(mysqli_query($conn,$sql));


$vaccineArray


