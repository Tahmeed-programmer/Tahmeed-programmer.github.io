

var shipper_form=document.getElementById("shipper-form")
var carrier_form=document.getElementById("carrier-form")
var join1=document.getElementById("join1")
var join2=document.getElementById("join2");
var carrier_text=document.getElementById("carrier-text")
var shipper_text=document.getElementById("shipper-text")
var shipperForm=shipper_form.childNodes[0]
var carrierForm=carrier_form.childNodes[0]




join1.addEventListener("click",()=>{
    carrier_text.classList.toggle("hide")
    join1.classList.toggle("hide")
    carrier_form.classList.toggle("hide")

})

join2.addEventListener("click",()=>{
    shipper_text.classList.toggle("hide")
    join2.classList.toggle("hide")
    shipper_form.classList.toggle("hide")
})


shipperForm.addEventListener("submit",(e)=>{
    e.preventDefault();
    let XHR = new XMLHttpRequest();
    let FD = new FormData(shipperForm);
    XHR.addEventListener('load', (event) => {
        shipper_form.innerHTML="<p>Thank You, we will get in touch soon! &#x2713<p>"
      });
    
      // Define what happens in case of error
      XHR.addEventListener('error', (event) => {
        alert('Oops! Something went wrong.');
      });

      
     let url=''
      // Set up our request
      XHR.open('POST', url);
    
      // Send our FormData object; HTTP headers are set automatically
      XHR.send(FD);
})

carrierForm.addEventListener("submit",(e)=>{
    e.preventDefault();
    let XHR = new XMLHttpRequest();
    let FD = new FormData(carrierForm);
    XHR.addEventListener('load', (event) => {
        carrier_form.innerHTML="<p>Thank You, we will get in touch soon! &#x2713<p>"
      });
    
      // Define what happens in case of error
      XHR.addEventListener('error', (event) => {
        alert('Oops! Something went wrong.');
      });

 /////// Asim set the URL here   ////////

     let url='';

      // Set up our request
      XHR.open('POST', url);
    
      // Send our FormData object; HTTP headers are set automatically
      XHR.send(FD);
    
})



var plus=document.getElementsByClassName("plus")

console.log(plus[0].parentElement.nextElementSibling)

for(let i=0;i<plus.length;i++)
{
    plus[i].addEventListener("click",function(){
        let content=this.parentElement.nextElementSibling;
        this.parentElement.classList.toggle("color")
        this.classList.toggle('color');
        content.classList.toggle("hidden")
        console.log("bool "+content.classList.contains("hidden"))
        if(content.classList.contains("hidden"))
        {
            this.innerHTML="&#43";
        }
        else{
            this.innerHTML="&#8722";
        }
        if (content.style.maxHeight){
            content.style.opacity=0
            content.style.maxHeight = null;
            
          } else {
            content.style.opacity=1;
            content.style.maxHeight = content.scrollHeight + "px";
          } 

    })
}
