<?php
include "dbconnect.php";

$sname = "";
$logged = "no";
session_start();
if (!empty($_SESSION["email"])) {
    $logged = $_SESSION["email"];
    $sname = $_SESSION["name"];

}
$sqlq = "SELECT * FROM user WHERE email='$logged'";
$resultq = $conn->query($sqlq);
$dataq = $resultq->fetch_assoc();

$user_id = $dataq['id'];

$sql = "SELECT * FROM post WHERE user_id='$user_id'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">

    <title>User's post</title>
    <style>
      .f1{
        display: flex;
     }  
     .content{
        display: flex;
        background-color: #4611a8;
     } 
     .anu{
        padding: 10px;
        color: blue;
        font-size: larger;
        font-family: 'Times New Roman', Times, serif;
     } 
     .nav{
        background-color: #4611a8;
        height: 80px;
     }
     .nav a{
            float: left;
            display: block;
            color: aliceblue;
            text-align: center;
            margin: 10px;
            padding: 20px;
            text-decoration: none;
            font-size: 15px;
            font-weight: bold;
            width: 10%;
        
        }
        .nav a:hover{
            background: #210240;
            color: aliceblue;
        }
.left
        {
            width: 20%;
            background-color: #340266;
            color: aliceblue;
            padding-left: 10px;
        }
        .left a{
            float: left;
            display: block;
            color: azure;            
            text-align: left;
            padding: 10px;
            text-decoration: none;
            font-size: 15px;
            width: 90%;
            font-weight: bold;
        
        }
        .left a:hover{
            background: #210240;
            color: aliceblue;
        }
        .right
        {
            width: 80%;
            background-color: aliceblue;            
            padding-left: 10px;
        }
        .footer
        {
            background-color: #4611a8;
            padding: 10px;
            text-align: center;
            color: aliceblue;
        }
        tr,td{
            text-align: center;
        }
        th
        {
            background-color: cornflowerblue;
        }
        table
        {
            margin-bottom: 10px;

        }
    </style>
    
</head>
<body>

<div class="full">
    <div class="f1">
        
        <img src="logo.jpg" height="90px" width="90px">


        <div class="anu">
            <h3>Anushondhan</h3>
        </div>
    </div>

    <div class="nav">
        <?php 
            if ($logged=="no")
            {
                        echo '<a href="index.php">Home</a>';
                        echo '<a href="login.php">Login</a>';
                        echo '<a href="register.php">Sign in</a>';
                        

                }
            else
             {
            
                    echo '<a href="index.php">Home</a>';
                    echo '<a href="createpost.php">Create Post</a>';
                    echo "<a href='userpost.php'>".$sname."'s Post</a>";
                    echo '<a href="logout.php">Logout</a>';


                }
                
                ?>
    </div>

    <div class="content">
                <div class="left">
                    <h1>Search Here</h1>
                    <a href="src_catagory.php">Search By catagory</a><br>
                    <a href="src_name.php">Search By Name</a><br>
                    <a href="src_gender.php">Search By Gender</a><br>
                    <a href="src_date1.php">Search By Specific Date</a><br>
                    <a href="src_date2.php">Search By Two Dates</a><br>
                    <a href="src_address.php">Search By Location</a>
                </div>
                <div class="right">
                    <h1 style="text-align: center;">All data here</h1>
                    <center>
                    
                    <?php 
                        if($result->num_rows>0)
                        {
                        echo'<table border="1" width="90%" cellspacing="0">';
                        echo'<tr>';
                        echo'<th width="10%">Post ID</th>';
                        echo'<th>Catagory</th>';
                        echo'<th>Name</th>';
                        echo'<th>Gender</th>';
                        echo'<th>Date</th>';
                        echo'<th>Location</th>';
                        echo'<th>Contact no</th>';
                        echo'<th>Image</th>';
                        echo'<th>Edit</th>';
                        echo'<th>Delete</th>';
                        echo'</tr>';
                                while ($data=$result->fetch_assoc())  
                                { 

                                
                                    $pid = $data['pid'];
                                    $fname = $data['fname'];
                                    $lname = $data['lname'];
                                    $gender = $data['gender'];
                                    $date = $data['pdate'];
                                    $catagory = $data['catagory'];
                                    $location = $data['location'];
                                    $pcontact = $data['pcontact'];
                                    $pimage = $data['pimage'];

                        ?>
                                    <tr>

                                    <td ><?php echo $pid; ?></td>
                                    <td ><?php echo $catagory; ?></td>
                                    <td ><?php echo $fname." ".$lname; ?></td>
                                    <td ><?php echo $gender; ?></td>
                                    <td ><?php echo $date; ?></td>
                                    <td ><?php echo $location; ?></td>
                                    <td ><?php echo $pcontact; ?></td>
                                    <td ><img src="<?php echo $pimage; ?>" height="100px" width="100px"></td>

                                    <td><a href="editform.php?eid=<?php echo $pid; ?>"><button class="btn btn-primary">Edit</button></a></td>
                                    <td><a href="delete.php?id=<?php echo $pid; ?>" ><button class="btn btn-danger">Delete</button></a></td>
                                    </tr>
                            <?php  
                                }
                            }
                            else{
                                echo"No Data Found!";
                            }
                            ?>    

               
                        </table>
                    </center>
                    </div>

    </div>

    <div class="f4">
    <div class="footer">
        <p>&copy;sas</p>
    </div>

    </div>
</div>
    
</body>
</html> 
