<?php 

/*
Plugin Name: Spider Contacts
Plugin URI: http://web-dorado.com/
Version: 1.1.3
Author: http://web-dorado.com/
License: GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
*/

add_action( 'init', 'contact_lang_load' );

function contact_lang_load() {
	 load_plugin_textdomain('sp_contact', false, basename( dirname( __FILE__ ) ) . '/Languages' );
	
}

function contcat_single_shotrcode($atts) {
     extract(shortcode_atts(array(
	      'id' => 'no contact',
     ), $atts));
	 if(!(is_numeric($atts['id'])))
	return 'insert numerical  shortcode in `id`';
	 
     return single_contact_front_end($id);
}
add_shortcode('Spider_contact_single', 'contcat_single_shotrcode');


function contcat_category_shotrcode($atts) {
     extract(shortcode_atts(array(
	      'id' => 'no contact',
		  'type' => 0,
		  'order_by' => 0
     ), $atts));
	 
	if(!($atts['type']==0 || $atts['type']==1 || $atts['type']==2))
	return  'insert valid `type`';
	if(!($atts['order_by']==0 || $atts['order_by']==1 || $atts['order_by']==2 || $atts['order_by']==3))
	return  'insert valid `order_by`';
	
	
     return category_contact_front_end($atts['id'],$atts['type'],$atts['order_by']);
}
add_shortcode('Spider_contact_categories', 'contcat_category_shotrcode');



function single_contact_front_end($id){
	
	require_once("front_end_functions.php");
	require_once("front_end_functions.html.php");
	return front_end_single_contact($id);
	
}
function category_contact_front_end($id,$type,$order_by)
{
require_once("front_end_functions.php");
	require_once("front_end_functions.html.php");
	if($type==1){

	if(isset($_GET['contact_id'])){
		if(isset($_GET['view']))
		{
		

			return		front_end_single_contact($_GET['contact_id']);

		}
			else{
			return		front_end_single_contact($_GET['contact_id']);
			}
	}
	else
	{
	 return	front_end_cotegory_contact_list($id,$type,$order_by);
	}
	}
	
	
	if($type==0){
		

	
	if(isset($_GET['contact_id'])){
		if(isset($_GET['view']))
		{

			return		front_end_single_contact($_GET['contact_id']);

		}
			else{
			return		front_end_single_contact($_GET['contact_id']);
			}
	}
	else
	{
	 return	fornt_end_contact_short($id, $type, $order_by);
	}
	}
	if($type==2){
		
	
	
	
	if(isset($_GET['contact_id'])){
		if(isset($_GET['view']))
		{

			return		front_end_single_contact($_GET['contact_id']);
			
		}
			else{
			return		front_end_single_contact($_GET['contact_id']);
			}
	}
	else
	{
	 return	fornt_end_contact_cells($id,$type, $order_by);
	}
	}
	
	
}
function print_massage_contact($content)
{
$mh_after_head = did_action( 'wp_enqueue_scripts' );
if($mh_after_head==1){
	global $wpdb;
	
	
	       @session_start();
			if( isset($_SESSION['msg_befor_submit']))
			{
				if($_SESSION['msg_befor_submit']!="")
				{

				$message=$_SESSION['msg_befor_submit'];
				$_SESSION['msg_befor_submit']="";
			
 $returned_content="   <style>	
.updated,.error{
border-width:1px !important;
border-style:solid !important;
padding:0 .6em !important;
margin:5px 15px 2px !important;
-moz-border-radius:3px !important;
-khtml-border-radius:3px !important;
-webkit-border-radius:3px !important;
border-radius:3px !important;
}
.updated p, .error p
{
font-size: 12px !important;
margin:.5em 0 !important;
line-height:1 !important;
padding:2px !important;
}
 .updated, .error
{
	margin:5px 0 15px !important;
}
.updated{
	background-color:#ffffe0 !important;
	border-color:#e6db55 !important;
}
.error
{
	background-color:#ffebe8 !important;
	border-color:#c00 !important;
}
error a
{
	color:#c00 !important;
}
.error
{
	line-height:22px !important;
	margin:0 15px !important;
	padding:3px 5px !important;
}
.error-div
{
	display:block !important;
	line-height:36px !important;
	float:right !important;
	margin-right:20px !important;
}
</style>";


if($_SESSION['error_or_no'])
{
	$error='error';
}
else
{
	$error='updated';
}

			$returned_content.="<div class=\"".$error."\" ><p><strong>".$message."</strong></p></div>".$content;// modified content
			return $returned_content;
				}
				else
				{
					return $content;
				}
			}
			else
			{
				return $content;
			}
			}
			else
			{
			return $content;
			}
}


add_filter('the_content', 'print_massage_contact'); 

add_filter('mce_external_plugins', "Spider_contact_register");
add_filter('mce_buttons', 'Spider_contact_add_button', 0);






function Spider_contact_add_button($buttons)
{
    array_push($buttons, "Spider_contact_mce");
    return $buttons;
}









 /// function for registr new button
function Spider_contact_register($plugin_array)
{
	$url = plugins_url( 'js/editor_plugin.js' , __FILE__ ); 
    $plugin_array["Spider_contact_mce"] = $url;
    return $plugin_array;
}










function add_button_style_Spider_contact()
{
echo '<style type="text/css">
.wp_themeSkin span.mce_Spider_contact_mce {background:url('.plugins_url( 'images/Spider_contactLogo.png' , __FILE__ ).') no-repeat !important;}
.wp_themeSkin .mceButtonEnabled:hover span.mce_Spider_contact_mce,.wp_themeSkin .mceButtonActive span.mce_Spider_Catalog_mce
{background:url('.plugins_url( 'images/Spider_ContactLogoHover.png' , __FILE__ ).') no-repeat !important;}
</style>';
}

add_action('admin_head', 'add_button_style_Spider_contact');












function contact_spiderbox_scripts_method() {
    wp_enqueue_script( 'spiderbox',admin_url('admin-ajax.php?action=conspiderboxjsphp').'&delay=3000&allImagesQ=0&slideShowQ=0&darkBG=1&juriroot='.urlencode(plugins_url("",__FILE__)).'&spiderShop=1' );
	wp_enqueue_script( 'contact_common',plugins_url("js/common.js",__FILE__));
	wp_enqueue_style('spider_contact_main',plugins_url("spidercontacts_main.css",__FILE__));
}    
 
add_action('wp_enqueue_scripts', 'contact_spiderbox_scripts_method');











add_filter('admin_head','spider_contact');
function spider_contact() {
	wp_enqueue_script( 'common' );
	wp_enqueue_script( 'jquery-color' );
	wp_print_scripts('editor');
	if (function_exists('add_thickbox')) add_thickbox();
	wp_print_scripts('media-upload');
	if (function_exists('wp_tiny_mce')) wp_tiny_mce();
	wp_admin_css();
	wp_enqueue_script('utils');
	do_action("admin_print_styles-post-php");
	do_action('admin_print_styles');
}




















add_action('admin_menu', 'Spider_Contact_options_panel');
function Spider_Contact_options_panel(){
		$page_cat  = add_menu_page(	'Theme page title', 'Spider Contacts', 'manage_options', 'Categories_Spider_contact', 'Categories_Spider_contact',plugins_url( 'images/Spider_Contact menu.png' , __FILE__ ))  ;
 					 add_submenu_page( 'Categories_Spider_contact', 'Categories', 'Categories', 'manage_options', 'Categories_Spider_contact', 'Categories_Spider_contact');
		$page_prad=  add_submenu_page( 'Categories_Spider_contact', 'Contacts', 'Contacts', 'manage_options', 'Single_Spider_contact', 'Single_Spider_contact');
		$massage_page=add_submenu_page( 'Categories_Spider_contact', 'Messages', 'Message', 'manage_options', 'Massages_Spider_contact', 'Massages_Spider_contact');
					 add_submenu_page( 'Categories_Spider_contact', 'Global Options', 'Global Options', 'manage_options', 'Options_contact_global', 'Options_contact_global');
 		$page_option=add_submenu_page( 'Categories_Spider_contact', 'Styles and Colors', 'Styles and Colors', 'manage_options', 'Options_contact_styles', 'Options_contact_styles');
					 add_submenu_page( 'Categories_Spider_contact', 'Message Options', 'Message Options', 'manage_options', 'Options_masasge_options', 'Options_masasge_options');
					 add_submenu_page( 'Categories_Spider_contact', 'Licensing', 'Licensing', 'manage_options', 'Spider_contact_Licensing', 'Spider_contact_Licensing');
					 add_submenu_page( 'Categories_Spider_contact', 'Uninstall Spider Contact ', 'Uninstall Spider Contact', 'manage_options', 'Uninstall_Spider_Contact', 'Uninstall_Spider_Contact');
 
  	add_action('admin_print_styles-' . $page_cat, 'Spider_Category_contact_admin_script');
    add_action('admin_print_styles-' . $page_prad, 'Spider_prodact_contact_admin_script');
	add_action('admin_print_styles-' . $page_option, 'Spider_option_contact_admin_script');
	add_action('admin_print_styles-' . $massage_page, 'Spider_massages_contact_admin_script');
}









/////////////////////             Spider_Category print styles

function Spider_massages_contact_admin_script(){
				wp_enqueue_script("mootools",plugins_url("js/mootools.js",__FILE__));
				wp_enqueue_script("Calendar",plugins_url("js/calendar.js",__FILE__),false);
 			  	wp_enqueue_script("calendar-setup",plugins_url("js/calendar-setup.js",__FILE__),false);
				wp_enqueue_script("calendar_function",plugins_url("js/calendar_function.js",__FILE__),false);
				wp_enqueue_style("Css",plugins_url("js/calendar-jos.css",__FILE__),false); 
	
	}
function Spider_Category_contact_admin_script()
{

		wp_enqueue_script( 'param_block',plugins_url("js/param_block.js",__FILE__));	
}
function Spider_prodact_contact_admin_script()
{
	
		wp_enqueue_script( 'param_block',plugins_url("js/param_block.js",__FILE__));	
}
function Spider_option_contact_admin_script()
{
			wp_enqueue_script( 'color_js',plugins_url("elements/jscolor/jscolor.js",__FILE__));
}










function Spider_contact_Licensing(){
	?>
    
   <div style="width:95%"> <p>
This plugin is the non-commercial version of the Spider Contacts. If you want to customize to the styles and colors of your website,than you need to buy a license.
Purchasing a license will add possibility to customize the styles and colors, global options and message options of the Spider Contacts. 

 </p>
<br /><br />
<a href="http://web-dorado.com/files/fromSpiderContactsWP.php" class="button-primary" target="_blank">Purchase a License</a>
<br /><br /><br />
<p>After the purchasing the commercial version follow this steps:</p>
<ol>
	<li>Deactivate Spider Contacts Plugin</li>
	<li>Delete Spider Contacts Plugin</li>
	<li>Install the downloaded commercial version of the plugin.</li>
</ol>
</div>

    
    
    <?php
	
	
	}



////////////////////////////////////////////////// ajax function
add_action('wp_ajax_spidercontactwdcaptchae', 'spider_contact_wd_captcha');
add_action('wp_ajax_nopriv_spidercontactwdcaptchae', 'spider_contact_wd_captcha');
function spider_contact_wd_captcha(){

$cap_width=80;
$cap_height=30;
$cap_quality=100;
$cap_length_min=6;
$cap_length_max=6;
$cap_digital=1;
$cap_latin_char=1;
// _____________________________________________________________________________

function code_generic($_length,$_digital=1,$_latin_char=1)
{
$dig=array(0,1,2,3,4,5,6,7,8,9);
$lat=array('a','b','c','d','e','f','g','h','j','k','l','m','n','o',
'p','q','r','s','t','u','v','w','x','y','z');
$main=array();
if ($_digital) $main=array_merge($main,$dig);
if ($_latin_char) $main=array_merge($main,$lat);
shuffle($main);
$pass=substr(implode('',$main),0,$_length);
return $pass;
}
if(isset($_GET['checkcap'])=='1'){
if($_GET['checkcap']=='1')
{
@session_start();
if(isset($_GET['cap_code'])){ 
if($_GET['cap_code']==$_SESSION['captcha_code'])
echo 1;
}
else echo 0;
}}
else
{
$l=rand($cap_length_min,$cap_length_max);
$code=code_generic($l,$cap_digital,$cap_latin_char);
@session_start();
$_SESSION['captcha_code']= $code;
$canvas=imagecreatetruecolor($cap_width,$cap_height);
$c=imagecolorallocate($canvas,rand(150,255),rand(150,255),rand(150,255));
imagefilledrectangle($canvas,0,0,$cap_width,$cap_height,$c);
$count=strlen($code);
$color_text=imagecolorallocate($canvas,0,0,0);
for($it=0;$it<$count;$it++)
{ $letter=$code[$it];
  imagestring($canvas,6,(10*$it+10),$cap_height/4,$letter,$color_text);
}
for ($c = 0; $c < 150; $c++){
	$x = rand(0,79);
	$y = rand(0,29);
	$col='0x'.rand(0,9).'0'.rand(0,9).'0'.rand(0,9).'0';
	imagesetpixel($canvas, $x, $y, $col);
	}
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); 
header('Cache-Control: no-store, no-cache, must-revalidate'); 
header('Cache-Control: post-check=0, pre-check=0',false);
header('Pragma: no-cache');
header('Content-Type: image/jpeg');
imagejpeg($canvas,null,$cap_quality);
}
die('');
}



add_action('wp_ajax_spidercontactswindow', 'spider_contact_window');

function spider_contact_window(){

global $wpdb;
$single_products=$wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'spidercontacts_contacts WHERE published=\'1\'');
$categories=$wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'spidercontacts_contacts_categories WHERE published=\'1\'');
?>
<html xmlns="http://www.w3.org/1999/xhtml"><head>
	<title>Spider Contact</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<script language="javascript" type="text/javascript" src="<?php echo get_option("siteurl"); ?>/wp-includes/js/jquery/jquery.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo get_option("siteurl"); ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script><link rel="stylesheet" href="<?php echo get_option("siteurl"); ?>/wp-includes/js/tinymce/themes/advanced/skins/wp_theme/dialog.css?ver=342-20110630100">
	<script language="javascript" type="text/javascript" src="<?php echo get_option("siteurl"); ?>/wp-includes/js/tinymce/utils/mctabs.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo get_option("siteurl"); ?>/wp-includes/js/tinymce/utils/form_utils.js"></script>
	<base target="_self">
</head>
<body id="link" onLoad="tinyMCEPopup.executeOnLoad('init();');document.body.style.display='';"  style="" dir="ltr" class="forceColors">
<form name="spider_cat" action="#">
	<div class="tabs" role="tablist" tabindex="-1">
		<ul>
			<li id="Contacts_View_tab" class="current" role="tab" tabindex="0"><span><a href="javascript:mcTabs.displayTab('Contacts_View_tab','Contacts_View_panel');" onMouseDown="return false;" tabindex="-1">Contacts Single</a></span></li>
			<li id="Contacts_Short_tab" role="tab" tabindex="-1"><span><a href="javascript:mcTabs.displayTab('Contacts_Short_tab','Contacts_Short_panel');" onMouseDown="return false;" tabindex="-1">Contacts Category</a></span></li>
	
		</ul>
	</div>
	
	<div class="panel_wrapper">
    
    
    
		<div id="Contacts_View_panel" class="panel current">
		<br>
		<table border="0" cellpadding="4" cellspacing="0">
         <tbody><tr>
            <td nowrap="nowrap"><label for="spider_contact_contact">Select Contact</label></td>
            <td><select name="spider_contact_contact" id="spider_contact_contact" >
<option value="- Select a Contact -" selected="selected">- Select  a Contact -</option>
<?php 
	   foreach($single_products as $single_product)
	   {
		   ?>
           <option value="<?php echo $single_product->id; ?>"><?php echo $single_product->first_name; ?></option>
           <?php }?>
</select>
            </td>
          </tr>
        </tbody></table>
		</div>
        
        
        
        
		<div id="Contacts_Short_panel" class="panel">
		<br>
		<table border="0" cellpadding="4" cellspacing="0">
         <tbody><tr>
            <td nowrap="nowrap"><label for="Spider_contact_Category">Select Category</label></td>
            <td><select name="Spider_contact_Category" id="Spider_contact_Category" multiple="multiple">
<option value="ALL_CAT" selected="selected">- All categories -</option>
<?php 
	   foreach($categories as $categorie)
	   {
		   ?>
           <option value="<?php echo $categorie->id; ?>"><?php echo $categorie->name; ?></option>
           <?php }?>
</select>
            </td>
          </tr>
          <tr>
            <td nowrap="nowrap" valign="top"><label for="showtype">Show Category Type</label></td>
            <td>	<input type="radio" name="cat_show" id="paramsshow_category_details0" value="0">
                    <label style="position:relative; bottom:4px" for="paramsshow_category_details0">Short</label>
                    <input type="radio" name="cat_show" id="paramsshow_category_details1" value="1">
                    <label style="position:relative; bottom:4px" for="paramsshow_category_details1">Table</label>
                    <input type="radio" name="cat_show" id="paramsshow_category_details2" value="2" checked="checked">
                    <label style="position:relative; bottom:4px" for="paramsshow_category_details2">Full</label>
    		</td>
          </tr>
             
			 <tr>
            <td nowrap="nowrap" valign="top"><label for="orderby">Order By</label></td>
            <td>	
            	<select name="order_by" id="order_by" >
                	<option value="0" >id</option>
                    <option value="1" >Ordering</option>
                    <option value="2" >Firstname</option>
                    <option value="3" >Lastname</option>
                </select>
    		</td>
          </tr>
			 
        </tbody></table>
		</div>
        </div>
        <div class="mceActionPanel">
		<div style="float: left">
			<input type="button" id="cancel" name="cancel" value="Cancel" onClick="tinyMCEPopup.close();" />
		</div>

		<div style="float: right">
			<input type="submit" id="insert" name="insert" value="Insert" onClick="insert_spider_catalog();" />
		</div>
        
	</div>

</form>

<script type="text/javascript">
function insert_spider_catalog() {
	
	if(document.getElementById('Contacts_View_panel').className==='panel')
	{
	

	
				
					
					var lists;
					var show;
					lists="";
					show=0;
					if(document.getElementById('paramsshow_category_details0').checked)
					{
					show=0;
					}
					if(document.getElementById('paramsshow_category_details1').checked)
					{
					show=1;
					}
					if(document.getElementById('paramsshow_category_details2').checked)
					{
					show=2;
					}
				   order_by=document.getElementById('order_by').value;
					
				   var tagtext;
				   
				   
				   var x=document.getElementById('Spider_contact_Category');
				   var str = "";
				   for (var i = 0; i < x.options.length; i++) {
				        if(x.options[i].selected ==true){
							str +=x.options[i].value+",";
						}
					}
				   tagtext='[Spider_contact_categories id="'+str+'"  type="'+show+'"  order_by="'+order_by+'"]';
				   window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, tagtext);
				   tinyMCEPopup.editor.execCommand('mceRepaint');
				   tinyMCEPopup.close();		
	}
	else
	{
		
		
			if(document.getElementById('spider_contact_contact').value=='- Select a Contact -')
			{
				tinyMCEPopup.close();
			}
			else
			{
			   var tagtext;
			   tagtext='[Spider_contact_single id="'+document.getElementById('spider_contact_contact').value+'"]';
			   window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, tagtext);
			   tinyMCEPopup.editor.execCommand('mceRepaint');
			   tinyMCEPopup.close();		
			}
		
		
		
		
	}
}

</script>
</body></html>
 <?php	
	 die(); 

}

 add_action('wp_ajax_conspiderboxjsphp', 'con_spider_box_js_php');
 add_action('wp_ajax_nopriv_conspiderboxjsphp', 'con_spider_box_js_php');
	
function con_spider_box_js_php()
{
 header('Content-Type: text/javascript; charset=UTF-8');
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
document.getElementById("showPictureAnimated").innerHTML='<img src="'+href+'" border="0" style="cursor:url(\''+spiderBoxBase+'cursor_magnifier_minus.cur\'),pointer;border:" onClick="hidePictureAnimated();" />';

boxContainerWidth=newImgwidth;
}
else
{
if((newImgheight/viewportheight)>(newImgwidth/viewportwidth))
{
document.getElementById("showPictureAnimated").innerHTML='<img src="'+href+'" border="0" style="cursor:url(\''+spiderBoxBase+'cursor_magnifier_minus.cur\'),pointer;" onClick="hidePictureAnimated();" height="'+(viewportheight-100)+'" />';

boxContainerWidth=((newImgwidth*(viewportheight-100))/newImgheight);
}
else
{
document.getElementById("showPictureAnimated").innerHTML='<img src="'+href+'" border="0" style="cursor:url(\''+spiderBoxBase+'cursor_magnifier_minus.cur\'),pointer;" onClick="hidePictureAnimated();" width="'+(viewportwidth-50)+'" />';
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
	spiderBoxElement.innerHTML+='<div style="position:fixed; top:0px; left:0px; width:100%; height:'+(viewportheight+300)+'px; background-color:#000000; z-index:98; display:none" id="showPictureAnimatedBg"></div>  <table border="0" cellpadding="0" cellspacing="0" id="showPictureAnimatedTable" style="position:fixed; top:0px; left:0px; width:100%; vertical-align:middle; text-align:center; z-index:99; display:none"><tr><td valign="middle" id="tdviewportheight" style="height:'+(viewportheight-35)+'px; text-align:center;"><div id="boxContainer" style="margin:auto;width:400px; border:5px solid white;"><div id="showPictureAnimated" style=" height:400px">&nbsp;</div><div style="text-align:center;background-color:white;padding:5px;padding-bottom:0px;"><div style="width:48px;float:left;">&nbsp;</div><span onClick="prevImage();" style="cursor:pointer;"><img src="'+spiderBoxBase+'prev.png" /></span>&nbsp;&nbsp;'+(slideShowQ?'<span><img src="'+spiderBoxBase+'play.png" id="toggleSlideShowCheckbox" onClick="toggleSlideShow();"  style="cursor:pointer;"/></span>&nbsp;&nbsp;':'')+'<span onClick="nextImage();" style="cursor:pointer;"><img src="'+spiderBoxBase+'next.png" /></span><span onClick="hidePictureAnimated();" style="cursor:pointer;"><img src="'+spiderBoxBase+'close.png" align="right" /></span></div></div></td></tr></table>';

	document.body.appendChild(spiderBoxElement);

	
			for ( i = 0; i < document.getElementsByTagName( 'a' ).length; i++ )
				if(document.getElementsByTagName( 'a' )[i].target=="spiderbox" || ((allImagesQ || spiderShop) && (document.getElementsByTagName( 'a' )[i].href.substr(document.getElementsByTagName( 'a' )[i].href.length-4)==".jpg" || document.getElementsByTagName( 'a' )[i].href.substr(document.getElementsByTagName( 'a' )[i].href.length-4)==".png" || document.getElementsByTagName( 'a' )[i].href.substr(document.getElementsByTagName( 'a' )[i].href.length-4)==".gif" || document.getElementsByTagName( 'a' )[i].href.substr(document.getElementsByTagName( 'a' )[i].href.length-4)==".bmp" || document.getElementsByTagName( 'a' )[i].href.substr(document.getElementsByTagName( 'a' )[i].href.length-4)==".JPG" || document.getElementsByTagName( 'a' )[i].href.substr(document.getElementsByTagName( 'a' )[i].href.length-4)==".PNG" || document.getElementsByTagName( 'a' )[i].href.substr(document.getElementsByTagName( 'a' )[i].href.length-4)==".GIF" || document.getElementsByTagName( 'a' )[i].href.substr(document.getElementsByTagName( 'a' )[i].href.length-4)==".BMP"))) 
					{

						listOfImages[listOfImages.length]=document.getElementsByTagName( 'a' )[i].href;
						document.getElementsByTagName( 'a' )[i].href="javascript:showPictureAnimated('"+document.getElementsByTagName( 'a' )[i].href+"')";						document.getElementsByTagName( 'a' )[i].style.cursor="url('<?php echo urldecode($_GET['juriroot']); ?>/spiderBox/cursor_magnifier_plus.cur'),pointer";						
                        document.getElementsByTagName( 'a' )[i].target="";
						
					}

}
<?php
	die();
}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	








function Categories_Spider_contact()
{
	////////including functions for categories
	require_once("Categories.php");
	require_once("Categories.html.php");
	if(!function_exists ('print_html_nav' ))
	require_once("nav_function/nav_html_func.php");
	
	
	
	
$task=$_GET["task"];//get task for choosing function

if(isset($_GET["id"]))
	$id=$_GET["id"];
	else
		$id=0;
global $wpdb;
switch ($task)
{
	
	   	case 'add_cat':
         add_category_contact();
        break;
		
		
		case 'publish_cat':
			change_cat_contact($id);
			showCategory_contact();
		break;	 
		
		
		case 'unpublish_cat':
			change_cat_contact($id);
			showCategory_contact();
		break;	
	
    	case 'edit_cat':
			if($id)
         		editCategory_contact($id);
			else
			{
				 $id=$wpdb->get_var("SELECT MAX( id ) FROM ".$wpdb->prefix."spidercontacts_contacts_categories");
				 editCategory_contact($id);
			}
        break;

    case 'save':
		if($id)
		 	apply_cat_contact($id);
		 else
		  	save_cat_contact();
		 showCategory_contact();
	break;
			
	case 'apply':
		if($id)
		{ 
			 apply_cat_contact($id);
			 editCategory_contact($id);
			
		}
		else
		{
			$true=save_cat_contact();
			if($true){
				$id=$wpdb->get_var("SELECT MAX( id ) FROM ".$wpdb->prefix."spidercontacts_contacts_categories");
				 editCategory_contact($id);
			}
			else
			{
				
				showCategory_contact();
				
			}
		}
	
	break;
 
  
   case 'remove_cat':
            removeCategory_contact($id);
			showCategory_contact();
			break;

   default:
            showCategory_contact();
        break;
}

	
}











	





function Single_Spider_contact(){
	
	global $wpdb;
		require_once("contact_contact.php");
	require_once("contact_contact.html.php");
	if(!function_exists ('print_html_nav' ))
	require_once("nav_function/nav_html_func.php");
	
	if(isset($_GET['id']))
	{
	$id=$_GET['id'];
	}
	else
	{
		$id=0;
	}
	if(isset($_GET['task']))
	$task=$_GET['task'];
	else
	$task="";
	
	switch ($task)
{
    case 'edit_prad':
	      editContact($id);
        break;
    case 'add_prad':
            addContact();
        break;
    case 'apply':
	if($id){
	update_prad_cat($id);
	}
	else
	{
		save_prad_cat();
		$id=$wpdb->get_var("SELECT MAX(id) FROM ".$wpdb->prefix."spidercontacts_contacts");
	}
	 editContact($id);
	break;
	  case 'save':
	  if($id)
	  update_prad_cat($id);
	  else
	   save_prad_cat();
	    showContacts();
	break;
	
    case 'saveorder':

        break;
			case 'unpublish_prad':
			change_prod($id);
			showContacts();
				break;	 
		case 'unpublish_prad':
			change_prod($id);
			showContacts();
				break;	
    case 'remove_prod':
            removeContact($id);
			 showContacts();
			
			break;
			
   default:
            showContacts();

        break;
}
	
	
	
}

function Massages_Spider_contact(){

	global $wpdb;
	  if(!function_exists('print_html_nav'))
	  require_once("nav_function/nav_html_func.php");
	  
	require_once("messages.php");// add functions for massage contacts
	require_once("messages.html.php");//add functions for massage contacts

	if(isset($_GET["task"])){
	$task=$_GET["task"];
	}
	else
	{
		$task="default";
	}
	if(isset($_GET["id"]))
	{
		$id=$_GET["id"];
	}
	else
	{
		$id=0;
	}
	switch($task){
			
	case 'edit_massage':
		spider_contact_massages_edit($id);
		break;

		
	case 'mark_readen';		
		spider_cont_mark_as_readen();
		show_spider_contact_massage();
		break;
	case 'mark_unread';		
		spider_cont_mark_as_unreaden();
		show_spider_contact_massage();
		break;

		
	case 'delete_massage':
		spider_contact_removeMessages($id);
		show_spider_contact_massage();
		break;
		
		

	default:
	show_spider_contact_massage();
	break;
				
	}
	




}









function Options_contact_styles(){

 	require_once("contact_Options.php");
	require_once("contact_Options.html.php");
	if(isset($_GET['task']))
	if($_GET['task']=='save')
	svae_sp_contact_Styles();
	show_sp_contact_Styles();
	

}

function Options_contact_global(){

 	require_once("contact_Options.php");
	require_once("contact_Options.html.php");
	if(isset($_GET['task']))
	if($_GET['task']=='save')
	save_sp_contact_global();
	show_sp_contact_global();
	

}

function Options_masasge_options(){
	require_once("contact_Options.php");
	require_once("contact_Options.html.php");
	if(isset($_GET['task']))
	if($_GET['task']=='save')
	save_sp_contact_massages_options();
	show_sp_contact_massages_options();
	
	}











 //////////////////////////////////////////////////////                                             /////////////////////////////////////////////////////// 
 //////////////////////////////////////////////////////               Uninstall                     ///////////////////////////////////////////////////////
 //////////////////////////////////////////////////////                                             ///////////////////////////////////////////////////////
 //////////////////////////////////////////////////////                                             ///////////////////////////////////////////////////////










function Uninstall_Spider_Contact(){
	
global $wpdb;
$base_name = plugin_basename('Categories_Spider_contact');
$base_page = 'admin.php?page='.$base_name;
$mode = trim($_GET['mode']);


if(!empty($_POST['do'])) {

	if($_POST['do']=="UNINSTALL Spider Contacts") {
	
			check_admin_referer('Spider_Contacts uninstall');
			if(trim($_POST['Spider_contact_yes']) == 'yes') {
				
				echo '<div id="message" class="updated fade">';
				echo '<p>';
				echo "Table 'spidercontacts_params' has been deleted.";
				$wpdb->query("DROP TABLE ".$wpdb->prefix."spidercontacts_params");
				echo '<font style="color:#000;">';
				echo '</font><br />';
				echo '</p>';
				echo '<p>';
				echo "Table 'spidercontacts_contacts' has been deleted.";
				$wpdb->query("DROP TABLE ".$wpdb->prefix."spidercontacts_contacts");
				echo '<font style="color:#000;">';
				echo '</font><br />';
				echo '</p>';
				echo '<p>';
				echo "Table 'spidercontacts_contacts_categories' has been deleted.";
				$wpdb->query("DROP TABLE ".$wpdb->prefix."spidercontacts_contacts_categories");
				echo '<font style="color:#000;">';
				echo '</font><br />';
				echo '</p>';
				echo '<p>';
				echo "Table 'spidercontacts_messages' has been deleted.";
				$wpdb->query("DROP TABLE ".$wpdb->prefix."spidercontacts_messages");
				echo '<font style="color:#000;">';
				echo '</font><br />';
				echo '</p>';
				echo '</div>'; 
				
				$mode = 'end-UNINSTALL';
			}
		}
}



switch($mode) {

		case 'end-UNINSTALL':
			$deactivate_url = wp_nonce_url('plugins.php?action=deactivate&amp;plugin='.plugin_basename(__FILE__), 'deactivate-plugin_'.plugin_basename(__FILE__));
			echo '<div class="wrap">';
			echo '<h2>Uninstall Spider Contacts</h2>';
			echo '<p><strong>'.sprintf('<a href="%s">Click Here</a> To Finish The Uninstallation And Spider Contacts Will Be Deactivated Automatically.', $deactivate_url).'</strong></p>';
			echo '</div>';
			break;
	// Main Page
	default:
?>
<form method="post" action="<?php echo admin_url('admin.php?page=Uninstall_Spider_Contact'); ?>">
<?php wp_nonce_field('Spider_Contacts uninstall'); ?>
<div class="wrap">
	<div id="icon-Spider_Catalog" class="icon32"><br /></div>
	<h2><?php echo 'Uninstall Spider Contacts'; ?></h2>
	<p>
		<?php echo 'Deactivating Spider Contacts plugin does not remove any data that may have been created. To completely remove this plugin, you can uninstall it here.'; ?>
	</p>
	<p style="color: red">
		<strong><?php echo'WARNING:'; ?></strong><br />
		<?php echo 'Once uninstalled, this cannot be undone. You should use a Database Backup plugin of WordPress to back up all the data first.'; ?>
	</p>
	<p style="color: red">
		<strong><?php echo 'The following WordPress Options/Tables will be DELETED:'; ?></strong><br />
	</p>
	<table class="widefat">
		<thead>
			<tr>
				<th><?php echo 'WordPress Tables'; ?></th>
			</tr>
		</thead>
		<tr>
			<td valign="top">
				<ol>
				<?php
						echo '<li>'.$wpdb->prefix.'spidercontacts_contacts</li>'."\n";
						echo '<li>'.$wpdb->prefix.'spidercontacts_contacts_categories</li>'."\n";
						echo '<li>'.$wpdb->prefix.'spidercontacts_messages</li>'."\n";
						echo '<li>'.$wpdb->prefix.'spidercontacts_params</li>'."\n";
				?>
				</ol>
			</td>
		</tr>
	</table>
	<p style="text-align: center;">
		<?php echo 'Do you really want to uninstall Spider Contacts?'; ?><br /><br />
		<input type="checkbox" name="Spider_contact_yes" value="yes" />&nbsp;<?php echo 'Yes'; ?><br /><br />
		<input type="submit" name="do" value="<?php echo 'UNINSTALL Spider Contacts'; ?>" class="button-primary" onClick="return confirm('<?php echo 'You Are About To Uninstall Spider Contacts From WordPress.\nThis Action Is Not Reversible.\n\n Choose [Cancel] To Stop, [OK] To Uninstall.'; ?>')" />
	</p>
</div>
</form>
<?php
} // End switch($mode)


	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}



 //////////////////////////////////////////////////////                                             /////////////////////////////////////////////////////// 
 //////////////////////////////////////////////////////               Activate                      ///////////////////////////////////////////////////////
 //////////////////////////////////////////////////////                                             ///////////////////////////////////////////////////////
 //////////////////////////////////////////////////////                                             ///////////////////////////////////////////////////////



function Spider_contact_activate()
{
	global $wpdb;
/// creat database tables for  spider contacts

$spider_contact_main_table="CREATE TABLE IF NOT EXISTS `".$wpdb->prefix."spidercontacts_contacts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `want_email` int(10) NOT NULL DEFAULT '0',
  `category_id` int(11) unsigned DEFAULT NULL,
  `description` text,
  `image_url` text,
  `param` text,
  `ordering` int(11) NOT NULL,
  `published` tinyint(4) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;";





$spider_contact_category_table="CREATE TABLE IF NOT EXISTS `".$wpdb->prefix."spidercontacts_contacts_categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` text,
  `param` text,
  `parent` int(11) unsigned DEFAULT NULL,
  `ordering` int(11) NOT NULL,
  `published` tinyint(4) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;";



$spider_contact_masage_table="CREATE TABLE IF NOT EXISTS `".$wpdb->prefix."spidercontacts_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `to_contact` int(11) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cont_pref` varchar(250) NOT NULL,
  `readen` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1  ;";



$spider_contact_options_table="CREATE TABLE IF NOT EXISTS `".$wpdb->prefix."spidercontacts_params` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `value` varchar(200) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1  ;";

$plug_path=plugins_url('',__FILE__);
$spider_contact_category_row="INSERT INTO `".$wpdb->prefix."spidercontacts_contacts_categories` (`id`, `name`, `description`, `param`, `parent`, `ordering`, `published`) VALUES
(1, 'South Park', 'South Park is an American animated sitcom created by Trey Parker and Matt Stonefor the Comedy Central television network. Intended for mature audiences, the show has become famous for its crude language and dark, surreal humor that lampoons awide range of topics. The ongoing narrative revolves around four boys—Stan Marsh,Kyle Broflovski, Eric Cartman and Kenny McCormick—and their bizarre adventures in and around the titular Colorado town.', 'Occupation	Family	Religion	Residence		', NULL, 1, 1);";
$spider_contact_contact_row = <<<HEREQUYER

INSERT INTO `{$wpdb->prefix}spidercontacts_contacts` (`id`, `first_name`, `last_name`, `email`, `want_email`, `category_id`, `description`, `image_url`, `param`, `ordering`, `published`) VALUES
(24, 'Eric', 'Cartman', 'eric.cartman@southpark.com', 0, 1, '<!--more-->\r\n\r\nEric Theodore Cartman is a fictional character in the American animated television series South Park. One of four main characters, along with Stan Marsh, Kyle Broflovski, and Kenny McCormick, he is generally referred to within the series by his surname. He debuted on television when South Park first aired on August 13, 1997; he had earlier appeared in The Spirit of Christmas shorts created by Trey Parker and Matt Stone in 1992 (Jesus vs. Frosty) and 1995 (Jesus vs. Santa).\r\n\r\nVoiced by Trey Parker, Cartman is an obese, immature, spoiled, selfish, manipulative, lazy, foul-mouthed, mean-spirited, sadistic, racist, sexist, anti-semitic, homophobic, xenophobic, sociopathic, narcissistic, and ill-tempered elementary school student living with his unwed mother in the fictional town of South Park, Colorado, where he routinely has extraordinary experiences not typical of conventional small-town life. Despite his many personality flaws, he is also depicted as being highly intelligent, outspoken, cunning and streetwise. He is one of few multilingual characters on the show, and is depicted speaking Spanish, French and German. He tends to make effective use of his capabilities by executing morally appalling—yet highly successful—business ideas.\r\n\r\nCartman is one of the most popular characters on the show and has remained one of the most recognizable television characters ever since South Park became a hit during its first season. Parker and Stone describe the character as "a little Archie Bunker", and state that he is their favorite character, and the one with whom they most identify. During its fifteen seasons, South Park has received both praise and criticism for Cartmans tendency to be politically incorrect and shockingly profane. Prominent publications and television channels have included Cartman on their lists of the most iconic television and cartoon characters of all time.', '{$plug_path}/Front_images/sampleimages/220px-ericcartman.png', 'par_Occupation@@:@@Student		par_Family@@:@@Liane Cartman (mother)	Jack Tenorman (biological father)	Scott Tenorman (half-brother)		par_Religion@@:@@Roman Catholic (1997 - 2012)	Judaism (2012 - present)		par_Residence@@:@@South Park, Colorado		', 3, 1),
(25, 'Kenny', 'McCormick', 'kenny.mccormick@southpark.com', 0, 1, '<!--more-->\r\n\r\nKenneth "Kenny" McCormick (sometimes spelled as McKormick) is a character in the animated television series South Park. He is one of the main characters along with his friends Stan Marsh, Kyle Broflovski, and Eric Cartman. His oft-muffled and indiscernible speech—the result of his parka hood covering his mouth—is provided by co-creator Matt Stone. He debuted on television when South Park first aired on August 13, 1997, after having first appeared in The Spirit of Christmas shorts created by Stone and long-time collaborator Trey Parker in 1992 (Jesus vs. Frosty) and 1995 (Jesus vs. Santa).Kenny is a third- then fourth-grade student who commonly has extraordinary experiences not typical of conventional small-town life in his hometown of South Park, Colorado, where he lives with his relatively poor redneck family. Kenny is animated by computer in a way to emulate the shows original method of cutout animation. he was played by an actor named Kenny Santos..He also appears in the 1999 full-length feature film South Park: Bigger, Longer &amp; Uncut, as well as South Park-related media and merchandise.In a running gag most prevalent during the first five seasons of the series, Kenny would die in many episodes before returning in the next with little or no definitive explanation given. Other characters accompanying exclamation of "Oh my God! They killed Kenny! ...You bastards!" became a catchphrase. Media commentators have published their interpretations of the many aspects of the running gag from philosophical and societal viewpoints. Since the show began its sixth season in 2002, the practice of killing Kenny in each episode has been seldom used by the shows creators. Various episodes have set up the gag, sometimes presenting a number of explanations for Kennys unacknowledged reappearances.', '{$plug_path}/Front_images/sampleimages/150px-kennymccormick.png', 'par_Occupation@@:@@Student		par_Family@@:@@Carol McCormick (mother)	Stuart McCormick (father)	Kevin McCormick (brother)	Karen McCormick (sister)		par_Religion@@:@@Roman Catholic		par_Residence@@:@@South Park, Colorado		', 4, 1),
(26, 'Stan', 'Marsh', 'stan.marsh@southpark.com', 0, 1, '<!--more-->Stanley Randall "Stan" Marsh is a fictional character in the animated television series South Park. He is voiced by and loosely based on series co-creator Trey Parker. Stan is one of the shows four central characters, along with his friends Kyle Broflovski, Kenny McCormick, and Eric Cartman. He debuted on television when South Park first aired on August 13, 1997, after having first appeared in The Spirit of Christmas shorts created by Parker and long-time collaborator Matt Stone in 1992 (Jesus vs. Frosty) and 1995 (Jesus vs. Santa).\r\nStan is a third- then fourth-grade student who commonly has extraordinary experiences not typical of conventional small-town life in his fictional hometown of South Park, Colorado. Stan is generally friendly, down-to-earth, knowledgeable, helpful, laid back, and often shares with Kyle a leadership role as the main protagonist of the show. Stan is unreserved in verbally expressing his distinct lack of esteem for adults and their influences, as adult South Park residents rarely make use of their critical faculties.Stan is animated by computer in a way to emulate the shows original method of cutout animation. He also appears in the 1999 full-length feature film South Park: Bigger, Longer &amp; Uncut, as well as South Park-related media and merchandise. While Parker and Stone portray Stan as having common childlike tendencies, his dialogue is often intended to reflect stances and views on more adult-oriented issues, and has been frequently cited in numerous publications by experts in the fields of politics, religion, popular culture and philosophy', '{$plug_path}/Front_images/sampleimages/130px-stanmarsh.png', 'par_Occupation@@:@@Student		par_Family@@:@@Sharon Marsh (mother)	Randy Marsh (father)	Shelley Marsh (sister)		par_Religion@@:@@Roman Catholic		par_Residence@@:@@South Park, Colorado		', 1, 1),
(27, 'Kyle', 'Broflovski', 'kyle.broflovski@southpark.com', 0, 1, '<!--more-->\r\n\r\nKyle Broflovski (or Kyle Broflovsky) is a fictional character in Comedy Centrals animated television series South Park. He is voiced by and loosely based on co-creator Matt Stone. Kyle is one of the shows four central characters, along with his friends Stan Marsh, Kenny McCormick, and Eric Cartman. He debuted on television when South Park first aired on August 13, 1997, after having first appeared in The Spirit of Christmas shorts created by Stone and long-time collaborator Trey Parker in 1992 (Jesus vs. Frosty) and 1995 (Jesus vs. Santa). Kyle is a third- then fourth-grade student who commonly has extraordinary experiences not typical of conventional small-town life in his fictional hometown of South Park, Colorado. Kyle is distinctive as one of the few Jewish children on the show, and because of this, he often feels like an outsider amongst the core group of characters. His portrayal in this role is often dealt with satirically, and has elicited both praise and criticism from Jewish viewers. Kyle is animated by computer in a way to emulate the shows original method of cutout animation. He also appears in South Park: Bigger, Longer &amp; Uncut, the 1999 full-length feature film based on the series, as well as South Park-related media and merchandise. While Parker and Stone portray Kyle as having common childlike tendencies, his dialogue is often intended to reflect stances and views on more adult-oriented issues, and has been frequently cited in numerous publications by experts in the fields of politics, religion, pop culture, and philosophy', '{$plug_path}/Front_images/sampleimages/165px-kylebroflovski.png', 'par_Occupation@@:@@Student		par_Family@@:@@Sheila Broflovski (mother)	Gerald Broflovski (father)	Sir Ike Broflovski (adopted brother)		par_Religion@@:@@Judaism		par_Residence@@:@@South Park, Colorado		', 2, 1);


HEREQUYER;

$spider_contact_optiions_row ="

INSERT INTO `".$wpdb->prefix."spidercontacts_params` ( `name`, `title`, `description`, `value`) VALUES
( 'table_border_style_table', 'Table Border Style in Table View', 'Table Border Style in Table View', 'solid'),
( 'cube_contact_cell_width', 'Contact Cell Width in Cube View', 'Contact Cell Width in Cube View', '150'),
( 'table_border_color', 'Border Color in Table View', 'Border Color in Table View', '#36739e'),
( 'table_params_background_color2', 'Parameters Background color 2 in Table', 'Background Color of odd parameters in Table', '#ed5353'),
( 'table_params_background_color1', 'Parameters Background color 1 in Table', 'Background Color of odd parameters in Table', '#00aeef'),
( 'params_background_color1', 'Parameters Background color 1', 'Background Color of odd parameters', '#4aeaff'),
( 'table_params_color1', 'Color of Parameter Values in Table', 'Color of Parameter Values in Table', '#ffffff'),
( 'table_title_size_small', 'Title Size in Table', 'Title Size in Table', '16'),
( 'table_small_picture_height', 'Picture Height in Table', 'Picture Height in Table', '50'),
( 'params_background_color2', 'Parameters Background color 2', 'Background Color of odd parameters', '#1acded'),
( 'parameters_select_box_width', 'Parameters Select Box Width', 'Parameters Select Box Width', '300'),
( 'background_color', 'Background color', 'Background color', '#F0F0F0'),
( 'border_style', 'Border Style', 'Border Style', 'solid'),
( 'border_width', 'Border Width', 'Border Width', '12'),
( 'border_color', 'Border Color', 'Border Color', '#36739e'),
( 'text_color', 'Text Color', 'Text Color', '#000000'),
( 'params_color', 'Color of Parameter Values', 'Color of Parameter Values', '#000000'),
( 'hyperlink_color', 'Hyperlink Color', 'Hyperlink Color', '#02a7de'),
( 'title_color', 'Title Color', 'Title Color', '#ffffff'),
( 'title_background_color', 'Title Background color', 'Title Background color', '#00aeef'),
( 'button_color', 'Buttons Text color', 'Color of text of buttons', '#ffffff'),
( 'button_background_color', 'Buttons Background color', 'Background Color of buttons', '#00aeef'),
( 'table_small_picture_width', 'Picture Width in Table', 'Picture Width in Table', '50'),
( 'count_of_contact_in_the_row', 'Count of Contacts in the Row', 'Count of Products in the Row', '2'),
( 'count_of_rows_in_the_page', 'Count of Rows in the Page', 'Count of Rows in the Page', '5'),
( 'contact_cell_width', 'Contact Cell Width', 'Product Cell Width', '300'),
( 'contact_cell_height', 'Contact Cell Height', 'Product Cell Height', '370'),
( 'small_picture_width', 'Picture Width', 'Picture Width', '100'),
( 'small_picture_height', 'Picture Height', 'Picture Height', '100'),
( 'text_size_small', 'Text Size', 'Text Size', '12'),
( 'title_size_small', 'Title Size', 'Title Size', '20'),
( 'large_picture_width', 'Picture Width', 'Picture Width', '100'),
( 'large_picture_height', 'Picture Height', 'Picture Height', '100'),
( 'text_size_big', 'Text Size', 'Text Size', '14'),
( 'table_text_size_small', 'Text Size in Table', 'Text Size in Table', ''),
( 'title_size_big', 'Title Size', 'Title Size', '16'),
( 'table_border_style', 'Table Border Style', 'Table Border Style', 'solid'),
( 'show_cont_pref', 'Show ''Contact Preference'' Field	', 'Show ''Contact Preference'' Field	', '1'),
( 'show_name', 'Show ''Name'' field in Front-End', 'Show ''Name'' field in Front-End', '1'),
( 'enable_message', 'Oportunity to Send Message from Front-End', 'Oportunity to Send Message from Front-End', '1'),
( 'messages_background_color', 'Message background color', 'Message background color', '#ffffff'),
( 'module_width', 'Module Width', 'Module Width', '150'),
( 'module_background_color', 'Background color', 'Background Color of module', '#d8ecf2'),
( 'module_picture_width', 'Picture Width', 'Picture Width', '100'),
( 'module_picture_height', 'Picture Height', 'Picture Height', '100'),
( 'module_text_color', 'Text color', 'Color of Text in the module', '#6e6d5c'),
( 'show_email', 'Show ''Email'' field in Front-End', 'Show ''Email'' field in Front-End', '1'),
( 'show_phone', 'Show ''Phone'' field in Front-End', 'Show ''Phone'' field in Front-End', '1'),
( 'count_of_rows_in_the_table', 'Count of Rows in the Table', 'Count of Rows in the Table', '5'),
( 'table_radius', ' Nicely Rounded Corners In Table View', ' Nicely Rounded Corners In Table View in Front-End', '1'),
( 'name_search', 'Name Search', 'Search by Name in Front-End', '1'),
( 'choose_category', 'Choose category', 'Search product on frontend by category', '1'),
( 'radius', ' Nicely Rounded Corners', 'Round Corners in Front-End', '1'),
( 'table_text_color', 'Text Color in Table View', 'Text Color in Table View', '#050505'),
( 'table_background_color', 'Background color in Table View', 'Background color in Table View', '#F0F0F0'),
( 'table_title_background_color', 'Title Background color in Table', 'Title Background color in Table', '#3e95e6'),
( 'table_title_color', 'Title Color in Table', 'Title Color', '#ffffff'),
( 'table_parameters_select_box_width', 'Parameters Select Box Width in Table', 'Parameters Select Box Width in Table', '200'),
( 'cube_count_of_contact_in_the_row', 'Count of Contacts in the Row in the Small view', 'Count of Contacts in the Row in the Small view', '2'),
( 'cube_count_of_rows_in_the_page', 'Count of Rows in the Page for Small view', 'Count of Rows in the Page for Small view', '2'),
( 'cube_radius', ' Nicely Rounded Corners in cube view', 'Round Corners in Front-End', '1'),
( 'cube_border_width', 'Border Width in Short View', 'Border Width in Short View', '8'),
( 'cube_border_color', 'Border Color in Short View', 'Border Color in Short View', '#36739e'),
( 'cube_border_style', 'Border Style for Short View', 'Border Style for Short View', 'solid'),
( 'cube_text_size_small', 'Text Size in Short', 'Text Size in Short', '12'),
( 'cube_text_color', 'Text Color in Cube view', 'Text Color in Cube view', '#000000'),
( 'cube_background_color', 'Background color in Short View', 'Background color in Short View', '#F0F0F0'),
( 'cube_title_size_small', 'Title Size in Short view', 'Title Size in Short view', '14'),
( 'cube_title_color', 'Title Color in Short View', 'Title Color in Short View', '#ffffff'),
( 'cube_title_background_color', 'Title Background color in short View', 'Title Background color In Short', '#00aeef'),
( 'cube_small_picture_width', 'Picture Width in Short View', 'Picture Width in Short View', '60'),
( 'cube_small_picture_height', 'Picture Height in Short view', 'Picture Height in Short view', '60'),
( 'cube_hyperlink_color', 'Hyperlink Color in short View', 'Hyperlink Color', '#049acc'),
( 'table_border_width', 'Border Width in Table View', 'Border Width in Table View', '12'),
( 'cube_contact_cell_height', 'Contact Cell Height in Cube View', 'Contact Cell Height in Cube View', '170'),
( 'viewcontact_radius', 'Rounded corners in Contact view', 'Rounded corners in Contact view', '1'),
( 'hover_color', 'Row Color on Hover', 'Row Color on Hover', '#14c4ff'),
( 'change_on_hover', 'Change Color on Hover in Table View', 'Change Color on Hover in Table View', '1'),
( 'full_button_color', 'Buttons Text color', 'Color of text of buttons in FULL View', '#ffffff'),
( 'full_button_background_color', 'Buttons Background color', 'Background Color of buttons in FUll view', '#00aeef'),
( 'table_button_color', 'Buttons Text color', 'Color of text of buttons in Table ', '#ffffff'),
( 'table_button_background_color', 'Buttons Background color', 'Background Color of buttons in TableVIew', '#00aeef'),
( 'cube_button_color', 'Buttons Text color', 'Color of text of buttons in Short View', '#ffffff'),
( 'cube_button_background_color', 'Buttons Background color', 'Background Color of buttons in Cube View', '#00aeef'),
( 'small_pic_size', 'Small Pictures Size ', 'Small Pictures Size ', '60'),
( 'hover_text_color', 'Row Color on Hover', 'Row Color on Hover', '#ffffff'),
( 'table_params_color2', 'Color of Parameter Values in Table', 'Color of Parameter Values in Table', '#000000'),
( 'viewcontact_border_width', 'Border Width In Contact View', 'Border Width In Contact View', '12'),
( 'viewcontact_border_color', 'Border Color In Contact View', 'Border Color In Contact View', '#36739e'),
( 'viewcontact_border_style', 'Border Style In Contact', 'Border Style In Contact', 'solid'),
( 'viewcontact_text_color', 'Text Color In Contact View', 'Text Color In Contact View', '#ffffff'),
( 'viewcontact_background_color', 'Background color In Contact View', 'Background color In Contact View', '#F0F0F0'),
( 'viewcontact_title_color', 'Title Color in Contact View', 'Title Color in Contact View', '#ffffff'),
( 'viewcontact_title_background_color', 'Title Background color In Contact View', 'Title Background color In Contact View', '#00aeef'),
( 'viewcontact_params_background_color1', 'Parameters Background color 1 In Contact View', 'Parameters Background color 1 In Contact View', '#0ba7d6'),
( 'viewcontact_params_color', 'Color of Parameter Values in Contact View', 'Color of Parameter Values in Contact View', '#ffffff'),
( 'viewcontact_params_background_color2', 'Parameters Background color 2 In Contact View', 'Background Color of odd parameters', '#17d4ff'),
( 'paramstable_parameters_main_table_width', 'main list table width', 'main list table width', ''),
( 'paramstable_parameters_single_main_table_width', 'main list table width', 'main list table width', ''),
( 'description_text_color', 'Description Text Color', 'Description Text Color', '#000000');";



$wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name;

if($wpdb->get_var("SHOW TABLES LIKE '".$wpdb->prefix."spidercontacts_contacts'") != $wpdb->prefix."spidercontacts_contacts"){
	$wpdb->query($spider_contact_main_table);
$wpdb->query($spider_contact_category_table);

$wpdb->query($spider_contact_masage_table);

$wpdb->query($spider_contact_options_table);

$wpdb->query($spider_contact_category_row);

$wpdb->query($spider_contact_contact_row);

$wpdb->query($spider_contact_optiions_row);
}


}


register_activation_hook( __FILE__, 'Spider_contact_activate' );

function contact_get_attachment_id_from_src($image_src) {
        global $wpdb;
		$id=0;
		 $image_src = preg_replace('/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $image_src);
        $query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
        $id = $wpdb->get_var($query);
		if(!$id)
		$id=0;
        return $image_src.'******'.$id;
}
