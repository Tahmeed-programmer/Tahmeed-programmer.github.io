<?php
session_start();
require('connection.php');
if(isset($_SESSION['userid']))
{
    echo "<script>alert('Not Authorized to view page!')</script>";
    echo "<script>window.location.assign('login.php')</script>";
}


if(!isset($_SESSION['adminid']))
{
    echo "<script>alert('Not logged in! Redirecting to login page')</script>";
    echo "<script>window.location.assign('login.php')</script>";
}

else{

$userid=$_SESSION['adminid'];
$ds=$db->query("select * from user where userid='$userid' and user_type='admin'");
    $ds=$ds->fetch();
    $fname=$ds['firstname'];
    $lname=$ds['lastname'];
    $email=$ds['email'];
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="bar-nav" class="bar-nav ">
        <div style="display: flex;justify-content:flex-end;
        cursor: pointer;">

            <i id="cross"style="color:red"
            class="fa-solid fa-bars fa-x fa-2x"></i>
        </div>
        <ul>
<li><a href="">Stadiums</a></li>
<li><a href="">About</a></li>
<li><a href="">Contact Us</a></li></ul>
    </div>
    <nav>
        <div class="check">
        <img class="img" src="images/logo.png">
<div class="logo-title">StudBook</div>
</div>




<div class="link-container extra3">
<ul >

<li ><a href="">Stadiums</a></li>
<li><a href="">About</a></li>
<li><a href="">Contact Us</a></li></ul>
    </div>

   

    <div class="end-buttons"
    style="display:flex;
    margin-right: 5px;
    flex-direction:column;
    bottom: 2%;">
        <i id="user" style="color:#3A3335;
            font-size: 1.9rem;

            ;"class="fas fa-user-circle"></i>
            <i id="dropdown" style="padding-left: 2px;
            margin-top: 2px; color:black;
            cursor: pointer;font-size: 1.5rem;"
             class="fa fa-chevron-circle-down"></i>
             
             
     </div>
    <div class="hamburger">
        <i id="hamburger" style="color:#3A3335;
            cursor: pointer;font-size: 1.4rem;"class="fa-solid fa-bars "></i>
    </div>
    </nav>





    <div class="dropdowns"style="z-index:2000;
    position: absolute;
   
    right:0px;
    ">
      <ul
      style="list-style:none;
      font-family:Roboto;
      font-weight: bold;
      margin-left: 0%;
      padding-left: px;
  ">
          <li>
           <a style="text-decoration:none;
           color:#130e0f"
           href="admin.php"><i class="fa-regular fa-user"></i>Profile</a></li>
          
          
           <li>
            <div id="logout" style="
            cursor:pointer;
            text-decoration:none;
            color:#130e0f">
            <i  class="fas fa-sign-out-alt"></i>Logout</div></li>
      </ul>
  </div>
<div class="new-nav2">
    <ul>
       <li><a style="cursor:pointer" href="managestadiums.php">Manage Stadiums</a></li>
       <li><a href="manageEvents.php">Manage Events</a></li>
       <li><a href="managetickets.php">Manage Tickets</a></li>
       <li><a href="managepayments.php">Manage Payments</a></li>
       <li><a href="managereports.php">Generate Reports</a></li>
    </ul>
</div>


<div class="main-img"
    style="
     background-size: cover;
     background-position: center center center
     center ;
     position: absolute;
     height:240vh;
     z-index: -1000;
     filter: blur(10px)">
    
    </div>

    <div class="login1-form">
    <div
    style="margin-top: 12%;
    font-family: Montserrat;
font-size: 2.8rem;
font-weight: 600;
text-align: center;

    color:#FFFFFF">
        My Profile
</div>

<div class="modal">
    <div style="display: flex;justify-content:flex-end;
    cursor: pointer;">

        <i style="cursor:pointer;color:red;" id="cross2"
        class="fa-solid fa-bars fa-x fa-2x"></i>
    </div>
    <form action="" 
    style="font-family: Arial, Helvetica, sans-serif;
    padding-left: 20%;" method="post">
        <p>First Name:</p>
        <input  style="border-radius: 5px;" 
         type="text" value="<?php
         echo $fname?>" name="fname">
        <p>Email:</p>
        <input style="border-radius: 5px;"
        type="email" value="<?php
         echo $email?>" name="email">
        <p>Last Name:</p>
        <input style="border-radius: 5px;"
        type="text" value="<?php
         echo $lname?>"name="lname">

       <input type="hidden" value="got" name="got">
        <p><input style="font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
        background-color: #74e28c;
        cursor: pointer;
        width: 5rem;margin-top: 6%;"
            type="submit" value="Edit" name="edit"></p>
    </form>


</div>

<div class="add1"
style="padding-left:15px;
margin-top: 10px;
font-family: Roboto;
padding-top: 0%;

max-width:700px;
border: 2px solid;
background: rgba(172, 172, 172, 0.15);
box-shadow: 0px 5px 4px 8px rgba(0, 0, 0, 0.25);
border-radius: 10px;">
<div class="prof-box">Personal Information :
    <p></p>
<div style="margin-left:4%;margin-top: 0%;
width:70%;
">
    <p style="margin-bottom:0%;margin-top:0%;">
       First Name :<?php
         echo $fname?>
    </p>
    <p style="margin-top:0;">
        Last Name :<?php
         echo $lname?>
    </p>
    <p style="margin-top:0%;margin-bottom: 0%;">
        Email :<?php
         echo $email?>
    </p>
    <button id="edit"style="height:2rem;width:7rem;
    font-family: Roboto;
    font-size: 1.3rem;
    font-weight: bold;
    border-radius: 5px;
    margin-top:10px;
    cursor: pointer;">Edit Info</button>



    <p></p>
    <div style="height: 3px;
    background-color: #FFFFFF;"></div>
</div>
</div>
<div class="prof-box">Tickets Information:
    <p></p>

    <div style="margin-left:4%;margin-top: 0%;
width:70%;
">
    <p style="margin-top:3px;
    margin-bottom:0%;
    ">
       <a style="color: #3258e0;"
        href="managetickets.php">Manage Tickets</a>
    </p>
    <p style="margin-top:10px;">
        <a style="color: #4565d6;"
        href="manageEvents.php">Manage Events</a>
    </p>
  
    <div style="height: 3px;
    background-color: #FFFFFF;"></div>

</div>
<div class="prof-box">Security :
    <p></p>

    <div style="margin-left:4%;margin-top: 0%;
    width:70%;
    ">
        <p style="margin-top:3px;
        margin-bottom:0%;
        ">
           <a style="color: #4565d6;"
            href="changepassword.php">Change Password</a>
        </p>
        <br/>
      
        <div style="height: 3px;
        background-color: #FFFFFF;"></div>
    
    </div>

</div>


</div>


</div>

</div>';
</body>
<script>
     var cross2=document.getElementById("cross2");
     var modal=document.querySelector(".modal");
      var id3=document.getElementById("cross");
     var id4=document.getElementById("bar-nav");
     var id5=document.getElementById("hamburger");
     var dropdown=document.getElementById("dropdown");
     var newdrop=document.querySelector(".dropdowns");
     var logout=document.getElementById("logout");
 
     logout.addEventListener("click",()=>{
       alert("Logging Out!");
       window.location.assign('logout.php');
     })
    
     var id1=document.getElementById("edit");
     id1.addEventListener("click",()=>{
         modal.classList.toggle("addmodal");
     })
 
     cross2.addEventListener("click",()=>{
         modal.classList.toggle("addmodal");
     })
 
 
     dropdown.addEventListener("click",()=>{
 
     newdrop.classList.toggle("show-dropdown")
     })
 
     id5.addEventListener("click",()=>{
         id4.classList.toggle("visible");
     })
     id3.addEventListener("click",()=>{
             id4.classList.toggle("visible");
     })
 </script>
</html>



<?php
}
if(isset($_POST['edit']))
{
    extract($_POST);
    $validname="/^[a-zA-Z0-9_.-]+$/";

 $str1="";
 $valid=true;
 if(!isset($fname))
 {
     $valid=false;
     $str1.="first name has not been entered!\\n";
 }
 else if(!isset($lname)){
    $valid=false;
     $str1.="last name has not been entered!\\n";
 }

 else{

    if(strlen($_POST['fname'])<3 || strlen($_POST['lname'])<3)
    {
        $valid=false;
        $str1.="Names should be at least 3 characters long!\\n";
        
    }
    else{
        if(!(preg_match($validname,$fname) && preg_match($validname,$lname)))
        {
            $str1.="Invalid names!\\nNames can only contain following characters a-z,A-Z,0-9, - , _ , .,+\\n";
            $valid=false;

        }

    }
 }
 if(!(filter_var($email, FILTER_VALIDATE_EMAIL)))
 {
    $str1.="Invalid Email!\\n";
     $valid=false;
   }
   if($valid==false)
   {
      $str2=nl2br($str1);
         echo "<script>alert('".$str1."')</script>"; 
   }
   else{
       $userid=$_SESSION['adminid'];
       $ds=$db->query("select email from user where 
       userid!='$userid' and email='$email'");
       $ds=$ds->fetch();
       if($ds['email']==$email)
       {
         $str1.="Another user is using this Email!\\n";
         echo "<script>alert('".$str1."')</script>";
       }
      

       if($ds['email']!=$email){
         try{
             $db->beginTransaction();
             $ds=$db->prepare("update user set firstname=:fname,lastname=:lname,email=:email where userid=:userid");
             $ds->bindParam(':fname',$fname);
             $ds->bindParam(':lname',$lname);
             $ds->bindParam(':email',$email);
             $ds->bindParam(':userid',$userid);
             $ds->execute();
         echo "<script>alert('Details updated Sucessfully')</script>";
         echo "<script> window.location.assign('admin.php')</script>";
         $db->commit();
         }
         catch(PDOException $e)
         {
             $db->rollback();
             echo "<script>alert('The email you entered is already registered')</script>";
         }
     }
 }
   }
?>