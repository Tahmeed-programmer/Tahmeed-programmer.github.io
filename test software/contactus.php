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
        <li><a href="index.html">Home</a></li>
<li><a href="">Book</a></li>
<li><a href="aboutus.html">About</a></li>
<li><a href="contactus.php">Contact Us</a></li></ul>
    </div>
    <nav>
        <div class="check">
        <img class="img" src="images/logo.png">
<div class="logo-title">StudBook</div>
</div>




<div class="link-container">
<ul>
<li><a href="index.html">index</a></li>
<li><a href="">Book</a></li>
<li><a href="aboutus.html">About</a></li>
<li><a href="contactus.php">Contact Us</a></li></ul>
    </div>

   

    <div class="end-buttons">
       <button> <a  href="login.php">Login</a>
        </button>
        <button>
            <div class=""> <a class="signin"href="signup.php">Sign up</a>
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





    <div class="login-form">
    <h1 style="font-family: Montserrat;
       font-style: normal;
       font-weight: 600;
      font-size:2.8rem;
       color: #fff;
       ">Contact US</h1>
<form id='form' class='hr' action="" method="post">
  <div class="elem-group">
    <div >Your Name</div>
    <input type="text" id="name" name="name" placeholder="John Doe" pattern=[A-Z\sa-z]{3,20} required>
  </div>
  <div>
    <div >Your E-mail</div>
    <input type="email" id="email" name="email" placeholder="john.doe@email.com" required>
  </div>
  <br/>
  <div>
    <div >Write your message</div>
    <textarea style="width:17rem;
    height:10rem;"
     name="message" placeholder="Say whatever you want." required></textarea>
  </div>
  <input style="width:40%;
            margin-top: 1rem;
            cursor: pointer;
            height:2.5rem;
            font-family: Open Sans;
       font-size: 1.2rem;
font-style: normal;
font-weight: 700;
    border-radius: 8px;
            background: #B4CFB0;"
   type="submit" value='SEND' name='sendmessage'>
   <input type='hidden' value='gots' name='gots1'>
</form>
    </div>

    </body>



<script>
    var email=document.getElementById("email")
    var form=document.getElementById("form");
    form.addEventListener("submit",(e)=>{
       e.preventDefault();
       let value=true;
       let validemail=/^[a-zA-Z0-9-._]+@[a-zA-Z]{2,}.[a-zA-Z]{2,}$/;
       if(email.value.match(validemail))
       {
          value=true;
       }
       else
       {
          alert("Email is not valid");
          value=false;
       }
       if(value)
       {
           form.submit();
       }
    })
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


<?php
require('connection.php');
if(isset($_POST['gots1']))
{
    extract($_POST);

    $validname="/^[a-zA-Z0-9_.-]{3,}$/";

    $str1="";

    if(!isset($email)||!isset($name)||!isset($message))
    {
        echo "<script>alert('Email or name or message has not been entered)</script>";
        exit();
    }
       
    $valid=true;

    if(strlen($name)<3)
    {
        $valid=false;
        $str1.="Name should be at least 3 characters long!\\n";
        
    }
    if(!(filter_var($email, FILTER_VALIDATE_EMAIL)))
     {
        $str1.="Invalid Email!\\n";
         $valid=false;
       }
       if(!(preg_match($validname,$name)))
       {
        $valid=false;
        $str1.="Name format is not valid!\\n";
       }

       if($valid==false)
       {
          $str2=nl2br($str1);
             echo "<script>alert('".$str1."')</script>"; 
       }
       else{
        if(trim($message)=='')
        {
           echo "<script>alert('Review cannot be empty')</script>";
        }
        elseif(strlen($message)<10){
           echo "<script>alert('Minimum charcters to be entered is 10,please enter some more words')</script>"; 
   
        }
        else{
            $review=$message;
            $review=filter_var($review,513);
            $review=htmlentities($review,ENT_QUOTES, 'UTF-8');
           
            $ds=$db->prepare("insert into contact (email,message) values(:email,:message)");
            $ds->bindParam(":email",$email);
            $ds->bindParam(":message",$review);
            $ds->execute();
            echo "<script>alert('Your message has been recieved,we will contact you shortly')</script>";
        }

       }

}
?>