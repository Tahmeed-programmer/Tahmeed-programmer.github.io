<?php
require('connection.php');
if(isset($_SESSION['userid']))
{
    echo "<script>alert('Not Authorized to view page!')</script>";
    echo "<script>window.location.assign('login.php')</script>";
}

session_start();
if(!isset($_SESSION['adminid']))
{
    echo "<script>alert('Not logged in! Redirecting to login page')</script>";
    echo "<script>window.location.assign('login.php')</script>";
}
else{
    $userid=$_SESSION['adminid'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
<li ><a href="managestadiums.php">Stadiums</a></li>
<li><a href="aboutus.html">About</a></li>
<li><a href="contactus.php">Contact Us</a></li></ul>
    </div>
    <nav>
        <div class="check">
        <img class="img" src="images/logo.png">
<div class="logo-title">StudBook</div>
</div>




<div class="link-container extra3">
<ul >

<li ><a href="managestadiums.php">Stadiums</a></li>
<li><a href="aboutus.html">About</a></li>
<li><a href="contactus.php">Contact Us</a></li></ul>
    </div>

   

    <div class="end-buttons"
    style="display:flex;
    margin-right: 5px;
    flex-direction:column;
    bottom: 2%;">
        <i id="user" style="color:#3A3335;
            font-size: 1.9rem;

            ;"class="fas fa-user-circle"></i>
            <i id="dropdown" style="padding-left: 2px;
            margin-top: 2px; color:black;
            cursor: pointer;font-size: 1.5rem;"
             class="fa fa-chevron-circle-down"></i>
             
             
     </div>
    <div class="hamburger">
        <i id="hamburger" style="color:#3A3335;
            cursor: pointer;font-size: 1.4rem;"class="fa-solid fa-bars "></i>
    </div>
    </nav>





    <div class="dropdowns"style="z-index:2000;
    position: absolute;
   
    right:0px;
    ">
      <ul
      style="list-style:none;
      font-family:Roboto;
      font-weight: bold;
      margin-left: 0%;
      padding-left: px;
  ">
          <li>
           <a style="text-decoration:none;
           color:#130e0f"
           href="admin.php">
           <i class="fa-regular fa-user"></i>Profile</a></li>
          
          
           <div id="logout" style="
            cursor:pointer;
            text-decoration:none;
            color:#130e0f">
            <i  class="fas fa-sign-out-alt"></i>Logout</div></li>
      </ul>
  </div>
<div class="new-nav2">
    <ul>
       <li><a style="cursor:pointer" href="managestadiums.html">Manage Stadiums</a></li>
       <li><a href="manageEvents.php">Manage Events</a></li>
       <li><a href="managetickets.php">Manage Tickets</a></li>
       <li><a href="managepayments.php">Manage Payments</a></li>
       <li><a href="">Generate Reports</a></li>
    </ul>
</div>
    <h1 style="font-family:Arial, Helvetica, sans-serif;
    padding-left: 10%;font-size:2.1rem;">Manage Stadiums</h1>
    <div class="tabs">
        <button id="tabbtn1">Add a Stadium</button>
        <button id="tabbtn2">Edit a Stadium</button>
        <button  id="tabbtn3" style="
        padding-left:0%">Remove a Stadium</button>
    
    </div>

    <div id="tab1" class="hide">
            <h3 style="font-family:Arial, Helvetica, sans-serif;
            padding-left: 10%;font-size:2.1rem;
            margin-bottom: 2%;">Add Stadiums</h3>
            <div class="tab1">
                <form action="" method="post" enctype="multipart/form-data">
                <div  style="display: flex;
                flex-wrap: wrap;
                justify-content: space-between;">
                    <div>
                    <p>Stadium Name</p>
                    <input type="text" name="stadiumname">
                    </div>
                    <div>
                    <p>Disabled services</p>
                    <input type="radio" value="yes" name="disabledservices">
                    Yes
                       <input type="radio" value="no" name="disabledservices">
                       No
                       </div>

                    </div>

   <div id="add-stadium">

                    <div  style="display: flex;
                    flex-wrap: wrap;
                    justify-content: space-between;">
                        <div>
                        <p>Stadium Country</p>


         <select id="country" name="stadiumcountry" >
<option value="Afghanistan">Afghanistan</option>
        <option value="Åland Islands">Åland Islands</option>
        <option value="Albania">Albania</option>
        <option value="Algeria">Algeria</option>
        <option value="American Samoa">American Samoa</option>
        <option value="Andorra">Andorra</option>
        <option value="Angola">Angola</option>
        <option value="Anguilla">Anguilla</option>
        <option value="Antarctica">Antarctica</option>
        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
        <option value="Argentina">Argentina</option>
        <option value="Armenia">Armenia</option>
        <option value="Aruba">Aruba</option>
        <option value="Australia">Australia</option>
        <option value="Austria">Austria</option>
        <option value="Azerbaijan">Azerbaijan</option>
        <option value="Bahamas">Bahamas</option>
        <option value="Bahrain">Bahrain</option>
        <option value="Bangladesh">Bangladesh</option>
        <option value="Barbados">Barbados</option>
        <option value="Belarus">Belarus</option>
        <option value="Belgium">Belgium</option>
        <option value="Belize">Belize</option>
        <option value="Benin">Benin</option>
        <option value="Bermuda">Bermuda</option>
        <option value="Bhutan">Bhutan</option>
        <option value="Bolivia">Bolivia</option>
        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
        <option value="Botswana">Botswana</option>
        <option value="Bouvet Island">Bouvet Island</option>
        <option value="Brazil">Brazil</option>
        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
        <option value="Brunei Darussalam">Brunei Darussalam</option>
        <option value="Bulgaria">Bulgaria</option>
        <option value="Burkina Faso">Burkina Faso</option>
        <option value="Burundi">Burundi</option>
        <option value="Cambodia">Cambodia</option>
        <option value="Cameroon">Cameroon</option>
        <option value="Canada">Canada</option>
        <option value="Cape Verde">Cape Verde</option>
        <option value="Cayman Islands">Cayman Islands</option>
        <option value="Central African Republic">Central African Republic</option>
        <option value="Chad">Chad</option>
        <option value="Chile">Chile</option>
        <option value="China">China</option>
        <option value="Christmas Island">Christmas Island</option>
        <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
        <option value="Colombia">Colombia</option>
        <option value="Comoros">Comoros</option>
        <option value="Congo">Congo</option>
        <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
        <option value="Cook Islands">Cook Islands</option>
        <option value="Costa Rica">Costa Rica</option>
        <option value="Cote D'ivoire">Cote D'ivoire</option>
        <option value="Croatia">Croatia</option>
        <option value="Cuba">Cuba</option>
        <option value="Cyprus">Cyprus</option>
        <option value="Czech Republic">Czech Republic</option>
        <option value="Denmark">Denmark</option>
        <option value="Djibouti">Djibouti</option>
        <option value="Dominica">Dominica</option>
        <option value="Dominican Republic">Dominican Republic</option>
        <option value="Ecuador">Ecuador</option>
        <option value="Egypt">Egypt</option>
        <option value="El Salvador">El Salvador</option>
        <option value="Equatorial Guinea">Equatorial Guinea</option>
        <option value="Eritrea">Eritrea</option>
        <option value="Estonia">Estonia</option>
        <option value="Ethiopia">Ethiopia</option>
        <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
        <option value="Faroe Islands">Faroe Islands</option>
        <option value="Fiji">Fiji</option>
        <option value="Finland">Finland</option>
        <option value="France">France</option>
        <option value="French Guiana">French Guiana</option>
        <option value="French Polynesia">French Polynesia</option>
        <option value="French Southern Territories">French Southern Territories</option>
        <option value="Gabon">Gabon</option>
        <option value="Gambia">Gambia</option>
        <option value="Georgia">Georgia</option>
        <option value="Germany">Germany</option>
        <option value="Ghana">Ghana</option>
        <option value="Gibraltar">Gibraltar</option>
        <option value="Greece">Greece</option>
        <option value="Greenland">Greenland</option>
        <option value="Grenada">Grenada</option>
        <option value="Guadeloupe">Guadeloupe</option>
        <option value="Guam">Guam</option>
        <option value="Guatemala">Guatemala</option>
        <option value="Guernsey">Guernsey</option>
        <option value="Guinea">Guinea</option>
        <option value="Guinea-bissau">Guinea-bissau</option>
        <option value="Guyana">Guyana</option>
        <option value="Haiti">Haiti</option>
        <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
        <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
        <option value="Honduras">Honduras</option>
        <option value="Hong Kong">Hong Kong</option>
        <option value="Hungary">Hungary</option>
        <option value="Iceland">Iceland</option>
        <option value="India">India</option>
        <option value="Indonesia">Indonesia</option>
        <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
        <option value="Iraq">Iraq</option>
        <option value="Ireland">Ireland</option>
        <option value="Isle of Man">Isle of Man</option>
        <option value="Israel">Israel</option>
        <option value="Italy">Italy</option>
        <option value="Jamaica">Jamaica</option>
        <option value="Japan">Japan</option>
        <option value="Jersey">Jersey</option>
        <option value="Jordan">Jordan</option>
        <option value="Kazakhstan">Kazakhstan</option>
        <option value="Kenya">Kenya</option>
        <option value="Kiribati">Kiribati</option>
        <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
        <option value="Korea, Republic of">Korea, Republic of</option>
        <option value="Kuwait">Kuwait</option>
        <option value="Kyrgyzstan">Kyrgyzstan</option>
        <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
        <option value="Latvia">Latvia</option>
        <option value="Lebanon">Lebanon</option>
        <option value="Lesotho">Lesotho</option>
        <option value="Liberia">Liberia</option>
        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
        <option value="Liechtenstein">Liechtenstein</option>
        <option value="Lithuania">Lithuania</option>
        <option value="Luxembourg">Luxembourg</option>
        <option value="Macao">Macao</option>
        <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
        <option value="Madagascar">Madagascar</option>
        <option value="Malawi">Malawi</option>
        <option value="Malaysia">Malaysia</option>
        <option value="Maldives">Maldives</option>
        <option value="Mali">Mali</option>
        <option value="Malta">Malta</option>
        <option value="Marshall Islands">Marshall Islands</option>
        <option value="Martinique">Martinique</option>
        <option value="Mauritania">Mauritania</option>
        <option value="Mauritius">Mauritius</option>
        <option value="Mayotte">Mayotte</option>
        <option value="Mexico">Mexico</option>
        <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
        <option value="Moldova, Republic of">Moldova, Republic of</option>
        <option value="Monaco">Monaco</option>
        <option value="Mongolia">Mongolia</option>
        <option value="Montenegro">Montenegro</option>
        <option value="Montserrat">Montserrat</option>
        <option value="Morocco">Morocco</option>
        <option value="Mozambique">Mozambique</option>
        <option value="Myanmar">Myanmar</option>
        <option value="Namibia">Namibia</option>
        <option value="Nauru">Nauru</option>
        <option value="Nepal">Nepal</option>
        <option value="Netherlands">Netherlands</option>
        <option value="Netherlands Antilles">Netherlands Antilles</option>
        <option value="New Caledonia">New Caledonia</option>
        <option value="New Zealand">New Zealand</option>
        <option value="Nicaragua">Nicaragua</option>
        <option value="Niger">Niger</option>
        <option value="Nigeria">Nigeria</option>
        <option value="Niue">Niue</option>
        <option value="Norfolk Island">Norfolk Island</option>
        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
        <option value="Norway">Norway</option>
        <option value="Oman">Oman</option>
        <option value="Pakistan">Pakistan</option>
        <option value="Palau">Palau</option>
        <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
        <option value="Panama">Panama</option>
        <option value="Papua New Guinea">Papua New Guinea</option>
        <option value="Paraguay">Paraguay</option>
        <option value="Peru">Peru</option>
        <option value="Philippines">Philippines</option>
        <option value="Pitcairn">Pitcairn</option>
        <option value="Poland">Poland</option>
        <option value="Portugal">Portugal</option>
        <option value="Puerto Rico">Puerto Rico</option>
        <option value="Qatar">Qatar</option>
        <option value="Reunion">Reunion</option>
        <option value="Romania">Romania</option>
        <option value="Russian Federation">Russian Federation</option>
        <option value="Rwanda">Rwanda</option>
        <option value="Saint Helena">Saint Helena</option>
        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
        <option value="Saint Lucia">Saint Lucia</option>
        <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
        <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
        <option value="Samoa">Samoa</option>
        <option value="San Marino">San Marino</option>
        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
        <option value="Saudi Arabia">Saudi Arabia</option>
        <option value="Senegal">Senegal</option>
        <option value="Serbia">Serbia</option>
        <option value="Seychelles">Seychelles</option>
        <option value="Sierra Leone">Sierra Leone</option>
        <option value="Singapore">Singapore</option>
        <option value="Slovakia">Slovakia</option>
        <option value="Slovenia">Slovenia</option>
        <option value="Solomon Islands">Solomon Islands</option>
        <option value="Somalia">Somalia</option>
        <option value="South Africa">South Africa</option>
        <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
        <option value="Spain">Spain</option>
        <option value="Sri Lanka">Sri Lanka</option>
        <option value="Sudan">Sudan</option>
        <option value="Suriname">Suriname</option>
        <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
        <option value="Swaziland">Swaziland</option>
        <option value="Sweden">Sweden</option>
        <option value="Switzerland">Switzerland</option>
        <option value="Syrian Arab Republic">Syrian Arab Republic</option>
        <option value="Taiwan">Taiwan</option>
        <option value="Tajikistan">Tajikistan</option>
        <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
        <option value="Thailand">Thailand</option>
        <option value="Timor-leste">Timor-leste</option>
        <option value="Togo">Togo</option>
        <option value="Tokelau">Tokelau</option>
        <option value="Tonga">Tonga</option>
        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
        <option value="Tunisia">Tunisia</option>
        <option value="Turkey">Turkey</option>
        <option value="Turkmenistan">Turkmenistan</option>
        <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
        <option value="Tuvalu">Tuvalu</option>
        <option value="Uganda">Uganda</option>
        <option value="Ukraine">Ukraine</option>
        <option value="United Arab Emirates">United Arab Emirates</option>
        <option value="United Kingdom">United Kingdom</option>
        <option value="United States">United States</option>
        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
        <option value="Uruguay">Uruguay</option>
        <option value="Uzbekistan">Uzbekistan</option>
        <option value="Vanuatu">Vanuatu</option>
        <option value="Venezuela">Venezuela</option>
        <option value="Viet Nam">Viet Nam</option>
        <option value="Virgin Islands, British">Virgin Islands, British</option>
        <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
        <option value="Wallis and Futuna">Wallis and Futuna</option>
        <option value="Western Sahara">Western Sahara</option>
        <option value="Yemen">Yemen</option>
        <option value="Zambia">Zambia</option>
        <option value="Zimbabwe">Zimbabwe</option>
</select>       



                        
                        </div>
                        <div style="margin-right: 5%;">
                        <p>Food services</p>
                        <input type="radio" value="yes" name="foodservices">
                        Yes
                           <input type="radio" value="no" name="foodservices">
                           No
                           </div>
    
                        </div>

                        <div>
                            <p>Stadium Capacity</p>
                            <input type="number" name="stadiumcapacity">
       </div>
       <div>
                 <p>Stadium Location</p>
                 <input type="text" 
                 name="stadiumlocation">
    </div>

                            <div class="tabbutton">

                                <button style="
                              
                                font-family: Arial, Helvetica, sans-serif;
                          font-weight: bold;
                          cursor: pointer;
                          background-color: #9dda93;
                        ;" id="cancel1" onclick="redirect()">Cancel</button>
                                <input type="submit" value="Add" name="add">
                            </div>
 </form>

            </div>
            </div>
         
    </div>
    <br/>


    <div id="tab2" class="hide">
      
   
            <h3 style="font-family:Arial, Helvetica, sans-serif;
            padding-left: 10%;font-size:2.1rem;
            margin-bottom: 2%;">Edit Stadium</h3>
            <div class="tab1">
                <form action="" method="post">
                <div  style="display: flex;
                flex-wrap: wrap;
                justify-content: space-between;">
                    <div>
                        <p>Stadium Name</p>
                    <select name="stadiumname" id="estadiumname" onchange="changes()">
        <?php
                $ds=$db->query("select * from stadium where ownerid='$userid'");
                while($row=$ds->fetch())
                {
                  
                ?>
            <option value="<?php 
            echo $row['stadium_name'];
             ?>"><?php echo $row['stadium_name']; ?></option>

            <?php
                }
            ?>
          </select>
                    </div>
                    <div id="edisabledservices">
                    <p >Disabled services</p>
                    <input type="radio" value="yes"  name="disabledservices">
                    Yes
                       <input type="radio" value="no" name="disabledservices">
                       No
                       </div>

                    </div>



                  
  <div id="edit-stadium">




  </div>



                            <div class="tabbutton">

                                <button style="
                              
                                font-family: Arial, Helvetica, sans-serif;
                          font-weight: bold;
                          cursor: pointer;
                          background-color: #9dda93;
                        ;" id="cancel1" onclick="redirect()">Cancel</button>
                                <input type="submit" value="Edit" name="edit">
                            </div>
 </form>


            
    </div>
    
        
    </div>

    <br/>
   
    <div id="tab3" class="hide">

        <h3 style="font-family:Arial, Helvetica, sans-serif;
        padding-left: 10%;font-size:2.1rem;
        margin-bottom: 2%;">Remove Stadium</h3>
        <div class="tab1">
            <form action="" method="post">
            <div  style="display: flex;
            flex-wrap: wrap;
            justify-content: space-between;">
                <div>
                <p>Stadium Name</p>
                <select name="stadiumname" id="rstadiumname" onchange="rchanges()">
        <?php
                $ds=$db->query("select * from stadium where ownerid='$userid'");
                while($row=$ds->fetch())
                {
                  
                ?>
            <option value="<?php 
            echo $row['stadium_name'];
             ?>"><?php echo $row['stadium_name']; ?></option>

            <?php
                }
            ?>
          </select>
                </div>
                <div id="rdisabledservices">
                <p>Disabled services</p>
                <input type="radio" value="yes" name="disabledservices">
                Yes
                   <input type="radio" value="no" name="disabledservices">
                   No
                   </div>

         </div>





     <div id="remove-stadium">

                    

     </div>    
     
     


     
     
                  <div class="tabbutton">

                            <button style="
                          
                            font-family: Arial, Helvetica, sans-serif;
                      font-weight: bold;
                      cursor: pointer;
                      background-color: #9dda93;
                    ;" id="cancel1" onclick="redirect()">Cancel</button>
                            <input type="submit" value="Remove" name="remove">
                        </div>
</form>

        

        </div>
        
    </div>

    <br/>






<script>
     const var1=document.getElementById("cancel1");
    var id3=document.getElementById("cross");
   var id4=document.getElementById("bar-nav");
   var id5=document.getElementById("hamburger");
   var dropdown=document.getElementById("dropdown");
   var newdrop=document.querySelector(".dropdowns");
   var tabbtn1=document.getElementById("tabbtn1");
   var tabbtn2=document.getElementById("tabbtn2");
   var tabbtn3=document.getElementById("tabbtn3");
   var tab1=document.getElementById("tab1");
   var tab2=document.getElementById("tab2");
   var tab3=document.getElementById("tab3");

   var editstadium=document.getElementById("edit-stadium");
   var removestadium=document.getElementById("remove-stadium");
   var estadiumname=document.getElementById("estadiumname");
   var rstadiumname=document.getElementById("rstadiumname");
   var edisabledservices=document.getElementById("edisabledservices");
   var rdisabledservices=document.getElementById("rdisabledservices");




   function redirect()
   {
    tab1.classList.remove("show-dropdown");
       tab2.classList.remove("show-dropdown");
       tab3.classList.remove("show-dropdown");
   }

   window.addEventListener("load",(event)=>{
    var xhr = new XMLHttpRequest();
    url='get-stadiums.php?estadiumname='+estadiumname.value;
xhr.onreadystatechange = function() {
    if (xhr.readyState === 4){
        console.log(xhr.responseText);
       editstadium.innerHTML = xhr.responseText;
       
    }
};
xhr.open('POST', url);
xhr.send();

var xhk = new XMLHttpRequest();
    url='get-stadiums.php?estadiumname='+estadiumname.value+'&tqnty1=1';
xhk.onreadystatechange = function() {
    if (xhk.readyState === 4){
        console.log(xhk.responseText);
      edisabledservices.innerHTML = xhk.responseText;
       
    }
};
xhk.open('GET', url);
xhk.send();


var xhp = new XMLHttpRequest();
    url='get-stadiums.php?rstadiumname='+rstadiumname.value;
xhp.onreadystatechange = function() {
    if (xhp.readyState === 4){
        console.log(xhp.responseText);
     removestadium.innerHTML = xhp.responseText;
       
    }
};
xhp.open('POST', url);
xhp.send();

var xhi = new XMLHttpRequest();
    url='get-stadiums.php?rstadiumname='+rstadiumname.value+'&tqnty1=1';
xhi.onreadystatechange = function() {
    if (xhi.readyState === 4){
        console.log(xhi.responseText);
       rdisabledservices.innerHTML = xhi.responseText;
       
    }
};
xhi.open('GET', url);
xhi.send();

   })


function changes()
{
    var xhr = new XMLHttpRequest();
    url='get-stadiums.php?estadiumname='+estadiumname.value;
xhr.onreadystatechange = function() {
    if (xhr.readyState === 4){
        console.log(xhr.responseText);
       editstadium.innerHTML = xhr.responseText;
       
    }
};
xhr.open('POST', url);
xhr.send();

var xhk = new XMLHttpRequest();
url='get-stadiums.php?estadiumname='+estadiumname.value+'&tqnty1=1';
xhk.onreadystatechange = function() {
    if (xhk.readyState === 4){
        console.log(xhk.responseText);
        edisabledservices.innerHTML= xhk.responseText;
       
    }
};
xhk.open('GET', url);
xhk.send();

}


function rchanges()
{

    var xhl = new XMLHttpRequest();
    url='get-stadiums.php?rstadiumname='+rstadiumname.value;
xhl.onreadystatechange = function() {
    if (xhl.readyState === 4){
        console.log(xhl.responseText);
       removestadium.innerHTML = xhl.responseText;
       
    }
};
xhl.open('POST', url);
xhl.send();

var xho = new XMLHttpRequest();
url='get-stadiums.php?rstadiumname='+rstadiumname.value+'&tqnty1=1';
xho.onreadystatechange = function() {
    if (xho.readyState === 4){
        console.log(xho.responseText);
        rdisabledservices.innerHTML= xho.responseText;
       
    }
};
xho.open('GET', url);
xho.send();
}

 var logout=document.getElementById("logout");
 
     logout.addEventListener("click",()=>{
       alert("Logging Out!");
       window.location.assign('logout.php');
     })

     tabbtn1.addEventListener("click",()=>{
       console.log("hi");
       tab1.classList.add("show-dropdown");
       tab2.classList.remove("show-dropdown");
       tab3.classList.remove("show-dropdown");
   })

   tabbtn2.addEventListener("click",()=>{
       tab1.classList.remove("show-dropdown");
       tab2.classList.add("show-dropdown");
       tab3.classList.remove("show-dropdown");
   })

   tabbtn3.addEventListener("click",()=>{
       tab1.classList.remove("show-dropdown");
       tab2.classList.remove("show-dropdown");
       tab3.classList.add("show-dropdown");
   })
 
  function redirect()
   {
    tab1.classList.remove("show-dropdown");
       tab2.classList.remove("show-dropdown");
       tab3.classList.remove("show-dropdown");
   }


   dropdown.addEventListener("click",()=>{

newdrop.classList.toggle("show-dropdown")
})

id5.addEventListener("click",()=>{
    id4.classList.toggle("visible");
})
id3.addEventListener("click",()=>{
        id4.classList.toggle("visible");
})


</script>



</body>
</html>


<?php

require("test.php");




if(isset($_POST['add']))
{
   extract($_POST);
   $validname="/^[a-zA-Z0-9]{2,}[ a-zA-Z0-9-]*$/";


   $str1="";
    $valid=true;
    if(!isset($stadiumname))
    {
        $valid=false;
        $str1.="stadium name has not been entered!\\n";
    }
    if(!isset($disabledservices))
    {
        $valid=false;
        $str1.="disabledservices has not been selected!\\n";
    }
    if(!isset($foodservices))
    {
        $valid=false;
        $str1.="Food services has not been selected!\\n";
    }
    if(!isset($stadiumcountry))
    {
        $valid=false;
        $str1.="stadium country has not been selected!\\n";
    }
    if(!isset($stadiumcapacity))
    {
        $valid=false;
        $str1.="stadium capacity has not been entered!\\n";
    }
    if(!isset($stadiumlocation))
    {
        $valid=false;
        $str1.="stadium location has not been entered!\\n";
    }

    $newfile='';
   

    if($valid==false)
    {
       $str2=nl2br($str1);
          echo "<script>alert('".$str1."')</script>"; 
    }
    else{
    $validnum="/^[1-9]{1}[0-9]{2,}$/";

    if(!(preg_match($validname,$stadiumname)) || !(preg_match($validname,$stadiumlocation)))
     {
         $valid=false;
         $str1.='Invalid name entered for stadium or location,should contain 2 characters at least\\n';
     }

     if(!preg_match($validnum,$stadiumcapacity))
     {
        $valid=false;
         $str1.='Invalid number entered for stadium capacity,should contain 3 digit positive numbers or 0\\n';
     }

     if($disabledservices=="yes" || $disabledservices=="no" &&
     ($foodservices=="yes" || $foodservices=="no"))
     {
       
     }
     else{
         $valid=false;
        $str1.='Invalid input entered for food or disabled services,should contain yes or no\\n';
     }
    }
     if(!(isset($countryarray[$stadiumcountry])))
     {
        $valid=false;
         $str1.='Invalid Country name entered\\n';
     }

     if($valid==false)
     {
        $str2=nl2br($str1);
           echo "<script>alert('".$str1."')</script>"; 
     }
     
     else{
        $ds=$db->query("select * from stadium where stadium_name='$stadiumname'
        and country='$stadiumcountry'");
        $ds=$ds->fetch();
        if(isset($ds["stadium_name"]))
        {
         echo "<script>alert('Stadium with this name Already exists in the given country')</script>";
        }

        else{

         $ds=$db->prepare("insert into stadium (stadium_name,location,disabled_services,
       foodservices,country,capacity,ownerid,filename) values (:stadiumname,:location,:disabledservices,
       :foodservices,:country,:capacity,:ownerid,:filepath)");
       $ds->bindParam(":stadiumname",$stadiumname);
       $ds->bindParam(":location",$stadiumlocation);
       $ds->bindParam(":disabledservices",$disabledservices);
       $ds->bindParam(":foodservices",$foodservices);
       $ds->bindParam(":country",$stadiumcountry);
       $ds->bindParam(":capacity",$stadiumcapacity);
       $ds->bindParam(":ownerid",$userid);
       $ds->bindParam(":filepath",$newfile);
       $ds->execute();
       echo "<script>alert('Stadium has been sucessfully added to the database')</script>";
       echo "<script>window.location.assign('managestadiums.php')</script>";

        }

     }








}

if(isset($_POST['edit']))
{
    extract($_POST);
    $validname="/^[a-zA-Z0-9]{2,}[ a-zA-Z0-9-]*$/";
    unset($_POST["edit"]);
 
    $str1="";
     $valid=true;
     if(!isset($stadiumname))
     {
         $valid=false;
         $str1.="stadium name has not been entered!\\n";
     }
     if(!isset($disabledservices))
     {
         $valid=false;
         $str1.="disabledservices has not been selected!\\n";
     }
     if(!isset($foodservices))
     {
         $valid=false;
         $str1.="Food services has not been selected!\\n";
     }
     if(!isset($stadiumcountry))
     {
         $valid=false;
         $str1.="stadium country has not been selected!\\n";
     }
     if(!isset($stadiumcapacity))
     {
         $valid=false;
         $str1.="stadium capacity has not been entered!\\n";
     }
     if(!isset($stadiumlocation))
     {
         $valid=false;
         $str1.="stadium location has not been entered!\\n";
     }
 
     if($valid==false)
     {
        $str2=nl2br($str1);
           echo "<script>alert('".$str1."')</script>"; 
     }

     else{
     $validnum="/^[1-9]{1}[0-9]{2,}$/";
 
     if(!(preg_match($validname,$stadiumname))&& !(preg_match($validname,$stadiumlocation)))
      {
          $valid=false;
          $str1.='Invalid name entered for stadium or location,should contain 2 characters at least\\n';
      }
 
      if(!preg_match($validnum,$stadiumcapacity))
      {
         $valid=false;
          $str1.='Invalid number entered for stadium capacity,should contain 3 digit positive numbers or 0\\n';
      }
 
      if($disabledservices=="yes" || $disabledservices=="no" &&
      ($foodservices=="yes" || $foodservices=="no"))
      {
        
      }
      else{
          $valid=false;
         $str1.='Invalid input entered for food or disabled services,should contain yes or no\\n';
      }
     }
      if(!(isset($countryarray[$stadiumcountry])))
      {
         $valid=false;
          $str1.='Invalid Country name entered\\n';
      }
 
      if($valid==false)
      {
         $str2=nl2br($str1);
            echo "<script>alert('".$str1."')</script>"; 
      }
      
      else{
          $ds=$db->query("select * from stadium where stadium_name='$stadiumname'
           and ownerid='$userid'");
           $ds=$ds->fetch();
           if($ds["stadium_name"]==$stadiumname)
           {
            $ds=$db->prepare("update stadium set stadium_name=:stadiumname,location=:location,
            disabled_services=:disabledservices,foodservices=:foodservices,
            country=:country,capacity=:capacity where ownerid=:ownerid and stadium_name=:stadiumname");

            $ds->bindParam(":stadiumname",$stadiumname);
            $ds->bindParam(":location",$stadiumlocation);
            $ds->bindParam(":disabledservices",$disabledservices);
            $ds->bindParam(":foodservices",$foodservices);
            $ds->bindParam(":country",$stadiumcountry);
            $ds->bindParam(":capacity",$stadiumcapacity);
            $ds->bindParam(":ownerid",$userid);
            $ds->execute();
            echo "<script>alert('Stadium has been sucessfully updated')</script>";
            echo "<script>window.location.assign('managestadiums.php')</script>";

            
           }

           else{
          echo "<script>alert('Stadium with this name does not exist in database for this admin')</script>";

           }
          
 
 
      }
}

if(isset($_POST['remove']))
{
    extract($_POST);
    $validname="/^[a-zA-Z0-9]{2,}[ a-zA-Z0-9-]*$/";
 
 
    $str1="";
     $valid=true;
     if(!isset($stadiumname))
     {
         $valid=false;
         $str1.="stadium name has not been entered!\\n";
     }
     if(!isset($disabledservices))
     {
         $valid=false;
         $str1.="disabledservices has not been selected!\\n";
     }
     if(!isset($foodservices))
     {
         $valid=false;
         $str1.="Food services has not been selected!\\n";
     }
     if(!isset($stadiumcountry))
     {
         $valid=false;
         $str1.="stadium country has not been selected!\\n";
     }
     if(!isset($stadiumcapacity))
     {
         $valid=false;
         $str1.="stadium capacity has not been entered!\\n";
     }
     if(!isset($stadiumlocation))
     {
         $valid=false;
         $str1.="stadium location has not been entered!\\n";
     }
 
 
     $validnum="/^[1-9]{1}[0-9]{2,}$/";
 
     if(!(preg_match($validname,$stadiumname))&& !(preg_match($validname,$stadiumlocation)))
      {
          $valid=false;
          $str1.='Invalid name entered for stadium or location,should contain 2 characters at least\\n';
      }
 
      if(!preg_match($validnum,$stadiumcapacity))
      {
         $valid=false;
          $str1.='Invalid number entered for stadium capacity,should contain 3 digit positive numbers or 0\\n';
      }
 
      if($disabledservices=="yes" || $disabledservices=="no" &&
      ($foodservices=="yes" || $foodservices=="no"))
      {
        
      }
      else{
          $valid=false;
         $str1.='Invalid input entered for food or disabled services,should contain yes or no\\n';
      }
 
      if(!(isset($countryarray[$stadiumcountry])))
      {
         $valid=false;
          $str1.='Invalid Country name entered\\n';
      }
 
      if($valid==false)
      {
         $str2=nl2br($str1);
            echo "<script>alert('".$str1."')</script>"; 
      }
      
      else{

        $ds=$db->query("select * from stadium where stadium_name='$stadiumname'
        and ownerid='$userid' and country='$stadiumcountry'");
        $ds=$ds->fetch();
        if($ds["stadium_name"]==$stadiumname&&$ds["location"]==$stadiumlocation
        &&$ds["disabled_services"]==$disabledservices&&$ds["foodservices"]==$foodservices
        &&$ds["country"]==$stadiumcountry&&$ds["capacity"]==$stadiumcapacity)
        {

           if($ds["stadium_name"]==$stadiumname)
           {
            $ds=$db->prepare("delete from stadium where stadium_name=:stadiumname and 
            ownerid=:ownerid");

            $ds->bindParam(":stadiumname",$stadiumname);
            $ds->bindParam(":ownerid",$userid);
            $ds->execute();
            echo "<script>alert('Stadium has been sucessfully deleted')</script>";
            echo "<script>window.location.assign('managestadiums.php')</script>";

            
           }

           else{
          echo "<script>alert('Stadium with this name does not exist in database for this admin')</script>";

           }
        }
        else{
            echo "<script>alert('Stadium to be removed in database has data altered by the user\nRejecting opertaion')</script>";
            echo "<script>window.location.assign('managestadiums.php')</script>";
        }
 
 
      } 
}

?>