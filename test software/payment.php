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
    $eventid=$_SESSION['eventid'];
    $stadiumid=$_SESSION['stadiumid'];
    
    if($_POST['pay'])
    {
        
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

<li ><a href="">Book</a></li>
<li><a href="">About</a></li>
<li><a href="">Contact Us</a></li></ul>
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
<div class="new-nav">
    <ul>
       <li><a style="cursor:pointer" href="tickets.php">My Tickets</a></li>
       <li><a href="favoritestadiums.php">My Favorite Stadiums</a></li>
       <li><a href="">My Recent Visited Events</a></li>
    </ul>
</div>





<?php
      extract($_POST);
      $validnum="/^0$||(^[1-9]{1,}[0-9]+$)/";
      //category,disab
      $ds=$db->query("select * from stadium where id='$stadiumid'");
      $ds=$ds->fetch();
      if(isset($disabledservices))
      {
        if($disabledservices=='yes'&& !isset($category))
        {
            $category='categ1';
        }

      }
      if(!isset($category))
      {echo "<script>alert('A value of Category should be selected')</script>";}
      elseif(!($category=='categ1'||$category=='categ2'||$category=='categ3'||$category=='categ4')){
        echo "<script>alert('Invalid value selected for category')</script>";
      }
      else{
          $dj=$db->query("select * from ticket where eventid='$eventid' ");
          $dj=$dj->fetch();
          if($dj[$category]==0)
          {
            echo "<script>alert('Category is not available')</script>";
        }
      elseif($ds['disabled_services']=='yes')
      {
         if(!(isset($disabledservices)))
         {
            echo "<script>alert('A value of disabled services should be selected')</script>";
         }
         else{
             if($disabledservices=='yes'||$disabledservices=='no')
             {
                 if($ds['disabled_services']=='no'&&$disabledservices=='yes')
                 echo "<script>alert('wrong value entered for disabled services for this stadium')</script>";
                 elseif($disabledservices=='yes')
                 {
                    $dj=$db->query("select * from ticket where eventid='$eventid' ");
                    $dj=$dj->fetch();
                    $carprice=0;
                     $extraprice1=20;
                     $_SESSION["category"]=$category;
                     $categoryprice=explode('g',$category);
                     
                     $categoryprice=$categoryprice[0].'gp'.$categoryprice[1];
                     $dj=$db->query("select * from ticket where eventid='$eventid' ");
                     $dj=$dj->fetch();
                     $categoryprice=$dj[$categoryprice];
                     $eventid=$_SESSION['eventid'];
                     $dk=$db->query("select * from car where userid='$userid'
                     and stadiumid='$stadiumid' and eventid='$eventid'");
                     $dk=$dk->fetch();
                     if(isset($dk['userid']))
                     {
                         $carprice=10;
                     }
                     $total=$extraprice1+$categoryprice+$carprice;
                     $_SESSION['total']=$total;
                     $dp=$db->query("select * from stadium where id='$stadiumid' ");
                     $dp=$dp->fetch();
                     $price9=$dp['disabledseats'];
                     $price9=$price9-1;
                     $do=$db->prepare("update stadium set disabledseats=:newval where 
          id=:stadiumid ");
          $do->bindParam(":stadiumid",$stadiumid);
          $do->bindParam(":newval",$price9);
          $do->execute();
                     echo '<form action="" method="post">
                     <div style="display:flex;
                     justify-content:center;
                     margin-top:6%">
                     <div class="summary-card1">
                         <h1 style="text-align:center;
                       font-size: 2rem;">
                       Please fill out your card information
                       </h1>
                       <div style="display:flex;
                       justify-content: space-between;">
                           <div>
                           <p style="margin-bottom: 1%;">Card Number</p>
                           <input name="cardno" id="ccn" type="tel" inputmode="numeric" pattern="[0-9\s]{13,19}" autocomplete="cc-number" maxlength="19" placeholder="xxxx xxxx xxxx xxxx">
                           <img src="images/credicard-logo-png-3.png" alt="">
                       </div>
                         </div>
                 
                         <div>
                             <p>Expiry Date</p>
                             <input type="date" name="date">
                         </div>
                         <div style="display:flex;
                         justify-content:space-between">
                             <div>
                             <p>Security Code</p>
                             <input type="password" name="code" style="margin-bottom:0%;">
                             </div>
                         
                             <img class="sec" style="margin-top:0%;" src="images/cvv.png" alt="">
                             
                         </div>
                         <div style="border: 1px solid #727070;
                                 width:90%;
                                 margin-left:2%;
                                 "></div>
                 
                 <div style="display:flex;
                 justify-content:space-between;">
                     <div >
                      Total Price
                           </div>
                       <div> '.$total.'
                           </div>
                         
                     </div>
                 
                     <div>
                         <p></p>
                     </div>
                     </div>
                 
                 
                     </div>
                     <div class="tabbutton" style="display:flex;
                     justify-content:center ;
                     ">
                     
                         <button type="button"style="border-radius:5px;
                         width:7rem;
                         font-family: Arial, Helvetica, sans-serif;
                     font-weight: bold;
                     cursor: pointer;
                     background-color:rgba(180, 207, 176, 1);
                     ;
                     ;" id="cancel1" onclick="redirect()">Cancel</button>
                         <input style="margin-left:4%;" type="submit" value="Pay" name="pays">
                     </div>
                     </form>
                     <br/>
                     <br/>';
                          

                 }
                 else{
                    $dj=$db->query("select * from ticket where eventid='$eventid' ");
                    $dj=$dj->fetch();
                    $carprice=0;
                    $_SESSION["category"]=$category;
                     $categoryprice=explode('g',$category);
                     $categoryprice=$categoryprice[0].'gp'.$categoryprice[1];
                     $dj=$db->query("select * from ticket where eventid='$eventid' ");
                     $dj=$dj->fetch();
                     $categoryprice=$dj[$categoryprice];
                     $eventid=$_SESSION['eventid'];
                     $dk=$db->query("select * from car where userid='$userid'
                     and stadiumid='$stadiumid' and eventid='$eventid'");
                     $dk=$dk->fetch();
                     if(isset($dk['userid']))
                     {
                         $carprice=10;
                     }
                     $total=$categoryprice+$carprice;
                     $_SESSION['total']=$total;
                     echo '<form action="" method="post">
                     <div style="display:flex;
                     justify-content:center;
                     margin-top:6%">
                     <div class="summary-card1">
                         <h1 style="text-align:center;
                       font-size: 2rem;">
                       Please fill out your card information
                       </h1>
                       <div style="display:flex;
                       justify-content: space-between;">
                           <div>
                           <p style="margin-bottom: 1%;">Card Number</p>
                           <input name="cardno" id="ccn" type="tel" inputmode="numeric" pattern="[0-9\s]{13,19}" autocomplete="cc-number" maxlength="19" placeholder="xxxx xxxx xxxx xxxx">
                           <img src="images/credicard-logo-png-3.png" alt="">
                       </div>
                         </div>
                 
                         <div>
                             <p>Expiry Date</p>
                             <input type="date" name="date">
                         </div>
                         <div style="display:flex;
                         justify-content:space-between">
                             <div>
                             <p>Security Code</p>
                             <input type="password" name="code" style="margin-bottom:0%;">
                             </div>
                         
                             <img class="sec" style="margin-top:0%;" src="images/cvv.png" alt="">
                             
                         </div>
                         <div style="border: 1px solid #727070;
                                 width:90%;
                                 margin-left:2%;
                                 "></div>
                 
                 <div style="display:flex;
                 justify-content:space-between;">
                     <div >
                      Total Price
                           </div>
                       <div> '.$total.'
                           </div>
                         
                     </div>
                 
                     <div>
                         <p></p>
                     </div>
                     </div>
                 
                 
                     </div>

                     <div class="tabbutton" style="display:flex;
                     justify-content:center ;
                     margin-top:1%;
                     ">
                     
                         <button type="button"style="border-radius:5px;
                         width:7rem;
                         font-family: Arial, Helvetica, sans-serif;
                     font-weight: bold;
                     cursor: pointer;
                     background-color:rgba(180, 207, 176, 1);
                     ;
                     ;" id="cancel1" onclick="redirect()">Cancel</button>
                         <input style="" type="submit" value="Pay" name="pays">
                     </div>
                     </form>
                     <br/>
                     <br/>';

                 }
             }
         }
      }
       else{
        if(isset($disabledservices))
        {
           echo "<script>alert('disabled services cannot be selected for thi stadium')</script>";
        }
        else{

            $dj=$db->query("select * from ticket where eventid='$eventid' ");
                    $dj=$dj->fetch();
                    $carprice=0;
                    $_SESSION["category"]=$category;
                     $categoryprice=explode('g',$category);
                     $categoryprice=$categoryprice[0].'gp'.$categoryprice[1];
                     $dj=$db->query("select * from ticket where eventid='$eventid' ");
                     $dj=$dj->fetch();
                     $categoryprice=$dj[$categoryprice];
                     $eventid=$_SESSION['eventid'];
                     $dk=$db->query("select * from car where userid='$userid'
                     and stadiumid='$stadiumid' and eventid='$eventid'");
                     $dk=$dk->fetch();
                     if(isset($dk['userid']))
                     {
                         $carprice=10;
                     }
                     $total=$categoryprice+$carprice;
                     $_SESSION['total']=$total;
                     echo '<form action="" method="post">
                     <div style="display:flex;
                     justify-content:center;
                     margin-top:6%">
                     <div class="summary-card1">
                         <h1 style="text-align:center;
                       font-size: 2rem;">
                       Please fill out your card information
                       </h1>
                       <div style="display:flex;
                       justify-content: space-between;">
                           <div>
                           <p style="margin-bottom: 1%;">Card Number</p>
                           <input name="cardno" id="ccn" type="tel" inputmode="numeric" pattern="[0-9\s]{13,19}" autocomplete="cc-number" maxlength="19" placeholder="xxxx xxxx xxxx xxxx">
                           <img src="images/credicard-logo-png-3.png" alt="">
                       </div>
                         </div>
                 
                         <div>
                             <p>Expiry Date</p>
                             <input type="date" name="date">
                         </div>
                         <div style="display:flex;
                         justify-content:space-between">
                             <div>
                             <p>Security Code</p>
                             <input type="password" name="code" style="margin-bottom:0%;">
                             </div>
                         
                             <img class="sec" style="margin-top:0%;" src="images/cvv.png" alt="">
                             
                         </div>
                         <div style="border: 1px solid #727070;
                                 width:90%;
                                 margin-left:2%;
                                 "></div>
                 
                 <div style="display:flex;
                 justify-content:space-between;">
                     <div >
                      Total Price
                           </div>
                       <div> '.$total.'
                           </div>
                         
                     </div>
                 
                     <div>
                         <p></p>
                     </div>
                     </div>
                 
                 
                     </div>

                     <div class="tabbutton" style="display:flex;
                     justify-content:center ;
                     margin-top:1%;
                     ">
                     
                         <button type="button"style="border-radius:5px;
                         width:7rem;
                         font-family: Arial, Helvetica, sans-serif;
                     font-weight: bold;
                     cursor: pointer;
                     background-color:rgba(180, 207, 176, 1);
                     ;
                     ;" id="cancel1" onclick="redirect()">Cancel</button>
                         <input style="" type="submit" value="Pay" name="pays">
                     </div>
                     </form>
                     <br/>
                     <br/>';

        }

        }
    }
}
}
?>


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
if(isset($_POST['pays']))
{
    extract($_POST);
    $cardtype = array(
        "visa"       => "/^4[0-9]{12}(?:[0-9]{3})?$/",
        "mastercard" => "/^5[1-5][0-9]{14}$/",
        "amex"       => "/^3[47][0-9]{13}$/",
        "discover"   => "/^6(?:011|5[0-9]{2})[0-9]{12}$/",
    );
 
    $validnum="/^[0-9]{3,4}$/";
    $validdate="/^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/";
     $valid=true;
    if (!(preg_match($cardtype['visa'],$cardno)||preg_match($cardtype['mastercard'],$cardno)||
    preg_match($cardtype['amex'],$cardno)||preg_match($cardtype['discover'],$cardno)))
    {
        $valid=false;
        $str1.='Invalid credit card number entered\\n';
    }

    if(!(preg_match($validdate,$date)))
    {
        $valid=false;
        $str1.='Invalid date format entered\\n';
    }

    $currentdate=date("Y-m-d");
    if(!(preg_match($validnum,$code)))
	{
        $valid=false;
        $str1.='Invalid code entered\\n';
    }
    if($currentdate>$date)
    {
        $valid=false;
        $str1.='Invalid date entered\\n';
    }

    if($valid==false)
    {
       $str2=nl2br($str1);
          echo "<script>alert('".$str1."')</script>"; 
    }
    else{
        $ds=$db->query("select * from ticket where eventid='$eventid'");
        $ds=$ds->fetch();
        $ticketid=$ds['ticketid'];
        $total=$_SESSION['total'];
        $ds=$db->prepare("insert into payment(ticketid,userid,amount)
        values(:ticketid,:userid,:total)");
        $ds->bindParam(":userid",$userid);
        $ds->bindParam(":ticketid",$ticketid);
        $ds->bindParam(":total",$total);
        $ds->execute();
        $category=$_SESSION['category'];
        $dj=$db->query("select * from ticket where eventid='$eventid' ");
        $dj=$dj->fetch();
        echo "<script>alert('HELOOO!')</script>";
        $newval=$dj[$category]-1;
        echo "<script>alert('".$newval."')</script>";
        $ds=$db->prepare("update ticket set $category=:newval where 
        ticketid=:ticketid ");
        $ds->bindParam(":ticketid",$ticketid);
        $ds->bindParam(":newval",$newval);
        $ds->execute();
        echo "<script>alert('PAID SUCCESSFULLY!')</script>";
        echo "<script>window.location.assign('book.html')</script>";
    

    }
    
}
?>