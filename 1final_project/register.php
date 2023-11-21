<?php

session_start();
include "dbconnect.php";
$valid = 0;
if(isset($_POST['submit']))
{   
    $name = $_POST['name'];
    $address = $_POST['address'];
    $contact = $_POST['pcontact'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $queryvalid = "SELECT * FROM user WHERE email='$email'";
    $resultvalid = mysqli_query($conn,$queryvalid);
  
    if($resultvalid->num_rows>0)
    {
        $valid = 1;
    }
    else
    {
        $query = "INSERT INTO user (name,address,contact,email,password)
        VALUES('$name','$address','$contact','$email','$password')";
        $result = mysqli_query($conn,$query);
        if($result)
            {
                //echo"Registration Successfull";
                header('location:index.php');
        
            }
            else
            {
                echo"Something went wrong!";
            } 
    }
        
}
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <title>Register</title>
    <style>
        b{
            color: red;
        }
    </style>
</head>
<body>
<section>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            
            <div class="card">
                <form action="register.php" method="POST">
                <div class="card-header">
                    <h4>Registration Form</h4>
                </div>
                <div class="card-body">
                <div class="form-group mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Your Full name">
                    <div class="form-group mb-3">
                        <label for="">Address</label>
                        <input type="text" class="form-control" name="address" placeholder="Your Address Here">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Contact</label>
                        <input type="text" class="form-control" name="pcontact" placeholder="Your Contact Number">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Your Email">
                        <?php 
                        
                            if($valid == 1)
                            {
                                echo"<b>Email Already Exists!</b>";
                            }
                      
                        ?>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Create a Strong Password">
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" name="submit" value="submit" class="btn btn-primary">Reister</button>
                    </div>
                    <div class="form-group mb-3">
                    <p>Already Have An Account? <a href="login.php">Login Here</a></p>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

</div>
</section> 

</body>
</html>

 