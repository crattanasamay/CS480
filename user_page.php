<?php


include "database.php";


session_start();



$userName = $_SESSION['userName'];
session_abort();
$sql ="SELECT * FROM users WHERE accountUserName='$userName'";
$check = mysqli_query($conn,$sql);
$userArray = mysqli_fetch_array($check);


// Check for the type of account to print out the Navigation Bar
$accountType = $userArray['accountType'];
$accountID = $userArray['accountId'];
echo $accountID;





?>
Hello

