var hamburger = document.querySelector(".hamburger");
var closelink= document.querySelector(".close");
var hamburger_list=document.querySelector(".hamburger-list");

hamburger.addEventListener("click", function(e){
    hamburger.classList.toggle("none");
    closelink.classList.toggle("none");
    hamburger_list.classList.toggle("none");
    hamburger_list.classList.toggle("visible");
})

closelink.addEventListener("click", function(e)
{
    
    closelink.classList.toggle("none");
    hamburger_list.classList.toggle("none");
    hamburger_list.classList.toggle("visible");
    hamburger.classList.toggle("none");
});

var oval=document.getElementById("oval");
var basic=document.getElementById("basic");
var advanced=document.getElementById("advanced");
var buisness=document.getElementById("buisness");
var flag=false;

oval.addEventListener("click", function(e){
    oval.classList.toggle("move");
    if(flag==false)
    flag=true;
    else
    flag=false;
    
    if(flag)
    {
        basic.innerText="$190.00";
        advanced.innerText="$390.00";
        buisness.innerText="$990.00";
    }
    else{
        basic.innerText="$19.00";
        advanced.innerText="$39.00";
        buisness.innerText="$99.00";
    }
    
});