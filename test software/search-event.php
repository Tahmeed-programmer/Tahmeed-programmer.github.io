<?php
require('connection.php');
extract($_GET);
session_start();

if(isset($_SESSION['adminid']))
{
    echo "<script>alert('Not Authorized to view page!')</script>";
    echo "<script>window.location.assign('login.php')</script>";
}
else{
if(!isset($_SESSION['userid']))
{
    echo "<script>alert('Not logged in! Redirecting to login page')</script>";
    echo "<script>window.location.assign('login.php')</script>";
}

//sanitize the code here
if($stadium_name!=''){
    
    $userid=$_SESSION['userid'];
$ds=$db->query("select * from stadium where stadium_name like '$stadium_name%'");
$dk=$db->query("select * from stadium where stadium_name like '$stadium_name%'");
$dk=$dk->fetch();
if(!(isset($dk['stadium_name'])))
{
    echo '<p  style="font-family:sans-serif;
    font-weight: bold;
    color: #130e0f;
    font-size: 1.7rem;">No results of this name found</p>';
}

else
{

while($row=$ds->fetch())
{
   echo '<div class="event-box">
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
   <form action="see-event.php" method="post">
       <input type="hidden" value="'.$row['id'].'" name="eventname">
       <div style="display:flex;
       justify-content:center;
       align-items:center;"><button type="button" style="cursor:pointer;">';
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
 }

}
}
?>