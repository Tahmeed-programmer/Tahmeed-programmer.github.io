<?php

extract($_POST);
$validname="/^[a-zA-Z0-9_.-]+$/";

    $str1="";

       
    $valid=true;

    if(strlen($_POST['fname'])<3 || strlen($_POST['lname'])<3)
    {
        $valid=false;
        $str1.="Names should be at least 3 characters long!\\n";
        
    }
    else{
        if(!(preg_match($validname,$fname) && preg_match($validname,$lname)))
        {
            $str1.="Invalid names!\\nNames can only contain following characters a-z,A-Z,0-9, - , _ , .,+\\n";
            $valid="false";

        }

    }

     if(!(filter_var($email, FILTER_VALIDATE_EMAIL)))
     {
        $str1.="Invalid Email!\\n";
         $valid=false;
       }


       if(strlen($pass)<8)
       {
         $valid=false;
         $str1.="Passwords should be 8 characters minimum!\\n";
  
       }
       if(strlen($pass)>=8)
       {
           $pass=password_hash($pass,PASSWORD_DEFAULT,array('cost'=>14));
       if(!(password_verify($copass,$pass)))
       {
  
          
          $str1.="Passwords don't Match!\\n";
           $valid=false;
       }
      
   }


       if($valid==false)
       {

       $str2=nl2br($str1);
       echo "<script>alert('".$str1."')</script>";
       }

      
       
     
    
     

 
//echo preg_match($validname, $fname);
//$fname=filter_var($_POST['fname'], 513);


?>
