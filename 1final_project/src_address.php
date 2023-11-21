<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <title>Search</title>
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
                <form action="show_address.php" method="POST">
                <div class="card-header">
                    <h4>Provide search Information</h4>
                </div>
                <div class="card-body">
                    
                    <div class="form-group mb-3">
                        <label for=""><strong>Location:</strong></label>
                        <input type="text" class="form-control" name="location" placeholder="Enter Address" required>
                    </div>
                    
                    <div class="form-group mb-3">
                        <button type="submit" name="submit" value="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
</section> 

</body>
</html>

