<?php
include "database.php";

 
    

?>

<h3>Before You Login Select Your Account Type</h3>
<form action="">
<select name="account_type" method="post" id = "account_type">
    <option value="Admin">Admin</option>
    <option value="Nurse">Nurse</option>
    <option value="Patient">Patient</option>
</select>
<br><br>
<input type="submit" value="Submit">
</form>

<?php
 

if(isset($_GET['account_type'])){
        $accountType = $_GET["account_type"];

        session_start();
        $username = $_SESSION['newuserName'];
        $password = $_SESSION['newpassword'];
        $sql = "INSERT INTO users (accountUserName, accountPassword, accountType) VALUES ('$username','$password','$accountType')";
      
       

        if(mysqli_query($conn,$sql)){
            
        

            print ("<script LANGUAGE='JavaScript'>
            window.alert('Insert Information');
            window.location.href='information_input.php';
            </script>");
        }
        else{
            echo "User Not Added";
        }
    

mysqli_close($conn);
}

?>
