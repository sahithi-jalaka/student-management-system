<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
include 'db.php';
if(isset($_POST['register']))
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
        
        $sql="INSERT INTO student VALUES('$i','$nam','$dat','$gend','$add','$hobbi','$sub','$pho','$phon','$pass')";
        $res=mysqli_query($conn,$sql);
        if($res)
            {
                echo "registered successfully";
            }
            else
            {
                echo "Not registered";
            }


    }
    
?>
