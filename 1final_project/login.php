<?php

session_start();
include "dbconnect.php";

if(isset($_POST['submit'])){
$user= $_POST['email'];
$pass= $_POST['password'];



$sql="SELECT * FROM user WHERE email='$user' AND  password = '$pass'";
$result = $conn->query($sql);
$data = $result->fetch_assoc();


if($result->num_rows==1)
{
    $_SESSION['email'] = $user;
    	//echo $_SESSION['email'];

    $_SESSION["name"] = $data['name'];
    $_SESSION['user_id'] = $data['id'];
    header('Location:index.php');
}
else{
	echo"Please enter valid Email and password...";

}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <title>Login</title>
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
                <form action="login.php" method="POST">
                <div class="card-header">
                    <h4>Login Form</h4>
                </div>
                <div class="card-body">
                    
                    <div class="form-group mb-3">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Your Email">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Your Password">
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" name="submit" value="submit" class="btn btn-primary">login</button>
                    </div>
                    <div class="form-group mb-3">
                    <p>Don't Have Any Account? <a href="register.php">Register Here</a></p>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

</div>
</section> 
<?php  unset($_SESSION['email_alert']); ?>

</body>
</html>

