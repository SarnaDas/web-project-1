<?php
session_start();
include "dbconnect.php";
$pid = $_GET['id'];
    //echo $pid;
    $sqlq="SELECT * FROM post where pid='$pid'";
    $queryq = $conn->query($sqlq);
    $dataq = $queryq->fetch_assoc();
    $old_image = $dataq['pimage'];
echo $old_image;
    $sql="DELETE FROM post where pid='$pid'";
    $query = $conn->query($sql);
    if ($query)
    {
        unlink($old_image);
        //echo"ok";
        header('location:userpost.php');

    }

else{
    echo"Failed to Delete";
}

?> 