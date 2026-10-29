<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors',1);
include 'db.php';

if(!isset($_GET['id'])){
    die("ID not found");
}

$idnumber = $_GET['id'];

$sql = "SELECT * FROM student WHERE id='$idnumber'";
$res = mysqli_query($conn,$sql);

if(!$res){
    die("Query failed: " . mysqli_error($conn));
}

if(mysqli_num_rows($res) == 0){
    die("No student found");
}

$row = mysqli_fetch_assoc($res);
?>

<h3>Student Details</h3>

<table border="1">
<tr>
    <th>Id</th>
    <th>Name</th>
    <th>Date</th>
    <th>Gender</th>
    <th>Address</th>
    <th>Hobbies</th>
    <th>Subjects</th>
    <th>Photo</th>
    <th>Phone</th>
    <th>Password</th>
</tr>

<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['name'] ?></td>
    <td><?= $row['date'] ?></td>
    <td><?= $row['gender'] ?></td>
    <td><?= $row['address'] ?></td>
    <td><?= $row['hobbies'] ?></td>
    <td><?= $row['subjects'] ?></td>
    <td>
        <img src="uploads/<?= $row['photo'] ?>" width="100">
    </td>
    <td><?= $row['phonenumber'] ?></td>
    <td><?= $row['password'] ?></td>
</tr>
</table>

<!doctype html>
<html>
    <title>
        Student
    </title>
    <body>
        <h1 align="left">Edit details</h1>
        <form action="edit1.php?id=<?= $row['id'] ?>" method="post" enctype="multipart/form-data">
            Id:<input type="text" name="id">
            <br><br>
            Name:<input type="text" name="name">
            <br><br>
            Data of birth:<input type="date" name="date">
            <br><br>
            Gender:<input type="radio" name="gender" value="female">Female
            <input type="radio" name="gender" value="male">Male    
            <br><br>
            Address<input type="textarea" rows="20" columns="20" name="address">
            <br><br>
            subjects:<select name="subjects">
            <option value="btech">btech</option>
            <option value="mbbs">mbbs</option>
            <option value="nursing">nursing</option>
            <option value="degree">degree</option>
        </select>
        <br><br>
        Hobbies:
        <input type="checkbox" name="hobbies[]" value="reading">Reading
        <input type="checkbox" name="hobbies[]" value="writing">writing
        <input type="checkbox" name="hobbies[]" value="singing">singing
        <input type="checkbox" name="hobbies[]" value="dancing">dancing
        <br><br>
        Photo:
        <input type="file" name="photo">
        <br><br>
        phoneNumber:<input type="text" name="phone">
        <br><br>
        password:<input type="text" name="password">
        <br><br>
        <button type="submit" name="edit">edit</button>

            

        </form>
        <a href='details.php'>Student Details</a>
        <br><br>
        <a href='delete.php'>Delete student</a>
    </body>
</html>
<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
if(isset($_POST['edit']))
    {
        $i=$_POST['id'];
        $nam=$_POST['name'];
        $dat=$_POST['date'];
        $gend=isset($_POST['gender']) ? $_POST['gender'] : "no gender";
        $add=$_POST['address'];
        $sub=$_POST['subjects'];
        $hobbi=isset($_POST['hobbies'] ) ? implode(",",$_POST['hobbies']) : "NO hobbies selected";
   $pho = ""; // always initialize

if(!empty($_FILES['photo']['name'])){

    $pho = "uploads/" . basename($_FILES['photo']['name']);

    if(move_uploaded_file($_FILES['photo']['tmp_name'], $pho)){
        echo "File uploaded successfully<br>";
    }
    else{
        echo "File upload failed<br>";
    }

} else {
    echo "no file uploaded<br>";
    $pho = "uploads/default.png"; // fallback image
}     
        $phon=$_POST['phone'];
        $pass=$_POST['password'];
        $sql="UPDATE student SET name='$nam',date='$dat',gender='$gend',address='$add',hobbies='$hobbi',
        subjects='$sub',photo='$pho',phonenumber='$phon',password='$pass' WHERE id='$i'";
        $res=mysqli_query($conn,$sql);
        if($res)
            {
                echo "Student updated successfully";
            }
            else{
                echo "Update failed:".mysqli_error($conn);
            }
    }
?>