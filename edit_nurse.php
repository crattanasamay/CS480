

<?php
include "database.php";
$employeeID = $_GET['rn'];

$accountSql = "SELECT * FROM users WHERE accountId = '$employeeID'";
$nurseSql = "SELECT * FROM nurses WHERE nurseID = '$employeeID'";

$accountArray = mysqli_fetch_array(mysqli_query($conn,$accountSql));
$nurseSql = mysqli_fetch_array(mysqli_query($conn,$nurseSql));

$accountUserName = $accountArray['accountUserName'];
$accountPassword = $accountArray['accountPassword'];

$Fname = $nurseSql['Fname'];
$Lname = $nurseSql['Lname'];
$SSN = $nurseSql['SSN'];
$Age = $nurseSql['Age'];
$Gender = $nurseSql['Gender'];
$Race = $nurseSql['Race'];
$PhoneNumber = $nurseSql['PhoneNumber'];
$Address = $nurseSql['Address'];


?>


<section class = "information - form">
    <h3>Edit Information Nurse ID <?php echo $employeeID;?></h3>
    <div class = "account-information-form-nurse">
        <form action = "" method ="post" name="account_information-nurse">
            <input type = "text" name="nnAccount" value="<?php echo $accountUserName?>">
            <input type = "text" name= "nnPassword" value = "<?php echo $accountPassword?>">
            <input type = "text" name="nnFname" value="<?php echo $Fname;?>">
            <input type = "text" name="nnLname" value= "<?php echo $Lname;?>">
            <input type = "number" name="nnSSN" value="<?php echo $SSN;?>">
            <input type = "number" name="nnAge" value="<?php echo $Age;?>">
            <input type = "text" name="nnGender" value ="<?php echo $Gender;?>">
            <input type = "text" name="nnRace" value = "<?php echo $Race;?>">
            <input type = "number" name="nnPhone#" value="<?php echo $PhoneNumber;?>">
            <input type = "text" name = "nnAddress" value = "<?php echo $Address;?>">
            <button type =  "submit" name="nurse-edit-information-submit">Finish</button>
        </form>
    </div>
</section>


<?php
if(isset($_POST["nurse-edit-information-submit"])){
    $userName = $_POST["nnAccount"];
    $password = $_POST["nnPassword"];
    
    //$userName = $_POST["nnAccount"];
    //$password =$_POST["nnPassword"];
    //echo $userName;
    $Fname = $_POST["nnFname"];
    $Lname = $_POST["nnLname"];
    $SSN = $_POST["nnSSN"];
    $Age = $_POST["nnAge"];
    $Gender = $_POST["nnGender"];
    $Race = $_POST["nnRace"];
    $PhoneNumber = $_POST["nnPhone#"];
    $address = $_POST["nnAddress"];

    $updateAccount = "UPDATE users SET accountUserName='$userName',accountPassword='$password' WHERE accountId='$employeeID'";

    $updateNurse = "UPDATE nurses SET Fname='$Fname',Lname='$Lname',SSN='$SSN',Age='$Age',Gender='$Gender',Race='$Race',PhoneNumber ='$PhoneNumber',Address = '$address' WHERE nurseID='$employeeID'";

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