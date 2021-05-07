<?php

include "database.php";

session_start();
$accountID = $_SESSION["accountId"];
$sql = "SELECT * FROM patients WHERE PatientID = '$accountID'";
$check = mysqli_query($conn,$sql);



?>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<table>
    <?php 
        if(mysqli_num_rows($check) > 0){
            echo "<tr>
            <td>First Name</td>
            <td>Last Name</td>
            <td>SSN</td>
            <td>Age</td>
            <td>Gender</td>
            <td>Race</td>
            <td>Occupation</td>
            <td>Phone Number</td>
            <td>Address</td>";

            while($row = mysqli_fetch_assoc($check)){
                echo "<tr>
                    <td>{$row['Fname']}</td>
                    <td>{$row['Lname']}</td>
                    <td>{$row['SSN']}</td>
                    <td>{$row['Age']}</td>
                    <td>{$row['Gender']}</td>
                    <td>{$row['Race']}</td>
                    <td>{$row['Occupation']}</td>
                    <td>{$row['PhoneNumber']}</td>
                    <td>{$row['Address']}</td>                      
                    </tr>";
                
            }
        }
        else{
            echo "0 Results";
        }
        ?>
</table>

</body>
</html>