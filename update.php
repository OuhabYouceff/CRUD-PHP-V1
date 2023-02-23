<?php
include 'connect.php';

$id=$_GET["updateid"];
$sql="select * from `crud` where id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);

$name=$row['name'];
$email=$row['email'];
$mobile=$row['mobile'];
$password=$row['password'];



if(isset($_POST['submit']))
{
    $name= $_POST["name"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $mobile=$_POST["mobile"];

    $sql="update `crud` set id =$id, email = '$email', name = '$name', password = '$password', mobile = '$mobile' where id=$id";
    $result=mysqli_query($con,$sql);

    if($result){
        header('location:display.php');
        // echo "Data inserted successfully";
    }
    else{
        die(mysqli_error($con));
    }
}
else
{
    //echo "ERROR";
}


?>




<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>CRUD</title>
</head>

<body>
    <div class="container my-5">
        <form method="post" >

            <div class="mb-3">
                <label>Name</label> 
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name"  autocomplete="off" value=<?= $name ?>>
            </div>
            
            <div class="mb-3">
                <label>Email address</label> 
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter your email" name="email" autocomplete="off" value=<?= $email ?>>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Mobile</label>
                <input type="text" class="form-control" id="mobilephone" placeholder="Enter your mobile phone" name="mobile" autocomplete="off" value=<?= $mobile ?>>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="text" class="form-control" id="passWord" placeholder="Enter your password" name="password" autocomplete="off value=<?= $password ?>">
            </div>
            
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
            
        </form>
    </div>

</body>

</html>