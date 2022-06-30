<?php
require("connection.php");

if(isset($_SESSION['userid']))
{
    echo "<script>alert('Not Authorized to view page!')</script>";
    echo "<script>window.location.assign('login.php')</script>";
}

session_start();
if(!isset($_SESSION['adminid']))
{
    echo "<script>alert('Not logged in! Redirecting to login page')</script>";
    echo "<script>window.location.assign('login.php')</script>";
}
else{
    $userid=$_SESSION['adminid'];

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
        <div style="display:flex;justify-content:flex-end;
        cursor: pointer;margin-right:10px;">        

            <i id="cross"style="color:red;margin-right:8px;"
            class="fa-solid fa-bars fa-x fa-2x"></i>
        </div>
        <ul>
<li><a href="">Book</a></li>
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

<li><a style="cursor:pointer" href="managestadiums.php">Manage Stadiums</a></li>
<li><a href="aboutus.html">About</a></li>
<li><a href="contactus.php">Contact Us</a></li></ul>
    </div>

   

    <div class="end-buttons"
    style="display:flex;
    margin-right:5px;
           flex-direction:column;
          bottom:2%;">
        <i id="user"  style="color:#3A3335;
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
  <div class="new-nav2">
    <ul>
       <li><a style="cursor:pointer" href="managestadiums.php">Manage Stadiums</a></li>
       <li><a href="manageEvents.php">Manage Events</a></li>
       <li><a href="managetickets.php">Manage Tickets</a></li>
       <li><a href="managepayments.php">Manage Payments</a></li>
       <li><a href="">Generate Reports</a></li>
    </ul>
</div>


<div style="overflow-x:auto;
   margin-top: 10vh;">
<table class="content-table">
       <thead>
      <tr><th>Event Name</th><th>Category1 Tickets</th><th>Category2 Tickets</th><th>Category3 Tickets</th><th>Category4 Ticekts</th>
      </tr>
    </thead>
    <tbody>
        <?php
        $ds=$db->query("select * from event where ownerid='$userid'");
        while($row=$ds->fetch())
        {
            $eventid=$row['eventid'];
            $eventname=$row['eventname'];
            $dk=$db->query("select * from ticket where eventid='$eventid'");
            $ticketid=$dk->fetch();
            $category1=$ticketid['categ1'];
            $category2=$ticketid['categ2'];
            $category3=$ticketid['categ3'];
            $category4=$ticketid['categ4'];
            
              
              echo "<tr>
              <td>$eventname</td>
              <td>$category1</td>
              <td>$category2</td>
              <td>$category3</td>
              <td>$category4</td>
            </tr>";
            
            
        }
        ?>
     
    </tbody>
  </table>
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
}
?>