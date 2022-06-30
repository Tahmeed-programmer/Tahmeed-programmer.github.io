<html>
    <head>
        <link rel="stylesheet" href="css/style.css">
</head>
            <body>
            <nav id="nav" class="active absolute">
    <ul>
        <li><a href="staff_login.html">Staff</a></li>
        <li class="active-h"><a href="customer_login.html">Customer</a></li>
        <li><a href="admin_login.html">Admin</a></li>
    </ul>
    <button class="icon" id="toggle">
        <div class="line line1"></div>
        <div class="line line2"></div>
    </button>
</nav>
<div class="container">
    <h1>Update or Delete</h1>
<?php
require('connection.php');
$count=0;
$delivery=0;
$product[]='';
$flag=TRUE;
$uid=$_GET['uid'];
$orderid=$_GET['orderid'];
$i=0;
$ds=$db->query("select distinct pdtname from cart where uid='$uid' and orderid='$orderid'");
while($row=$ds->fetch())
{
  $product[$i]=$row[0];
  $i+=1;
}
echo "<div style='width: 408px;; height: 175px; overflow-y:auto;'>";
echo "<table style='border: 1px solid black ; text-align:center;'table border='4'>";

echo "<tr><th>User ID</th> <th>Product Name</th> <th>Price</th><th>QNTY</th><th colspan='2'>update/delete</th>";
foreach($product as $value)
{
    $dk=$db->query("select * from cart where uid='$uid' AND orderid='$orderid' and pdtname like '%$value'");
    if($row=$dk->fetch())
    {
    $count1=$db->query("select count(*) from cart where uid='$uid' AND orderid='$orderid' and pdtname like '%$value'");
    $count1=$count1->fetch();
    $count1=$count1[0];
    echo "<form method='post'>";
    echo "<tr><td>".$row['uid']."</td><td>".$row['pdtname']."</td><td>".$row['price']."</td><td>".$count1."</td>
    <td><input type='hidden' name='pdtname' value='".$value."'><input type='submit' value='update' name='update'></form>
    </td> <td><form method='post'><input type='hidden' name='pdtnames' value='".$value."'><input type='submit' value='delete' name='delete'></form></td></tr>";
    $count+=$row["price"]*$count1;
      }
      else
      {
      echo "<script>alert('Cart Is Empty! Go Back to the Browse Page')</script>";
      $flag=FALSE;
      }

}
if($flag==TRUE)
{
$delivery=$count-5;
echo "<tr > <td colspan='4'text-align='center'>TOTAL PRICE: ".$count."$</td></tr>";
echo "<tr ><td colspan='4'> delivery charge:".$delivery."$</td></tr>";
echo "</table>";
echo "</div>";

echo "<br/><form action='placeorder.php' method='post'>
<input type='hidden' name='uid' value='".$uid."'><button class='btn' type='submit'>Place Order</button></form>";
if(isset($_POST['update']))
{
    $name=$_POST['pdtname'];
    $price=$db->query("select price from orderitems where productname='$name'");
    $price=$price->fetch();
    $price=$price[0];
    $dt=$db->prepare("insert into cart(`uid`,`pdtname`,`price`,`orderid`) values(:uid,:pdtname,:price,:orderid)");
    $dt->bindParam(':uid',$uid);
       $dt->bindParam(':pdtname',$name);
       $dt->bindParam(':price',$price);
       $dt->bindParam(':orderid',$orderid);
       $dt->execute();
       $url='Location:update&delete.php?uid='.$uid.'&orderid='.$orderid;
       header($url);
}

if(isset($_POST['delete']))
{
    $name=$_POST['pdtnames'];
    $price=$db->query("select price from orderitems where productname='$name'");
    $price=$price->fetch();
    $price=$price[0];
    $cid=0;
    $dn=$db->query("select * from cart where uid='$uid' and pdtname='$name' and orderid='$orderid'");
    $dl=$db->prepare("delete from cart where uid=:id and orderid=:ordid and pdtname=:pdname and cid=:ciid");
    while($row=$dn->fetch())
    {
      $cid=$row["cid"];
    }
    $dl->bindValue(':ordid',$orderid);
    $dl->bindValue(':id',$uid);
    $dl->bindValue(':pdname',$name);
    $dl->bindValue(':ciid',$cid);
    $dl->execute();
       $url='Location:update&delete.php?uid='.$uid.'&orderid='.$orderid;
       header($url);
}

}
else{
    echo "<br/>No item was found in the cart. Click here to go back to the browse page<br/>
    <p>------------------------<form action='browse.php' method='post'><input type='hidden' name='uid' value='".$uid."'>
    <input type='submit' value='Click To Redirect'></form></p>";
   
}
?>
</div>
<script src="script.js"></script>
</body>