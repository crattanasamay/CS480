<?php

include "database.php";


?>

<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Information</h2>
    <section class = "login-form">
        <div class = "login-form-form">
            <form action = "" method ="post" name="account_information">
                <input type = "text" name="Fname" placeholder="First Name">
                <input type = "text" name="Lname" placeholder= "Last Name">
                <input type = "number" name="SSN" placeholder="Social Security Number">
                <input type = "number" name="Age" placeholder="Age">
                <input type = "text" name="Gender" placeholder ="Gender">
                <input type = "text" name="Race" placeholder = "Race">
                <input type = "text" name="Occupation" placeholder = "Occupation">
                <input type = "number" name="Phone#" placeholder="Phone Number">
                <input type = "text" name = "Address" placeholder = "Address">
                <button type =  "submit" name="information-submit">Finish</button>
            </form>
        </div>
    </section>
</body>
</html>

<?php

if(isset($_POST["information-submit"])){
    session_start();
    $username = $_SESSION['newuserName'];
    $sql ="SELECT * FROM users WHERE accountUserName='$username'";
    $check = mysqli_query($conn,$sql);
    $userArray = mysqli_fetch_array($check);

    $accountType = $userArray['accountType'];
    $accountID = $userArray['accountId'];

    $Fname = $_POST["Fname"];
    $Lname = $_POST["Lname"];
    $SSN = $_POST["SSN"];
    $Age = $_POST["Age"];
    $Gender = $_POST["Gender"];
    $Race = $_POST["Race"];
    $Occupation = $_POST["Occupation"];
    $PhoneNumber = $_POST["Phone#"];
    $address = $_POST["Address"];
    $input = "";

    switch (strval($accountType)){
        case "Patient":
            $input = "INSERT patients (PatientID,Fname,Lname,SSN,Age,Gender,Race,Occupation,PhoneNumber,Address) VALUES('$accountID','$Fname','$Lname','$SSN','$Age','$Gender','$Race','$Occupation','$PhoneNumber','$address')";
            break;
        case "Admin":
            $input = "INSERT admins (adminID,Fname,Lname,SSN,Age,Gender,Race,Occupation,PhoneNumber,Address) VALUES('$accountID','$Fname','$Lname','$SSN','$Age','$Gender','$Race','$Occupation','$PhoneNumber','$address')";
            break;
    
        case "Nurse":
            $input = "INSERT nurses (nurseID,Fname,Lname,SSN,Age,Gender,Race,Occupation,PhoneNumber,Address) VALUES('$accountID','$Fname','$Lname','$SSN','$Age','$Gender','$Race','$Occupation','$PhoneNumber','$address')";
            break;
    }

    

   
    if(mysqli_query($conn,$input)){
        print ("<script LANGUAGE='JavaScript'>
        window.alert('Account Created');
        window.location.href='login.php';
        </script>");
        header("refresh:2,url: login.php");
    }
    else{
        print ("<script LANGUAGE='JavaScript'>
        window.alert('Could Not Create Account');
        </script>");
    }

}


?>