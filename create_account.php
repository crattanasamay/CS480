<?php 

include "database.php";

?>
<section class ="create-form">
    <h3>Create Account </h3>
    <div class = "create-account-form">
        <form action ="" method = "post" name="create-account">
            <input type="text" name="newuserName" id="newuserName" placeholder="Username">
            <input type ="text" name="newpassword" id= "newpassword" placeholder="Password">
            <button type = "submit" name="create-submit">Create Account</button>
        </form>
    </div>
</section>


<?php


// checks if the button create account button was submitted
if(isset($_POST["create-submit"])){

   
    session_start();
    $userName = $_POST["newuserName"];
    $password = $_POST["newpassword"];
    $_SESSION['newuserName'] = $userName;
    $_SESSION['newpassword'] = $password;
    // check if user name exists
    $sql = "SELECT * FROM users WHERE accountUserName='$userName'";
    $check = mysqli_query($conn,$sql);
    if(mysqli_num_rows($check) == 0){ // Means that there are zero rows in the users table account does not
        //$sql = "INSERT INTO users (accountUserName,accountPassword,accountType) VALUES ('$userName','$password','Patient')";
        //mysqli_query($conn,$sql);

        
        print ("<script LANGUAGE='JavaScript'>
        window.alert('Select Account Type');
        window.location.href='user_type.php';
        </script>");
        header("refresh:2,url: login.php");
    }
    else{
        print ("<script LANGUAGE='JavaScript'>
        window.alert('Username Taken');
        </script>");
    }

}

?>
