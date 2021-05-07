<?php
include "database.php";
$company = $_GET['rn'];

$sql = "SELECT * FROM vaccine WHERE Company = '$company'";


$vaccineArray = mysqli_fetch_array(mysqli_query($conn,$sql));


$Company = $company;
$NumDoses = $vaccineArray['NumDoses'];
$Description = $vaccineArray['Description'];



?>


<section class = "information-form">
    <h3>Edit <?php echo $Company;?> Data</h3>
    <div class = "account-information-form">
        <form action = "" method ="post" name="account_information-nurse">
            <input type = "text" name="Company" value="<?php echo $Company?>">
            <input type = "number" name= "NumDoses" value = "<?php echo $NumDoses?>">
            <input type = "text" name="Description" value="<?php echo $Description;?>">
            <button type =  "submit" name="vaccine-edit-information-submit">Finish</button>
        </form>
    </div>
</section>



<?php
if(isset($_POST["vaccine-edit-information-submit"])){

    $newCompany = $_POST["Company"];
    $newDoses = $NumDoses + $_POST["NumDoses"];
    $newDescription = $_POST["Description"];

    $updateAccount = "UPDATE vaccine SET Company='$newCompany',NumDoses='$newDoses',Description='$newDescription' WHERE Company='$Company'";


    $accountCheck = mysqli_query($conn,$updateAccount);
    if($accountCheck){
        print ("<script LANGUAGE='JavaScript'>
        window.alert('Vaccine Sucessfully Updated');
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