<?php
session_start();
require('connection.php');
echo date("Y-m-d");

$eventid=$_SESSION['eventid'];
$category=$_SESSION['category'];

echo $category;
echo $eventid;
$ds=$db->query("select ticketid from ticket where eventid='$eventid'");
$ds=$ds->fetch();
$ticketid=$ds['ticketid'];
$dj=$db->query("select * from ticket where eventid='$eventid' ");
        $dj=$dj->fetch();
        echo "<script>alert('HELOOO!')</script>";
        $newval=$dj[$category]-1;
        echo "<script>alert('".$newval."')</script>";
        $ds=$db->prepare("update ticket set $category=:newval where 
        ticketid=:ticketid ");
        $ds->bindParam(":ticketid",$ticketid);
        $ds->bindParam(":newval",$newval);
        $ds->execute();
        //$ds->bindParam(":categ",$category);
?>