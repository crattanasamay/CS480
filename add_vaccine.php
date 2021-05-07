<?php

include "database.php";

?>



<section class = "information-form">
    <h3>Information</h3>
    <div class = "account-information-form">
        <form action = "" method ="post" name="vaccine_information">
            <input type = "text" name="Company" placeholder="Company">
            <input type = "text" name="Doses" placeholder= "Number of Doses">
            <input type = "text" name="Description" placeholder = "Description">
            <button type =  "submit" name="vaccine-information-submit">Finish</button>
        </form>
    </div>
</section>



<?php
if(isset($_POST["vaccine-information-submit"])){
    $company = $_POST["Company"];
    $Doses = $_POST["Doses"];
    $Description = $_POST["Description"];
    $sql = "INSERT INTO vaccine (Company,NumDoses,Description) VALUES ('$company','$Doses','$Description')";

    $check = mysqli_query($conn,$sql);

    if($check){
        print ("<script LANGUAGE='JavaScript'>
            window.alert('Vaccine Added');
            window.location.href='user_page.php';
            </script>");
    }
    else{
        print ("<script LANGUAGE='JavaScript'>
        window.alert('Vaccine Not Added');
        window.location.href='add_vaccine.php';
        </script>");
    }

}