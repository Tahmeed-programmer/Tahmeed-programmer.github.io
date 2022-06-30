<?php
if(isset($_GET['see_event']))
{
    extract($_GET);
    if($see_event=="check56")
    {
        require('connection.php');
        $ds=$db->query("select * from reviews");
        $i=0;
        $str='';
        while($row=$ds->fetch())
        {
        $userid=$row['userid'];
        $dk=$db->query("select * from user where userid='$userid'");
        $dk=$dk->fetch();
        $name=$dk['firstname']." ".$dk['lastname'];


          $str.="<p style='display:flex;
          flex-wrap:wrap;
          wdith:30%;
          border:2px solid black'>".$row['review']." - ".$name."</p>|N";
          $i+=1;
          if($i==4)
          {
              break;
          }
        }
        echo $str;
    }
}
?>