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
  
    if(isset($_POST['seeevent']))
{
  extract($_POST);
  $ds=$db->query("select * from event where stadiumid='$stadiumid' and status!='finished'");


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
<li><a href="aboutus.html">About</a></li>
<li><a href="contactus.html">Contact Us</a></li></ul>
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

<h1 style="font-family:Arial, Helvetica, sans-serif;
padding-left: 10%;font-size:2.1rem;">Choose Event to Book</h1>

<div class="event-boxes">

<?php
$row1=$ds->fetch();
if(!(isset($row1['eventname'])))
{
    echo "<p>No Events Available for this Stadium</p>";
} 
else{
while($row=$ds->fetch())
{
    $dk=$db->query("select * from stadium where id='$stadiumid'");
    $dk=$dk->fetch();
  echo ' <div class="event-box">
  <p 
  style="font-family:sans-serif;
  font-weight: bold;
  color: #130e0f;
  font-size: 1.7rem;">'.$row['eventname'].'</p>
      <img src="images/estadio-bernabeu-vista-aerea-c-turismo-madrid.jpg_1014274486.jpg" alt="">
  <div>
      <i class="fa fa-map-marker-alt"></i>
  '.$dk['location'].','.$dk['country'].'
  </div>
 <div>
  <i class="fas fa-calendar-alt"></i>
    '.$row['eventdate'].'
 </div>
  <div>
      <i class="fas fa-clock"></i> '.$row['eventtime'].'
</div>
  <p style="margin-top:1%;
  font-family:sans-serif;
  margin-bottom:1%">Starting from 25$</p>
  <form action="book1.php" method="post">
      <input type="hidden" value="'.$row['eventid'].'" name="eventid">
      <input type="hidden" value="'.$row['eventdate'].'" name="eventdate">
      <input type="hidden" value="'.$row['eventname'].'" name="eventname">
    

      <div style="display:flex;
      justify-content:center;
      align-items:center;"> <input style="width:80%;
      margin-left:0%;background-color: #B4CFB0;
border-radius: 10px;" type="submit" value="Book"
          name="book"></div>

  </form>
</div>';
}
}
?>



</div>

<br/>
<br/>
</body>



<script>
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
</script>

</html>

 <?php
  }

?>