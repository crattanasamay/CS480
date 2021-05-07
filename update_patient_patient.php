<?php
include "database.php";

session_start();
$patientID = $_SESSION['accountId'];
$sql = "SELECT * FROM patients WHERE patientID = '$patientID'";
$accountSql = "SELECT * FROM users WHERE accountId = '$patientID'";


$patientArray = mysqli_fetch_array(mysqli_query($conn,$sql));
$accountArray = mysqli_fetch_array(mysqli_query($conn,$accountSql));

$accountUserName = $accountArray['accountUserName'];
$accountPassword = $accountArray['accountPassword'];

$Fname = $patientArray['Fname'];
$Lname = $patientArray['Lname'];
$SSN = $patientArray['SSN'];
$Age = $patientArray['Age'];
$Gender = $patientArray['Gender'];
$Race = $patientArray['Race'];
$PhoneNumber = $patientArray['PhoneNumber'];
$Address = $patientArray['Address'];

?>

<section class = "information - form">
    <h3>Edit Information </h3>
    <div class = "account-information-form-nurse">
        <form action = "" method ="post" name="account_information-nurse">
            <input type = "text" name="pAccount" value="<?php echo $accountUserName?>">
            <input type = "text" name= "pPassword" value = "<?php echo $accountPassword?>">
            <input type = "text" name="pFname" value="<?php echo $Fname;?>">
            <input type = "text" name="pLname" value= "<?php echo $Lname;?>">
            <input type = "number" name="pSSN" value="<?php echo $SSN;?>">
            <input type = "number" name="pAge" value="<?php echo $Age;?>">
            <input type = "text" name="pGender" value ="<?php echo $Gender;?>">
            <input type = "text" name="pRace" value = "<?php echo $Race;?>">
            <input type = "number" name="pPhone#" value="<?php echo $PhoneNumber;?>">
            <input type = "text" name = "pAddress" value = "<?php echo $Address;?>">
            <button type =  "submit" name="patient-edit-information-submit">Finish</button>
        </form>
    </div>
</section>


<?php
if(isset($_POST["patient-edit-information-submit"])){
    $userName = $_POST["pAccount"];
    $password = $_POST["pPassword"];
    
    //$userName = $_POST["nnAccount"];
    //$password =$_POST["nnPassword"];
    //echo $userName;
    $Fname = $_POST["pFname"];
    $Lname = $_POST["pLname"];
    $SSN = $_POST["pSSN"];
    $Age = $_POST["pAge"];
    $Gender = $_POST["pGender"];
    $Race = $_POST["pRace"];
    $PhoneNumber = $_POST["pPhone#"];
    $address = $_POST["pAddress"];

    $updateAccount = "UPDATE users SET accountUserName='$userName',accountPassword='$password' WHERE accountId='$patientID'";

    $updateNurse = "UPDATE patients SET Fname='$Fname',Lname='$Lname',SSN='$SSN',Age='$Age',Gender='$Gender',Race='$Race',PhoneNumber ='$PhoneNumber',Address = '$address' WHERE nurseID='$patientID'";

    $accountCheck = mysqli_query($conn,$updateAccount);
    if($accountCheck){
        print ("<script LANGUAGE='JavaScript'>
        window.alert('Account Sucessfully Updated');
        window.location.href='user_page.php';
        </script>");
    }
    else{
        print ("<script LANGUAGE='JavaScript'>
        window.alert('Account Not Updated');
        window.location.href='user_page.php';
        </script>");
    }
    $nurseCheck = mysqli_query($conn,$updateNurse);
    if($nurseCheck){
        print ("<script LANGUAGE='JavaScript'>
        window.alert('Account Sucessfully Updated');
        window.location.href='user_page.php';
        </script>");
    }
    else{
        print ("<script LANGUAGE='JavaScript'>
        window.alert('Account Not Updated');
        window.location.href='user_page.php';
        </script>");
    }
    


}

?>