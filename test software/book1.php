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
    $valid=true;
    $str1='';
    $userid=$_SESSION['userid'];
    
        if($_POST['book'])
        {
        extract($_POST);
       

        $validname="/^[a-zA-Z0-9]{2,}[ a-zA-Z0-9-]*$/";

     $validnum="/^0$|(^[1-9]{1}$)|(^[1-9]{1}[0-9]{1,}$)/";
     if(!(preg_match($validname,$eventname)))
     {
         $valid=false;
         $str1.='Invalid name entered for event\\n';
     }
     $validdate="/^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/";

     if(!(preg_match($validdate,$eventdate)))
     {
        $valid=false;
        $str1.='Invalid date entered\\n';
     }

     if(!(preg_match($validnum,$eventid)))
     {
        $valid=false;
        $str1.='Invalid id entered\\n';
     }

     if($valid==false)
     {
        $str2=nl2br($str1);
           echo "<script>alert('".$str1."')</script>"; 
     }
     else{
        $dh=$db->query("select * from event where eventid='$eventid' and 
        eventname='$eventname' and eventdate='$eventdate' and status!='finished'");
        $dh=$dh->fetch();
        $stadiumid=$dh['stadiumid'];
        $_SESSION['stadiumid']=$stadiumid;
        $_SESSION['eventid']=$eventid;
        $dk=$db->query("select * from stadium where id='$stadiumid'");
        $dk=$dk->fetch(); 
        $ds=$db->query("select * from ticket where eventid='$eventid'");
        $ds=$ds->fetch();
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
<li><a href="book.html">Book</a></li>
<li><a href="aboutus.html">About</a></li>
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
<li><a href="aboutus.html">About</a></li>
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
       <li><a href="pastevents.php">My Recent Visited Events</a></li>
    </ul>
</div>


<div style="margin-top: 1%;display: flex;
margin-right: 2%;
flex-wrap: wrap;
justify-content:space-around;
font-family:Roboto;
font-weight:bold;  ">      

        <h1>
        <?php
        echo $dh['eventname'];
        ?>
        </h1>
      
<div style="width:fit-content;
height: fit-content;
display:flex;
flex-direction: column;
font-family:Roboto;
font-weight:bold;        
font-size:1.7rem;
margin-left: 5%;
margin-bottom: 2%;">
    Details

        <div>
      <i class="fa fa-map-marker-alt"></i>
          <?php
          $dn=$db->query("select * from stadium where id='$stadiumid'");
          $dn=$dn->fetch();
        echo $dn['location'].','.$dn['country'];
        ?>
       </div>
       <div>
  <i class="fas fa-calendar-alt"></i>
             <?php
        echo $dh['eventdate'];  
        ?>
      </div>

      <div>  
      <i class="fas fa-clock"></i>  <?php
        echo $dh['eventtime'];  
        ?>
</div>

</div>
</div>

<div class="tabs2" style="font-size:0.3rem;">
    <button  id="tabbtn1" style="text-align:left;
    padding-left: 0%; font-size:3.5em;"
    class="colorg">Choose Tickets</button>
    <button id="tabbtn2" style="text-align:left;
    padding-left: 0%; font-size:3.5em;" class="colorw">Addtional Info</button>
    <button  id="tabbtn3"  style="text-align:left;
    padding-left: 0%; font-size:3.5em;" class="colorw">Confirm & Pay</button>

</div>




<section3 id="step1" class="show-dropdown">





<div style="display:flex;
flex-wrap:wrap;
flex-direction: row;
padding-left: 2%;
align-items: center;
justify-content:space-around;
">
  <img class="seat-img" src="images/LUS_EN_new.png" alt="">

    <div class="tab1" style="margin-left:0%;
    max-width: 500px;padding:0%;
    ">
        <form action="payment.php" method="post" id="form1">
        <div  style="display: flex;
               flex-wrap:wrap;
                     flex-direction: column; 
                     font-family: Roboto;
                     font-weight: bold;
                     
     
                     ">

<?php if($dk['disabled_services']=='yes')
                  {
                      $disablednos=$dk['disabledseats'];
                      ?>
                   <div>

                 

                    <p>Disabled services?</p>
             <select style="margin-bottom:10%;" name="disabledservices" onchange="disable(this)"
              id="disabledservices">
                <option selected value="no">No</option>
                <option value="yes">Yes</option>
            </select>
               </div>
            

              
               
               <p style="
            ">  <?php
            echo "$disablednos Disabled seats remaining</p>";
            ?>

           <?php
                  }
                  else{
                      echo "<p id='disabledservices' data-check='null'>Disabled services are not provided by the stadium</p>";
                  }
               ?>

            

               <div>
               <p>Select Category?</p>
               <select style="margin-bottom:10%;" name="category" id="categ">

               <?php
               
               if($ds['categ1']!=0)
               {
                   $val=$ds['categ1'];
             echo '
                <option value="categ1">Category1</option>
                ';
                }
                if($ds['categ2']!=0)
                {
                    $val=$ds['categ2'];
              echo '
                 <option value="categ2">Category2</option>
                 ';
                 }

                 if($ds['categ3']!=0)
                {
                    $val=$ds['categ3'];
              echo '
                 <option value="categ3">Category3</option>
                ';
                 }
                 if($ds['categ4']!=0)
                {
                    $val=$ds['categ4'];
              echo '
                 <option value="categ4">Category4</option>
                 ';
                 
            }

            echo '
            </select>
               </div>';
              ?>



               <p style="
               ">Category prices for this event Below:</p>
               <br/>

                <div style="display:flex;
             flex-direction:row;
                  flex-wrap: wrap;
            align-items:center;
            font-family: Arial, Helvetica, sans-serif;
             font-size:1.3rem;
            
             padding: 0%;">
         <div style="background-color: rgb(175, 166, 166);border: 2px solid black;
         margin: 0%">Category 1
            <input style="
            margin-left:5%;text-align:center;width:3rem;
            border:2px solid black;background-color:wheat;" readonly type="number" name="categp1" value="<?php
           echo $ds['categp1'] ?>"></div>
        <div style="background-color: rgb(175, 166, 166);border: 2px solid black;
        margin: 0%">Category 2 <input readonly style="
        margin-left:5%;text-align:center;width:3rem;
            border:2px solid black;background-color:wheat;" type="number" name="categp2" value="<?php
           echo $ds['categp2'] ?>"></div>
        <div style="background-color: rgb(175, 166, 166);border: 2px solid black;
        margin: 0%">Category 3 <input readonly style="
        margin-left:5%;text-align:center;width:3rem;
            border:2px solid black;background-color:wheat;" type="number" readonly name="categp3" value="<?php
           echo $ds['categp3'] ?>"></div>
        <div style="background-color: rgb(175, 166, 166);border: 2px solid black;
        margin: 0%;">Category 4 <input style="
        margin-left:5%;text-align:center;width:3rem;
            border:2px solid black;background-color:wheat;" type="number" readonly name="categp4" value="<?php
           echo $ds['categp4'] ?>"></div>
     </div>
    

    </div>



 </div>

</div>





<?php //section 3 ?>
</section3>







<section3 id='step2' class="hide">
    <p style="
    font-family: Roboto;
font-size:1.6rem;
font-weight: 700;
text-align: center;
">Stadium Entrance</p>
<div style="height:3px;"></div>
<div class="cars" id="box" style="
border:2px solid black;margin-top:2%;
    padding-left:5%;">
<?php
//Step 2 section


$dm=$db->query("select * from stadium where id='$stadiumid'");
$dm=$dm->fetch();
$carnos=$dm['carqnty'];
$i=0;
$h=0;
while($i<$carnos)
{
    $h=$i+1;
    $dk=$db->query("select * from car where carno='$h' and 
        stadiumid='$stadiumid' and eventid='$eventid'");
        $dk=$dk->fetch(); 
        if(isset($dk['userid']))
        {
            echo ' <i style="font-size:3rem;
  cursor:pointer;color:red;" onclick="position(this)" class="fas fa-car-side"
  value="'.$h.'"></i>
  <input type="hidden" value="'.$h.'"name="carno">';
        }
        else{
            echo ' <i style="font-size:3rem;
            cursor:pointer;" onclick="position(this)" class="fas fa-car-alt"
            value="'.$h.'"></i>
            <input type="hidden" value="'.$h.'"name="carno">';
        }

  
   $i+=1;
   if($i%7==0)
   {
       echo "<br/><br/>
       <div></div>";
   }
   
}
?>
</div>

</section3>



<section id="step3" class="hide">

<div style="display:flex;
    justify-content:center;
    margin-top:9%">
  <div class="summary-card">
      <h1 style="text-align:center;
      font-size: 2rem;">
    Order Summary</h1>

    <div style="display:flex;
    justify-content:space-between;">
        <div style="display:flex;
        flex-direction:column;">
          <div>  Ticket Price
              </div>
              <div style="font-size:1rem;">
               (Default Price)
              </div>
              </div>
          <div>   <?php
                  $dk=$db->query("select ticketprice from ticket where eventid='$eventid'");
                  $dk=$dk->fetch(); 
                  if(isset($dk['ticketprice']))
                  {
                      echo $dk['ticketprice'];
                  }
                  else
                  echo 'No Price/Free';
                  ?>
              </div>
            
        </div>

        <div style="display:flex;
        justify-content:space-between;">
            <div >
             Disabled Services
                  </div>
              <div>  <?php
                  $dk=$db->query("select * from stadium where
                    id='$stadiumid'");
                  $dk=$dk->fetch(); 
                  if($dk['disabled_services']=='yes')
                  {
                      echo 'Yes';
                  }
                  else
                  echo 'No';
                  ?> 
                  </div>
                
            </div>

            <div style="display:flex;
            justify-content:space-between;">
                <div >
                 Car Reserved Park
                      </div>
                  <div>  <?php
                  $dk=$db->query("select * from car where userid='$userid' and 
                  stadiumid='$stadiumid' and eventid='$eventid'");
                  $dk=$dk->fetch(); 
                  if(isset($dk['userid']))
                  {
                      echo 'Yes';
                  }
                  else
                  echo 'No';
                  ?>
                      </div>
                    
                </div>
                <div style="border: 1px solid #727070;
                width:90%;
                margin-left:2%;
                "></div>


<div style="display:flex;
justify-content:center;">
    <div >
    --------PROCEED TO PAY!!--------
          </div>
        
    </div>
    

    </div>
</section>






<div class="tabbutton"  style="display:flex;
justify-content:center;margin-top:1%;margin-left:-10%">

          <button type="button" style="border-radius:5px;
          width:7rem;
          font-family: Arial, Helvetica, sans-serif;
    font-weight: bold;
    cursor: pointer;
    background-color: #9dda93;
  ;" id="cancel1" onclick="redirect()">Cancel
          </button>

        <new id="pay"> 
        </new>

          </form>


  <button style="border-radius:5px;
          width:7rem;
          margin-left:5%;
          font-family: Arial, Helvetica, sans-serif;
    font-weight: bold;
    cursor: pointer;
    background-color: #9dda93;
  ;" id="nextstep" onclick="nextstep()">
  Next
  </button>
      </div>

      <br/><br/>
</body>





 <script>

     var categorytable=document.getElementById("category-table");
     var categoryoptions=document.getElementById('category-options');
    const var1=document.getElementById("cancel1");
    var id3=document.getElementById("cross");
   var id4=document.getElementById("bar-nav");
   var id5=document.getElementById("hamburger");
   var dropdown=document.getElementById("dropdown");
   var newdrop=document.querySelector(".dropdowns");
   var tabbtn1=document.getElementById("tabbtn1");
   var tabbtn2=document.getElementById("tabbtn2");
   var tabbtn3=document.getElementById("tabbtn3");
   var disabledservices=document.getElementById('disabledservices');
   var category=document.getElementById('categ');
   var step1=document.getElementById('step1');
   var step2=document.getElementById('step2');
   var step3=document.getElementById('step3');
   var pay=document.getElementById('pay');
   var nextsteps=document.getElementById("nextstep");
   
  
  
   function disable(e)
   {
       console.log("work");
       if(e.value=='yes')
       {
        category.disabled=true;
       }
       if(e.value=='no')
       {
        category.disabled=false;
       }
       
   }

   var bool=true;
  function nextstep(){
     
    if(step1.style.display=="none")
    {
     if(step2.classList.contains("show-dropdown"))
     {
        step2.classList.toggle("show-dropdown");
         step3.classList.toggle("show-dropdown");
         bool=false;
         tabbtn2.classList.toggle("colorg");
         tabbtn3.classList.toggle("colorg");
         pay.innerHTML='<button type="submit" form="form1" class="colorb" value="Proceed" name="pay">PAY</button>';
         nextsteps.style.display="none";
     }
    }

    if(bool==true)
    {
     if(!(step2.classList.contains("show-dropdown")))
     {
         if(disabledservices.check='null' && category.value.length!=0)
         {
            step1.style.display='none';
           step2.classList.toggle("show-dropdown");
           tabbtn1.classList.toggle("colorg");
           tabbtn2.classList.toggle("colorg");
         }
         else{
     if((disabledservices.value.length!=0 && category.value.length!=0))
       {
          //console.log("hitr");
           step1.style.display='none';
           step2.classList.toggle("show-dropdown");
           tabbtn1.classList.toggle("colorg");
           tabbtn2.classList.toggle("colorg");
       }
       else{
           if(disabledservices.value="Disabled services are not provided by the stadium"
           &&category.value.length!=0)
           {
            step1.style.display='none';
           step2.classList.toggle("show-dropdown");
           tabbtn1.classList.toggle("colorg");
           tabbtn2.classList.toggle("colorg");
           }
       }

    }
}
}

   }

   function position(e)
   {

      
    var xhp = new XMLHttpRequest();
    url='checkcar.php?carid='+e.getAttribute('value');
xhp.onreadystatechange = function() {
    if (xhp.readyState === 4){
        console.log(xhp.responseText);
        if(xhp.responseText=="Car Already Reserved Here")
        {
            alert("Car Already Reserved Here");
            e.style.color="red";
        }
        else{
            e.style.color=xhp.responseText;
        }
        if(xhp.responseText=="reserved another spot")
        {
           alert('Car Already Reserved another spot,unselect that first')
        }
       
    }

};
xhp.open('GET', url);
xhp.send();
   }


   function redirect()
   {
    window.location.assign("book.html");
   }
   

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
</body>
</html>





<?php
     }

    }
    
}

?>