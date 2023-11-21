<?php
session_start();
include "dbconnect.php";
if(isset($_POST['submit']))
{
    $eid = $_GET['eid'];
    //echo $pid;

    $sqlq="SELECT * FROM post where pid='$eid'";
    $queryq = $conn->query($sqlq);
    $data_old = $queryq->fetch_assoc();

    $opimage = $data_old['pimage'];

    //echo $opimage;

    $filename = $_FILES['image']['name'];
    $tempfile = $_FILES['image']['tmp_name'];
    $folder = "uimg/".$filename;

    $nfname = $_POST['fname'];
    $nlname = $_POST['lname'];
    $ngender = $_POST['gender'];
    $catagory = $_POST['catagory'];
    $npdate = $_POST['pdate'];
    $nlocation = $_POST['location'];
    $npcontact = $_POST['pcontact'];
    $npimage = $folder;
   // echo $opimage." ".$npimage;

   
    unlink($opimage);

    $sql2 = "UPDATE post SET fname='$nfname',lname='$nlname',gender='$ngender',catagory='$catagory',pdate='$npdate',location='$nlocation',pcontact='$npcontact',pimage='$folder' 
    WHERE pid='$eid'";
    $query2 = $conn->query($sql2);

    if($query2)
    {
        //echo"ok";
        move_uploaded_file($tempfile,$folder);
        header('location:userpost.php');

    }
    else{
        echo"Something Went Wrong";
    }

}
   

?> 