<?php
session_start();
require('connection.php');
if(isset($_SESSION['adminid']))
{
    echo "<script>alert('Not Authorized to view page!')</script>";
    echo "<script>window.location.assign('login.php')</script>";
}
if(!isset($_SESSION['userid'])){
    echo "<script>alert('Not logged in! Redirecting to login page')</script>";
    echo "<script>window.location.assign('login.php')</script>";
}
else{
    $userid=$_SESSION['userid'];
    $stadiumid=$_SESSION['stadiumid'];
    extract($_GET);
    $validnum="/^[0-9]+$/";
    $eventid=$_SESSION['eventid'];
    if(preg_match($validnum,$carid)){

        $dj=$db->query("select * from car where carno='$carid' and 
        stadiumid='$stadiumid' and eventid='$eventid'");
        $dj=$dj->fetch();
        if(!isset($dj['carno']))
        {
            $reserved="not free";
            $dj=$db->prepare("insert into car(carno,userid,stadiumid,eventid) 
            values(:carno,:userid,:stadiumid,:eventid)");
    
            $dj->bindParam(":carno",$carid);
            $dj->bindParam(":userid",$userid);
            $dj->bindParam(":stadiumid",$stadiumid);
            $dj->bindParam(":eventid",$eventid);
            $dj->execute();
            echo "red";
        }

        else{

        
      $ds=$db->query("select * from car where carno='$carid' and 
      stadiumid='$stadiumid' and userid='$userid' and eventid='$eventid'");
      $ds=$ds->fetch();
      if(isset($ds['carno']))
      {
          
             
          $dj=$db->prepare("delete from car where
          carno=:carid and stadiumid=:stadiumid and eventid=:eventid");
          $dj->bindParam(":carid",$carid);
          $dj->bindParam(":stadiumid",$stadiumid);
          $dj->bindParam(":eventid",$eventid);
          $dj->execute();
          echo "black";
      }
      elseif(!(isset($ds['carno']))){
        $dk=$db->query("select * from car where userid='$userid' and 
        stadiumid='$stadiumid' and eventid='$eventid'");
        $dk=$dk->fetch(); 
        if(isset($dk['carno'])) 
        {
            echo "reserved another spot";
        }
        else{ 
        $dk=$db->query("select * from car where carno='$carid' and 
        stadiumid='$stadiumid' and eventid='$eventid'");
        $dk=$dk->fetch(); 
        if(isset($dk['userid']))
        {
            echo "Car Already Reserved Here";
        }
        else{
            $reserved="not free";
            $ds=$db->prepare("update car set carno=:carid where
            carno=:carid and userid=:userid and stadiumid=:stadiumid");
    
            $ds->bindParam(":carid",$carid);
            $ds->bindParam(":userid",$userid);
            $ds->bindParam(":stadiumid",$stadiumid);
            $ds->execute();
            echo "red";
        }
    }
        
      }
    }

}
}
?>