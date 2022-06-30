<?php
session_start();
if(isset($_POST['sub']))
{
    
    require("connection.php");
    $valid=true;
    extract($_POST);
    if(!(filter_var($email, FILTER_VALIDATE_EMAIL)))
     {
        echo "<script>alert('email!!')</script>";
         $valid=false;
       }

      if(!$valid){
          echo "<script>alert('Email entered is Invalid')</script>";
      }
      else{
        $ds=$db->query("select * from user where email='$email'");
        if($ds=$ds->fetch())
        {
            $copass=$ds["password"];
            if(!(password_verify($pass,$copass)))
            {
       
                $valid=false;
                echo "<script>alert('Wrong Password')</script>";
            }
            else{
                session_regenerate_id(true);
                if($ds['user_type']=="customer")
                {
                   
                    $_SESSION['userid']=$ds['userid'];
                $_SESSION['loggedin']=true;
                if(isset($_SESSION['adminid']))
                {
                    unset($_SESSION['adminid']);
                }
               
                echo "<script>alert('User sucessfully logged in')</script>";
                echo "<script>window.location.assign('userprofile.php')</script>";
                }
                else
                {
                    if(isset($_SESSION['userid']))
                    {
                        unset($_SESSION['userid']);
                    }
                    $_SESSION['adminid']=$ds['userid'];
                    $_SESSION['loggedin']=true;
                    echo "<script>alert('Admin sucessfully logged in')</script>";
                    echo "<script>window.location.assign('admin.php')</script>";
                }
                
            }

        }
        else{
            $valid=false;
            echo "<script>alert('Email doesnt exist')</script>";
        }
        
      }
     
      
}
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
<li><a href="index.html">Home</a></li>
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
       ">Login</h1>
       <form action="" method="post" id="form">
           <div>Email</div>
           <input 
           type="email" id="email"
           name="email" required placeholder="&#xf007;johnsmith@someone.com">
           <div>
               Password
           </div>
           <input required type="password" name="pass" placeholder="&#xf023;">
           <div><a style="font-family: Open Sans;
            font-size: 0.9rem;
            font-style: normal;
            font-weight: 400;
            line-height: 25px;
            letter-spacing: 0em;
            text-align: left;
            color: #06A5FF;  " 
            href="">Forgot Password</a></div>
            <input type="hidden" name="sub" value="got">
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
             type="submit" value="Login"
             id="login" name="login">
      
      
          



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

