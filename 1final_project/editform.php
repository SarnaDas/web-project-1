<?php 
session_start();
include "dbconnect.php";

    
$eid = $_GET['eid'];

    $sql = "SELECT * FROM post WHERE pid='$eid'";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();

    $fname = $data['fname'];
    $lname = $data['lname'];
    $gender = $data['gender'];
    $catagory = $data['catagory'];
    $pdate = $data['pdate'];
    $location = $data['location'];
    $pcontact = $data['pcontact'];
    $pimage = $data['pimage'];
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">
        <title>Edit Post</title>
    </head>
    <body>
    <section>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <form action="edit.php?eid=<?php echo $eid; ?>" method="POST" enctype="multipart/form-data">
                    <div class="card-header">
                        <h4>Edit Form</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for=""> First Name</label>
                            <input type="text" class="form-control" name="fname" value="<?php echo $fname ?>">
                        <div class="form-group mb-3">
                            <label for="">Last Name</label>
                            <input type="text" class="form-control" name="lname" value="<?php echo $lname ?>">
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
                            <input type="date" class="form-control" name="pdate" value="<?php echo $pdate ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Location</label>
                            <input type="text" class="form-control" name="location" value="<?php echo $location ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Contact</label>
                            <input type="text" class="form-control" name="pcontact" value="<?php echo $pcontact ?>"required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Image</label>
                            <input type="file" class="form-control" name="image" required value="<?php echo $pimage ?>"required>
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
    
     