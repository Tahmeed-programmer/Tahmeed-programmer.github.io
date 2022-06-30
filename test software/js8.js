var xmlHttp;
var xmlHttp1;

function GetXmlHttpObject1() {
  var xmlHttp1=null;
  try
  	{
  	// Firefox, Opera 8.0+, Safari
  	xmlHttp1=new XMLHttpRequest();
  	}
  catch (e)
  	{
  	// Internet Explorer
  	try
  		{ xmlHttp1=new ActiveXObject("Msxml2.XMLHTTP"); }
  	catch (e)
  		{ xmlHttp1=new ActiveXObject("Microsoft.XMLHTTP"); }
  	}
  return xmlHttp1;
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

function showHint(str) {
  if (str.length==0){
    document.getElementById("txtHint").innerHTML="";
    return;
  }

  xmlHttp=GetXmlHttpObject(); //use the same function as the previous example
  if (xmlHttp==null)  {
    alert ("Your browser does not support AJAX!");
    return;
  }

  var url="js8.php";
  url=url+"?q="+str;
  url=url+"&sid="+Math.random(); 

  xmlHttp.onreadystatechange=stateChanged; 
  xmlHttp.open("GET",url,true);
  xmlHttp.send(null);
}
function showorder(str) {
  
  
  xmlHttp=GetXmlHttpObject(); //use the same function as the previous example

  var url="selectordertrack.php";
  url=url+"?q="+str;
  url=url+"&sid="+Math.random(); 

  xmlHttp.onreadystatechange=stateChanged; 
  xmlHttp.open("GET",url,true);
  xmlHttp.send(null);
  function stateChanged() {
    if (xmlHttp.readyState==4){
      document.getElementById("txthint11").innerHTML=xmlHttp.responseText;
      }
    }
}

function stateChanged() {
  if (xmlHttp.readyState==4){
  	document.getElementById("txthint").innerHTML=xmlHttp.responseText;
  	}
  }


