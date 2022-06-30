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
$userid=$_SESSION['userid'];
if(isset($_SESSION['adminid']))
{
    echo "<script>alert('Not Authorized to view page!')</script>";
    echo "<script>window.location.assign('login.php')</script>";
}
else{
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

<body>
   
<div id="bar-nav" class="bar-nav ">
        <div style="display: flex;justify-content:flex-end;
        cursor: pointer;margin-right :10px;">

            <i id="cross"style="color:red;margin-right:8px;"
            class="fa-solid fa-bars fa-x fa-2x"></i>
        </div>
        <ul>
<li><a href="book.html">Book</a></li>
<li><a href="aboutus.html">About</a></li>
<li><a href="contactus.php">Contact Us</a></li></ul>
    </div>
    <nav>
        <div class="check">
        <img class="img" src="images/logo.png">
<div class="logo-title">StudBook</div>
</div>




<div class="link-container extra3">
<ul >

<li ><a href="book.html">Book</a></li>
<li><a href="aboutus.html">About</a></li>
<li><a href="contactus.php">Contact Us</a></li></ul>
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
       <li><a href="">My Recent Visited Events</a></li>
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

    <div style="margin-top:10%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;" >
            <p style="background-color: antiquewhite;
            width:fit-content;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 2rem;
            border:4px solid rgb(216, 24, 24);"> Write your review</p>
          <br>
          <textarea style="border:5px solid black;
          height:7rem;
          width:90%;
          max-width: 380px;
          text-align: left;
          padding: 0%;
          font-family: Arial, Helvetica, sans-serif;
          font-weight: bolder;"
           rows="4" cols="50" maxlength="320" id="review" name="review" form="usrform">
          </textarea>
          <form action="" method="post" id="usrform">
          <input  style="width:10rem;
          height:2rem;
          font-family:Arial, Helvetica, sans-serif;
          font-size:1.3rem;
          background-color: rgba(166, 215, 133, 1);
          margin-top: 4%;
          border-radius: 10px;
          box-shadow: #0f0b0d;
          cursor: pointer;"
          type="submit" value="Submit Review" name="reviewed">
          <input type="hidden" name="sub" value="got">
          </form>
    </div>

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
     var review=document.getElementById("review");
     var usrform=document.getElementById("usrform");


     usrform.addEventListener("submit",(e)=>{
       e.preventDefault();
       let bool=true;
       if(review.value.trim()=="")
       {
         bool=false;
         alert("You have not entered anything to be submitted");
       }
       if(review.value.trim()!=""&&review.value.length<46)
       {
        bool=false;
         alert("Minimum charcters to be entered is 46,please enter some more words");
       }

       if(bool==true)
       {
           usrform.submit();
       }
     })
 
     logout.addEventListener("click",()=>{
       alert("Logging Out!");
       window.location.assign('logout.php');
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
 if(isset($_POST['sub']))
 {
     require('connection.php');
     extract($_POST);
     if(trim($review)=='')
     {
        echo "<script>alert('Review cannot be empty')</script>";
     }
     elseif(strlen($review)<46){
        echo "<script>alert('Minimum charcters to be entered is 46,please enter some more words')</script>"; 

     }
     else{
         $review=filter_var($review,513);
         $review=htmlentities($review,ENT_COMPAT, 'UTF-8');
         $ds=$db->prepare("insert into reviews (review,userid) values(:review,:userid)");
         $ds->bindParam(":review",$review);
         $ds->bindParam(":userid",$userid);
         $ds->execute();
         echo "<script>alert('Your Review has been recieved')</script>";
     }
 }
}
 ?>