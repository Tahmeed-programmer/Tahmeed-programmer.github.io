const EmailExp=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/i;
const genericExp=/^([a-zA-Z0-9 ']{1,50})$/i;
const BHMobileNumberExp=/^[0-9]{8}$|^(00|\+)+[0-9]{3}\s?([0-9]{8})$/;
const blockExp=/^[0-9]{3,4}$/;
const errorIcon="<i class=\"fa fa-times-circle\" aria-hiddesn=\"true\"></i>";
var locationFlags={
    "blockFrom":false,
    "streetFrom":false,
    "buildingFrom":false,
    "flatFrom":true,
    "blockTo":false,
    "streetTo":false,
    "buildingTo":false,
    "flatTo":true,
    "date":false,
    "time":false
};
function checkGenericLocation(val,elm)
{
    var span=document.querySelector("span[name="+elm+"]");
    if(genericExp.test(val))
    {
        locationFlags[elm]=true;
        span.setAttribute("class","field__label");
        span.innerHTML=span.innerHTML.replace(errorIcon,'');
        
    }
    else
    {
        locationFlags[elm]=false;
        span.setAttribute("class","field__label-error");
        if(!span.innerHTML.includes(errorIcon))
        {
            span.innerHTML+=errorIcon;
        }
        var input=document.querySelector("input[name="+elm+"]");
        input.style.border.color="red";

    }
    LocationActivateNext();
}
function checkBlock(val,elm)
{
    var span=document.querySelector("span[name="+elm+"]");
    if(blockExp.test(val))
    {
        locationFlags[elm]=true;
        span.setAttribute("class","field__label");
        span.innerHTML=span.innerHTML.replace(errorIcon,'');
        
    }
    else
    {
        locationFlags[elm]=false;
        span.setAttribute("class","field__label-error");
        if(!span.innerHTML.includes(errorIcon))
        {
            span.innerHTML+=errorIcon;
        }
        var input=document.querySelector("input[name="+elm+"]");
        input.style.border.color="red";

    }
    LocationActivateNext();

}
function checkFlat(val,elm)
{
    var span=document.querySelector("span[name="+elm+"]");
    if(genericExp.test(val) || val=='')
    {
        locationFlags[elm]=true;
        span.setAttribute("class","field__label");
        span.innerHTML=span.innerHTML.replace(errorIcon,'');
        
    }
    else
    {
        locationFlags[elm]=false;
        span.setAttribute("class","field__label-error");
        if(!span.innerHTML.includes(errorIcon))
        {
            span.innerHTML+=errorIcon;
        }
        var input=document.querySelector("input[name="+elm+"]");
        input.style.border.color="red";

    }
    LocationActivateNext();
}
function dateChange()
{
    var min=0;
    var hour=document.getElementById("currHr").value;
    var inDate=new Date(document.getElementById("date").value);
    var today=new Date(document.getElementById("today").value);
    var tmw=new Date(document.getElementById("today").value);
    inDate.setHours(0,0,0,0);
    today.setHours(0,0,0,0);
    tmw.setHours(0,0,0,0);
    tmw.setDate(tmw.getDate()+1);
    document.getElementById("timeOptions").innerHTML="";

    if(inDate.getTime()===today.getTime())
    {
        if(17>hour&& hour>8)
        {
            min=parseInt(hour)+3;
        }
        else{
            var option=document.createElement("option");
            option.innerHTML="No Available Time slots";
            option.setAttribute("hidden","true");
            option.setAttribute("disabled","true");
            option.setAttribute("selected","true");
            option.setAttribute("value","");
            document.getElementById("timeOptions").appendChild(option);
            locationFlags["time"]=false;
            LocationActivateNext();
            return;
        }
    }
    else if(inDate.getTime()===tmw.getTime())
    {
        if(17>hour && hour>8){
            min=8;
        }else{
            min=11;
        }
    }
    document.getElementById("timeOptions").innerHTML="";
    for(var i=min;i<=23;i++)
    {
        var option=document.createElement("option");
        option.value=i;
        var end=(i+1)%24;
        option.innerHTML=i+":00"+"-"+end+":00";
        document.getElementById("timeOptions").appendChild(option);
    }
    locationFlags["time"]=true;
    locationFlags["date"]=true;
    LocationActivateNext()
}
function LocationActivateNext()
{
    for(var key in locationFlags)
    {
        if(locationFlags[key]===false)
        {
            document.getElementById("locationNext").setAttribute("disabled","true");
            document.getElementById("locationNext").setAttribute("style","background-color: gray;");
            return false;
        }
        
    }
    document.getElementById("locationNext").removeAttribute("disabled");
    document.getElementById("locationNext").removeAttribute("style");
    return true;
}

var personalFlags=
{
    "shipperEmail":false,
    "shipperPhone":false,
    "recEmail":false,
    "recPhone":false,
}
function checkEmail(val,elm){
    var span=document.querySelector("span[name="+elm+"]");
    if(EmailExp.test(val))
    {
        personalFlags[elm]=true;
        span.setAttribute("class","field__label");
        span.innerHTML=span.innerHTML.replace(errorIcon,'');
        
    }
    else
    {
        personalFlags[elm]=false;
        span.setAttribute("class","field__label-error");
        if(!span.innerHTML.includes(errorIcon))
        {
            span.innerHTML+=errorIcon;
        }
        var input=document.querySelector("input[name="+elm+"]");
        input.style.border.color="red";

    }
    if(document.getElementById("matchCheck").checked)
    {
        matchCheckBox();
        return;
    }
    PersonalActivateNext();
}
function checkPhone(val,elm){
    var span=document.querySelector("span[name="+elm+"]");
    if(BHMobileNumberExp.test(val))
    {
        personalFlags[elm]=true;
        span.setAttribute("class","field__label");
        span.innerHTML=span.innerHTML.replace(errorIcon,'');
        
    }
    else
    {
        personalFlags[elm]=false;
        span.setAttribute("class","field__label-error");
        if(!span.innerHTML.includes(errorIcon))
        {
            span.innerHTML+=errorIcon;
        }
        var input=document.querySelector("input[name="+elm+"]");
        input.style.border.color="red";

    }
    if(document.getElementById("matchCheck").checked)
    {
        matchCheckBox();
        return;
    }
    PersonalActivateNext();
}

function matchCheckBox()
{
    let checkbox=document.getElementById("matchCheck");
    if(checkbox.checked)
    {
        personalFlags["recEmail"]=personalFlags["shipperEmail"];
        personalFlags["recPhone"]=personalFlags["shipperEmail"];
        document.getElementById("recEmail").value=document.getElementById("shipperEmail").value;
        document.getElementById("recPhone").value=document.getElementById("shipperPhone").value;
        document.getElementById("recEmail").setAttribute("disabled","true");
        document.getElementById("recPhone").setAttribute("disabled","true");
        document.getElementById("recPhone").removeAttribute("pattern");
        document.getElementById("recEmail").setAttribute("style","background-color: #e3e3e3;");
        document.getElementById("recPhone").setAttribute("style","background-color: #e3e3e3;");
        
    }
    else
    {
        personalFlags["recEmail"]=false;
        personalFlags["recPhone"]=false;
        document.getElementById("recEmail").value="";
        document.getElementById("recPhone").value="";
        document.getElementById("recEmail").removeAttribute("disabled");
        document.getElementById("recPhone").removeAttribute("disabled");
        document.getElementById("recEmail").removeAttribute("style");
        document.getElementById("recPhone").removeAttribute("style");
        document.getElementById("recPhone").setAttribute("pattern","[+0-9]");
    }
    PersonalActivateNext();
}

function PersonalActivateNext()
{
    for(var key in personalFlags)
    {
        if(personalFlags[key]===false)
        {
            document.getElementById("personalNext").setAttribute("disabled","true");
            document.getElementById("personalNext").setAttribute("style","background-color: gray;");
            return false;
        }
        
    }
    document.getElementById("personalNext").removeAttribute("disabled");
    document.getElementById("personalNext").removeAttribute("style");
    return true;
}
function validateCargo()
{
    var cargoFS=document.getElementById("cargoFS");
    var inputs=cargoFS.getElementsByTagName("input");
    var selects=cargoFS.getElementsByTagName("select");
    if(selects.length==0)
    {
        document.getElementById("cargoNext").setAttribute("disabled","true");
        document.getElementById("cargoNext").setAttribute("style","background-color: gray;");
        return false;
    }
    for(let i=0;i<inputs.length;i++){
        if(inputs[i].value=="")
        {
            document.getElementById("cargoNext").setAttribute("disabled","true");
            document.getElementById("cargoNext").setAttribute("style","background-color: gray;");
            return false;
        }
    }

    for(let i=0;i<selects.length;i++){
        let val=selects[i].options[selects[i].selectedIndex].value;
        if(val=="")
        {
            document.getElementById("cargoNext").setAttribute("disabled","true");
            document.getElementById("cargoNext").setAttribute("style","background-color: gray;");
            return false;
            
        }
    }
    document.getElementById("cargoNext").removeAttribute("disabled");
    document.getElementById("cargoNext").removeAttribute("style");
    return true;
}

function validSubmit(){
    if(validateCargo() && validatePersonal() && validateLocation())
    {
        return true;
    }else{
        return false;
    }
}