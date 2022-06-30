<?php

if(isset($_GET['see_event']))
{

    extract($_GET);
    $validname="/^[a-zA-Z]+$/";
    if((preg_match($validname,$see_event)))
    {
        require('connection.php');
        $ds=$db->query("select * from event where status!='finished'");
     $i=0;
        while($row=$ds->fetch())
        {
            $stadiumid=$row['stadiumid'];
            $dk=$db->query("select * from stadium where id='$stadiumid'");
            $dk=$dk->fetch();
            echo ' <div class="addcolor" 
            style=" background-color: rgba(196, 196, 196, 0.8);
            border-radius: 10px;
            width: 14rem;font-family:sans-serif;
            font-weight: bold;
            color: #130e0f;
            height:16rem;
            margin-left:5%;
            margin-bottom:10px;
            font-family:sans-serif;
      font-weight: bold;">
<p 
style="font-family:sans-serif;
font-weight: bold;
color: #130e0f;
">'.$row['eventname'].'</p>
<div>
    <img style=" width:90%;
    border-radius: 5px ;
    margin-right: 5px;
    margin-left:10px;
    margin-bottom: 6px;" src="images/estadio-bernabeu-vista-aerea-c-turismo-madrid.jpg_1014274486.jpg" alt="">
    </div>
<div>
    <i class="fa fa-map-marker-alt"></i>
'.$dk['location'].','.$dk['country'].'
</div>
<div>
<i class="fas fa-calendar-alt"></i></i>
  '.$row['eventdate'].'
</div>
<div>
    <i class="fas fa-clock"></i> '.$row['eventtime'].'
</div>
<p style="margin-top:1%;
font-family:sans-serif;
margin-bottom:1%">Starting from 25$</p>

</div>';
$i+=1;
if($i==2)
{
    break;
}
        }
    }
}




?>