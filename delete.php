
           <?php
           include 'db.php';
if(isset($_POST['delete']))
{
$id=$_POST['id'];

$sql1="DELETE FROM student WHERE id='$id' ";
$result=mysqli_query($conn,$sql1);
if(!$result)
{
die("Error:".mysqli_error($conn));}
if(mysqli_affected_rows($conn)>0)
{
echo "<p style='color:green;'>Employee deleted successfully</p>";}
else
{
echo "<p style='color:red;'> Invalid Id</p>";}
}?>
<!DOCTYPE html>
<html>
<head>
<title>Delete employee
</title>
<style>
button{
background-color:orange;
padding:8px;}
</style>
</head><body>
<form method="post">
<h1>Delete Employee</h1>
ID:<br>
<input type="text" name="id" required><br><br>
<button type="submit" name="delete">Delete Employee</button>
</form></body></html>
<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
$result=mysqli_query($conn,"SELECT * FROM student");
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
           ?>
            <a href="delete.php">Do u Want to delete</a>