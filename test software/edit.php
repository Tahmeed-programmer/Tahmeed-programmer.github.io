<?php
session_start();
require('connection.php');
$userid=$_SESSION['userid'];
extract($_POST);
$ds=$db->prepare("update user set firstname=:fname,lastname=:lname,email=:email where userid=:userid");
$ds->bindParam(':fname',$fname);
$ds->bindParam(':lname',$lname);
$ds->bindParam(':email',$email);
$ds->bindParam(':userid',$userid);
$ds->execute();
echo "<script>alert('Details updated Sucessfully')</script>";
?>