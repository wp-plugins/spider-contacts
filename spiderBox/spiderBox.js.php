<?php

 /**
 * @package Spider Contacts
 * @author Web-Dorado
 * @copyright (C) 2011 Web-Dorado. All rights reserved.
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 **/
 
 
 // This php file generates JavaScript code therefore direct access must be allowed
 
 
?>
var keyOfOpenImage;
var listOfImages=Array();
var slideShowOn;
var globTimeout;
var slideShowDelay;
var viewportheight;
var viewportwidth;
var newImg = new Image();
var LoadingImg = new Image();
var spiderShop;

function SetOpacity(elem, opacityAsInt)
 {
     var opacityAsDecimal = opacityAsInt;
     
     if (opacityAsInt > 100)
         opacityAsInt = opacityAsDecimal = 100; 
     else if (opacityAsInt < 0)
         opacityAsInt = opacityAsDecimal = 0; 
     
     opacityAsDecimal /= 100;
     if (opacityAsInt < 1)
         opacityAsInt = 1; // IE7 bug, text smoothing cuts out if 0
     
     elem.style.opacity = (opacityAsDecimal);
     elem.style.filter  = "alpha(opacity=" + opacityAsInt + ")";
 }
 
 function FadeOpacity(elemId, fromOpacity, toOpacity, time, fps)
  {
      var steps = Math.ceil(fps * (time / 1000));
      var delta = (toOpacity - fromOpacity) / steps;
      
      FadeOpacityStep(elemId, 0, steps, fromOpacity, 
                      delta, (time / steps));
  }
  
 function FadeOpacityStep(elemId, stepNum, steps, fromOpacity, 
                          delta, timePerStep)
 {
     SetOpacity(document.getElementById(elemId), 
                Math.round(parseInt(fromOpacity) + (delta * stepNum)));
 
     if (stepNum < steps)
         setTimeout("FadeOpacityStep('" + elemId + "', " + (stepNum+1) 
                  + ", " + steps + ", " + fromOpacity + ", "
                  + delta + ", " + timePerStep + ");", 
                    timePerStep);
 }

function getWinHeight() {
	winH=0;
 if (navigator.appName=="Netscape") {
  winH = window.innerHeight;
 }
 if (navigator.appName.indexOf("Microsoft")!=-1) {
  winH = document.body.offsetHeight;
 }
 return winH;
}

function getImageKey(href)
{
	var key=-1;
for(i=0; i<listOfImages.length; i++)	{
		if(encodeURI(href)==encodeURI(listOfImages[i]) || href==encodeURI(listOfImages[i]) || encodeURI(href)==listOfImages[i])
			{
				key=i;				break;
			}	}	return key;	
}

function hidePictureAnimated()
{
FadeOpacity("showPictureAnimated", 100, 0, 500, 10);
FadeOpacity("showPictureAnimatedBg", 70, 0, 500, 10);
setTimeout('document.getElementById("showPictureAnimated").style.display="none";',700);
setTimeout('document.getElementById("showPictureAnimatedBg").style.display="none";',700);
setTimeout('document.getElementById("showPictureAnimatedTable").style.display="none";',700);
	keyOfOpenImage=-1;
clearTimeout(globTimeout);
slideShowOn=0;if(typeof(document.getElementById("toggleSlideShowCheckbox")) != 'undefined' ) document.getElementById("toggleSlideShowCheckbox").src=spiderBoxBase+"play.png";
}

function showPictureAnimated(href)
{
newImg = new Image();

newImg.onload=function() {if(encodeURI(href)==encodeURI(newImg.src) || href==encodeURI(newImg.src) || encodeURI(href)==newImg.src) showPictureAnimatedInner(href, newImg.height, newImg.width);}

if(document.getElementById("showPictureAnimated").clientHeight>0)
{
document.getElementById("showPictureAnimated").style.height=""+document.getElementById("showPictureAnimated").clientHeight+"px";
LoadingImgMargin=(document.getElementById("showPictureAnimated").clientHeight-LoadingImg.height)/2;
}
else
{
document.getElementById("showPictureAnimated").style.height="400px";
LoadingImgMargin=(400-LoadingImg.height)/2;
}


document.getElementById("showPictureAnimated").innerHTML='<img style="margin-top:'+LoadingImgMargin+'px" src="'+spiderBoxBase+'loadingAnimation.gif" />';

if(document.getElementById("showPictureAnimatedBg").style.display=="none")
FadeOpacity("showPictureAnimatedBg", 0, 70, 500, 10);
document.getElementById("showPictureAnimatedTable").style.display="table";
if(darkBG) document.getElementById("showPictureAnimatedBg").style.display="block";
SetOpacity(document.getElementById("showPictureAnimated"), 100);
document.getElementById("showPictureAnimated").style.display="block";
newImg.src = href;
}

function showPictureAnimatedInner(href, newImgheight, newImgwidth)
{
document.getElementById("showPictureAnimated").style.display="none";

if(keyOfOpenImage<0) keyOfOpenImage = getImageKey(href);
boxContainerWidth=0;
if(newImgheight<=(viewportheight-100) && newImgwidth<=(viewportwidth-50))
{
document.getElementById("showPictureAnimated").innerHTML='<img src="'+href+'" border="0" style="cursor:url(\''+spiderBoxBase+'cursor_magnifier_minus.cur\'),pointer;border:" onclick="hidePictureAnimated();" />';

boxContainerWidth=newImgwidth;
}
else
{
if((newImgheight/viewportheight)>(newImgwidth/viewportwidth))
{
document.getElementById("showPictureAnimated").innerHTML='<img src="'+href+'" border="0" style="cursor:url(\''+spiderBoxBase+'cursor_magnifier_minus.cur\'),pointer;" onclick="hidePictureAnimated();" height="'+(viewportheight-100)+'" />';

boxContainerWidth=((newImgwidth*(viewportheight-100))/newImgheight);
}
else
{
document.getElementById("showPictureAnimated").innerHTML='<img src="'+href+'" border="0" style="cursor:url(\''+spiderBoxBase+'cursor_magnifier_minus.cur\'),pointer;" onclick="hidePictureAnimated();" width="'+(viewportwidth-50)+'" />';
boxContainerWidth=(viewportwidth-40);
}
}
document.getElementById("boxContainer").style.width=(boxContainerWidth>300)?(""+boxContainerWidth+"px"):"300px";

document.getElementById("showPictureAnimated").style.height="";

FadeOpacity("showPictureAnimated", 0, 100, 500, 10);
document.getElementById("showPictureAnimated").style.display="block";

if(slideShowOn) 
	{
		clearTimeout(globTimeout);
		globTimeout=setTimeout('nextImage()',slideShowDelay);
	}
}

function nextImage()
{
	if(keyOfOpenImage<listOfImages.length-1)
		keyOfOpenImage=keyOfOpenImage+1;
	else
		keyOfOpenImage=0;
		
		showPictureAnimated(listOfImages[keyOfOpenImage]);
}

function prevImage()
{
	if(keyOfOpenImage>0)
		keyOfOpenImage=keyOfOpenImage-1;
	else
		keyOfOpenImage=listOfImages.length-1;		

		showPictureAnimated(listOfImages[keyOfOpenImage]);
}

function toggleSlideShow()
{
	clearTimeout(globTimeout);
    if(!(slideShowOn))
    	{
			document.getElementById("toggleSlideShowCheckbox").src=spiderBoxBase+"pause.png";
			slideShowOn=1;
    		nextImage();
        }
    else
		{
			document.getElementById("toggleSlideShowCheckbox").src=spiderBoxBase+"play.png";
			slideShowOn=0;
		}
}

window.onresize=getViewportSize;

function getViewportSize()
{
 if (typeof window.innerWidth != 'undefined')
 {
      viewportwidth = window.innerWidth,
      viewportheight = window.innerHeight
 }
 
 else if (typeof document.documentElement != 'undefined'
     && typeof document.documentElement.clientWidth !=
     'undefined' && document.documentElement.clientWidth != 0)
 {
       viewportwidth = document.documentElement.clientWidth,
       viewportheight = document.documentElement.clientHeight
 }
 
 else
 {
       viewportwidth = document.getElementsByTagName('body')[0].clientWidth,
       viewportheight = document.getElementsByTagName('body')[0].clientHeight
 }
 
 if(document.getElementById("tdviewportheight")!=undefined)
 document.getElementById("tdviewportheight").style.height=(viewportheight-35)+"px"; 
 
if(document.getElementById("showPictureAnimatedBg")!=undefined)
document.getElementById("showPictureAnimatedBg").style.height=(viewportheight+300)+"px";
}




function SpiderCatAddToOnload()
{
	if(SpiderCatOFOnLoad){SpiderCatOFOnLoad();}

 getViewportSize();

	slideShowDelay=<?php echo $_GET['delay']; ?>;
	slideShowQ=<?php echo $_GET['slideShowQ']; ?>;	
	allImagesQ=<?php echo $_GET['allImagesQ']; ?>;
	spiderShop=<?php echo isset($_GET['spiderShop'])?$_GET['spiderShop']:0; ?>;
	darkBG=<?php echo $_GET['darkBG']; ?>;
	keyOfOpenImage=-1;
	spiderBoxBase="<?php echo urldecode($_GET['juriroot']); ?>/spiderBox/";
	LoadingImg.src=spiderBoxBase+"loadingAnimation.gif";

	
		var spiderBoxElement = document.createElement('span');
	spiderBoxElement.innerHTML+='<div style="position:fixed; top:0px; left:0px; width:100%; height:'+(viewportheight+300)+'px; background-color:#000000; z-index:98; display:none" id="showPictureAnimatedBg"></div>  <table border="0" cellpadding="0" cellspacing="0" id="showPictureAnimatedTable" style="position:fixed; top:0px; left:0px; width:100%; vertical-align:middle; text-align:center; z-index:99; display:none"><tr><td valign="middle" id="tdviewportheight" style="height:'+(viewportheight-35)+'px; text-align:center;"><div id="boxContainer" style="margin:auto;width:400px; border:5px solid white;"><div id="showPictureAnimated" style=" height:400px">&nbsp;</div><div style="text-align:center;background-color:white;padding:5px;padding-bottom:0px;"><div style="width:48px;float:left;">&nbsp;</div><span onclick="prevImage();" style="cursor:pointer;"><img src="'+spiderBoxBase+'prev.png" /></span>&nbsp;&nbsp;'+(slideShowQ?'<span><img src="'+spiderBoxBase+'play.png" id="toggleSlideShowCheckbox" onclick="toggleSlideShow();"  style="cursor:pointer;"/></span>&nbsp;&nbsp;':'')+'<span onclick="nextImage();" style="cursor:pointer;"><img src="'+spiderBoxBase+'next.png" /></span><span onclick="hidePictureAnimated();" style="cursor:pointer;"><img src="'+spiderBoxBase+'close.png" align="right" /></span></div></div></td></tr></table>';

	document.body.appendChild(spiderBoxElement);

	
			for ( i = 0; i < document.getElementsByTagName( 'a' ).length; i++ )
				if(document.getElementsByTagName( 'a' )[i].target=="spiderbox" || ((allImagesQ || spiderShop) && (document.getElementsByTagName( 'a' )[i].href.substr(document.getElementsByTagName( 'a' )[i].href.length-4)==".jpg" || document.getElementsByTagName( 'a' )[i].href.substr(document.getElementsByTagName( 'a' )[i].href.length-4)==".png" || document.getElementsByTagName( 'a' )[i].href.substr(document.getElementsByTagName( 'a' )[i].href.length-4)==".gif" || document.getElementsByTagName( 'a' )[i].href.substr(document.getElementsByTagName( 'a' )[i].href.length-4)==".bmp" || document.getElementsByTagName( 'a' )[i].href.substr(document.getElementsByTagName( 'a' )[i].href.length-4)==".JPG" || document.getElementsByTagName( 'a' )[i].href.substr(document.getElementsByTagName( 'a' )[i].href.length-4)==".PNG" || document.getElementsByTagName( 'a' )[i].href.substr(document.getElementsByTagName( 'a' )[i].href.length-4)==".GIF" || document.getElementsByTagName( 'a' )[i].href.substr(document.getElementsByTagName( 'a' )[i].href.length-4)==".BMP"))) 
					{

						listOfImages[listOfImages.length]=document.getElementsByTagName( 'a' )[i].href;
						document.getElementsByTagName( 'a' )[i].href="javascript:showPictureAnimated('"+document.getElementsByTagName( 'a' )[i].href+"')";						document.getElementsByTagName( 'a' )[i].style.cursor="url('<?php echo urldecode($_GET['juriroot']); ?>/spiderBox/cursor_magnifier_plus.cur'),pointer";						
                        document.getElementsByTagName( 'a' )[i].target="";
						
					}

}