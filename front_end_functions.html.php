<?php 


function html_front_end_single_contact($rows, $params,$category_name){
ob_start();
	@session_start();
	
?>
<div>

<?php 


if ($params->viewcontact_radius):
?>
<style type="text/css">
#contactMainDiv th
{
	text-transform:none !important;
	text-align:center !important;
}
#contactMainDiv, .spidercontactbutton, .spidercontactinput
{
-webkit-border-radius: 8px;
-moz-border-radius: 8px;
border-radius: 8px;
}

#contactMainDiv #contTitle
{
-webkit-border-top-right-radius: 8px;
-webkit-border-top-left-radius: 8px;
-moz-border-radius-topright: 8px;
-moz-border-radius-topleft: 8px;
border-top-right-radius: 8px;
border-top-left-radius: 8px;
}

select.input{
margin: 0 0 24px 0 !important;
top: -11px !important;
position: relative;
}

#contactMainDiv
{
	-webkit-border-radius: 8px !important;
	-moz-border-radius: 8px !important;
	border-radius: 8px !important;
	
}
.spidercontactbutton, .input
{
	font-size:10px !important;
	-webkit-border-radius: 8px !important;
	-moz-border-radius: 8px !important;
	border-radius: 8px !important;
	
}

#contactMainDiv td, #contactMainDiv tr, #contactMainDiv tbody,  #contactMainDiv div{
	line-height:inherit !important;
	color:inherit;
	opacity:inherit !important;
	
}
#contactMainDiv{
	min-width:540px;
}
#contactMainDiv #contTitle
{
	font-size:10px;
-webkit-border-top-right-radius: 8px;
-webkit-border-top-left-radius: 8px;
-moz-border-radius-topright: 8px;
-moz-border-radius-topleft: 8px;
border-top-right-radius: 8px;
border-top-left-radius: 8px;
}

#spider_contact_top_table table, #spider_contact_top_table th,  #spider_contact_top_table tbody,  #spider_contact_top_table tr,  #spider_contact_top_table td , #spider_contact_top_table body {
	vertical-align:middle;
	line-height:inherit;
	font-weight:bold;
	text-align:left;


}
#spider_contact_top_table
{
	border-collapse:inherit;
	padding:inherit;
	margin:inherit;
	border:inherit !important;
}
#spider_contact_top_table ul, #spider_contact_top_table li, #spider_contact_top_table a{
	list-style:inherit;
}


#contMiddle tr td, #contMiddle td, #contMiddle tr, #contMiddle table, #contMiddle table,#contMiddle {
	border:0 !important;
}


#paramstable ul, #paramstable li{
	width:inherit !important;
	float:right;
	overflow-x:inherit !important;
	overflow-y:inherit !important;

	

}
#paramstable{
	margin:0px !important;
}
#contAllDescription p{
	line-height:1 !important;
}
#paramstable, #paramstable table,  #paramstable tbody{
	width:inherit !important;
	float:right;
	border-collapse:inherit;


}
#paramstable td{

	text-align:left;

}
#tdviewportheight div, #tdviewportheight td, #tdviewportheight{
	vertical-align:middle;



}
#spider_contact_image_table{
	border-spacing:inherit;



}

#contTitle{
	font-family:inherit;
}



#message_div  input,
#message_div textarea {
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  -webkit-transition: all 0.2s linear;
  -webkit-transition-delay: 0s;
  -moz-transition: all 0.2s linear 0s;
  -o-transition: all 0.2s linear 0s;
  transition: all 0.2s linear 0s;
}

#cont_pref0
{
	position:relative;
	top:33px;
	}
#cont_pref1
{
	position:relative;
	top:33px;
	}
#cont_pref2
{
	position:relative;
	top:33px;
	}



#message_div textarea,
#message_div input[type="text"],
#message_div input[type="email"]
 {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-background-clip: padding;
  -moz-background-clip: padding;
  background-clip: padding-box;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;




  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  -webkit-appearance: none;
  background-color: white;
  border: 1px solid #cccccc;
  color: black;
  outline: 0;
  margin: 0;
  padding: 3px 4px;
  text-align: left;
  font-size: 13px;
  font-family: Arial, "Liberation Sans", FreeSans, sans-serif;
  height: 2.2em;
  vertical-align: top;
  *padding-top: 2px;
  *padding-bottom: 1px;
  *height: auto;
}
#message_div textarea[disabled],
#message_div input[type="text"][disabled],
#message_div input[type="email"][disabled]
{
  background-color: #eeeeee;
}
#message_div textarea:focus,
#message_div input[type="text"]:focus ,
#message_div input[type="email"]:focus{
  border-color: rgba(82, 168, 236, 0.8);
  outline: 0;
  outline: thin dotted \9;
  /* IE6-9 */
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6);
  -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6);
}


#message_div input[disabled],
#message_div textarea[disabled] {
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  box-shadow: none;
  -moz-user-select: -moz-none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  user-select: none;
  color: #888888;
  cursor: default;
}

#message_div input::-webkit-input-placeholder,
#message_div textarea::-webkit-input-placeholder {
  color: #888888;
}

#message_div input:-moz-placeholder,
#message_div textarea:-moz-placeholder {
  color: #888888;
}

#message_div input.placeholder_text,
#message_div textarea.placeholder_text {
  color: #888888;
}

#spider_contact_top_table td{
	border:none !important;
}


#message_div textarea {
  min-height: 80px;
  overflow: auto;
  padding: 5px;
  resize: vertical;
  width: 100%;
}

#message_div optgroup {
  color: black;
  font-style: normal;
  font-weight: normal;
  font-family: Arial, "Liberation Sans", FreeSans, sans-serif;
}
#message_div optgroup::-moz-focus-inner {
  border: 0;
  padding: 0;
}
.rating_stars ul, .rating_stars li, .rating_stars ul li{
	list-style-type:none !important;
}
#cap_table span, #cap_table, #cap_table tr, #cap_table td, #cap_table img, #cap_table tr td{
	vertical-align:middle !important;
	padding:2px;
	border:0 !important;
}
#message_text{
	min-height:100px;
	max-width:inherit !important;
}
#full_name{
	max-width:inherit !important;
}



</style>
<?php
endif;


	$back = get_permalink();


if ($params->viewcontact_radius == 0)
  {		$border_radius = '';	}
  
  else {
	  		$border_radius = " border-radius:8px; -moz-border-radius: 8px; -webkit-border-radius: 8px;";
	  }  

foreach($rows as $row){
if(isset($_GET['back']))	
if($_GET['back'])
{
echo '<span id="back_to_spidercontact_button"><a href="'.get_permalink().'" >'.__('Back to all Contacts','sp_contact').'</a></span>';
}

echo '<div id="contactMainDiv" style=" width:'.$params->paramstable_parameters_single_main_table_width.'px; '.$border_radius.' border-width:'.$params->viewcontact_border_width.'px;border-color:'.$params->viewcontact_border_color.';border-style:'.$params->viewcontact_border_style.';'.(($params->text_size_big!='')?('font-size:'.$params->text_size_big.'px;'):'').(($params->viewcontact_text_color!='')?('color:'.$params->viewcontact_text_color.';'):'').(($params->viewcontact_background_color!='')?('background-color:'.$params->viewcontact_background_color.';'):'').'">';


$imgurl=explode(";;;",$row->image_url);

echo '<div id="contTitle" style="'.(($params->viewcontact_title_color!='')?('color:'.$params->viewcontact_title_color.';'):'').(($params->viewcontact_title_background_color!='')?('background-color:'.$params->viewcontact_title_background_color.';'):'').'padding:0px;"><table id="spider_contact_top_table" border="0" cellspacing="0" cellpadding="0" width="100%"><tr><td  style="padding:5px;font-size:'.$params->title_size_big.'px;">' . $row->first_name.' '.$row->last_name.'</td>';





echo '</tr></table></div>

<br />
<table id="contMiddle" border="0" cellspacing="0" cellpadding="0"><tr>
<tr><td valign="top" width="280">
<table id="spider_contact_image_table" cellpadding="0" cellspacing="5" border="0" style="margin:0px;">';

if(!($row->image_url!="" and $row->image_url!=";" and $row->image_url!="******0")){
$imgurl[0]=plugins_url('Front_images/noimage.jpg',__FILE__);echo '<tr><td colspan="2" id="cont_main_picture_container" valign="top"><div style="width:'.($params->large_picture_width).'px;border: #CCCCCC solid 2px;padding:5px;background-color:white;"><div id="cont_main_picture" style="width:'.($params->large_picture_width).'px;height:'.($params->large_picture_height).'px; background:url('.$imgurl[0].') center no-repeat;background-size:contain;">&nbsp;</div></div></td></tr>';}
else{
	
		$image_with_atach_id=explode('******',$imgurl[0]);

	if(isset($image_with_atach_id[1]) && $image_with_atach_id[1])
	{
		$array_with_sizes=wp_get_attachment_image_src( $image_with_atach_id[1], 'medium' );
	$attach_url=$array_with_sizes[0];
	}
	else{
	$attach_url=$image_with_atach_id[0];
	}
	$img=$image_with_atach_id[0];
echo '
<tr><td colspan="2" id="cont_main_picture_container" valign="top">
<div style="width:'.($params->large_picture_width).'px;border: #CCCCCC solid 2px;padding:5px;background-color:white;">
<a href="'.$img.'" target="_blank" id="cont_main_picture_a" style="text-decoration:none;">
<div id="cont_main_picture" style="width:'.($params->large_picture_width).'px;height:'.($params->large_picture_height).'px; background:url('.$attach_url.') center no-repeat;background-size:contain;">&nbsp;</div></a></div>

</td></tr>';
}
echo'
<tr><td style="text-align:justify;">';

$small_images_str='';
$small_images_count=0;
$imgurl=explode(";;;",$row->image_url);
foreach($imgurl as $img)
{
if($img!=='******0' || $img!=='')
{
	$image_with_atach_id=explode('******',$img);
	if(isset($image_with_atach_id[1]) && $image_with_atach_id[1])
	{
		$array_with_sizes=wp_get_attachment_image_src( $image_with_atach_id[1], 'thumbnail' );
	$attach_url=$array_with_sizes[0];
	$array_with_sizes_medium=wp_get_attachment_image_src( $image_with_atach_id[1], 'medium' );
	$attach_url_medium=$array_with_sizes_medium[0];
	}
	else{
	$attach_url=$image_with_atach_id[0];
	$attach_url_medium=$image_with_atach_id[0];
	}
	$img=$image_with_atach_id[0];
	
	
$small_images_str.='<a href="'.$img.'" target="_blank"><img style="max-width:50px; max-height:50px" src="'.$attach_url.'" vspace="5" hspace="5" onMouseOver="cont_change_picture(\''.$attach_url_medium.'\',this,'.$params->large_picture_width.','.$params->large_picture_height.');" /></a>
';
$small_images_count++;
}
}
if($small_images_count>1)
echo $small_images_str;
else
echo '&nbsp;';

echo '</td></tr><td valign="top">';


echo '</td></tr></table>';

echo '<td valign="top" align="right">';


	echo '<table  border="1" style=" '. $border_radius. ' border-style:solid; border-color:'.$params->viewcontact_border_color.'; " > <tr> <td  style="border:none  "> <table  ' .(($params->viewcontact_background_color!='')?('bordercolor="'.$params->viewcontact_background_color.'"'):' ').'    id="paramstable"  style=" '.$border_radius. ' border-style:solid; " border="1" cellspacing="0" cellpadding="5" width="100%">';

if($category_name!="")
echo '<tr valign="top" style=" '.(($params->viewcontact_params_background_color2!='')?('background-color:'.$params->viewcontact_params_background_color2.';'):'').' vertical-align:middle;"><td><b>'.__('Category:','sp_contact').'</b></td><td style="'.(($params->viewcontact_params_color!='')?('color:'.$params->viewcontact_params_color.';'):'').'"><span id="cat_' . $row->id . '">' .$category_name.'</span></td></tr>';
else
echo '<span id="cat_' . $row->id . '"></span>';

if($row->email !="")
echo '<tr valign="top" style=" '.(($params->viewcontact_params_background_color1!='')?('background-color:'.$params->viewcontact_params_background_color1.';'):'').' vertical-align:middle;"><td ><b>'.__('Email','sp_contact').'</b></td><td style="'.(($params->params_color!='')?('color:'.$params->viewcontact_params_color.';'):'').'"><span id="email_' . $row->id . '"><a href="mailto:' .$row->email. '">' .$row->email. '</a></span></td></tr>';
else
echo '<span id="email_' . $row->id . '"></span>';

		
			







//--------------------------------------------------------------------------

$par_data=explode("par_",$row->param);

for($j=0;$j<count($par_data);$j++)
	if($par_data[$j]!='')
	{

		$par1_data=explode("@@:@@",$par_data[$j]);

		$par_values=explode("	",$par1_data[1]);

				$countOfPar=0;
					for($k=0;$k<count($par_values);$k++)
						if($par_values[$k]!="")
						$countOfPar++;
		$bgcolor=(($j%2)?(($params->viewcontact_params_background_color2!='')?('background-color:'.$params->viewcontact_params_background_color2.';'):''):(($params->viewcontact_params_background_color1!='')?('background-color:'.$params->viewcontact_params_background_color1.';'):''));	


		if($countOfPar!=0)
		{
		
                echo '<tr  valign="top" style="' . $bgcolor . 'text-align:left"><td><b>' . $par1_data[0] . ':</b></td>';
                

                    echo '<td style="' . (($params->text_size_small != '') ? ('font-size:' . $params->text_size_small . 'px;') : '') . $bgcolor . (($params->viewcontact_params_color != '') ? ('color:' . $params->viewcontact_params_color . ';') : '') . 'width:' . $params->parameters_select_box_width. 'px;"><ul class="spidercontactparamslist">';
                    
                   for ($k = 0; $k < count($par_values); $k++)
                        if ($par_values[$k] != "")
						{
							if (preg_match('/(http:\/\/[^\s]+)/', $par_values[$k], $text))
							{
							$hypertext = "<a target=\"_blank\" href=\"". $text[0] . "\">" . $text[0] . "</a>";
							$newString = preg_replace('/(http:\/\/[^\s]+)/', $hypertext, $par_values[$k]);
							echo '<li>' . $newString . '</li>';
							}
							else if (preg_match('/(https:\/\/[^\s]+)/', $par_values[$k], $text))
							{ 
								$hypertext = "<a target=\"_blank\" href=\"". $text[0] . "\">" . $text[0] . "</a>";
							$newString = preg_replace('/(https:\/\/[^\s]+)/', $hypertext, $par_values[$k]);
							echo '<li>' . $newString . '</li>';
								}
							
						 else if ($par_values[$k])
                            echo '<li>' . $par_values[$k] . '</li>';
						}
                    
                    echo '</ul></td></tr>';

		}
	}	
//--------------------------------------------------------------------------


$desc =   str_replace('<hr id="system-readmore" />', '<hr style="display:none;" id="system-readmore">',  $row->description);
echo '</table>
</td></tr></table> </td>  </tr> </table><br />

<div style="'. (($params->description_text_color != '') ? ('color:' . $params->description_text_color . ';') : '') .'" id="contAllDescription">' . $desc . '</div><br />
<br />';




	echo '</div>';
	}
	
	
if ($params->enable_message)
{
echo '<div><a name="mes" style="color:inherit;text-decoration:inherit;">'.__('Send a Message','sp_contact').'</a></div>';

$url=$_SERVER['QUERY_STRING'];


//echo '<div style="border:;margin:3px; padding:10px; ">';


echo '<div id="message_div" style="width:'.$params->paramstable_parameters_single_main_table_width.'px; '.$border_radius.'  padding:10px; border-width:'.$params->viewcontact_border_width.'px;border-color:'.$params->viewcontact_border_color.';border-style:'.$params->viewcontact_border_style.';'.(($params->messages_background_color!='')?('background-color:'.$params->messages_background_color.';'):'').'">';


echo '<form  action="'.$_SERVER["REQUEST_URI"].'#mes"  name="message" method="post" >';


			if ($params->show_name)
			{
			echo '	<div style="font-weight:bold;">'.__('Your Name','sp_contact').'</div>

				<input type="text" name="full_name" id="full_name" style="width:98%; margin:0px;" />
<br />
<br />';
			}
			
			else { echo' <input type="hidden" name="full_name" id="full_name" value ="No Name" /> ';}
			
			
			if ($params->show_phone)
			{

echo '<div style="font-weight:bold;">'.__('Your Phone','sp_contact').'</div>

				<input type="text" name="phone" id="phone" style="width:98%; margin:0px;" />
<br />
<br />';
			}
			
			else { echo' <input type="hidden" name="phone" id="phone" value="No Phone"  /> ';}
			if ($params->show_email)
			{

echo '<div style="font-weight:bold;">'.__('Your Mail','sp_contact').'</div>

				<input type="email" name="email" id="email" style="width:98%; margin:0px;" />
<br />
<br />';
			}
			
			else {
				echo '<input type="hidden" name="email" id="email" value="No Email"/>';}
				
				
				if ($params->show_cont_pref && $params->show_email && $params->show_phone)
			{
				

echo '<div style="font-weight:bold;">'.__('Contact Preference','sp_contact').'</div>';

				
			echo '<input type="radio" name="cont_pref" id="cont_pref1" value="1" style="width:98%; margin:0px;" /><label for="cont_pref1">Phone</label>
				<input type="radio" name="cont_pref" id="cont_pref0" value="0" checked="checked" style="width:98%; margin:0px;" /><label for="cont_pref0">Mail</label>
				<input type="radio" name="cont_pref" id="cont_pref2" value="2" style="width:98%; margin:0px;" /><label for="cont_pref2">Either</label>

<br />
<br />';


			}
			
			else {
				echo '<input type="hidden" name="cont_pref" id="cont_pref" value="Disabled"/>';}
				
			echo '<div style="font-weight:bold;">'.__('Title of Message','sp_contact').'</div>

				<input type="text" name="mes_title" id="mes_title" style="width:98%; margin:0px;" />
<br />
<br />



				<div style="font-weight:bold;">'.__('Text','sp_contact').'</div>
				<textarea rows="4" name="message_text" id="message_text" style="width:98%; margin:0px;"></textarea>
			<input type="hidden" name="want_email" value="'.$row->want_email.'" />	
	<input type="hidden" name="contact_id" value="'.$row->id.'" />
	<input type="hidden" name="view" value="showcontact" />
	<input type="hidden" name="is_message" value=true />
	<input type="hidden" name="option" value="" />';

	?><br />
<br />

    <table id="cap_table" cellpadding="0" cellspacing="10" border="0" valign="middle" width="100%"> <tr><td>
    <?php echo __('Please, Enter the Code','sp_contact') ?>
    </td><td style="max-width:120px !important;">
   <span id="wd_captcha"><img src="<?php echo  admin_url('admin-ajax.php?action=spidercontactwdcaptchae') ?>" id="wd_captcha_img" height="24" width="80" /></span><a href="javascript:refreshCaptchaCont();" style="text-decoration:none">&nbsp;<img src="<?php echo plugins_url('Front_images/refresh.png',__FILE__) ?>" border="0" style="border:none" /></a>&nbsp;</td><td><input type="text" name="code" id="message_capcode" size="6" /><span id="caphid"></span>
   </td>
   <td  align="right">   
   <input type="button" class="spidercontactbutton" style="<?php echo 'background-color:'.$params->button_background_color.'; color:'.$params->button_color ?>; width:inherit;margin-right:10px;"  value="<?php echo __('Send','sp_contact') ?>" onclick='submit_message("<?php echo __('The Name field is required.','sp_contact'); ?>","<?php echo __('The Message field is required.','sp_contact'); ?>", "<?php echo __('The Email field is Required.','sp_contact'); ?>", "<?php echo __('Incorrect security code','sp_contact'); ?>",  "<?php echo __('The Phone field is required.','sp_contact'); ?>",  "<?php echo __('The Email field is Required.','sp_contact'); ?>" );' />
   </td>
	</tr></table>

	</form>
	
 <?php
 $code='';
 if(isset($_POST['code']))
    $code=esc_js(esc_html(stripslashes($_POST['code'])));
	
	
}
	
		?>
	</div><br /><br />
    
      
<script type="text/javascript">
var SpiderCatOFOnLoad = window.onload;
window.onload = SpiderCatAddToOnload;
</script>
	<?php
	
	
	$content=ob_get_contents();
                ob_end_clean();
                return $content;
	}


















































function html_front_end_cotegory_contact_list($rows, $params,$page_num,$cont_count,$categories=0,$cont_in_page,$category_list,$idddd){

ob_start();
if ($params->get('table_radius')):
?>
<script>
function submit_cotctt(page_link)
{
	if(document.getElementById('cat_form')){
	document.getElementById('cat_form').setAttribute('action',page_link);
	document.getElementById('cat_form').submit();
	}
	else
	{
		window.location.href=page_link;
	}
}
</script>
<style type="text/css">
#contactMainDiv, .spidercontactbutton, .spidercontactinput  , .table_contact
{
-webkit-border-radius: 8px;
-moz-border-radius: 8px;
border-radius: 8px;
}
#contactssMainDivs th
{
	text-transform:none !important;
	text-align:center !important;
}
#contactMainDiv #contTitle
{
-webkit-border-top-right-radius: 8px;
-webkit-border-top-left-radius: 8px;
-moz-border-radius-topright: 8px;
-moz-border-radius-topleft: 8px;
border-top-right-radius: 8px;
border-top-left-radius: 8px;
}
select.input{
margin: 0 0 24px 0 !important;
top: -11px !important;
position: relative;
}
#ContactSearchBox, .spidercontactbutton
{
	
	font-size:10px !important;
	-webkit-border-radius: 8px !important;
	-moz-border-radius: 8px !important;
	border-radius: 8px !important;
	
}
.input{
	text-align: left !important;
	font-size:12px !important;
	-webkit-border-radius: 8px !important;
	-moz-border-radius: 8px !important;
	border-radius: 8px !important;
}
#ContactSearchBox
{
	margin-bottom:10px !important;
	text-align: right !important;
}

#contactssMainDivs, #table_contact, .spidercontactbutton, .input
{
-webkit-border-radius: 8px;
-moz-border-radius: 8px;
border-radius: 8px;
}
#contactssMainDivs table, #contactssMainDivs td, #contactssMainDivs tr, #contactssMainDivs div, #contactssMainDivs tbody, #contactssMainDivs th
{
	line-height:inherit;
}
#contactssMainDivs tr, td
{
	padding:inherit !important;
}
#contactssMainDivs img{
	max-width:inherit;
	max-height:inherit;
}
#contactssMainDivs ul li, #contactssMainDivs ul , #contactssMainDivs li
{
	list-style-type:none !important;
}






#contactssMainDivs #prodTitle
{
-webkit-border-top-right-radius: 8px;
-webkit-border-top-left-radius: 8px;
-moz-border-radius-topright: 8px;
-moz-border-radius-topleft: 8px;
border-top-right-radius: 8px;
border-top-left-radius: 8px;
}

#table_contact tr:first-child td:first-child
{
-webkit-border-top-left-radius: 8px;
-moz-border-radius-topleft: 8px;
border-top-left-radius: 8px;
}
#table_contact{
	margin:inherit;
}
#table_contact table, #table_contact tr, #table_contact td {
	padding-bottom:0px;
	padding-left:0px;
	padding-right:0px;
	padding-top:0px;
	margin-bottom:0px;
	margin-left:0px;
	margin-right:0px;
	margin-top:0px;
}
#table_contact{
	padding-bottom:0px;
	padding-left:0px;
	padding-right:0px;
	padding-top:0px;
	margin-bottom:0px;
	margin-left:0px;
	margin-right:0px;
	margin-top:0px;
}

#table_contact tr:first-child td:last-child
{
-webkit-border-top-right-radius: 8px;
-moz-border-radius-topright: 8px;
border-top-right-radius: 8px;
}


#table_contact tr:last-child td:first-child
{
-webkit-border-bottom-left-radius: 8px;
-moz-border-radius-bottomleft: 8px;
border-bottom-left-radius: 8px;
}

#table_contact tr:last-child td:last-child
{
-webkit-border-bottom-right-radius: 8px;
-moz-border-radius-bottomright: 8px;
border-bottom-right-radius: 8px;
}



#table_contact td table td
{
-webkit-border-radius: 0px !important;
-moz-border-radius: 0px !important;
border-radius: 0px !important;
}

#contactssMainDivs td, #contactssMainDivs tr, #contactssMainDivs tbody,  #contactssMainDivs div{
	line-height:inherit !important;
	
	color:inherit;
	opacity:inherit !important;
	
}
#category, #category table, #category tr, #category td, #category th,  #category tbody{

	margin-left:0px;
	margin-bottom:0px;
	margin-right:0px;
	margin-top:0px;
	padding-bottom: 10px;
	padding-left: 10px;
	padding-right: 10px;
}
#table_contact ul, #table_contact li, #table_contact a{
	background-color:inherit;
	list-style:none;
}
#table_of_param tr, #table_of_param td{
	text-align:left;
	vertical-align:top !important;
}
#spider_cat_price_tab{
	vertical-align:top !important;
}







#contactssMainDivs input,
#contactssMainDivs textarea {
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  -webkit-transition: all 0.2s linear;
  -webkit-transition-delay: 0s;
  -moz-transition: all 0.2s linear 0s;
  -o-transition: all 0.2s linear 0s;
  transition: all 0.2s linear 0s;
}






#contactssMainDivs textarea,
#contactssMainDivs input[type="text"]
 {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-background-clip: padding;
  -moz-background-clip: padding;
  background-clip: padding-box;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  -webkit-appearance: none;
  background-color: white;
  border: 1px solid #cccccc;
  color: black;
  outline: 0;
  margin: 0;
  padding: 3px 4px;
  text-align: left;
  font-size: 13px;
  font-family: Arial, "Liberation Sans", FreeSans, sans-serif;
  height: 2.2em;
  vertical-align: top;
  *padding-top: 2px;
  *padding-bottom: 1px;
  *height: auto;
}
#contactssMainDivs textarea[disabled],
#contactssMainDivs input[type="text"][disabled]
{
  background-color: #eeeeee;
}
#contactssMainDivs textarea:focus,
#contactssMainDivs input[type="text"]:focus {
  border-color: rgba(82, 168, 236, 0.8);
  outline: 0;
  outline: thin dotted \9;
  /* IE6-9 */
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6);
  -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6);
}


#contactssMainDivs input[disabled],
#contactssMainDivs textarea[disabled] {
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  box-shadow: none;
  -moz-user-select: -moz-none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  user-select: none;
  color: #888888;
  cursor: default;
}

#contactssMainDivs input::-webkit-input-placeholder,
#contactssMainDivs textarea::-webkit-input-placeholder {
  color: #888888;
}

#contactssMainDivs input:-moz-placeholder,
#contactssMainDivs textarea:-moz-placeholder {
  color: #888888;
}

#contactssMainDivs input.placeholder_text,
#contactssMainDivs textarea.placeholder_text {
  color: #888888;
}





#contactssMainDivs optgroup {
  color: black;
  font-style: normal;
  font-weight: normal;
  font-family: Arial, "Liberation Sans", FreeSans, sans-serif;
}
#contactssMainDivs optgroup::-moz-focus-inner {
  border: 0;
  padding: 0;
}
#tdviewportheight div, #tdviewportheight td, #tdviewportheight{
	vertical-align:middle;



}
#table_contact tr,#table_contact td,#table_contact tr td{
	border:1px solid ;
}
#table_of_param td,#table_of_param tr,#table_of_param table{
	border:1px solid !important;
	border-color:#FFF !important;
	border-spacing:inherit !important;
}
#table_contact td,#table_contact th,#table_contact, #table_contact span, #table_contact div{
	overflow:hidden;
}
#table_contact tr{
	display: table-header-group;
}
#table_contact{
	display:block;
	overflow:auto;
	}
#table_contact td{
	vertical-align:middle !important;
	text-align:center !important;
}
#contact_email_div{
	word-break:break-all !important;
	}
</style>
<?php
endif;
  if ($params->get("change_on_hover")):
echo '<style>
.table_contact  tr:hover  {
    background-color: '.$params->get("hover_color").';
	
}



 
.table_contact  tr:hover   #contTitle, 
.table_contact  tr:hover   span   {
    background-color: '.$params->get("hover_color").'; 
	color: '.$params->get("hover_text_color").' !important;
}



  </style>';
 endif;  
   if( 'page' == get_option( 'show_on_front' ) && ( '' != get_option( 'page_for_posts' ) ) && is_home() ){
      $page_link=get_permalink($frontpage_id);
   }
	   else if(is_home())
	   {
		   $page_link=site_url().'/index.php';
	   }
	   else
	   {
		   $page_link=get_permalink();
	   }
 
if (($params->get("choose_category") and !($idddd > 0)) or $params->get("name_search"))
  {
    echo '<div id="contactssMainDivs" style="width:'.$params->get("paramstable_parameters_main_table_width").'px !important"><form action="'. $page_link.'" method="post" name="cat_form" id="cat_form">
<input type="hidden" name="page_num"	value="1">
<div class="ContactSearchBox">';

if ($params->get("choose_category") and !($idddd > 0))
{
	$cat_id=0;
	if(isset($_POST['cat_id']))
	$cat_id =esc_js(esc_html(stripslashes($_POST['cat_id'])));
	
	echo __('Choose Category','sp_contact') . '&nbsp;
	<select id="cat_id" name="cat_id" class="spidercontactinput" size="1" onChange="document.cat_form.submit();">
		<option value="0">' . __('All','sp_contact') . '</option> ';
    
    foreach ($category_list as $category)
    {
        if ($category->id == $cat_id)
            echo '<option value="' . $category->id . '"  selected="selected">' . $category->name . '</option>';
        
        else
            echo '<option value="' . $category->id . '" >' . $category->name . '</option>';
    }
        
    echo '</select>';
}

if ( $params->get("name_search"))
{
	$name_search='';
	if(isset($_POST['name_search']))
$name_search = esc_js(esc_html(stripslashes($_POST['name_search'])));
echo '<br />
' . __('Search by name','sp_contact') . '&nbsp;
<input id="name_search" name="name_search" class="input" value="'.$name_search.'"> 
	<input type="submit" value="'. __('Search','sp_contact') .'" class="spidercontactbutton" style="background:'.$params->get( 'table_button_background_color' ).'; color:'.$params->get( 'table_button_color' ).'; width:inherit;border-bottom:0"><input type="button" value="'. __('Reset','sp_contact') .'" onClick="cat_form_reset(this.form);" class="spidercontactbutton" style="background:'.$params->get( 'table_button_background_color' ).'; color:'.$params->get( 'table_button_color' ).'; width:inherit;border-bottom:0">';
}
echo '</div></form>';
}  
  

	
	  
	 
   
   
   echo ' <table class="table_contact" border="12px"  style="width:'.$params->get("paramstable_parameters_main_table_width").'px !important; border:'.$params->get('table_border_style_table').' '.$params->get('table_border_width').'px !important; border-collapse:separate;  '.'border-color:' . $params->get('table_border_color') . ' !important ;border-style:' . $params->get('table_border_style_table') . '; ' . (($params->get('table_text_size_small') != '') ? ('font-size:' . $params->get('table_text_size_small') . 'px;') : '') . (($params->get('table_text_color') != '') ? ('color:' . $params->get('table_text_color') . ';') : '') . (($params->get('table_background_color') != '') ? ('background-color:' . $params->get('table_background_color') . ';') : '') . '" cellpadding="0" cellspacing="0" id="table_contact">';
     ?>
     <?php
	 if (count($rows))
	 {
	echo '<tr style="'.(($params->get('table_title_background_color') != '') ? ('background-color:' . $params->get('table_title_background_color') . ';') : '').'" align="center">';
	?>
    		<th <?php echo 'style="padding:5px; border-color:' . $params->get('table_border_color') . ' !important ;'.(($params->get('table_title_color') != '') ? ('color:' . $params->get('table_title_color') . ';') : ' ').' '.(($params->get('table_title_size_small') != '') ? ('font-size:' . $params->get('table_title_size_small') . 'px;') : ' ').'"';?> > <?php echo __('Picture','sp_contact') ?> </th>
    		<th <?php echo 'style=" padding:5px; border-color:' . $params->get('table_border_color') . ' !important ; '.(($params->get('table_title_color') != '') ? ('color:' . $params->get('table_title_color') . ';') : ' ').' '.(($params->get('table_title_size_small') != '') ? ('font-size:' . $params->get('table_title_size_small') . 'px;') : ' ').'"';?>> <?php echo __('First Name','sp_contact') ?> </th>
            <th <?php echo 'style="padding:5px; border-color:' . $params->get('table_border_color') . ' !important ; '.(($params->get('table_title_color') != '') ? ('color:' . $params->get('table_title_color') . ';') : ' ').' '.(($params->get('table_title_size_small') != '') ? ('font-size:' . $params->get('table_title_size_small') . 'px;') : ' ').'"';?> > <?php echo __('Last Name','sp_contact') ?></th>
            <th <?php echo 'style="padding:5px; border-color:' . $params->get('table_border_color') . ' !important ; '.(($params->get('table_title_color') != '') ? ('color:' . $params->get('table_title_color') . ';') : ' ').' '.(($params->get('table_title_size_small') != '') ? ('font-size:' . $params->get('table_title_size_small') . 'px;') : ' ').'"';?> > <?php echo __('Category','sp_contact') ?> </th>            
            <th <?php echo 'style="padding:5px; border-color:' . $params->get('table_border_color') . ' !important ; '.(($params->get('table_title_color') != '') ? ('color:' . $params->get('table_title_color') . ';') : ' ').' '.(($params->get('table_title_size_small') != '') ? ('font-size:' . $params->get('table_title_size_small') . 'px;') : ' ').'"';?> ><?php echo __('Email','sp_contact') ?> </th>
			 <th <?php echo ' width="' . $params->get('table_parameters_select_box_width').'" style="padding:5px; width:' . ($params->get('table_parameters_select_box_width')-10) . 'px; border-color:' . $params->get('table_border_color') . ' !important ; '.(($params->get('table_title_color') != '') ? ('color:' . $params->get('table_title_color') . ';') : ' ').' '.(($params->get('table_title_size_small') != '') ? ('font-size:' . $params->get('table_title_size_small') . 'px;') : ' ').'"';?> ><?php echo __('Parameters','sp_contact') ?> </th>
    </tr>
    
    
  <?php  
	 
foreach ($rows as $row)
{
	
	$imgurl = explode(";;;", $row->image_url);

if(!strpos(get_permalink(),'?'))
    $link = get_permalink().'?contact_id=' . $row->id . '&view=showcontact&page_num=' . $page_num . '&back=1';
	else
   $link = get_permalink().'&contact_id=' . $row->id . '&view=showcontact&page_num=' . $page_num . '&back=1';
	  echo '<tr style="border-color:' . $params->get('table_border_color') . ' !important ;" align="center">';
	  			echo '<td style="border-color:' . $params->get('table_border_color') . ' !important ;" id ="picture">';
 if (strpos($row->image_url,'http://') === false  and strpos($row->image_url,'https://') === false)
      {
        $imgurl[0] =plugins_url('Front_images/noimage.jpg',__FILE__);
		  echo   '<div style="margin:5px;"><a href="'.$link.'" target="_self"><img style="max-width:' . $params->get('table_small_picture_width') . 'px ; max-height:' . $params->get('table_small_picture_height') . 'px "   src="'.$imgurl[0].'" /></a></div>';
        
	  }
	  
        
  else {    
  $image_with_atach_id=explode('******',$imgurl[0]);
	if(isset($image_with_atach_id[1]) && $image_with_atach_id[1])
	{
		$array_with_sizes=wp_get_attachment_image_src( $image_with_atach_id[1], 'thumbnail' );
	$attach_url=$array_with_sizes[0];
	}
	else{
	$attach_url=$image_with_atach_id[0];
	}
	$img=$image_with_atach_id[0]; 
   
			echo '<div style="margin:5px;"><a href="'.$link.'" target="_self"><img style="max-width:' . $params->get('table_small_picture_width') . 'px ; max-height:' . $params->get('table_small_picture_height') . 'px "   src="'.$attach_url.'" /></a></div>';
}
				echo '</td>';
				
				echo '<td style="border-color:' . $params->get('table_border_color') . ' !important ;" id = "first_name">';
				
				echo '<div id="contTitle" style=" margin:5px;font-size:' . $params->get('table_title_size_small') . 'px;' . (($params->get('table_text_color') != '') ? ('color:' . $params->get('table_text_color') . ';') : '') .'">' . $row->first_name.'</div>';
				
				
				echo '</td>';
				
					echo '<td style="border-color:' . $params->get('table_border_color') . ' !important ;" id = "last_name">';
				
				echo '<div id="contTitle" style=" margin:5px; font-size:' . $params->get('table_title_size_small') . 'px;' . (($params->get('table_text_color') != '') ? ('color:' . $params->get('table_text_color') . ';') : '') .'">' . $row->last_name.'</div>';
				
				
				echo '</td>';
				
				echo '<td style="border-color:' . $params->get('table_border_color') . ' !important ;" id="category">';
				
				 if ($row->category_id > 0)
        echo '<div style=" margin:5px;' . (($params->get('table_text_color') != '') ? ('color:' . $params->get('table_text_color') . ';') : '') . '"><span   id="cat_' . $row->id . '">' . $categories[$row->category_id] . '</span></div>';
    
    else
        echo '<span id="cat_' . $row->id . '"></span>';
				echo '</td>';
				
				echo '<td style="border-color:' . $params->get('table_border_color') . ' !important ;" id="category">';
				
				 if ($row->email != '')
        echo '<div id="contact_email_div" margin:5px;' . (($params->get('table_text_color') != '') ? ('color:' . $params->get('table_text_color') . ';') : '') . '"><span id="email_' . $row->id . '"><a href="mailto:' .$row->email. '">' .$row->email. '</a></span></div>';
    
    else
        echo '<span id="email_' . $row->id . '"></span>';
				echo '</td>';
				
				echo '<td align="justify" style="border-color:' . $params->get('table_border_color') . ' !important ;padding-top:0; padding:0; " id="params">';
				echo '<table id="table_of_param" style=" border-collapse: separate;  width:' . $params->get('table_parameters_select_box_width') . 'px;">';
					    

    $par_data = explode("par_", $row->param);
 
    for ($j = 0; $j < count($par_data); $j++)
        if ($par_data[$j] != '')
          {
            $par1_data = explode("@@:@@", $par_data[$j]);
            $par_values = explode("	", $par1_data[1]);

            $countOfPar = 0;
            
            for ($k = 0; $k < count($par_values); $k++)
                if ($par_values[$k] != "")
                    $countOfPar++;
            
            $bgcolor = ((!($j % 2)) ? (($params->get('table_params_background_color2') != '') ? ('background-color:' . $params->get('table_params_background_color2') . ';') : '') : (($params->get('table_params_background_color1') != '') ? ('background-color:' . $params->get('table_params_background_color1') . ';') : ''));
            
            
            if ($countOfPar != 0)
              {
				   $paramscolor = ((!($j % 2)) ? (($params->get('table_params_color2') != '') ? ('color:' . $params->get('table_params_color2') . ';') : '') : (($params->get('table_params_color1') != '') ? ('color:' . $params->get('table_params_color1') . ';') : ''));
				   
                echo '<tr style="' . $bgcolor . 'text-align:left"><td><b>' . $par1_data[0] . ':</b></td>';
                

                    echo '<td id="nohover" style="' . (($params->get('table_text_size_small') != '') ? ('font-size:' . $params->get('table_text_size_small') . 'px;') : '') . $bgcolor . ' '.$paramscolor.' width:' . $params->get('table_parameters_select_box_width') . 'px;"><ul class="spidercontactparamslist">';
                    
                  for ($k = 0; $k < count($par_values); $k++)
                        if ($par_values[$k] != "")
						{
							if (preg_match('/(http:\/\/[^\s]+)/', $par_values[$k], $text))
							{
							$hypertext = "<a target=\"_blank\" href=\"". $text[0] . "\">" . $text[0] . "</a>";
							$newString = preg_replace('/(http:\/\/[^\s]+)/', $hypertext, $par_values[$k]);
							echo '<li>' . $newString . '</li>';
							}
							else if (preg_match('/(https:\/\/[^\s]+)/', $par_values[$k], $text))
							{ 
								$hypertext = "<a target=\"_blank\" href=\"". $text[0] . "\">" . $text[0] . "</a>";
							$newString = preg_replace('/(https:\/\/[^\s]+)/', $hypertext, $par_values[$k]);
							echo '<li>' . $newString . '</li>';
								}
							
						 else if ($par_values[$k])
                            echo '<li>' . $par_values[$k] . '</li>';
						}
                    
                    echo '</ul></td></tr>';
                  
              }
          }
		  echo '</table>';
					
				echo '</td>';
				
			
		 echo '</tr>';
	  
  }
		
?>

</tr>
</table>
  
  <?php
  
	 }
	 
	 else
	 {echo "Nothing";}?>
            <div id="spidercontactnavigation" style="text-align:center;">

    <?php



$pos = strpos($_SERVER['QUERY_STRING'], "page_num") - 1;



if ($pos > 0)
    $url = substr($_SERVER['QUERY_STRING'], 0, $pos);

else
    $url = $_SERVER['QUERY_STRING'];

$cat_id =0;
if(isset($_POST['cat_id'])) 
  $cat_id=esc_js(esc_html(stripslashes($_POST['cat_id'])));



$pos = strpos($_SERVER['QUERY_STRING'], "cat_id") - 1;



if ($pos > 0)
    $url = substr($url, 0, $pos);





if ($cat_id != 0)
    $url .= "&cat_id=" . $cat_id;







if ($cont_count > $cont_in_page and $cont_in_page > 0)
  {
    $r = ceil($cont_count / $cont_in_page);
    
    
    
    
    
    $navstyle = 'cursor: pointer;'.(($params->get('table_text_size_small') != '') ? ('font-size:' . $params->get('table_text_size_small') . 'px;') : '') . (($params->get('text_color') != '') ? ('color:' . $params->get('table_text_color') . ';') : '');
    
    if(strpos(get_permalink(),'?'))    
    $link = get_permalink().'&page_num= ';
    else
	{
		 $link = get_permalink().'?page_num= ';
	}
    if ($page_num > 5)
      {
		  if(strpos(get_permalink(),'?'))
         $link = get_permalink().'&page_num=1';
		  else
         $link = get_permalink().'?page_num= ';
        echo "

&nbsp;&nbsp;<a onclick=\"submit_cotctt('{$link}')\" style=\"$navstyle\">first</a>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;...&nbsp";
        
      }
	   if ($page_num > 1)
      {
		   if(strpos(get_permalink(),'?'))
         $link = get_permalink().'&' . ($page_num - 1);
		 else
        $link = get_permalink().'?' . ($page_num - 1);
        echo "&nbsp;&nbsp;<a onclick=\"submit_cotctt('{$link}')\" style=\"$navstyle\">prev</a>&nbsp;&nbsp;";
        
      }
    
    
    
    for ($i = $page_num - 4; $i < ($page_num + 5); $i++)
      {
        if ($i <= $r and $i >= 1)
          {
			   if(strpos(get_permalink(),'?'))
             $link = get_permalink().'&page_num=' . $i;
            else
			 $link = get_permalink().'?page_num=' . $i;
            if ($i == $page_num)
                echo "<span style='font-size:".(((int)$params->get("cube_text_size_small")+2)."px")."; font-weight:bold;color:#000000'>&nbsp;$i&nbsp;</span>";
            
            else
                echo "<a onclick=\"submit_cotctt('{$link}')\" style=\"$navstyle\">&nbsp;$i&nbsp;</a>";
            
          }
        
      }
    
    
    
    
    
    if ($page_num < $r)
      {
		  if(strpos(get_permalink(),'?'))
        $link = get_permalink().'&page_num=' . ($page_num + 1);
		else
		$link = get_permalink().'?page_num=' . ($page_num + 1);
        
        echo "&nbsp;&nbsp;<a onclick=\"submit_cotctt('{$link}')\" style=\"$navstyle\">next</a>&nbsp;&nbsp;";
        
      }
    
    if (($r - $page_num) > 4)
      {
		  	  if(strpos(get_permalink(),'?'))
        $link = get_permalink().'&page_num=' . $r;
		else
		$link = get_permalink().'?page_num=' . $r;

        
        echo "&nbsp;...&nbsp;&nbsp;&nbsp;<a onclick=\"submit_cotctt('{$link}')\" style=\"$navstyle\">last</a>";
        
      }
    
  }

?></div>
<?php
	$content=ob_get_contents();
                ob_end_clean();
                return $content;
}


































function html_fornt_end_contact_short($rows, $params,$page_num,$cont_count,$categories,$cont_in_page,$category_list,$idddd){
ob_start();
$prod_iterator = 0;

if ($params->get('cube_radius')):
?>
<style type="text/css">
#tdviewportheight div, #tdviewportheight td, #tdviewportheight{
	vertical-align:middle;
}
#contactssMainDivs{	
	vertical-align:middle !important;	
	}
#contMiddle td, contMiddle tr{
		
		border-top:none !important;
}
#contactMainDivCube, .spidercontactbutton, .spidercontactinput
{
-webkit-border-radius: 8px;
-moz-border-radius: 8px;
border-radius: 8px;
}
#contMiddle{
	border:none !important;
}
#contactMainDiv th
{
	text-transform:none !important;
	text-align:center !important;
}
#contactMainDivCube #contTitle
{
-webkit-border-top-right-radius: 8px;
-webkit-border-top-left-radius: 8px;
-moz-border-radius-topright: 8px;
-moz-border-radius-topleft: 8px;
border-top-right-radius: 8px;
border-top-left-radius: 8px;
}
#ContactSearchBox, .spidercontactbutton
{
	
	font-size:10px !important;
	-webkit-border-radius: 8px !important;
	-moz-border-radius: 8px !important;
	border-radius: 8px !important;
	
}
.input{
	text-align: left !important;
	font-size:12px !important;
	-webkit-border-radius: 8px !important;
	-moz-border-radius: 8px !important;
	border-radius: 8px !important;
}
#ContactSearchBox
{
	margin-bottom:10px !important;
	text-align: right !important;
}
</style>
<script>
function submit_cotctt(page_link)
{
	if(document.getElementById('cat_form')){
	document.getElementById('cat_form').setAttribute('action',page_link);
	document.getElementById('cat_form').submit();
	}
	else
	{
		window.location.href=page_link;
	}
}
</script>
<?php
endif;
$cat_id =0;
if(isset($_POST['cat_id'])) 
  $cat_id=esc_js(esc_html(stripslashes($_POST['cat_id'])));
  if( 'page' == get_option( 'show_on_front' ) && ( '' != get_option( 'page_for_posts' ) ) && is_home() ){
      $page_link=get_permalink($frontpage_id);
   }
	   else if(is_home())
	   {
		   $page_link=site_url().'/index.php';
	   }
	   else
	   {
		   $page_link=get_permalink();
	   }
  
if (($params->get("choose_category") and !($idddd > 0)) or $params->get("name_search"))
  {
    echo '<form action="'. $page_link.'" method="post" name="cat_form" id="cat_form">
<input type="hidden" name="page_num"	value="1">
<div class="ContactSearchBox">';
if ($params->get("choose_category") and !($idddd > 0))
{
	
	echo __('Choose Category','sp_contact') . '&nbsp;
	<select id="cat_id" name="cat_id" class="spidercontactinput" size="1" onChange="document.cat_form.submit();">
		<option value="0">' . __('All','sp_contact') . '</option> ';
    
    foreach ($category_list as $category)
    {
        if ($category->id == $cat_id)
            echo '<option value="' . $category->id . '"  selected="selected">' . $category->name . '</option>';
        
        else
            echo '<option value="' . $category->id . '" >' . $category->name . '</option>';
    }
        
    echo '</select>';
}

if ( $params->get("name_search"))
{
	$name_search='';
	if(isset($_POST['name_search']))
$name_search = esc_js(esc_html(stripslashes($_POST['name_search'])));

echo '<br />
' . __('Search by name','sp_contact') . '&nbsp;
<input id="name_search" name="name_search" class="input" value="'.$name_search.'"> 
	<input type="submit" value="'. __('Search','sp_contact') .'" class="spidercontactbutton" style="background:'.$params->get( 'cube_button_background_color' ).' !important; color:'.$params->get( 'cube_button_color' ).'; width:inherit; border-bottom:0"><input type="button" value="'. __('Reset','sp_contact') .'" onClick="cat_form_reset(this.form);" class="spidercontactbutton" style="background:'.$params->get( 'cube_button_background_color' ).'; color:'.$params->get( 'cube_button_color' ).'; width:inherit;border-bottom:0">';
}
echo '</div></form>';
}

    
  
  
  
  
  
  
    ?>
    <table border="0" cellpadding="0" cellspacing="0" id="contactMainTable">
    <tr>
      <?php
	  
    
foreach ($rows as $row)
  {
    if (($prod_iterator % $params->get('cube_count_of_contact_in_the_row')) === 0 and $prod_iterator > 0)
        echo "</tr><tr>";
    
    
    
    $prod_iterator++;
    
    if(strpos(get_permalink(),'?'))
    
    $link = get_permalink().'&contact_id=' . $row->id . '&view=showcontact&page_num=' . $page_num . '&back=1';
    else
	  $link = get_permalink().'?contact_id=' . $row->id . '&view=showcontact&page_num=' . $page_num . '&back=1';
    	
    
    $imgurl = explode(";;;", $row->image_url);
    echo '<td><div id="contactMainDivCube" style="' .'  border-width:' . $params->get('cube_border_width') . 'px;border-color:' . $params->get('cube_border_color') . ';border-style:' . $params->get('cube_border_style') . ';' . (($params->get('cube_text_size_small') != '') ? ('font-size:' . $params->get('cube_text_size_small') . 'px;') : '') . (($params->get('cube_text_color') != '') ? ('color:' . $params->get('cube_text_color') . ';') : '') . (($params->get('cube_background_color') != '') ? ('background-color:' . $params->get('cube_background_color') . ';') : '') .' width:' . $params->get('cube_contact_cell_width') . 'px; ">




<div style="height:' . ((int)$params->get('cube_contact_cell_height')-20). 'px;" >

<div id="contTitle" style="font-size:' . $params->get('cube_title_size_small') . 'px;' . (($params->get('cube_title_color') != '') ? ('color:' . $params->get('cube_title_color') . ';') : '') . (($params->get('cube_title_background_color') != '') ? ('background-color:' . $params->get('cube_title_background_color') . ';') : '') . '">' . $row->first_name.' '.$row->last_name.'</div>



<table id="contMiddle" border="0" cellspacing="0" cellpadding="0"><tr>';
    
    
     if (strpos($row->image_url,'http://') === false  and strpos($row->image_url,'https://') === false)
      {
        $imgurl[0] =plugins_url('Front_images/noimage.jpg',__FILE__);
        
  echo '<td style="padding:10px;"><img style="max-width:' . $params->get('cube_small_picture_width') . 'px; max-height:' . $params->get('cube_small_picture_height') . 'px" src="' .$imgurl[0]. '" />

</td>';
      }
    else
	{
		
			$image_with_atach_id=explode('******',$imgurl[0]);
	if(isset($image_with_atach_id[1]) && $image_with_atach_id[1])
	{
		$array_with_sizes=wp_get_attachment_image_src( $image_with_atach_id[1], 'thumbnail' );
	$attach_url=$array_with_sizes[0];
	}
	else{
	$attach_url=$image_with_atach_id[0];
	}
	$img=$image_with_atach_id[0];
        echo '<td style="padding:10px;"><a href="' . $img . '" target="_blank"><img style="max-width:' . $params->get('cube_small_picture_width') . 'px;max-height:' . $params->get('cube_small_picture_height') . 'px" src="'. $attach_url . '" /></a></td>';
          
	  
  
    
echo '</td><td></td></tr>';


  }
 
	echo '</td></tr>

</table>


</div>


<div style="float:right;margin-top:-11%" id="contMore"><a href="' . $link . '" style="' . (($params->get('cube_hyperlink_color') != '') ? ('color:' . $params->get('cube_hyperlink_color') . ';') : '') . '">' . __('More','sp_contact') . '</a></div></td>';
    
    
    
  }

?>

</tr>
</table>
  
            <div id="spidercontactnavigation" style="text-align:center;">

    <?php



$pos = strpos($_SERVER['QUERY_STRING'], "page_num") - 1;



if ($pos > 0)
    $url = substr($_SERVER['QUERY_STRING'], 0, $pos);

else
    $url = $_SERVER['QUERY_STRING'];





$pos = strpos($_SERVER['QUERY_STRING'], "cat_id") - 1;



if ($pos > 0)
    $url = substr($url, 0, $pos);





if ($cat_id != 0)
    $url .= "&cat_id=" . $cat_id;







if ($cont_count > $cont_in_page and $cont_in_page > 0)
  {
    $r = ceil($cont_count / $cont_in_page);
    
    
    
    
    
    $navstyle = 'cursor: pointer;'.(($params->get('cube_text_size_small') != '') ? ('font-size:' . $params->get('cube_text_size_small') . 'px;') : '') . (($params->get('cube_text_color') != '') ? ('color:' . $params->get('cube_text_color') . ';') : '');
  
      if(strpos(get_permalink(),'?'))    
   		 $link = get_permalink().'&page_num= ';
	  else
	 	$link = get_permalink().'?page_num= ';
    
    if ($page_num > 5)
      {
        if(strpos(get_permalink(),'?'))    
   		 $link = get_permalink().'&page_num=1 ';
	  else
	 	$link = get_permalink().'?&page_num=1 ';
        
        echo "

&nbsp;&nbsp;<a onclick=\"submit_cotctt('{$link}')\" style=\"$navstyle\">first</a>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;...&nbsp";
        
      }
	   if ($page_num > 1)
      {
		   if(strpos(get_permalink(),'?'))    
   		 $link = get_permalink().'&page_num='. ($page_num - 1);
	  else
	 	$link = get_permalink().'?page_num='. ($page_num - 1);        
        echo "&nbsp;&nbsp;<a onclick=\"submit_cotctt('{$link}')\"  style=\"$navstyle\">prev</a>&nbsp;&nbsp;";
        
      }
    
    
    
    for ($i = $page_num - 4; $i < ($page_num + 5); $i++)
      {
        if ($i <= $r and $i >= 1)
          {
			     if(strpos(get_permalink(),'?'))    
   			 		$link = get_permalink().'&page_num='. $i;
	  			else
	 				$link = get_permalink().'?page_num='. $i;    
            
            if ($i == $page_num)
                echo "<span style='font-size:".(((int)$params->get("cube_text_size_small")+2)."px")."; font-weight:bold;color:#000000'>&nbsp;$i&nbsp;</span>";
            
            else
                echo "<a onclick=\"submit_cotctt('{$link}')\" style=\"$navstyle\">&nbsp;$i&nbsp;</a>";
            
          }
        
      }
    
    
    
    
    
    if ($page_num < $r)
      {
		    if(strpos(get_permalink(),'?'))    
   			 		$link = get_permalink().'&page_num='. ($page_num + 1);
	  			else
	 				$link = get_permalink().'?page_num='. ($page_num + 1);            
        echo "&nbsp;&nbsp;<a onclick=\"submit_cotctt('{$link}')\" style=\"$navstyle\">next</a>&nbsp;&nbsp;";
        
      }
    
    if (($r - $page_num) > 4)
      {
		    if(strpos(get_permalink(),'?'))    
   			 		$link = get_permalink().'&page_num='. $r;
	  			else
	 				$link = get_permalink().'?page_num='. $r;            
        echo "&nbsp;...&nbsp;&nbsp;&nbsp;<a onclick=\"submit_cotctt('{$link}')\" style=\"$navstyle\">last</a>";
        
      }
    
  }

?></div>
  
  
  
  
    
<script type="text/javascript">
var SpiderCatOFOnLoad = window.onload;
window.onload = SpiderCatAddToOnload;
</script>
<?php
	$content=ob_get_contents();
                ob_end_clean();
                return $content;
}























function html_fornt_end_contact_cells($rows, $params,$page_num,$cont_count,$categories,$cont_in_page,$category_list,$idddd){


ob_start();

$prod_iterator = 0;
if ($params->get('radius')):
?>
<script>
function submit_cotctt(page_link)
{
	if(document.getElementById('cat_form')){
	document.getElementById('cat_form').setAttribute('action',page_link);
	document.getElementById('cat_form').submit();
	}
	else
	{
		window.location.href=page_link;
	}
}
</script>
<style type="text/css">
#contactMainDiv th
{
	text-transform:none !important;
	text-align:center !important;
}
#contactMainDiv, .spidercontactbutton, .spidercontactinput
{
-webkit-border-radius: 8px;
-moz-border-radius: 8px;
border-radius: 8px;
}

#contactMainDiv #contTitle
{
-webkit-border-top-right-radius: 8px;
-webkit-border-top-left-radius: 8px;
-moz-border-radius-topright: 8px;
-moz-border-radius-topleft: 8px;
border-top-right-radius: 8px;
border-top-left-radius: 8px;
}
#contactMainDiv th
{
	text-transform:none !important;
	text-align:center !important;
}
#contactssMainDivs, .spidercontactbutton, .spidercontactinput
{
	font-size:12px !important;
	-webkit-border-radius: 8px !important;
	-moz-border-radius: 8px !important;
	border-radius: 8px !imp.0ortant;
	
}
.spidercontactinput{
	cursor:text !important;
	font-size:12px !important;
	-webkit-border-radius: 8px;
	-moz-border-radius: 8px;
	padding-bottom: 8px !important;
padding-left: 5px !important;
padding-top: 8px !important;
padding-right:5px !important;
}
Select.spidercontactinput{
	padding-top:3px !important;
	padding-bottom:3px !important;
}
input.spidercontactinput
{
	padding-bottom: 10px !important;
}
#ContactSearchBox, spidercontactbutton, .input
{
-webkit-border-radius: 8px;
-moz-border-radius: 8px;
border-radius: 8px;
padding-bottom: 5px !important;
padding-left: 5px !important;
padding-top: 5px !important;
padding-right:5px !important;
margin-left:5px !important;
line-height:1 !important;
}
#ContactSearchBox .input{
padding-bottom: 0px !important;
padding-top: 0px !important;
padding-left:3px !important;
padding-right:3px !important;
margin-left:3px !important;
}
#contactssMainDivs #contTitle
{
-webkit-border-top-right-radius: 8px;
-webkit-border-top-left-radius: 8px;
-moz-border-radius-topright: 8px;
-moz-border-radius-topleft: 8px;
border-top-right-radius: 8px;
border-top-left-radius: 8px;
}
#contactssMainDivs, .spidercontactbutton
{
	font-size:10px !important;
	-webkit-border-radius: 8px !important;
	-moz-border-radius: 8px !important;
	border-radius: 8px !important;
	
}



#contactssMainDivs input,
#contactssMainDivs textarea {
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  -webkit-transition: all 0.2s linear;
  -webkit-transition-delay: 0s;
  -moz-transition: all 0.2s linear 0s;
  -o-transition: all 0.2s linear 0s;
  transition: all 0.2s linear 0s;
}






#contactssMainDivs textarea,
#contactssMainDivs input[type="text"]
 {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-background-clip: padding;
  -moz-background-clip: padding;
  background-clip: padding-box;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  -webkit-appearance: none;
  background-color: white;
  border: 1px solid #cccccc;
  color: black;
  outline: 0;
  margin: 0;
  padding: 3px 4px;
  text-align: left;
  font-size: 13px;
  font-family: Arial, "Liberation Sans", FreeSans, sans-serif;
  height: 2.2em;
  vertical-align: top;
  *padding-top: 2px;
  *padding-bottom: 1px;
  *height: auto;
}
#contactssMainDivs textarea[disabled],
#contactssMainDivs input[type="text"][disabled]
{
  background-color: #eeeeee;
}
#contactssMainDivs textarea:focus,
#contactssMainDivs input[type="text"]:focus {
  border-color: rgba(82, 168, 236, 0.8);
  outline: 0;
  outline: thin dotted \9;
  /* IE6-9 */
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6);
  -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6);
}


#contactssMainDivs input[disabled],
#contactssMainDivs textarea[disabled] {
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  box-shadow: none;
  -moz-user-select: -moz-none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  user-select: none;
  color: #888888;
  cursor: default;
}

#contactssMainDivs input::-webkit-input-placeholder,
#contactssMainDivs textarea::-webkit-input-placeholder {
  color: #888888;
}

#contactssMainDivs input:-moz-placeholder,
#contactssMainDivs textarea:-moz-placeholder {
  color: #888888;
}

#contactssMainDivs input.placeholder_text,
#contactssMainDivs textarea.placeholder_text {
  color: #888888;
}




#contactssMainDivs textarea {
  min-height: 80px;
  overflow: auto;
  padding: 5px;
  resize: vertical;
  width: 100%;
}

#contactssMainDivs optgroup {
  color: black;
  font-style: normal;
  font-weight: normal;
  font-family: Arial, "Liberation Sans", FreeSans, sans-serif;
}
#contactssMainDivs optgroup::-moz-focus-inner {
  border: 0;
  padding: 0;
}
#contactMainTable{
	padding-top:0px;
	padding-bottom:0px;
	padding-left:0px;
	padding-right:0px;
	margin-bottom:0px;
	margin-left:0px;
	margin-right:0px;
	margin-top:0px;
	border:none !important;
	border-collapse:inherit;
	
}
#contactMainTable table, #contactMainTable tbody, #contactMainTable tr, #contactMainTable td{
		padding-top:0px!important;
	padding-bottom:0px!important;
	padding-left:0px!important;
	padding-right:0px!important;
	margin-bottom:0px!important;
	margin-left:0px!important;
	margin-right:0px!important;
	margin-top:0px !important;
	padding:inherit;
	border:none !important;
	border-collapse:inherit;
	opacity: 1 !important;
	text-align:left;
	overflow:hidden !important;
	
}
#contactMainTable div{
	overflow:hidden !important;
}
#contactMainTable span{
	overflow:hidden !important;
}
.ContactSearchBox input{
	margin-top:-3px !important;
}
.S_P_contactssMainDivs table, .S_P_contactssMainDivs tr, .S_P_contactssMainDivs td, .S_P_contactssMainDivs tbody, .S_P_contactssMainDivs table tr td 
{
		border:none !important;
	
}
#contactssMainDivs ul li, #contactssMainDivs ul , #contactssMainDivs li
{
	list-style-type:none !important;
}
#contactssMainDivs td, #contactssMainDivs tr, #contactssMainDivs tbody,  #contactssMainDivs div{
	line-height:inherit !important;
	background-color:inherit;
	color:inherit;
	opacity:inherit !important;
	max-width:inherit !important;
	max-height:inherit !important;
	
}
#contactssMainDivs, #contactssMainDivs div{
	max-width:1000000px !important;
}
#contMiddle , #contMiddle a, #contMiddle li, #contMiddle ol{
	background-color:inherit !important;
}
#tdviewportheight div, #tdviewportheight td, #tdviewportheight{
	vertical-align:middle;



}
</style>
<?php
endif;
$cat_id=0;
if(isset($_POST['cat_id']))
$cat_id = esc_js(esc_html(stripslashes($_POST['cat_id'])));
  if( 'page' == get_option( 'show_on_front' ) && ( '' != get_option( 'page_for_posts' ) ) && is_home() ){
      $page_link=get_permalink($frontpage_id);
   }
	   else if(is_home())
	   {
		   $page_link=site_url().'/index.php';
	   }
	   else
	   {
		   $page_link=get_permalink();
	   }
if (($params->get("choose_category") and !($idddd > 0)) or $params->get("name_search"))
  {
    echo '<div id="contactssMainDivs"><form action="'. $page_link.'" method="post" name="cat_form" id="cat_form">
<input type="hidden" name="page_num"	value="1">
<div class="ContactSearchBox">';

if ($params->get("choose_category") and !($idddd > 0))
{
	
	echo '<span style="font-size:14px !important">'.__('Choose Category','sp_contact') . '</span>&nbsp;
	<select id="cat_id" name="cat_id" class="spidercontactinput" size="1" onChange="document.cat_form.submit();">
		<option value="0">' . __('All','sp_contact') . '</option> ';
    
    foreach ($category_list as $category)
    {
        if ($category->id == $cat_id)
            echo '<option value="' . $category->id . '"  selected="selected">' . $category->name . '</option>';
        
        else
            echo '<option value="' . $category->id . '" >' . $category->name . '</option>';
    }
        
    echo '</select>';
}

if ( $params->get("name_search"))
{
	
$name_search='';
if(isset($_POST['name_search']))
$name_search = esc_js(esc_html(stripslashes($_POST['name_search'])));	
	

echo '<br /><span style="font-size:14px !important">
' . __('Search by name','sp_contact') . '</span>&nbsp;
<input type="text" id="name_search" name="name_search" class="spidercontactinput" value="'.$name_search.'"> 
	<input type="submit" value="'. __('Search','sp_contact') .'" class="spidercontactbutton" style="background:'.$params->get( 'full_button_background_color' ).' !important; color:'.$params->get( 'full_button_color' ).'; width:inherit;border-bottom:0"><input type="button" value="'. __('Reset','sp_contact') .'" onClick="cat_form_reset(this.form);" class="spidercontactbutton" style="background:'.$params->get( 'full_button_background_color' ).' !important; color:'.$params->get( 'full_button_color' ).'; width:inherit;border-bottom:0">';
}
echo '</div></form>';
}

  
  
  
  
  
    ?>
    <table border="0" cellpadding="0" cellspacing="0" id="contactMainTable">
    <tr>
      <?php
	  
    
foreach ($rows as $row)
  {
    if (($prod_iterator % $params->get('count_of_contact_in_the_row')) ===0 and $prod_iterator > 0)
        echo "</tr><tr>";
    
    
    
    $prod_iterator++;
    
    if(strpos(get_permalink(),'?'))
    
    $link = get_permalink().'&contact_id=' . $row->id . '&view=showcontact&page_num=' . $page_num . '&back=1';
    
    else
	 $link = get_permalink().'?contact_id=' . $row->id . '&view=showcontact&page_num=' . $page_num . '&back=1';
    
    $imgurl = explode(";;;", $row->image_url);
    echo '<td><div id="contactMainDiv" style="'. '  border-width:' . $params->get('border_width') . 'px; border-color:' . $params->get('border_color') . ';border-style:' . $params->get('border_style') . ';' . (($params->get('text_size_small') != '') ? ('font-size:' . $params->get('text_size_small') . 'px;') : '') . (($params->get('text_color') != '') ? ('color:' . $params->get('text_color') . ';') : '') . (($params->get('background_color') != '') ? ('background-color:' . $params->get('background_color') . ';') : '') . ' width:' . $params->get('contact_cell_width') . 'px; height:' . $params->get('contact_cell_height') . 'px; ">



<div style="height:' . ($params->get('contact_cell_height') - 20) . 'px;">

<div id="contTitle" style="font-size:' . $params->get('title_size_small') . 'px;' . (($params->get('title_color') != '') ? ('color:' . $params->get('title_color') . ';') : '') . (($params->get('title_background_color') != '') ? ('background-color:' . $params->get('title_background_color') . ';') : '') . '">' . $row->first_name.' '.$row->last_name.'</div>



<table id="contMiddle" border="0" cellspacing="0" cellpadding="0"><tr>';
    
    
      if (strpos($row->image_url,'http://') === false  and strpos($row->image_url,'https://') === false)
      {
        $imgurl[0] = plugins_url('Front_images/noimage.jpg',__FILE__);
        
  echo '<td style="padding:10px;"><img style="max-width:' . $params->get('small_picture_width') . 'px;max-height:' . $params->get('small_picture_height') . 'px" src="' . $imgurl[0] . '" />

</td>';
      }
    else
	{
			$image_with_atach_id=explode('******',$imgurl[0]);
	if(isset($image_with_atach_id[1]) && $image_with_atach_id[1])
	{
		$array_with_sizes=wp_get_attachment_image_src( $image_with_atach_id[1], 'thumbnail' );
	$attach_url=$array_with_sizes[0];
	}
	else{
	$attach_url=$image_with_atach_id[0];
	}
	$img=$image_with_atach_id[0];
        echo '<td style="padding:10px;"><a href="' .$img . '" target="_blank"><img style="max-width:' . $params->get('small_picture_width') . 'px;max-height:' . $params->get('small_picture_height') . 'px" src="' .$attach_url . '" /></a></td>';
          
	  
  
   
    
echo '</td><td></td></tr>';


  }
 echo '</div></td></tr>

		<tr><td >';



	echo '<table cellspacing="0" cellpadding="5"   ' .(($params->get( 'background_color' )!='')?('bordercolor="'.$params->get( 'background_color' ).'"'):' ').' id="paramstable" border="1"   width="100%" style="border-style:solid; width:' . $params->get('parameters_select_box_width') . 'px; ">';

    
    
    if ($row->category_id > 0)
        echo '<tr style="' . (($params->get('params_background_color2') != '') ? ('background-color:' . $params->get('params_background_color2') . ';') : '') . ' vertical-align:middle;"><td><b>' . __('Category:','sp_contact') . '</b></td><td style="' . (($params->get('params_color') != '') ? ('color:' . $params->get('params_color') . ';') : '') . '"><span id="cat_' . $row->id . '">' . $categories[$row->category_id] . '</span></td></tr>';
    
    else
        echo '<span id="cat_' . $row->id . '"></span>';
		
    if ($row->email != '' )
        echo '<tr style="' . (($params->get('params_background_color1') != '') ? ('background-color:' . $params->get('params_background_color1') . ';') : '') . ' vertical-align:middle;"><td><b>' . __('Email','sp_contact') . '</b></td><td style="' . (($params->get('params_color') != '') ? ('color:' . $params->get('params_color') . ';') : '') . '"><span id="email_' . $row->id . '"><a href="mailto:' .$row->email. '">' .$row->email. '</a></span></td></tr>';
    
    else
        echo '<span id="email_' . $row->id . '"></span>';
       
   
    
    
    
    
    $par_data = explode("par_", $row->param);
    
    
    
    for ($j = 0; $j < count($par_data); $j++)
        if ($par_data[$j] != '')
          {
            $par1_data = explode("@@:@@", $par_data[$j]);
            
            
            
            $par_values = explode("	", $par1_data[1]);
            
            
            
            $countOfPar = 0;
            
            for ($k = 0; $k < count($par_values); $k++)
                if ($par_values[$k] != "")
                    $countOfPar++;
            
            $bgcolor = (($j % 2) ? (($params->get('params_background_color2') != '') ? ('background-color:' . $params->get('params_background_color2') . ';') : '') : (($params->get('params_background_color1') != '') ? ('background-color:' . $params->get('params_background_color1') . ';') : ''));
            
           
            if ($countOfPar != 0)
              {
                echo '<tr style="' . $bgcolor . 'text-align:left"><td><b>' . $par1_data[0] . ':</b></td>';
                

                    echo '<td style="' . (($params->get('text_size_small') != '') ? ('font-size:' . $params->get('text_size_small') . 'px;') : '') . $bgcolor . (($params->get('params_color') != '') ? ('color:' . $params->get('params_color') . ';') : '') . 'width:' . $params->get('parameters_select_box_width') . 'px;"><ul class="spidercontactparamslist">';
                    
                  for ($k = 0; $k < count($par_values); $k++)
                        if ($par_values[$k] != "")
						{
							if (preg_match('/(http:\/\/[^\s]+)/', $par_values[$k], $text))
							{
							$hypertext = "<a target=\"_blank\" href=\"". $text[0] . "\">" . $text[0] . "</a>";
							$newString = preg_replace('/(http:\/\/[^\s]+)/', $hypertext, $par_values[$k]);
							echo '<li>' . $newString . '</li>';
							}
							else if (preg_match('/(https:\/\/[^\s]+)/', $par_values[$k], $text))
							{ 
								$hypertext = "<a target=\"_blank\" href=\"". $text[0] . "\">" . $text[0] . "</a>";
							$newString = preg_replace('/(https:\/\/[^\s]+)/', $hypertext, $par_values[$k]);
							echo '<li>' . $newString . '</li>';
								}
							
						 else if ($par_values[$k])
                            echo '<li>' . $par_values[$k] . '</li>';
						}
                    
                    echo '</ul></td></tr>';  
              }
            
          }
    

		  
		   $description = explode('<!--more-->', $row->description);
    
    echo '</table>';
    
    

  
    
     
    echo '<div id="contDescription">' . $description[0] . '</div></td></tr>

</table>

</div>




<div id="contMore"><a href="' . $link . '" style="' . (($params->get('hyperlink_color') != '') ? ('color:' . $params->get('hyperlink_color') . ';') : '') . '">' . __('More','sp_contact') . '</a></div></td>';
    
    
    
  }

?>

</tr>
</table>
  
            <div id="spidercontactnavigation" style="text-align:center;">

    <?php



$pos = strpos($_SERVER['QUERY_STRING'], "page_num") - 1;



if ($pos > 0)
    $url = substr($_SERVER['QUERY_STRING'], 0, $pos);

else
    $url = $_SERVER['QUERY_STRING'];





$pos = strpos($_SERVER['QUERY_STRING'], "cat_id") - 1;



if ($pos > 0)
    $url = substr($url, 0, $pos);





if ($cat_id != 0)
    $url .= "&cat_id=" . $cat_id;







if ($cont_count > $cont_in_page and $cont_in_page > 0)
  {
    $r = ceil($cont_count / $cont_in_page);
    
    
    
    
    
    $navstyle = 'cursor: pointer;'.(($params->get('text_size_small') != '') ? ('font-size:' . $params->get('text_size_small') . 'px;') : '') . (($params->get('text_color') != '') ? ('color:' . $params->get('text_color') . ';') : '');
    
    if(strpos(get_permalink(),'?'))
    
    $link = get_permalink().'&page_num= ';
	else
	 $link = get_permalink().'?page_num= ';
    
    if ($page_num > 5)
      {
		  if(strpos(get_permalink(),'?'))
    
    $link = get_permalink().'&page_num=1';
	else
	 $link = get_permalink().'?page_num=1';
        
        echo "

&nbsp;&nbsp;<a onclick=\"submit_cotctt('{$link}')\" style=\"$navstyle\">first</a>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;...&nbsp";
        
      }
	   if ($page_num > 1)
      {
		    if(strpos(get_permalink(),'?'))
    
				$link = get_permalink().'&page_num='. ($page_num - 1);
				else
				 $link = get_permalink().'?page_num='. ($page_num - 1);
        
        echo "&nbsp;&nbsp;<a onclick=\"submit_cotctt('{$link}')\" style=\"$navstyle\">prev</a>&nbsp;&nbsp;";
        
      }
    
    
    
    for ($i = $page_num - 4; $i < ($page_num + 5); $i++)
      {
        if ($i <= $r and $i >= 1)
          {
			  if(strpos(get_permalink(),'?'))
    
				$link = get_permalink().'&page_num='. $i;
				else
				 $link = get_permalink().'?page_num='. $i;
            
            if ($i == $page_num)
                echo "<span style='font-size:".(((int)$params->get("cube_text_size_small")+2)."px")."; font-weight:bold;color:#000000'>&nbsp;$i&nbsp;</span>";
            
            else
                echo "<a onclick=\"submit_cotctt('{$link}')\" style=\"$navstyle\">&nbsp;$i&nbsp;</a>";
            
          }
        
      }
    
    
    
    
    
    if ($page_num < $r)
      {
		  if(strpos(get_permalink(),'?'))
    
				$link = get_permalink().'&page_num='. ($page_num + 1);
				else
				 $link = get_permalink().'?page_num='.($page_num + 1);
        
        echo "&nbsp;&nbsp;<a onclick=\"submit_cotctt('{$link}')\" style=\"$navstyle\">next</a>&nbsp;&nbsp;";
        
      }
    
    if (($r - $page_num) > 4)
      {
		   if(strpos(get_permalink(),'?'))
    
				$link = get_permalink().'&page_num='. $r;
				else
				 $link = get_permalink().'?page_num='.$r;
        
        echo "&nbsp;...&nbsp;&nbsp;&nbsp;<a href= onclick=\"submit_cotctt('{$link}')\" style=\"$navstyle\">last</a>";
        
      }
    
  }

?></div>
  
  
    
<script type="text/javascript">
var SpiderCatOFOnLoad = window.onload;
window.onload = SpiderCatAddToOnload;
</script>
 

  
  <?php

	$content=ob_get_contents();
                ob_end_clean();
                return $content;


}



?>