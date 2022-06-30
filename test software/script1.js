
var ts=0;
document.addEventListener("DOMContentLoaded", function() { 

var t=document.querySelector(".parent");
         console.log("value is- "+t);
         t.addEventListener('click',func1);
 
      
         function func1()
         {
             console.log("hello");
             t.style.backgroundColor="green";

         }
        }
)
