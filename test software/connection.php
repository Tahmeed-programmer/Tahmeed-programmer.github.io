<?php
try{
    $db=new PDO('mysql:host=localhost;dbname=stadium;charset=utf8','root','');
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    
}
catch(PDOException $ex)
{
    echo "Connection Error Occured!";
    die($ex->getMessage());
}