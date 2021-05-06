<section class ="create-form">
    <h3>Create Account</h3>
    <div class = "create-account-form">
        <form action ="" method = "post" name="create-account-nurse">
            <input type="text" name="newuserName" id="newuserName" placeholder="Username">
            <input type ="text" name="newpassword" id= "newpassword" placeholder="Password">
            <input type = "text" name="Fname" placeholder="First Name">
            <input type = "text" name="Lname" placeholder= "Last Name">
            <input type = "number" name="SSN" placeholder="Social Security Number">
            <input type = "number" name="Age" placeholder="Age">
            <input type = "text" name="Gender" placeholder ="Gender">
            <input type = "text" name="Race" placeholder = "Race">
            <input type = "text" name="Occupation" placeholder = "Occupation">
            <input type = "number" name="Phone#" placeholder="Phone Number">
            <input type = "text" name = "Address" placeholder = "Address">
            <button type =  "submit" name="nurse-submit">Finish</button>
        </form>
    </div>
</section>



<?php 

if(isset($_POST["nurse-submit"])){
    
}

?>