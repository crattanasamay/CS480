<?php

include "database.php";


$sql = "SELECT * FROM vaccine";
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
            <td>Company</td>
            <td>Number of Doses</td>
            <td>Description</td>
            </tr>";
            while($row = mysqli_fetch_assoc($check)){
                echo "<tr><td>{$row['Company']}</td>
                    <td>{$row['NumDoses']}</td>
                    <td>{$row['Description']}</td>
                    <td><a href='delete_vaccine.php?rn={$row['Company']}'>Delete</a><td>
                    <td><a href='edit_vaccine.php?rn={$row['Company']}'>Edit</a><td>    
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