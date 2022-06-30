<?php
session_start();
require("connection.php");
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
    $validnum="/^0$||(^[1-9]{1,}[0-9]+$)/";
    if(isset($_GET['stadid']))
    {
        extract($_GET);
        if(!(preg_match($validnum,$stadid)))
        {
            echo "<script>alert('Invalid number')</script>";
            echo "<script>window.location.assign('login.php')</script>";
            exit();
        }
        else{
            $ds=$db->query("select * from favorite where userid='$userid'
            and stadiumid='$stadid'");
            $ds=$ds->fetch();
            if(isset($ds['userid']))
            {
                $dj=$db->prepare("delete from favorite where
             userid=:userid and stadiumid=:stadiumid");
            $dj->bindParam(":userid",$userid);
            $dj->bindParam(":stadiumid",$stadid);
            $dj->execute(); 
              echo "black";
            }
            else{

                $ds=$db->prepare("insert into favorite (userid,stadiumid)
                values (:userid,:stadiumid)");
                $ds->bindParam(":userid",$userid);
                $ds->bindParam(":stadiumid",$stadid);
                $ds->execute();
                echo "Added";

            }
           
        }
    }
}
?>