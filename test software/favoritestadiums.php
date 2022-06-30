<?php
require("connection.php");
session_start();
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
       <li><a href="">My Recent Visited Events</a></li>
    </ul>
</div>

<div>

</div>
<div class="event-boxes" id="event-boxes">





<?php

$ds=$db->query("select * from favorite where userid='$userid'");
while($row1=$ds->fetch())
{
    $stadiumid=$row1['stadiumid'];
    $dl=$db->query("select * from stadium where id='$stadiumid'");
    $row=$dl->fetch();
   echo '
   <div class="event-box">
   <p 
   style="font-family:sans-serif;
   font-weight: bold;
   color: #130e0f;
   font-size: 1.7rem;">'.$row['stadium_name'].'</p>
       <img src="images/estadio-bernabeu-vista-aerea-c-turismo-madrid.jpg_1014274486.jpg" alt="">
   <div>
   <i style="color: #130e0f;"class="fa fa-database"></i>
   '.$row['capacity'].'
   </div>
  <div>
     <i style="color: #130e0f;" class="fa fa-wheelchair"></i>
     '.$row['disabled_services'].'
  </div>
   <div>
        <i style="color: black;" class="fa fa-burger"></i> '.$row['foodservices'].'
 </div>
   <p style="margin-top:1%;
   font-family:sans-serif;">Starting from 25$</p>
   <form action="see-event.php" method="post" id="form1">
       <input type="hidden" value="'.$row['id'].'" name="stadiumid">
       <div style="display:flex;
       justify-content:center;
       align-items:center;"><button style="pointer:cursor;" type="button">
       '; 
       $stadiumid=$row['id'];
       $dk=$db->query("select * from favorite where userid='$userid'
            and stadiumid='$stadiumid'");
            $dk=$dk->fetch();
            if(isset($dk['userid']))
            {
                echo'
                <i style="color:yellow"
                onclick=star(this) class="fa fa-star" aria-hidden="true" value="'.$row['id'].'"></i>
                </button> <input type="submit" value="See Events"
                    name="seeevent"></div>
         
            </form>
          </div>';
            }
            else{

                echo'
                <i onclick=star(this) class="fa fa-star" aria-hidden="true" value="'.$row['id'].'"></i>
                </button> <input type="submit" value="See Events"
                    name="seeevent"></div>
         
            </form>
          </div>';
            }
        }
?>


 </div>
<script>
      var id3=document.getElementById("cross");
     var id4=document.getElementById("bar-nav");
     var id5=document.getElementById("hamburger");
     var dropdown=document.getElementById("dropdown");
     var newdrop=document.querySelector(".dropdowns");
     var logout=document.getElementById("logout");

     function star(e){
         
         var xhp = new XMLHttpRequest();
     url='addfav.php?stadid='+e.getAttribute('value');
 xhp.onreadystatechange = function() {
     if (xhp.readyState === 4){
         console.log(xhp.responseText);
         if(xhp.responseText=="Added")
         {
             alert("Added to Favorites");
             e.style.color="yellow";
         }
         else{
             alert("Removed from favorites");
             e.style.color=xhp.responseText;
             location.reload();
         }
        
     }
 
 };
 xhp.open('GET', url);
 xhp.send();
      }
 
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
</body>
</html>


<?php

}
?>