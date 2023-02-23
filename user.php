<?php
include 'connect.php';

if(isset($_POST['submit']))
{
    $name= $_POST["name"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $mobile=$_POST["mobile"];

    $sql="insert into `crud` (name,email,mobile,password) values('$name','$email','$mobile','$password') ";
    $result=mysqli_query($con,$sql);

    if($result){
        header('location:display.php');
        // echo "Data inserted successfully";
    }
    else{
        die(mysqli_error($con));
    }
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
        <form method="post">

            <div class="mb-3">
                <label>Name</label> 
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name"  autocomplete="off">
            </div>
            
            <div class="mb-3">
                <label>Email address</label> 
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter your email" name="email" autocomplete="off">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Mobile</label>
                <input type="text" class="form-control" id="mobilephone" placeholder="Enter your mobile phone" name="mobile" autocomplete="off">
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="text" class="form-control" id="passWord" placeholder="Enter your password" name="password" autocomplete="off">
            </div>
            
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            
        </form>
    </div>

</body>

</html>