<?php
include 'connect.php';


      //sign-up test

if(isset($_POST['submit']))
{
    $name= $_POST["name"];
    $email=$_POST["email"];
    $mobile=$_POST["mobile"];
    $password=$_POST["password"];
    
    $sql="select * from `crud` where name = '$name'";
    $sql1="select * from `crud` where email = '$email'";
    $sql2="select * from `crud` where mobile = '$mobile'";
    $result=mysqli_query($con,$sql);
    $result1=mysqli_query($con,$sql1);
    $result2=mysqli_query($con,$sql2);
    $count = mysqli_num_rows($result); 
    $count1 = mysqli_num_rows($result1); 
    $count2 = mysqli_num_rows($result2); 
    if($result){  
      if(($count == 0) && ($count1 == 0)&& ($count2 == 0))
      {
        $sql="insert into `crud` (name,email,mobile,password) values('$name','$email','$mobile','$password') ";
        $result3=mysqli_query($con,$sql);
          if ($result3) {
                header('location:display.php');
            }
      }
      if(($count>0) || ($count1>0) || ($count2>0))
      {
        echo '<script>alert("username or email already used..try again!")</script>';
      }
    }
    else{
        die(mysqli_error($con));
    }
}

        //login test 

if(isset($_POST['submit1']))
{
    $name1= $_POST["name1"];
    $password1=$_POST["password1"];

    $sql="select * from crud where name='$name1'and password='$password1'";
    $result1=mysqli_query($con,$sql);
    $count = mysqli_num_rows($result1); 

    if($result1){
      if($count == 1)
        {
            header('location:display.php');
        }
      else
      {
        echo '<script>alert("account not found..please try again!")</script>';
      }
    }
    else{
        die(mysqli_error($con));
        echo "bruh!";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign in & Sign up Form</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <main>
      <div class="box">
        <div class="inner-box">
          <!-- here is the first form -->
          <div class="forms-wrap">
            <form action="index.php" autocomplete="off" class="sign-in-form" method="post">
              <div class="logo">
                <img src="./img/logo.png" alt="easyclass" />
                <h4>easyclass</h4>
              </div>

              <div class="heading">
                <h2>Welcome Back</h2>
                <h6>Not registred yet?</h6>
                <a href="#" class="toggle">Sign up</a>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="text"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                    name="name1"
                  />
                  <label>Name</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="password"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                    name="password1"
                  />
                  <label>Password</label>
                </div>

                <input type="submit" value="Sign In" class="sign-btn" name="submit1"/>

                <p class="text">
                  Forgotten your password or you login datails?
                  <a href="#">Get help</a> signing in
                </p>
              </div>
            </form>

            <!-- here is the second form -->

            <form action="index.php" autocomplete="off" class="sign-up-form" method="post">
              <div class="logo">
                <img src="./img/logo.png" alt="easyclass" />
                <h4>easyclass</h4>
              </div>

              <div class="heading">
                <h2>Get Started</h2>
                <h6>Already have an account?</h6>
                <a href="#" class="toggle">Sign in</a>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="text"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                    name="name"
                  />
                  <label>Name</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="email"
                    class="input-field"
                    autocomplete="off"
                    required
                    name="email"
                  />
                  <label>Email</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="password"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                    name="password"
                  />
                  <label>Password</label>
                </div>
                <div class="input-wrap">
                  <input
                    type="text"
                    minlength="8"
                    class="input-field"
                    autocomplete="off"
                    required
                    name="mobile"
                  />
                  <label>Mobile</label>
                </div>

                <input type="submit" value="Sign Up" class="sign-btn" name="submit" />

                <p class="text">
                  By signing up, I agree to the
                  <a href="#">Terms of Services</a> and
                  <a href="#">Privacy Policy</a>
                </p>
              </div>
            </form>
          </div>

          <div class="carousel">
            <div class="images-wrapper">
              <img src="./img/image1.png" class="image img-1 show" alt="" />
              <img src="./img/image2.png" class="image img-2" alt="" />
              <img src="./img/image3.png" class="image img-3" alt="" />
            </div>

            <div class="text-slider">
              <div class="text-wrap">
                <div class="text-group">
                  <h2>Create your own courses</h2>  
                  <h2>Customize as you like</h2>
                  <h2>Invite students to your class</h2>
                </div>
              </div>

              <div class="bullets">
                <span class="active" data-value="1"></span>
                <span data-value="2"></span>
                <span data-value="3"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- Javascript file -->

    <script src="app.js"></script>
  </body>
</html>
