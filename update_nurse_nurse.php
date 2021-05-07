<?php
include "database.php";

session_start();
$nurseID = $_SESSION['accountId'];
$sql = "SELECT * FROM nurses WHERE nurseID = '$nurseID'";
$check = mysqli_query($conn,$sql);


$array = mysqli_fetch_assoc($check);
$phone_number = $array['PhoneNumber'];
$address = $array ['Address'];

?>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Update Nurse Information</h2>
    <section class = "login-form">
            <form action = "" method="post" name="update-account-information-nurse">
                <input type = "text" name="nnnPhone#" value = "<?php echo $phone_number?>">
                <input type = "text" name="nnnAddress" value = "<?php echo $address?>">
                <button type = "submit" name="nurse-edit-form">Finish</button>
            </form>
    </section>
</body>
</html>


<?php
if(isset($_POST["nurse-edit-form"])){
    $newphoneNumber = $_POST["nnnPhone#"];
    $newaddress = $_POST["nnnAddress"];
    $updateNurse = "UPDATE nurses SET PhoneNumber='$newphoneNumber', Address='$newaddress' WHERE nurseID='$nurseID'";

    $updateAccount = mysqli_query($conn,$updateNurse);
    if($updateAccount){
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