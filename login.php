<?php

include "database.php";



?>

<section class = "login-form">
    <h3>Login Up</h3>
    <div class ="login-form">
        <form action= "" method = "post" name="login">
            <input type="text" name="userName" id="userName" placeholder="Username">
            <input type ="text" name = "password" id="password" placeholder ="Password">
            <button type = "submit" name="submit">Log In</button>
        </form>
    </div>
</section>


<form action = "create_account.php" method= "post" name="createAccount">
    <button type = "submit" name="submitCreate">Create Account </button>
</form>


<?php

if(isset($_POST["submit"])){
    $userName = $_POST["userName"];
    $password = $_POST["password"];
    

    $sql = "SELECT * FROM users WHERE accountUserName='$userName'";
    $check = mysqli_query($conn,$sql);
    // Check if the user exists
    if(mysqli_num_rows($check) == 1){
        session_start();
        $_SESSION['userName'] = $userName;
        $userArray = mysqli_fetch_array($check);
        $userPassword = $userArray['accountPassword'];
        // if the user input matches the password in the system
        if($password == $userPassword){
            print("<script LANGUAGE='JavaScript'>
            window.alert('Login Sucessful');
            window.location.href='user_page.php';
            </script>");
        }
        else{
            print("<script LANGUAGE='JavaScript'>
            window.alert('Password Incorrect');
            window.location.href='login.php';
            </script>");
        }
    }


}