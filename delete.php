<?php
include "database.php";

$employeeID = $_GET['rn'];

$sql = "DELETE FROM nurses WHERE nurseID = '$employeeID'";


$nurse = mysqli_query($conn,$sql);


$sql = "DELETE FROM users WHERE accountId = '$employeeID'";

$account = mysqli_query($conn,$sql);

print ("<script LANGUAGE='JavaScript'>
        window.alert('Account Successfully Delete');
        window.location.href='user_page.php';
        </script>");