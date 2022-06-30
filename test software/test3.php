<html>
<?php
$username='A1AAA';
$password='aaAA11';
$Fname='Ahmed';
$Lname='Abdulla';
$mobile='36363636';
$email='A1@email.com';
$building='999';
$block='333';
$country='Bahrain';
?>
<head>

    <style>
    #profile {
        margin-top:135px;
        margin-left:auto;
        margin-right:auto;
        width:800px;
        padding:80px;
        padding-bottom: 25px;
        padding-top: 40px;
        border-radius: 5%;
        border: 5px solid black;
    }
    .submit {
      text-align: center;
    }
    .profile {
      font-size: 25px;
    }
    .form-control {
      font-size: 20px;
      font-weight: bolder;
    }
    .form-control::placeholder {
      font-weight: 50;
    }
    .profile-pic{
      width:200px;
      height:200px;
      align-self: auto;
    }
    </style>


  <script>
<?php
//declaring js variables with current value for validation. if user enters same value, validation message =""

// when declaring javascript variables in you need to use either 'var' or 'let' to declare it

// see below where i echo 'let'

echo "let username='".$username."'\n";
echo "let password='".$password."'\n";
echo "let Fname='".$Fname."'\n";
echo " let Lname='".$Lname."'\n";
echo "let mobile='".$mobile."'\n";
echo "let email='".$email."'\n";
echo "let building='".$building."'\n";
echo "let block='".$block."'\n";
echo "let country='Bahrain'\n"; //check comment under form.select in above if statement
$profile_pic='';

?>
MAX_FILE_SIZE=5000000;   //5MB
    var nameFlag=emailFlag=usernameFlag=passwordFlag=cnfmpasswordFlag=mobileFlag=addressFlag=fileUploadFlag=true; //true by default
    
    function checkFN(name1, id) { //check full name
      var nameExp =/^([a-z]{2,}\s)*[a-z]+$/i;
      if (name1.length == 0) {
        msg = "Enter name!";
        color = "red";
        nameFlag = false;
      }
      else if (!nameExp.test(name1)) {
        msg = "Invalid Name";
        color = "red";
        nameFlag = false;
      }
      else {
        msg = "Valid Name";
        color = "green";
        nameFlag = true;
      }
      document.getElementById(id).style.color = color;
      document.getElementById(id).innerHTML = msg;
    }



    function checkPWD(pwd) { //check password

     
      console.log(pwd);
      var pwdExp = /^[a-z0-9-._]{8,}$/;
      if (pwd.length == 0) {
        msg = ""; //accepted to retain original values
        color = "red";
        passwordFlag = true;
      }
      else if (!pwdExp.test(pwd)) {
        msg = "Invalid password";
        color = "red";
        passwordFlag = false;
      }
      else {
        msg = "Valid password";
        color = "green";
        passwordFlag = true;
      }
      document.getElementById('profile_pwd_msg').style.color = color;
      document.getElementById('profile_pwd_msg').innerHTML = msg;
      confirmPWD(document.forms[0].cnfm_password.value);
    }

   



    function GetXmlHttpObject() {
      var xmlHttp=null;
      try
      {
        // Firefox, Opera 8.0+, Safari
        xmlHttp=new XMLHttpRequest();
      }
      catch (e)
      {
        // Internet Explorer
        try
        { xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); }
        catch (e)
        { xmlHttp=new ActiveXObject("Microsoft.XMLHTTP"); }
      }
      return xmlHttp;
    }
    function ajaxexists(word,type){
    var xmlHttp= GetXmlHttpObject();
    if (xmlHttp==null) {
      alert("Your browser does not support AJAX!");
      return false;
    }

    var url="checkunameemailmobile.php"
    if (type=="uname")
      url=url+"?uname="+word;
    else if (type=="email")
    url=url+"?email="+word;
    else if (type=="mobile")
    url=url+"?mobile="+word;

    xmlHttp.onreadystatechange=function()
    {
      if(xmlHttp.readyState==4){
        ajax_checking=xmlHttp.responseText;
        reGajaxmsgs(word,type,ajax_checking);
      }
    }
    xmlHttp.open("GET",url,true);
    xmlHttp.send(null);
    }

    function reGajaxmsgs(word, type, result){
      if (type=="uname" && result=="present" ) {
      document.getElementById('reg_username_msg').style.color ="red";
      document.getElementById('reg_username_msg').innerHTML ="Username already exists";
      usernameFlag=false;
    }
    else if(type=="email" && result=="present"){
    document.getElementById('mail_msg').style.color ="red";
    document.getElementById('mail_msg').innerHTML ="Email already registered";
    emailFlag=false;
    }
    else if(type=="mobile" && result=="present"){
    document.getElementById('mobile_msg').style.color ="red";
    document.getElementById('mobile_msg').innerHTML ="Number already registered";
    mobileFlag=false;
  }
  }

  function checkeditedInputs(){
      document.forms[0].JSEnabled.value="TRUE";
      return (nameFlag&&usernameFlag&&passwordFlag&&cnfmpasswordFlag&&mobileFlag&&addressFlag&&emailFlag);
    }
  </script>
</head>
<body class='bg-primary'>
  <div class='bg-secondary text-white container align-items-center' id='profile'>
  <noscript><h1><b>Please enable JavaScript or use another browser for better user experience</b></h1></noscript>

    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Heading-->
        <h1 class="masthead-heading login">Profile Details</h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
    </div>

  <form onSubmit="return checkeditedInputs();" method='post' action='updateProfile.php'  enctype="multipart/form-data">
    <img src='uploadedfiles/<?php echo $profile_pic; ?>'  class= 'profile-pic' alt='profilepic' >
    <input type="file" name="picfile" id='fileUpload'><span> images<=5MB</span><br><br>

    <label><h3>First Name:</h3></label>
    <input class='form-control' type='text' name='fname' placeholder="maximum 50 characters" onkeyup="checkFN(this.value, 'name_msg1')" size='50' value='<?php echo $Fname; ?>' required><span id='name_msg1'></span><br>

    <label><h3>Last Name:</h3></label>
    <input class='form-control' type='text' name='lname' placeholder="maximum 50 characters" onkeyup="checkFN(this.value, 'name_msg2')" size='50' value='<?php echo $Lname; ?>' required><span id='name_msg2'></span><br>

    <label><h3>Password:</h3></label>
    <input class='form-control' type='password' name='password' placeholder='Leave empty to retain original' onkeyup="checkPWD(this.value)" size='20' value=''><span id='profile_pwd_msg'></span><br>

    <label><h3>Confirm Password:</h3></label>
    <input class='form-control' type='password' name='cnfm_password' placeholder="6-20 char, must have 1 number, 1 uppercase, 1 lowercase" onkeyup="confirmPWD(this.value)" size='20' value=''><span id='cfmpwd_msg'></span><br>
    <?php
    //country will be selected based on the country input while registering
    //NOTE:pharmacy management system only has bahrain customers AND doesnt add country to db hence $country=bahrain by default at beginning of <script>
    if ($country=="Bahrain") {
      ?>
      <option value="+973" selected>Bahrain +973</option>
      <option value="+966">Saudi Arabia +966</option>
      <option value="+971">United Arab Emirates +971</option>
    <?php
    }

    ?>
    </select>

    <input type='hidden' name='JSEnabled' value='false'>
    <input class='btn btn-lg btn-primary' type='submit' name='edit_user' value='Edit'>
  </form>

  </div>

</body>

<script>
 function confirmPWD(cpassword) { //check 2nd password
      if ((cpassword.length == 0)&& (document.forms[0].password.value.length==0)) {
        msg = "";
        cnfmpasswordFlag = true;
      }
      else if (cpassword.length == 0) {
        msg = "";
        cnfmpasswordFlag = false;
      }
      else if (document.getElementById('cfmpwd_msg').innerHTML== 'Invalid password') {
        msg="enter valid password first";
        color="red";
        cnfmpasswordFlag=false;
      }
      else
      {
        var firstPwd = document.forms[0].password.value;

        if (firstPwd.length==0) {
          msg="";
          cnfmpasswordFlag=false;
          color="white"; //need to enter or gives not defined error
        }
        else if (cpassword!=firstPwd) {
          msg = "passwords don't match";
          color = "red";
          cnfmpasswordFlag = false;

        }
        else {
          msg = "they match";
          color = "green";
          cnfmpasswordFlag = true;
        }
      }
      document.getElementById('cfmpwd_msg').style.color = color;
      document.getElementById('cfmpwd_msg').innerHTML = msg;
    }
</script>
</html>
