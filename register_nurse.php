<?php

include "database.php";
?>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Register Nurse</h2>
    <section class ="login-form">
        <div class = "login-form-form">
            <form action ="" method = "post" name="create-account-nurse">
                <input type="text" name="nnewuserName"  placeholder="Username">
                <input type ="text" name="nnewpassword"  placeholder="Password">
                <input type = "text" name="nFname" placeholder="First Name">
                <input type = "text" name="nLname" placeholder= "Last Name">
                <input type = "number" name="nSSN" placeholder="Social Security Number">
                <input type = "number" name="nAge" placeholder="Age">
                <input type = "text" name="nGender" placeholder ="Gender">
                <input type = "text" name="nRace" placeholder = "Race">
                <input type = "number" name="nPhone#" placeholder="Phone Number">
                <input type = "text" name = "nAddress" placeholder = "Address">
                <button type =  "submit" name="nurse-submit">Finish</button>
            </form>
        </div>
    </section>
</body>



<?php 

if(isset($_POST["nurse-submit"])){
    $userName = $_POST["nnewuserName"];
    $password = $_POST["nnewpassword"];
    $Fname = $_POST["nFname"];
    $Lname = $_POST["nLname"];
    $SSN = $_POST["nSSN"];
    $Age = $_POST["nAge"];
    $Gender = $_POST["nGender"];
    $Race = $_POST["nRace"];
    $PhoneNumber = $_POST["nPhone#"];
    $address = $_POST["nAddress"];
    $sql = "SELECT * FROM users WHERE accountUserName='$userName'";
    $check = mysqli_query($conn,$sql);
    if(mysqli_num_rows($check) == 0){ // Means that there are zero rows in the users table account does not
        $accountType = "Nurse";
        
        $sql = "INSERT INTO users (accountUserName, accountPassword, accountType) VALUES ('$userName','$password','$accountType')";
        mysqli_query($conn,$sql);
        $sql = $sql ="SELECT * FROM users WHERE accountUserName='$userName'";
        $check = mysqli_query($conn,$sql);
        $nurseArray = mysqli_fetch_array($check);
        $accountID = $nurseArray['accountId'];
        $input = "INSERT nurses (nurseID,Fname,Lname,SSN,Age,Gender,Race,Occupation,PhoneNumber,Address) VALUES('$accountID','$Fname','$Lname','$SSN','$Age','$Gender','$Race','Nurse','$PhoneNumber','$address')";
        mysqli_query($conn,$input);



        print ("<script LANGUAGE='JavaScript'>
        window.alert('Account Created');
        window.location.href='user_page.php';
        </script>");
    }
    else{
        print ("<script LANGUAGE='JavaScript'>
        window.alert('Username Taken');
        </script>");
    }
}

?>