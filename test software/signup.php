<?php

require('connection.php');
if(isset($_POST['sub']))
{

 extract($_POST);
 $validname="/^[a-zA-Z0-9_.-]+$/";

    $str1="";

    if(!isset($email)||!isset($pass)||!isset($copass))
    {
        echo "<script>alert('Email or password or confirm password has not been entered)</script>";
        exit();
    }
       
    $valid=true;

 if(!isset($fname))
 {
     $valid=false;
     $str1.="first name has not been entered!\\n";
 }
 else if(!isset($lname)){
    $valid=false;
     $str1.="last name has not been entered!\\n";
 }

 else{

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
}


    if(!isset($usertype))
    {
        $valid=false;
        $str1.="User Type has not been selected!\\n";
    }

    
    else
    {
     if(!(filter_var($email, FILTER_VALIDATE_EMAIL)))
     {
        $str1.="Invalid Email!\\n";
         $valid=false;
       }

    }
       if(strlen($pass)<8)
       {
         $valid=false;
         $str1.="Passwords should be 8 characters minimum!\\n";
  
       }
       if(strlen($pass)>=8)
       {
           $pass=password_hash($pass,PASSWORD_DEFAULT,array('cost'=>11));
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

 else{
     $ds=$db->query("select email from user where email='$email'");
     if($ds->fetch())
     {
        echo "<script>alert('The email you entered is already registered')</script>"; 
     }
     else{
    try{
        $db->beginTransaction();
        $ds=$db->prepare('Insert into user(firstname,lastname,email,password,user_type) VALUES(:firstname,
        :lastname,:email,:password,:usertype)');
        $ds->bindParam(':firstname',$fname);
        $ds->bindParam(':lastname',$lname);
        $ds->bindParam(':email',$email);
        $ds->bindParam(':password',$pass);
        $ds->bindParam(':usertype',$usertype);
        $ds->execute();
        echo "<script>alert('User registered sucessfully')</script>";
        session_start();
        $dk=$db->query("select * from user where email='$email'");
        $dk=$dk->fetch();
        if($dk['user_type']=="customer")
                {
                    if(isset($_SESSION['adminid']))
                    {
                        unset($_SESSION['adminid']);
                    }
                   
                    $_SESSION['userid']=$dk['userid'];
                 $_SESSION['loggedin']=true;
                 echo "<script>alert('Customer sucessfully logged in')</script>";
                 echo "<script>window.location.assign('userprofile.php')</script>";
                }
                else
                {
                    if(isset($_SESSION['userid']))
                    {
                        unset($_SESSION['adminid']);
                    }
                    $_SESSION['adminid']=$dk['userid'];
                    $_SESSION['loggedin']=true;
                    echo "<script>alert('Admin sucessfully logged in')</script>";
                    echo "<script>window.location.assign('admin.php')</script>";
                }
         $db->commit();
        }
        catch(PDOException $e)
             {
                 $db->rollback();
                 echo "The email you entered is already registered";
             }
            
            }
 }

}


 
//echo preg_match($validname, $fname);
//$fname=filter_var$_POST/'fname', 513;


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
<body>
    

    <div id="bar-nav" class="bar-nav ">
        <div style="display: flex;justify-content:flex-end;
        cursor: pointer;">

            <i id="cross"style="color:red"
            class="fa-solid fa-bars fa-x fa-2x"></i>
        </div>
        <ul>
<li><a href="#h">index</a></li>
<li><a href="">Book</a></li>
<li><a href="">About</a></li>
<li><a href="">Contact Us</a></li></ul>
    </div>
    <nav>
        <div class="check">
        <img class="img" src="images/logo.png">
<div class="logo-title">StudBook</div>
</div>




<div class="link-container">
<ul>
<li><a href="#h">Home</a></li>
<li><a href="">Book</a></li>
<li><a href="">About</a></li>
<li><a href="">Contact Us</a></li></ul>
    </div>

   

    <div class="end-buttons">
       <button> <a  href="login.php">Login</a>
        </button>
        <button>
            <div > <a class="signin"href="signup.php">Sign up</a>
                </div>
                </button>
            
    </div>
    <div class="hamburger">
        <i id="hamburger" style="color:#3A3335;
            cursor: pointer;font-size: 1.4rem;"class="fa-solid fa-bars "></i>
    </div>
    </nav>


    <div class="main-img"
    style="background-repeat: no-repeat;
     background-size: cover;
     background-position: center center center
     center ;
     filter: blur(10px)">
    </div>

    <div
    style="display: flex;
    justify-content: center;
    width: 100%;
    ">

    <div class="signup-form">
        <h1 style="font-family: Montserrat;
       font-style: normal;
       font-weight: 600;
      font-size:2.8rem;
       color: #fff;
       margin-bottom: 0px;
       padding-right: 10%;
      
       ">Signup</h1>



     <form  method="post" action='' id="form">
        <div style="
        display: flex;">
 
         <div>
             <div>First Name</div>
         <input style="width:80%;"
         autocapitalize="off" required id="fname" type="text" name="fname" >
         </div>
         <div>
             <div>
             Last Name
         </div>
         <input style="width:80%;" id="lname" type="text" required name="lname" >
        </div>
 </div>
 <div class="names">
    Names should be at least 3 characters long!
</div>
<div class="namesvalid">
    Invalid names! 
    Names can only contain following characters a-z,A-Z,0-9, - , _ , .
</div>


       <div >
           Email
       </div>

       <input style="width:70%" id="email"
        autocapitalize="off" type="email" name="email" placeholder="&#xf007;johnsmith@someone.com">
      <div class="email-error">
          Invalid Email!
      </div>
     
       
      
       <div>
           Password
    </div>
    
    <input required type="password" required id="pass" name="pass" >
    <div class="min-pass">
        Passwords should be 8 characters minimum!
    </div>
    <div>Confirm Password
</div>
<input required type="password" id="confirm-pass" name="copass">
<div class="pass-match">
    Passwords don't Match!
</div>
<p>Please select a user type</p>
<div>
<p>
 Customer<input style="width:auto;height:auto;" type="radio" value="customer" name="usertype">
</p>
   <p> Admin
    <input style="width:auto;height:auto;" type="radio" value="admin" name="usertype"></p>
    
</div>
<div
style="display:flex;
margin-top: 0.5rem;">
    <input required
    style="margin-right: 0%;
    width: 1.5rem;"
     type="checkbox" name="check" value="yes">
    <div style="font-family: Open Sans;
    font-size: 1rem;
    font-style: normal;
    font-weight: 400;
    line-height: 25px;
    letter-spacing: 0em;
    margin-left: 1%;
    padding-left: 0%;
    ">I accept and understand StudBook <a 
    style="color: #06A5FF;"
    href="">Terms & Condtions.</a>
    
    </div>
</div>
<input type="hidden" name="sub" value="got">
<input type="submit" 
style="font-family: Open Sans;
font-style: normal;
font-weight: 700;
font-size:1.1rem;
padding-top: 0%;
margin-top: 2%;
width:40%;
height: 30%;
text-transform: uppercase;
background: #B4CFB0;
margin-left: 20%;
cursor:pointer;
"
 value="sign-up"
 name="btnsubmit" >

 
       </form>
    </div>
</div>



</body>








<script>
  
     /*const phoneInputField = document.querySelector("#phone");
   const phoneInput = window.intlTelInput(phoneInputField, {
     utilsScript:
       "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
   });*/
  

   var email=document.getElementById("email");
   var fname=document.getElementById("fname");
   var lname=document.getElementById("lname")
    var pass=document.getElementById("pass");
    var confirm_pass=document.getElementById("confirm-pass");
    var email_error=document.querySelector(".email-error");
    var pass_match=document.querySelector(".pass-match");
    var form=document.getElementById("form");
    var minpass=document.querySelector(".min-pass");
    var names=document.querySelector(".names");
    var namesvalid=document.querySelector(".namesvalid")

    form.addEventListener("submit",(e)=>{
        e.preventDefault();
        let t=validate();
        if(t==true)
        {
          form.submit();
        }
    })

   
  /* function trt(){ 
       const str='  <div>
           Phone Number
       </div>
       <input style="width:70%;" required
       id="phone" type="tel" name="phone" />';
    const phoneNumber = phoneInput.getNumber();
    console.log("hello");

    if(phoneInput.isValidNumber())
    {
        console.log("hello")
        alert("phone is "+phoneNumber);
    }
       else{
           alert("phone number is wrong ");
       }
    }*/


    ///////////////  Form validation  //////////

   function validate(){
       
       valid=true;
       let validname=/^[a-zA-Z0-9_.-]+$/;
      
       if(fname.value.length<3||lname.value.length<3)
       {
           names.style.display="block"
           valid=false;
       }
       else{
           names.style.display="none";
           if(fname.value.match(validname))
           {
            namesvalid.style.display="none";
           }
           else{
               namesvalid.style.display="block";
               valid=false;
           }
       }

       let validemail=/^[a-zA-Z0-9-._]+@[a-zA-Z]{2,}.[a-zA-Z]{2,}$/;
       if(email.value.match(validemail))
       {
           email_error.style.display="none";
       }
       else
       {
           email_error.style.display="block";
           valid=false;
       }
     
        if(pass.value.length<8)
        {
          valid=false;
          minpass.style.display="block";

        }
        if(pass.value.length>=8)
        {
            minpass.style.display="none";
        if(pass.value==confirm_pass.value)
            pass_match.style.display="none";
        else{
            pass_match.style.display="inline";
            valid=false;
        }
        return valid;
    }
        
    }


  
    var id3=document.getElementById("cross");
   var id4=document.getElementById("bar-nav");
   var id5=document.getElementById("hamburger");
   id5.addEventListener("click",()=>{
       id4.classList.toggle("visible");
   })
   id3.addEventListener("click",()=>{
           id4.classList.toggle("visible");
   })
</script>
</html>





