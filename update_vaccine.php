<?php

include "database.php";


$sql = "SELECT * FROM vaccine";
$check = mysqli_query($conn,$sql);




?>

<?php 
        if(mysqli_num_rows($check) > 0){
            while($row = mysqli_fetch_assoc($check)){
                echo "<tr><td>{$row['Company']}</td><td>
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