<?php
require('connection.php');
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
<body>
    <div id="bar-nav" class="bar-nav ">
        <div style="display: flex;justify-content:flex-end;
        cursor: pointer;">

            <i id="cross"style="color:red"
            class="fa-solid fa-bars fa-x fa-2x"></i>
        </div>
        <ul>
<li><a href="managestadiums.php">Stadiums</a></li>
<li><a href="aboutus.pphp">About</a></li>
<li><a href="contactus.php">Contact Us</a></li></ul>
    </div>
    <nav>
        <div class="check">
        <img class="img" src="images/logo.png">
<div class="logo-title">StudBook</div>
</div>




<div class="link-container extra3">
<ul >

<li ><a href="managestadiums.php">Stadiums</a></li>
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
           href="admin.php">
           <i class="fa-regular fa-user"></i>Profile</a></li>
          
          
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
    <h1 style="font-family:Arial, Helvetica, sans-serif;
    padding-left: 10%;font-size:2.1rem;">Manage Events</h1>
<div class="tabs">
    <button id="tabbtn1">Add a Event</button>
    <button id="tabbtn2">Edit a Event</button>
    <button  id="tabbtn3">Remove a Event</button>

</div>
<br>
<div id="tab1" class="hide">
    <h3 style="font-family:Arial, Helvetica, sans-serif;
    padding-left: 10%;font-size:2.1rem;">Add Event</h3>
 <div class="tab1" >
    <form action="" method="post">

 
        <div style="display: flex;
        flex-wrap: wrap;
        justify-content: space-between;">
        <div>
        <p >Event Name</p>
        <input type="text" name="eventname">
        </div>
        <div>
            <p>Category 1 Tickets Quantity</p>
            <input type="number" name="ticketqnty1" >
        </div>
        </div>


        <div style="display: flex;
        flex-wrap: wrap;
        justify-content: space-between;">
        <div>
            <p>Event Stadium</p>
            <select name="eventstadium" >
                <?php
                $ds=$db->query("select * from stadium");
                while($row=$ds->fetch())
                {
                  
                ?>
            <option value="<?php
            $str3=$row['stadium_name'].",".$row['country'];
            echo $str3;
             ?>"><?php
             $str3=$row['stadium_name'].",".$row['country'];
             echo $str3;
              ?></option>

            <?php
                }
            ?>
          </select>
        </div>
        <div>
            <p>Category 2 Tickets Quantity</p>
            <input type="number" name="ticketqnty2" >
        </div>
        </div>



        <div style="display: flex;
        flex-wrap: wrap;
        justify-content: space-between;">
        <div>
            <p>Event Date</p>
        <input type="date" name="eventdate" >
        </div>
        <div>
            <p>Category 3 Tickets Quantity</p>
            <input type="number" name="ticketqnty3" >
        </div>
        </div>

        <div style="display: flex;
        flex-wrap: wrap;
        justify-content: space-between;">
        <div>
            <p>Event Starting Time</p>
        <input type="time" name="eventtime" >
        </div>
        <div>
            <p>Category 4 Tickets Quantity</p>
            <input type="number" name="ticketqnty4" >
        </div>
        </div>

        <div>
            <p> Event End time</p>
            <input type="time" name="endeventtime" >
        </div>
        <div>
            <p> Enter ticket price</p>
            <input type="number" name="ticketprice" >
        </div>
    <div><p ></p></div>
      <div class="tabbutton">

          <button style="border-radius:5px;
          width:7rem;
          font-family: Arial, Helvetica, sans-serif;
    font-weight: bold;
    cursor: pointer;
    background-color: #9dda93;
  ;" id="cancel1" onclick="redirect()">Cancel</button>
          <input type="submit" value="Add" name="book">
      </div>
    

      <p style="font-family: Arial, Helvetica, sans-serif;">Deafult category prices. <br/>Click input feilds to Edit. <br/>As Per website policy 20 seats will be reserved for disabled
     <br><div style="display:flex;
    flex-direction: row;
    flex-wrap: wrap;
    align-items:center;
    font-family:Arial, Helvetica, sans-serif;
    font-size:1.3rem">
        <div style="border: 2px solid black;">Category 1
            <input style="
            margin-left:5%;text-align:center;width:6rem;
            border:2px solid black;background-color:wheat;" type="number" name="categp1" value="40"></div>
        <div style="border: 2px solid black;">Category 2 <input style="
        margin-left:5%;text-align:center;width:6rem;
            border:2px solid black;background-color:wheat;" type="number" name="categp2" value="30"></div>
        <div style="border: 2px solid black;">Category 3 <input style="
        margin-left:5%;text-align:center;width:6rem;
            border:2px solid black;background-color:wheat;" type="number" name="categp3" value="20"></div>
        <div style="border: 2px solid black;">Category 4 <input style="
        margin-left:5%;text-align:center;width:6rem;
            border:2px solid black;background-color:wheat;" type="number" name="categp4" value="12"></div>
    </div>
    
    <input type="hidden" value='got2' name="got2">
    </form>
  
  </div>
</div>
<div>
    <p></p>
</div>




<div id="tab2" class="hide">
    <h3 style="font-family:Arial, Helvetica, sans-serif;
    padding-left: 10%;font-size:2.1rem;">Edit Events</h3>

 <div class="tab1">
    <form action="" method="post">

 
        <div style="display: flex;
        flex-wrap: wrap;
        justify-content: space-between;">
        <div>
        <p >Event Name</p>
        <select name="eventtname" id="eventname" onchange="changes()">
        <?php
                $ds=$db->query("select * from event where status!='finished' and ownerid='$userid'");
                while($row=$ds->fetch())
                {
                  
                ?>
            <option value="<?php 
            echo $row['eventname'];
             ?>"><?php 
             echo $row['eventname'];
              ?></option>

            <?php
                }
            ?>
          </select>
        </div>
        <div>
            <p>Category 1 Tickets Quantity</p>
            <input type="number" id="tqnty1" name="tickettqnty1" >
        </div>
        </div>

      <div id="edit">
      
  

 </div>
</div>
<div>
    <p></p>
</div>
</div>







<div id="tab3" class="hide">
    <h3 style="font-family:Arial, Helvetica, sans-serif;
    padding-left: 10%;font-size:2.1rem;">Remove Events</h3>



 <div class="tab1">
    
 <form action="" method="post">

 
        <div style="display: flex;
        flex-wrap: wrap;
        justify-content: space-between;">
        <div>
        <p >Event Name</p>
        <select name="eventname" onchange="rchanges()" id="reventname">
        <?php
                $ds=$db->query("select * from event where status!='finished' and ownerid='$userid'");
                while($row=$ds->fetch())
                {
                  
                ?>
            <option value="<?php 
            echo $row['eventname'];
             ?>"><?php 
             echo $row['eventname'];
              ?></option>

            <?php
                }
            ?>
          </select>
         </div>
         <div>
         <p>Category 1 Tickets Quantity</p>
            <input type="number" readonly id="rtqnty1" name="ticketqnty1" >
        </div>
        </div>



        <div id="remove">

            </div>
 </div>

<div>
    <p></p>
</div>
 </div>


        



</body>

<script>
    const var1=document.getElementById("cancel1");
    var id3=document.getElementById("cross");
   var id4=document.getElementById("bar-nav");
   var id5=document.getElementById("hamburger");
   var dropdown=document.getElementById("dropdown");
   var newdrop=document.querySelector(".dropdowns");
   var tabbtn1=document.getElementById("tabbtn1");
   var tabbtn2=document.getElementById("tabbtn2");
   var tabbtn3=document.getElementById("tabbtn3");
   var tab1=document.getElementById("tab1");
   var tab2=document.getElementById("tab2");
   var tab3=document.getElementById("tab3");

   var eventname=document.getElementById('eventname');
   var edit=document.getElementById('edit');
   var remove=document.getElementById('remove');
   var tqnty1=document.getElementById('tqnty1');
   var rqnty1=document.getElementById('rqnty1');
   var reevent=document.getElementById('reevent');
   var estadiums=document.getElementById("estadiums");

   var logout=document.getElementById("logout");
 
     logout.addEventListener("click",()=>{
       alert("Logging Out!");
       window.location.assign('logout.php');
     })

   window.addEventListener("load",(event)=>{
    var xhr = new XMLHttpRequest();
    url='get-event.php?eventname='+eventname.value;
xhr.onreadystatechange = function() {
    if (xhr.readyState === 4){
        console.log(xhr.responseText);
       edit.innerHTML = xhr.responseText;
       
    }
};
xhr.open('POST', url);
xhr.send();
var xhk = new XMLHttpRequest();
    url='get-event.php?eventname='+eventname.value+'&tqnty1=1';
xhk.onreadystatechange = function() {
    if (xhk.readyState === 4){
        console.log(xhk.responseText);
       tqnty1.value = xhk.responseText;
       
    }
};
xhk.open('GET', url);
xhk.send();




var xhp = new XMLHttpRequest();
    url='get-event.php?reventname='+reventname.value;
xhp.onreadystatechange = function() {
    if (xhp.readyState === 4){
        console.log(xhp.responseText);
     remove.innerHTML = xhp.responseText;
       
    }
};
xhp.open('POST', url);
xhp.send();
var xhi = new XMLHttpRequest();
    url='get-event.php?reventname='+reventname.value+'&rtqnty1=1';
xhi.onreadystatechange = function() {
    if (xhi.readyState === 4){
        console.log(xhi.responseText);
       rtqnty1.value = xhi.responseText;
       
    }
};
xhi.open('GET', url);
xhi.send();
   })


function changes(){
    console.log("trye me");
    var xhr = new XMLHttpRequest();
    url='get-event.php?eventname='+eventname.value;
xhr.onreadystatechange = function() {
    if (xhr.readyState === 4){
        console.log(xhr.responseText);
       edit.innerHTML = xhr.responseText;
       
    }
};
xhr.open('POST', url);
xhr.send();
var xhk = new XMLHttpRequest();
    url='get-event.php?eventname='+eventname.value+'&tqnty1=1';
xhk.onreadystatechange = function() {
    if (xhk.readyState === 4){
        console.log(xhk.responseText);
       tqnty1.value = xhk.responseText;
       
    }
};
xhk.open('GET', url);
xhk.send();
   }




function rchanges()
{
    var xhp = new XMLHttpRequest();
    url='get-event.php?reventname='+reventname.value;
xhp.onreadystatechange = function() {
    if (xhp.readyState === 4){
        console.log(xhp.responseText);
     remove.innerHTML = xhp.responseText;
       
    }
};
xhp.open('POST', url);
xhp.send();
var xhi = new XMLHttpRequest();
    url='get-event.php?reventname='+reventname.value+'&rtqnty1=1';
xhi.onreadystatechange = function() {
    if (xhi.readyState === 4){
        console.log(xhi.responseText);
       rtqnty1.value = xhi.responseText;
       
    }
};
xhi.open('GET', url);
xhi.send();

}



  
   tabbtn1.addEventListener("click",()=>{
       console.log("hi");
       tab1.classList.add("show-dropdown");
       tab2.classList.remove("show-dropdown");
       tab3.classList.remove("show-dropdown");
   })

   tabbtn2.addEventListener("click",()=>{
       tab1.classList.remove("show-dropdown");
       tab2.classList.add("show-dropdown");
       tab3.classList.remove("show-dropdown");
   })

   tabbtn3.addEventListener("click",()=>{
       tab1.classList.remove("show-dropdown");
       tab2.classList.remove("show-dropdown");
       tab3.classList.add("show-dropdown");
   })
 
  function redirect()
   {
    tab1.classList.remove("show-dropdown");
       tab2.classList.remove("show-dropdown");
       tab3.classList.remove("show-dropdown");
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
</html>


<?php

require("test.php");

if(isset($_POST["got2"]))
{
   extract($_POST);
   $validname="/^[a-zA-Z0-9]{2,}[ a-zA-Z0-9-]*$/";


    $str1="";
    $valid=true;
    if(!isset($eventname))
    {
        $valid=false;
        $str1.="event name has not been entered!\\n";
    }
    $validticket="/^[1-9]+$/";
    if(!isset($ticketprice)){
        $valid=false;
         $str1.="ticket price has not been entered!\\n";
     }

     if(!isset($categp1)||!isset($categp2)||!isset($categp3)||!isset($categp4)){
        $valid=false;
         $str1.="Price for one of the categories is missing!\\n";
     }
    if(!isset($ticketqnty1)){
       $valid=false;
        $str1.="ticket for category 1 has not been entered!\\n";
    }
    if(!isset($ticketqnty2)){
        $valid=false;
         $str1.="ticket for category 2 has not been entered!\\n";
     }
     if(!isset($ticketqnty3)){
        $valid=false;
         $str1.="ticket for category 3 has not been entered!\\n";
     }
     if(!isset($ticketqnty4)){
        $valid=false;
         $str1.="ticket for category 4 has not been entered!\\n";
     }
     
     $stadiumcountry="";
     if(!isset($eventstadium)){
        $valid=false;
         $str1.="stadium has not been selected!\\n";
     }
     else{
         $try=explode(",",$eventstadium);
         $eventstadium=$try[0];
         $stadiumcountry=$try[1]; 

     }
     if(!isset($eventdate)){
        $valid=false;
         $str1.="eventdate has not been entered!\\n";
     }
     if(!isset($eventtime)){
        $valid=false;
         $str1.="eventtime has not been entered!\\n";
     }
     
     $validname="/^[a-zA-Z0-9]{2,}[ a-zA-Z0-9-]*$/";

     $validnum="/^0$|(^[1-9]{1}[0-9]{2,}$)/";

     if(!(preg_match($validname,$eventname))&& !(preg_match($validname,$eventstadium)))
     {
         $valid=false;
         $str1.='Invalid name entered for event or stadium\\n';
     }

     $validnum1="/^[1-9]{1,}[0-9]*$/";
     if(!(preg_match($validnum,$ticketqnty1))||!(preg_match($validnum,$ticketqnty2))
     ||!(preg_match($validnum,$ticketqnty3))||!(preg_match($validnum,$ticketqnty4)))
     {
        $valid=false;
        $str1.='Invalid Ticket quantity entered for one of the categories of tickets\\n';
     }

     if(!(preg_match($validnum1,$categp1))||!(preg_match($validnum1,$categp2))
     ||!(preg_match($validnum1,$categp3))||!(preg_match($validnum1,$categp4)))
     {
        $valid=false;
        $str1.='Invalid Price entered for one of the categories of tickets\\n';
     }
     $validdate="/^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/";
     if(!(preg_match($validticket,$ticketprice)))
     {
        $valid=false;
        $str1.='Invalid Ticket price entered\\n';

     }

     $currentdate=date("Y-m-d");
     if($currentdate>$eventdate)
    {
        $valid=false;
        $str1.='Invalid date entered\\n';
    }
     if(!(preg_match($validdate,$eventdate)))
     {
        $valid=false;
        $str1.='Invalid date format entered\\n';
     }

     if($eventtime>=$endeventtime)
     {
        $valid=false;
        $str1.='Start event time cannot be equal to or greater than end time!!\\n'; 
     }

     

    

     if($valid==false)
 {
    $str2=nl2br($str1);
       echo "<script>alert('".$str1."')</script>"; 
 }
 else{
     $ds=$db->query("select * from stadium where stadium_name='$eventstadium' and
      country='$stadiumcountry'");
      $row=$ds->fetch();
      $stadiumid=$row['id']; //get stadium id
      $capacity=$row['capacity'];
      $total=$ticketqnty1+$ticketqnty2+$ticketqnty3+$ticketqnty4;
     
      echo "<script>alert('".$eventtime."')</script>";
      echo "<script>alert('".$endeventtime."')</script>"; 
 
      $dm=$db->query("select * from event where stadiumid='$stadiumid' and 
      eventdate='$eventdate' and eventtime='$eventtime' ");
      $dm=$dm->fetch();
      $dn=$db->query("select * from event where stadiumid='$stadiumid' and 
      eventdate='$eventdate'and endeventtime='$endeventtime' ");
     $dn=$dn->fetch();

     $dh=$db->query("select * from event where stadiumid='$stadiumid' and 
     eventname='$eventname' and status!='finished'");
     $dh=$dh->fetch();
     if(isset($dh['eventname']))
     {
        echo "<script>alert('Choose another event name as this event already exists and is upcoming')</script>";
    }
    elseif($total>$capacity)
    {
       echo "<script>alert('You have exceeded the capacity of stadium seats')</script>";
    }
    
    
    elseif(isset($dm['starteventtime'])&& isset($dn['endeventtime']))
     {
         echo "<script>alert('Choose another start and event time as the one selected clashes')</script>";
     }
     else{
        $dm=$db->query("select * from event where stadiumid='$stadiumid' and 
        eventdate='$eventdate' and eventtime between '$eventtime' and '$endeventtime' ");
       $dm=$dm->fetch();  
       if(isset($dm['eventtime']))
     {
         echo "<script>alert('Choose another end time as the one selected clashes')</script>";
     }
     else{
        $dm=$db->query("select * from event where stadiumid='$stadiumid' and 
        eventdate='$eventdate' and endeventtime between '$eventtime' and '$endeventtime' ");
       $dm=$dm->fetch(); 
       if(isset($dm['endeventtime']))
       {
           echo "<script>alert('Choose another start time as the one selected clashes')</script>";
       }
       else{

        $status="upcoming";
        $ds=$db->prepare('Insert into event(eventname,eventdate,eventtime,endeventtime,ownerid,stadiumid,status) 
        VALUES(:eventname,:eventdate,:eventtime,:endeventtime,:ownerid,:stadiumid,:status)');
        $ds->bindParam(':eventname',$eventname);
        $ds->bindParam(':eventdate',$eventdate);
        $ds->bindParam(':eventtime',$eventtime);
        $ds->bindParam(':ownerid',$userid);
        $ds->bindParam(':stadiumid',$stadiumid);
        $ds->bindParam(':endeventtime',$endeventtime);
        $ds->bindParam(":status",$status);
        $ds->execute();

        $eventid = $db->lastInsertId();
        if($total<$capacity)
     {
         $remaining=$capacity-$total;
         $ticketqnty4=$ticketqnty4+$remaining;
     }

        echo "<script>alert('HELOOOO')</script>";
       

        $ds=$db->prepare('Insert into ticket(eventid,ticketprice,categ1,categ2,categ3,categ4,categp1,
        categp2,categp3,categp4) 
        VALUES(:eventid,:ticketprice,:categ1,:categ2,:categ3,:categ4,
        :categp1,:categp2,:categp3,:categp4)');
        $ds->bindParam(':eventid',$eventid);
        $ds->bindParam(':ticketprice',$ticketprice);
        $ds->bindParam(':categ1',$ticketqnty1);
        $ds->bindParam(':categ2',$ticketqnty2);
        $ds->bindParam(':categ3',$ticketqnty3);
        $ds->bindParam(':categ4',$ticketqnty4);
        $ds->bindParam(':categp1',$categp1);
        $ds->bindParam(':categp2',$categp2);
        $ds->bindParam(':categp3',$categp3);
        $ds->bindParam(':categp4',$categp4);
        $ds->execute();
        echo "<script>alert('Event has been sucessfully added to the database')</script>";
       echo "<script>window.location.assign('manageEvents.php')</script>";


       }
     }
     }

    }
    

 }

 elseif(isset($_POST["edit"]))
{
    extract($_POST);
   $validname="/^[a-zA-Z0-9]{2,}[ a-zA-Z0-9-]*$/";


    $str1="";
    $valid=true;
    echo "<script>alert('".$eventtname."')</script>";
    if(!isset($eventtname))
    {
        $valid=false;
        $str1.="event name has not been entered!\\n";
    }
    $validticket="/^[1-9]+$/";
    if(!isset($ticketprice)){
        $valid=false;
         $str1.="ticket price has not been entered!\\n";
     }
    if(!isset($tickettqnty1)){
       $valid=false;
        $str1.="ticket for category 1 has not been entered!\\n";
    }
    if(!isset($ticketqnty2)){
        $valid=false;
         $str1.="ticket for category 2 has not been entered!\\n";
     }
     if(!isset($ticketqnty3)){
        $valid=false;
         $str1.="ticket for category 3 has not been entered!\\n";
     }
     if(!isset($ticketqnty4)){
        $valid=false;
         $str1.="ticket for category 4 has not been entered!\\n";
     }

     if(!isset($categp1)||!isset($categp2)||!isset($categp3)||!isset($categp4)){
        $valid=false;
         $str1.="Price for one of the categories is missing!\\n";
     }

     $validnum1="/^[1-9]{1,}[0-9]*$/";

     if(!(preg_match($validnum1,$categp1))||!(preg_match($validnum1,$categp2))
     ||!(preg_match($validnum1,$categp3))||!(preg_match($validnum1,$categp4)))
     {
        $valid=false;
        $str1.='Invalid Price entered for one of the categories of tickets\\n';
     }
     
     $stadiumcountry="";
     if(!isset($eventstadium)){
        $valid=false;
         $str1.="stadium has not been selected!\\n";
     }
     else{
         $try=explode(",",$eventstadium);
         $eventstadium=$try[0];
         $stadiumcountry=$try[1]; 

         if(!isset($stadiumcountry))
         {
            $valid=false;
            $str1.="stadium country has not been selected!\\n";
         }

     }
     if(!isset($eventdate)){
        $valid=false;
         $str1.="eventdate has not been entered!\\n";
     }if(!isset($eventtime)){
        $valid=false;
         $str1.="eventtime has not been entered!\\n";
     }
     $validname="/^[a-zA-Z0-9]{2,}[ a-zA-Z0-9-]*$/";

     $validnum="/^0$|(^[1-9]{1}[0-9]{2,}$)/";

     if(!(preg_match($validname,$eventtname))&& !(preg_match($validname,$eventstadium)))
     {
         $valid=false;
         $str1.='Invalid name entered for event or stadium\\n';
     }
     if(!(preg_match($validnum,$tickettqnty1))||!(preg_match($validnum,$ticketqnty2))
     ||!(preg_match($validnum,$ticketqnty3))||!(preg_match($validnum,$ticketqnty4)))
     {
        $valid=false;
        $str1.='Invalid Ticket quantity entered for one of the categories of tickets\\n';
     }
     $validdate="/^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/";
     if(!(preg_match($validticket,$ticketprice)))
     {
        $valid=false;
        $str1.='Invalid Ticket price entered\\n';

     }
     if(!(preg_match($validdate,$eventdate)))
     {
        $valid=false;
        $str1.='Invalid date entered\\n';
     }

     if($eventtime>=$endeventtime)
     {
        $valid=false;
        $str1.='Start event time cannot be equal to or greater than end time!!\\n'; 
     }

    
    

     if($valid==false)
 {
    $str2=nl2br($str1);
       echo "<script>alert('".$str1."')</script>"; 
 }
 else{
     $ds=$db->query("select * from stadium where stadium_name='$eventstadium' and
      country='$stadiumcountry'");

      $row=$ds->fetch();
      $stadiumid=$row['id']; //get stadium id
      $userid=$_SESSION['adminid'];
      
      
      $capacity=$row['capacity'];
      $total=$tickettqnty1+$ticketqnty2+$ticketqnty3+$ticketqnty4;

     

      //check whether correct owner is acessing it
      $dh=$db->query("select * from event where stadiumid='$stadiumid' and 
      eventname='$eventtname' and ownerid='$userid'");
      $dh=$dh->fetch();
      $eventid=$dh['eventid'];
 
    



      if(!(isset($dh['ownerid'])))
      {
         echo "<script>alert('This admin is not authorized to edit this event')</script>";
         echo "<script>window.location.assign('manageEvents.php')</script>";
     }
     elseif($total>$capacity)
     {
        echo "<script>alert('You have exceeded the capacity of stadium seats')</script>";
        echo "<script>window.location.assign('manageEvents.php')</script>";
     }

     else
     {
      $dm=$db->query("select * from event where stadiumid='$stadiumid' and 
      eventdate='$eventdate' and eventtime='$eventtime' and eventid!='$eventid'  ");
      $dm=$dm->fetch();
      $dn=$db->query("select * from event where stadiumid='$stadiumid' and 
      eventdate='$eventdate'and endeventtime='$endeventtime' and eventid!='$eventid' ");
     $dn=$dn->fetch();

     if($total<$capacity)
     {
         $remaining=$capacity-$total;
         $ticketqnty4=$ticketqnty4+$remaining;
     }
    
     if(isset($dm['starteventtime'])&& isset($dn['endeventtime']))
     {
         echo "<script>alert('Choose another start and event time as the one selected clashes')</script>";
     }
     else{
        $dm=$db->query("select * from event where stadiumid='$stadiumid' and 
        eventdate='$eventdate' and eventtime between '$eventtime' and '$endeventtime' and eventid!='$eventid' ");
       $dm=$dm->fetch();  
       if(isset($dm['eventtime']))
     {
         echo "<script>alert('Choose another end time as the one selected clashes')</script>";
     }
     else{
        $dm=$db->query("select * from event where stadiumid='$stadiumid' and 
        eventdate='$eventdate' and endeventtime between '$eventtime' and '$endeventtime'
        and eventid!='$eventid' ");
       $dm=$dm->fetch(); 
       if(isset($dm['endeventtime']))
       {
           echo "<script>alert('Choose another start time as the one selected clashes')</script>";
       }
       else{

        
        $ds=$db->prepare('update event set eventdate=:eventdate, eventtime=:eventtime,
        endeventtime=:endeventtime where eventid=:eventid');
        $ds->bindParam(':eventdate',$eventdate);
        $ds->bindParam(':eventtime',$eventtime);
        $ds->bindParam(':endeventtime',$endeventtime);
        $ds->bindParam(':eventid',$eventid);
        $ds->execute();

        $ds=$db->prepare('update ticket set ticketprice=:ticketprice,categ1=:categ1,
        categ2=:categ2,categ3=:categ3,categ4=:categ4,categp1=:categp1,
        categp2=:categp2,categp3=:categp3,categp4=:categp4 where eventid=:eventid');
        $ds->bindParam(':eventid',$eventid);
        $ds->bindParam(':ticketprice',$ticketprice);
        $ds->bindParam(':categ1',$tickettqnty1);
        $ds->bindParam(':categ2',$ticketqnty2);
        $ds->bindParam(':categ3',$ticketqnty3);
        $ds->bindParam(':categ4',$ticketqnty4);
        $ds->bindParam(':eventid',$eventid);
        $ds->bindParam(':categp1',$categp1);
        $ds->bindParam(':categp2',$categp2);
        $ds->bindParam(':categp3',$categp3);
        $ds->bindParam(':categp4',$categp4);
        $ds->execute();
        echo "<script>alert('Event details has been sucessfully updated or default')</script>";
       echo "<script>window.location.assign('manageEvents.php')</script>";


       }
     }
     }

     }
    }
}
elseif(isset($_POST['got3']))
{
    extract($_POST);
    $validname="/^[a-zA-Z0-9]{2,}[ a-zA-Z0-9-]*$/";
 
 
     $str1="";
     $valid=true;
     if(!isset($eventname))
     {
         $valid=false;
         $str1.="event name has not been entered!\\n";
     }
     $validticket="/^[1-9]+$/";
     if(!isset($ticketprice)){
         $valid=false;
          $str1.="ticket price has not been entered!\\n";
      }
     if(!isset($ticketqnty1)){
        $valid=false;
         $str1.="ticket for category 1 has not been entered!\\n";
     }
     if(!isset($ticketqnty2)){
         $valid=false;
          $str1.="ticket for category 2 has not been entered!\\n";
      }
      if(!isset($ticketqnty3)){
         $valid=false;
          $str1.="ticket for category 3 has not been entered!\\n";
      }
      if(!isset($ticketqnty4)){
         $valid=false;
          $str1.="ticket for category 4 has not been entered!\\n";
      }
      
      $stadiumcountry="";
      if(!isset($eventstadium)){
         $valid=false;
          $str1.="stadium has not been selected!\\n";
      }
      else{
          $try=explode(",",$eventstadium);
          $eventstadium=$try[0];
          $stadiumcountry=$try[1]; 
 
          if(!isset($stadiumcountry))
          {
             $valid=false;
             $str1.="stadium country has not been selected!\\n";
          }
 
      }
      if(!isset($eventdate)){
         $valid=false;
          $str1.="eventdate has not been entered!\\n";
      }if(!isset($eventtime)){
         $valid=false;
          $str1.="eventtime has not been entered!\\n";
      }
      $validname="/^[a-zA-Z0-9]{2,}[ a-zA-Z0-9-]*$/";
 
      $validnum="/^0$|(^[1-9]{1}[0-9]{2,}$)/";
 
      if(!(preg_match($validname,$eventname))&& !(preg_match($validname,$eventstadium)))
      {
          $valid=false;
          $str1.='Invalid name entered for event or stadium\\n';
      }
      if(!(preg_match($validnum,$ticketqnty1))||!(preg_match($validnum,$ticketqnty2))
      ||!(preg_match($validnum,$ticketqnty3))||!(preg_match($validnum,$ticketqnty4)))
      {
         $valid=false;
         $str1.='Invalid Ticket quantity entered for one of the categories of tickets\\n';
      }
      $validdate="/^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/";
      if(!(preg_match($validticket,$ticketprice)))
      {
         $valid=false;
         $str1.='Invalid Ticket price entered\\n';
 
      }
      $validnum1="/^[1-9]{1,}[0-9]*$/";
      if(!(preg_match($validnum1,$categp1))||!(preg_match($validnum1,$categp2))
     ||!(preg_match($validnum1,$categp3))||!(preg_match($validnum1,$categp4)))
     {
        $valid=false;
        $str1.='Invalid Price entered for one of the categories of tickets\\n';
     }
      if(!(preg_match($validdate,$eventdate)))
      {
         $valid=false;
         $str1.='Invalid date entered\\n';
      }
 
      if($eventtime>=$endeventtime)
      {
         $valid=false;
         $str1.='Start event time cannot be equal to or greater than end time!!\\n'; 
      }
 
      
 
     
 
      if($valid==false)
  {
     $str2=nl2br($str1);
        echo "<script>alert('".$str1."')</script>"; 
  }
  

  else{
    $ds=$db->query("select * from stadium where stadium_name='$eventstadium' and
    country='$stadiumcountry'");

    $row=$ds->fetch();
    $stadiumid=$row['id']; //get stadium id
    $capacity=$row['capacity'];
    $total=$ticketqnty1+$ticketqnty2+$ticketqnty3+$ticketqnty4;

   

    //check whether correct owner is acessing it
    $dh=$db->query("select * from event where stadiumid='$stadiumid' and 
    eventname='$eventname' and ownerid='$userid'");
    $dh=$dh->fetch();
    $eventid=$dh['eventid'];


    if(!(isset($dh['ownerid'])))
    {
       echo "<script>alert('This admin is not authorized to edit this event')</script>";
   }
   elseif($total>$capacity)
    {
       echo "<script>alert('You have exceeded the capacity of stadium seats')</script>";
    }
   else{
    $ds=$db->prepare("delete from event where eventid=:eventid");
    $dk=$db->prepare("delete from ticket where eventid=:eventid");

    
    $ds->bindParam(":eventid",$eventid);
    $dk->bindParam(":eventid",$eventid);
    $dk->execute();
    $ds->execute();
    echo "<script>alert('Event has been sucessfully deleted')</script>";
    echo "<script>window.location.assign('manageEvents.php')</script>";

   }






  }
}


}






?>