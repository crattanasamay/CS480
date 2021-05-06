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




?>
<html>
    <head>
<div id="navBar"></div>
<script type = "text/javascript">

var accountType = "<?php echo $accountType; ?>"

if(accountType == "Admin"){
    var navBar = document.createElement('ul');
    var ele1 = document.createElement('li');
    ele1.innerHTML = '<a href="register_nurse.php">Register Nurse</a>';
    navBar.appendChild(ele1);
    var ele2 = document.createElement('li');
    ele2.innerHTML = '<a href="user_page.php">Update Nurse Information</a>';
    navBar.appendChild(ele2);
    var ele3 = document.createElement('li');
    ele3.innerHTML = '<a href="user_page.php">Delete Nurse</a>';
    navBar.appendChild(ele3);
    var ele4 = document.createElement('li');
    ele4.innerHTML = '<a href="user_page.php">Update Nurse Information</a>';
    navBar.appendChild(ele4);
    var ele5 = document.createElement('li');
    ele5.innerHTML = '<a href="user_page.php">Update Vaccine</a>';
    navBar.appendChild(ele5);
    var ele6 = document.createElement('li');
    ele6.innerHTML = '<a href="user_page.php">View Nurse Information</a>';
    navBar.appendChild(ele6);
    var ele7 = document.createElement('li');
    ele7.innerHTML = '<a href="user_page.php">View Patient Information</a>';
    navBar.appendChild(ele7);
    document.getElementById('navBar').appendChild(navBar);
}
if(accountType == "Nurse"){
    var navBar = document.createElement('ul');
    var ele1 = document.createElement('li');
    ele1.innerHTML = '<a href="user_page.php">Update Information</a>';
    navBar.appendChild(ele1);
    var ele2 = document.createElement('li');
    ele2.innerHTML = '<a href="user_page.php">Schedule Time</a>';
    navBar.appendChild(ele2);
    var ele3 = document.createElement('li');
    ele3.innerHTML = '<a href="user_page.php">Cancel Time</a>';
    navBar.appendChild(ele3);
    var ele4 = document.createElement('li');
    ele4.innerHTML = '<a href="user_page.php">View Information</a>';
    navBar.appendChild(ele4);
    var ele5 = document.createElement('li');
    ele5.innerHTML = '<a href="user_page.php">Record Vaccination</a>';
    navBar.appendChild(ele5);
    document.getElementById('navBar').appendChild(navBar);
}
if(accountType == "Patient"){
    var navBar = document.createElement('ul');
    var ele1 = document.createElement('li');
    ele1.innerHTML = '<a href="user_page.php">Update Information</a>';
    navBar.appendChild(ele1);
    var ele2 = document.createElement('li');
    ele2.innerHTML = '<a href="user_page.php">Schedule Vaccination</a>';
    navBar.appendChild(ele2);
    var ele3 = document.createElement('li');
    ele3.innerHTML = '<a href="user_page.php">Cancel Vaccination</a>';
    navBar.appendChild(ele3);
    var ele4 = document.createElement('li');
    ele4.innerHTML = '<a href="user_page.php">View Information</a>';
    navBar.appendChild(ele4);
    document.getElementById('navBar').appendChild(navBar);
}
// Add the contents of options[0] to #foo:


</script>
<head>