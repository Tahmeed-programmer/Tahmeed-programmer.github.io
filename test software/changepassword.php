<?php
require('connection.php');
session_start();
if(isset($_SESSION['adminid']))
{
    echo "<script>alert('Not Authorized to view page!')</script>";
    echo "<script>window.location.assign('login.php')</script>";
}



if(!isset($_SESSION['userid']))
{
    echo "<script>alert('Not logged in! Redirecting to login page')</script>";
    echo "<script>window.location.assign('login.php')</script>";
    die();
}

    $userid=$_SESSION['userid'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="">
   
<div id="bar-nav" class="bar-nav ">
        <div style="display: flex;justify-content:flex-end;
        cursor: pointer;margin-right :10px;">

            <i id="cross"style="color:red;margin-right:8px;"
            class="fa-solid fa-bars fa-x fa-2x"></i>
        </div>
        <ul>
<li><a href="book.html">Book</a></li>
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

<li ><a href="book.html">Book</a></li>
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
           href="userprofile.php"><i class="fa-regular fa-user"></i>Profile</a></li>
          
          
        <li>
            <div id="logout" style="
            cursor:pointer;
            text-decoration:none;
            color:#130e0f">
            <i  class="fas fa-sign-out-alt"></i>Logout</div></li>
      </ul>
  </div>
<div class="new-nav">
    <ul>
       <li><a style="cursor:pointer" href="tickets.php">My Tickets</a></li>
       <li><a href="favoritestadiums.php">My Favorite Stadiums</a></li>
       <li><a href="pastevents.php">My Recent Visited Events</a></li>
    </ul>
</div>



<div class="main-img"
    style="background-repeat: no-repeat;
     background-size: cover;
     background-position: center center center
     center ;
     filter: blur(10px)">
    </div>


<div class="login-form">
       <h1 style="font-family: Montserrat;
       font-style: normal;
       font-weight: 600;
      font-size:2.8rem;
       color: #fff;
       ">Change Password</h1>
       <form action="" method="post" id="form">
           <div>Old Password</div>
           <input 
           type="password" required id="password"
           name="pass" required placeholder="&#xf023;">
           <div>
              New Password
           </div>
           <input required type="password" name="oldpass" placeholder="&#xf023;">
           
            <input type="hidden" name="subf" value="got">
            <input style="width:40%;
            margin-top: 1rem;
            cursor: pointer;
            height:2.5rem;
            font-family: Open Sans;
       font-size: 1.2rem;
font-style: normal;
font-weight: 700;
    border-radius: 8px;
            background: #B4CFB0;"
             type="submit" value="change"
             id="login" name="login">
      
      
          



       </form>
       
        </div>


</body>
<script>

    const var1=document.getElementById("cancel1");
    var id3=document.getElementById("cross");
   var id4=document.getElementById("bar-nav");
   var id5=document.getElementById("hamburger");
   var dropdown=document.getElementById("dropdown");
   var newdrop=document.querySelector(".dropdowns");


   dropdown.addEventListener("click",()=>{

newdrop.classList.toggle("show-dropdown")
})

logout.addEventListener("click",()=>{
       alert("Logging Out!");
       window.location.assign('login.php');
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


if(isset($_POST['subf']))
{
    
    require("connection.php");
    $valid=true;
    extract($_POST);
    
 
        $ds=$db->query("select * from user where userid='$userid'");
        if($ds=$ds->fetch())
        {
            $copass=$ds["password"];
            
            if(strlen($oldpass)<8)
       {
         $valid=false;
         $str1.="Passwords should be 8 characters minimum!\\n";
  
       }
       elseif(strlen($oldpass)>=8)
       {
        if(!(password_verify($pass,$copass)))
        {
   
            $valid=false;
            echo "<script>alert('Wrong Password Entered!')</script>";
        }
    }
    if($valid==false)
    {
        $str2=nl2br($str1);
        echo "<script>alert('".$str1."')</script>"; 
    }
        else{
           $newpass=password_hash($oldpass,PASSWORD_DEFAULT,array('cost'=>11));

           $ds=$db->prepare("update user set password=:oldpass where userid=:userid ");
           $ds->bindParam(':oldpass',$newpass);
           $ds->bindParam(':userid',$userid);
           $ds->execute();

       

           echo "<script>alert('User sucessfully Changed Password')</script>";
               
            }
               
                   
                
            }
            else{
                echo "<script>alert('User Doesnt exist')</script>";
               
            }

        }
        
?>
