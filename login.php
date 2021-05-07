<?php

include "database.php";



?>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Login</h2>
    <section class = "login-form">
        <div class ="login-form-form">
            <form action= "" method = "post" name="login">
                <div class="user-input">
                    <input type="text" name="userName" id="userName" placeholder="Username">
                </div>
                <div class="user-input">
                    <input type ="text" name = "password" id="password" placeholder ="Password">
                </div>
                <div class="button">
                    <button type = "submit" name="submit">Log In</button>
            </div>
            </form>
        
   

            <div class="button">
            <form action = "create_account.php" method= "post" name="createAccount">
                <button type = "submit" name="submitCreate">Create Account </button>
            </form>
            </div>
    </div>
    </section>
</body>
</html>

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