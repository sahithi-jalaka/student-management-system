<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
include 'db.php';
$sql="SELECT * FROM student";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
    {
        echo "<h3> Student Details</h3>";
        echo "<table border='1'>";
        echo "<tr>
             <th>Id</th>
             <th>name</th>
             <th>Date</th>
             <th>Gender</th>
             <th>Address</th>
             <th>Hobbies</th>
             <th>Subjects</th>
             <th>photo</th>
             <th>phone Number</th>
             <th>password</th></tr>";
             while($row=mysqli_fetch_assoc($result))
                {
                    echo"<tr>
                    <td>".$row['id']."</td>
                    <td>".$row['name']."</td>
                    <td>".$row['date']."</td>
                    <td>".$row['gender']."</td>
                    <td>".$row['address']."</td>
                    <td>".$row['hobbies']."</td>
                    <td>".$row['subjects']."</td>
                    <td><img src='uploads/".$row['photo']."' width='150' height='150'></td>

                    <td>".$row['phonenumber']."</td>
                    <td>".$row['password']."</td>
                    </tr>";

                }
                echo "</table>";


    }




?>
<a href="edit.php">Edit the student details</a>