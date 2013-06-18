var httpRequest = createHttpRequest();
var resultId = '';
var resQ=1;

function cat_form_reset(form)
{
form.name_search.value='';
if(typeof(form.cat_id)!=='undefined') form.cat_id.value='0';
form.submit();
}


function createHttpRequest()
{
    var httpRequest;
    var browser = navigator.appName;

    if (browser == "Microsoft Internet Explorer")
    {
        httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
    }
    else
    {
        httpRequest = new XMLHttpRequest();
    }

    return httpRequest;
}

function sendRequest(file, _resultId, txt)
{
    resultId = _resultId;

httpRequest.open('post', file, true);
	
    httpRequest.onreadystatechange = getRequest;

httpRequest.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf8");

    httpRequest.send(txt);
}

function getRequest()
{
    if (httpRequest.readyState == 4)
    {
     if(resultId!='')
	 	document.getElementById(resultId).innerHTML = httpRequest.responseText;
	resQ=1;
	}
}


function cont_change_picture(url,obj,width,height)
{
			document.getElementById("cont_main_picture_a").href=obj.parentNode.href;	
		document.getElementById("cont_main_picture").style.backgroundImage='url('+url+')';	

}



function submit_message(text1,text2,text3,text4, text5, text6){
	
	function checkEmail() {
var email = document.getElementById('email');
var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
if (email.type == 'hidden')
return true;
else if (!filter.test(email.value)) {
alert('Please provide a valid email address');
email.focus;
return false;
}
else return true;
	}
if(document.getElementById("full_name").value=='')      
{              
alert(text1);  	 	      
document.getElementById("full_name").focus();  	 	    
}        
else  
if(document.getElementById("message_text").value=='')      
{              
alert(text2);   	 	      
document.getElementById("message_text").focus();    	 	    
} 

else  
if(document.getElementById("mes_title").value=='')      
{              
alert(text3);   	 	      
document.getElementById("mes_title").focus();    	 	    
} 

else  
if(document.getElementById("phone").value=='')      
{              
alert(text5);   	 	      
document.getElementById("phone").focus();    	 	    
} 
          
else  
if(checkEmail())      

{
	if(resQ) 
		{
			resQ=0;
  	  		sendRequest(document.getElementById('wd_captcha_img').src.split("&")[0]+'&checkcap=1&cap_code='+document.getElementById("message_capcode").value, 'caphid','');
			resNumberOfTry=0;
			submitMessageInner(text4);
		}

} 

}

function submitMessageInner(text)
{
	if(resQ) 
		{
			if(document.getElementById("caphid").innerHTML=="1")
				document.forms['message'].submit();   
			else
				{
					alert(text);
					refreshCaptchaCont();
				}
		}   
else if(resNumberOfTry<100) setTimeout("submitMessageInner('"+text+"');",200); resNumberOfTry++;

}



function refreshCaptchaCont()
{
document.getElementById('wd_captcha_img').src=document.getElementById('wd_captcha_img').src.split("&")[0]+'&r='+Math.floor(Math.random()*100);
document.getElementById("message_capcode").value='';
}