<?php 
include "dbconnect.php"; 
//echo"ok";
session_start();
if (isset($_POST['submit'])) {
    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "uimg/".$filename;
    //echo $folder;
    move_uploaded_file($tempname,$folder);//^-^
   // print_r($_FILES["image"]); 

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $catagory = $_POST['catagory'];
    $pdate = $_POST['pdate'];
    $location = $_POST['location'];
    $pcontact = $_POST['pcontact'];
    //$pimage = $_POST['pimage'];
     
    $user_id = $_SESSION['user_id'];

    
    $queryc = "INSERT INTO post (fname,lname,gender,catagory,pdate,location,pcontact,pimage,user_id)  
    values('$fname','$lname','$gender','$catagory','$pdate','$location','$pcontact','$folder','$user_id')";
    $resultc = mysqli_query($conn,$queryc);

    if ($resultc) {
       echo"You posted successfully!";
       header('location:index.php');
    }
    else {
        echo"Something went wrong!";
    }
 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <title>Create Post</title>
</head>
<body>
<section>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <form action="createpost.php" method="POST" enctype="multipart/form-data">
                <div class="card-header">
                    <h4>Post Info</h4>
                </div>
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label for=""> First Name</label>
                        <input type="text" class="form-control" name="fname">
                    <div class="form-group mb-3">
                        <label for="">Last Name</label>
                        <input type="text" class="form-control" name="lname">
                    </div></div>
                    <div class="form-group mb-3">
                        <label for="">Gender  </label><br>
                    
                        <input type="radio" class="" name="gender" value="Male">
                        <label for="">Male </label>
                        <input type="radio" class="" name="gender" value="Female">
                        <label for="">Female </label>
                        <input type="radio" class="" name="gender" value="Other">
                        <label for="">Other</label>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Catagory </label><br>
                        <input type="radio" class="" name="catagory" value="Missing">
                        <label for="">Missing </label>
                        <input type="radio" class="" name="catagory" value="Founded">
                        <label for="">Founded </label>
                    </div>                   
                    <div class="form-group mb-3">
                        <label for="">Date</label>
                        <input type="date" class="form-control" name="pdate">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Location</label>
                        <input type="text" class="form-control" name="location">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Contact</label>
                        <input type="text" class="form-control" name="pcontact" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Image</label>
                        <input type="file" class="form-control" name="image" required>
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" name="submit" value="submit" class="btn btn-primary">Post</button>
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

 