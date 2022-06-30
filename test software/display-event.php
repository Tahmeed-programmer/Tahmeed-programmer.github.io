<?php
require('connection.php');
if(isset($_SESSION['adminid']))
{
    echo "<script>alert('Not Authorized to view page!')</script>";
    echo "<script>window.location.assign('login.php')</script>";
}

session_start();
if(!isset($_SESSION['userid']))
{
    echo "<script>alert('Not logged in! Redirecting to login page')</script>";
    echo "<script>window.location.assign('login.php')</script>";
}
else{


$userid=$_SESSION['userid'];
$ds=$db->query("select * from stadium");
while($row=$ds->fetch())
{
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
}
?>