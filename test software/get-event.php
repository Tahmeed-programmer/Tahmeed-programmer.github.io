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
elseif(isset($_GET["eventname"])){
    $userid=$_SESSION['adminid'];

    $validname="/^[a-zA-Z0-9-]+[ a-zA-Z0-9-]*$/";
    $validnum="/^[0-9]/";
     extract($_GET);
     if(!(preg_match($validname,$eventname)))
     {
        echo "<script>alert('Invalid name')</script>";
        echo "<script>window.location.assign('login.php')</script>";
        exit();
     }
    $ds=$db->query("select * from event where status!='finished' and ownerid='$userid'
    and eventname='$eventname'");
   $row=$ds->fetch(PDO::FETCH_ASSOC);
   $id=$row['eventid'];
   if(isset($_GET['tqnty1']))
  {
    if(!(preg_match($validnum,$tqnty1)))
    {
        echo "<script>alert('Invalid number')</script>";
        echo "<script>window.location.assign('login.php')</script>";
        exit();
    }
      $dm=$db->query("select * from ticket where eventid='$id'");
      $dm=$dm->fetch();
      echo $dm['categ1'];
      exit();
  }
    

     if($row['eventname']!=$eventname)
     {
        echo "<script>alert('Owner doesnt have any such event with this name')</script>";
        echo "<script>window.location.assign('login.php')</script>";
        exit();
     }
     $stadiumid=$row['stadiumid'];
     $dk=$db->query("select * from stadium where id='$stadiumid'");
     $dk=$dk->fetch();
     $dm=$db->query("select * from ticket where eventid='$id'");
     $dm=$dm->fetch();

     echo ' 
     <div style="display: flex;
     flex-wrap: wrap;
     justify-content: space-between;">
     <div>
         <p>Event Stadium</p>
         <input type="text"  value="'.$dk['stadium_name'].','.$dk['country'].'"
           id="stadiumname" name="eventstadium" >
     </div>
     <div>
         <p>Category 2 Tickets Quantity</p>
         <input type="number" value='.$dm['categ2'].'
         id="tqnty2"  name="ticketqnty2" >
     </div>
     </div>



     <div style="display: flex;
     flex-wrap: wrap;
     justify-content: space-between;">
     <div>
         <p>Event Date</p>
     <input type="date" id="eventdate" value='.$row['eventdate'].' 
      name="eventdate" >
     </div>
     <div>
         <p>Category 3 Tickets Quantity</p>
         <input type="number" id="tqnty3" value='.$dm['categ3'].'
          name="ticketqnty3" >
     </div>
     </div>

     <div style="display: flex;
     flex-wrap: wrap;
     justify-content: space-between;">
     <div>
         <p>Event Time</p>
     <input type="time" id="eventtime" name="eventtime"
     value="';
     $time=explode(":",$row['eventtime']);
     $time=$time[0].":".$time[1];
     echo $time.'" >
     </div>
     <div>
         <p>Category 4 Tickets Quantity</p>
         <input type="number" id="tqnty4" value='.$dm['categ4'].'
         name="ticketqnty4" >
     </div>
     </div>
     <div>
     <p> Event End time</p>
     <input type="time"  value="';
     $time=explode(":",$row['endeventtime']);
     $time=$time[0].":".$time[1];
     echo $time.'"
     name="endeventtime" >
 </div>
 
 <div>
 <p> Enter ticket price</p>
 <input type="number" readonly value='.$dm['ticketprice'].' name="ticketprice" >
</div>
        
 <div class="tabbutton">


     <button style="border-radius:5px;
     width:7rem;
     font-family: Arial, Helvetica, sans-serif;
font-weight: bold;
cursor: pointer;
background-color: #9dda93;" 
id="cancel1" onclick="redirect()">Cancel</button>
     <input type="submit" value="Edit" name="edit">
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
       border:2px solid black;background-color:wheat;" type="number" name="categp1" value="'.$dm['categp1'].'"></div>
   <div style="border: 2px solid black;">Category 2 <input style="
   margin-left:5%;text-align:center;width:6rem;
       border:2px solid black;background-color:wheat;" type="number" name="categp2" value="'.$dm['categp2'].'"></div>
   <div style="border: 2px solid black;">Category 3 <input style="
   margin-left:5%;text-align:center;width:6rem;
       border:2px solid black;background-color:wheat;" type="number" name="categp3" value="'.$dm['categp3'].'"></div>
   <div style="border: 2px solid black;">Category 4 <input style="
   margin-left:5%;text-align:center;width:6rem;
       border:2px solid black;background-color:wheat;" type="number" name="categp4" value="'.$dm['categp4'].'"></div>
</div>

<input type="hidden" name="got4" value="got4">
</form>'
;
     

}
elseif(isset($_GET['reventname'])){
    $userid=$_SESSION['adminid'];

    $validnum="/^[0-9]+/";
    $validname="/^[a-zA-Z0-9-]+[ a-zA-Z0-9-]*$/";
     extract($_GET);
     if(!(preg_match($validname,$reventname)))
     {
        echo "<script>alert('Invalid name')</script>";
        echo "<script>window.location.assign('login.php')</script>";
        exit();
     }
     $ds=$db->query("select * from event where status!='finished' and ownerid='$userid'
    and eventname='$reventname'");
   $row=$ds->fetch(PDO::FETCH_ASSOC);
   $id=$row['eventid'];

   if(isset($_GET['rtqnty1']))
  {
    if(!(preg_match($validnum,$rtqnty1)))
    {
        echo "<script>alert('Invalid number')</script>";
        echo "<script>window.location.assign('login.php')</script>";
        exit();
    }
      $dm=$db->query("select * from ticket where eventid='$id'");
      $dm=$dm->fetch();
      echo $dm['categ1'];
      exit();
  }

   if($row['eventname']!=$reventname)
     {
        echo "<script>alert('Owner doesnt have any such event with this name')</script>";
        echo "<script>window.location.assign('login.php')</script>";
        exit();
     }
     $stadiumid=$row['stadiumid'];
     $dk=$db->query("select * from stadium where id='$stadiumid'");
     $dk=$dk->fetch();
     $dm=$db->query("select * from ticket where eventid='$id'");
     $dm=$dm->fetch();

     echo '<div style="display: flex;
     flex-wrap: wrap;
     justify-content: space-between;">
     <div>
         <p>Event Stadium</p>
         <input type="text" readonly value="'.$dk['stadium_name'].','.$dk['country'].'"
         id="stadiumname" name="eventstadium" >
     </div>
     <div>
         <p>Category 2 Tickets Quantity</p>
         <input type="number" readonly value='.$dm['categ2'].'
         id="tqnty2"  name="ticketqnty2" >
     </div>
     </div>



     <div style="display: flex;
     flex-wrap: wrap;
     justify-content: space-between;">
     <div>
         <p>Event Date</p>
     <input type="date" id="eventdate" readonly value='.$row['eventdate'].' 
      name="eventdate" >
     </div>
     <div>
         <p>Category 3 Tickets Quantity</p>
         <input type="number" id="tqnty3" readonly value='.$dm['categ3'].'
          name="ticketqnty3" >
     </div>
     </div>

     <div style="display: flex;
     flex-wrap: wrap;
     justify-content: space-between;">
     <div>
         <p>Event Time</p>
     <input type="time" id="eventtime" readonly name="eventtime"
     value="';
     $time=explode(":",$row['eventtime']);
     $time=$time[0].":".$time[1];
     echo $time.'" >
     </div>
     <div>
         <p>Category 4 Tickets Quantity</p>
         <input type="number" readonly id="tqnty4" value='.$dm['categ4'].'
         name="ticketqnty4" >
     </div>
     </div>
     <div>
     <p> Event End time</p>
     <input type="time" readonly value="';
     $time=explode(":",$row['endeventtime']);
     $time=$time[0].":".$time[1];
     echo $time.'"
     name="endeventtime" >
 </div>
 <div>
 <p> Enter ticket price</p>
 <input type="number" readonly value='.$dm['ticketprice'].' name="ticketprice" >
</div>
 <div class="tabbutton">

     <button style="border-radius:5px;
     width:7rem;
     font-family: Arial, Helvetica, sans-serif;
font-weight: bold;
cursor: pointer;
background-color: #9dda93;
;" id="cancel1" onclick="redirect()">Cancel</button>
     <input type="submit" value="Remove" name="remove">
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
       border:2px solid black;background-color:wheat;" type="number" name="categp1" value="'.$dm['categp1'].'" readonly></div>
   <div style="border: 2px solid black;">Category 2 <input style="
   margin-left:5%;text-align:center;width:6rem;
       border:2px solid black;background-color:wheat;" type="number" name="categp2" value="'.$dm['categp2'].'" readonly></div>
   <div style="border: 2px solid black;">Category 3 <input style="
   margin-left:5%;text-align:center;width:6rem;
       border:2px solid black;background-color:wheat;" type="number" name="categp3" value="'.$dm['categp3'].'" readonly></div>
   <div style="border: 2px solid black;">Category 4 <input style="
   margin-left:5%;text-align:center;width:6rem;
       border:2px solid black;background-color:wheat;" type="number" name="categp4" value="'.$dm['categp4'].'" readonly></div>
</div>
<input type="hidden" name="got3" value="got3">
</form>';
     
     
}
?>