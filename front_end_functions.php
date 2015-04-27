<?php 

class wp_cont_param{
    private $my_papams;
	 function __construct(){
		 global $wpdb;
		$aaskofen =$wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'spidercontacts_params',ARRAY_A );
		foreach($aaskofen as $aaskofe)
      $this->my_papams[$aaskofe['name']]=$aaskofe['value'];
	  
   }

    function get($key) {	
	
        return $this->my_papams[$key];
    }
}





function catal_secure_for_scripts($key)
   {
       $_POST[$key] = htmlspecialchars(stripslashes($_POST[$key]));
       $_POST[$key] = str_ireplace("script", "blocked", $_POST[$key]);
       $_POST[$key] = mysql_escape_string($_POST[$key]);
       return $_POST[$key];
   }







function front_end_single_contact($id)
{
	



	global $wpdb;
	
	$params = new stdClass;
	$paramsarrray = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'spidercontacts_params');
foreach($paramsarrray as $par){
	$xxxx=$par->name;
	$params->$xxxx=$par->value;
}
//	$rev_page=JRequest::getVar('rev_page', 1);

	
	$contact_id = $id;	

	@session_start();


	$query =$wpdb->prepare("SELECT ".$wpdb->prefix."spidercontacts_contacts.*, ".$wpdb->prefix."spidercontacts_contacts_categories.name as cat_name FROM ".$wpdb->prefix."spidercontacts_contacts left join ".$wpdb->prefix."spidercontacts_contacts_categories on  ".$wpdb->prefix."spidercontacts_contacts.category_id=".$wpdb->prefix."spidercontacts_contacts_categories.id where

	".$wpdb->prefix."spidercontacts_contacts.id=%d and ".$wpdb->prefix."spidercontacts_contacts.published = '1' ",$contact_id);

	$rows = $wpdb->get_results($query);
	if($rows==NULL){
		echo "<h1>database error</h1>";
		return '';
	}
		foreach($rows as $row)

		{

			$category_id=$row->category_id;

		}



		$query=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."spidercontacts_contacts_categories WHERE id = %d ",$category_id);

		

		



		$row1 = $wpdb->get_row($query,ARRAY_A );		

		$category_name=$row1['name'];
		if(isset($_POST['mes_title'])){
				$message_title= catal_secure_for_scripts('mes_title');
		}
		else
		{
			$message_title= '';
		}
		if(isset($_POST['email'])){
				$email1= catal_secure_for_scripts('email');
		}
		else
		{
			$email1= '';
		}
		if ($email1 =='No Email')

		$email = '';

		else $email = $email1;

		//echo $rows[0]->want_email;


		if(isset($_POST['phone'])){
			$phone1= catal_secure_for_scripts('phone');
		}
		else
		{
			$phone1= '';
		}

		if ($phone1 == 'No Phone')

		$phone =  '';

		else $phone = $phone1;



		if(isset($_POST['full_name'])){
			$full_name1= catal_secure_for_scripts('full_name');
		}
		else
		{
			$full_name1= '';
		}

		if ($full_name1 == "No Name")

		$full_name = ' ';

		else $full_name = $full_name1;



		if(isset($_POST['is_message'])){
			$is_message= catal_secure_for_scripts('is_message');
		}
		else
		{
			$is_message=false;
		}
		
		if(isset($_POST['cont_pref'])){
			$cont_pref= catal_secure_for_scripts('cont_pref');
		}
		else
		{
			$cont_pref='';
		}



		if ($cont_pref == '1')

		$cont_pref_db = 'Phone';

		else if ($cont_pref == '0')

		$cont_pref_db = 'Email';

		else if ($cont_pref == '1')

		$cont_pref_db = 'Either';

		else $cont_pref_db= ' ';

		$message_text='';
		if(isset($_POST['message_text'])){
			$message_text=catal_secure_for_scripts('message_text');
		}
		$message_text='';
		if(isset($_POST['message_text'])){
			$message_text=catal_secure_for_scripts('message_text');
		}



													
		if(isset($_POST['code']))
			$code=esc_sql(esc_html(stripslashes($_POST['code'])));
		else
			$code='';
		
	$code_come_in_sesssion='';
	if(isset($_SESSION['captcha_code']))
	{
		$code_come_in_sesssion=$_SESSION['captcha_code'];
	}



				if($code!='' and $full_name!='' and $code==$code_come_in_sesssion )

					{
						
						$save_or_no=$wpdb->insert($wpdb->prefix.'spidercontacts_messages', 
													array( 
														'sender' =>$full_name, 
														'text' => $message_text, 
														'to_contact' => $contact_id, 
														'title' => $message_title, 
														'email' => $email, 
														'phone' => $phone, 
														'cont_pref' => $cont_pref_db, 
														
													), 
													array( 
														'%s', 
														'%s',
														'%s',
														'%s',
														'%s',
														'%s',
														'%s',
													) 
													);

						if (!$save_or_no)

							{

								echo "<script> alert('error to save databese')</script>\n";

								return '';

							}

						else

							{
								
								if ($rows[0]->want_email!=0 && $rows[0]->email!='')

								{

						
									if ($email!='')

									{


											$from = $email;

											$fromname = $full_name;

											$recipient = $rows[0]->email;
											
											$subject = $message_title;

											$replyto = $email;

											$replytoname = $full_name;

											$body   = '<span>A Message from <u style="font-size:150%;" >'.$fromname.'</u>  </span>



<table >
<tr>
<td  class="paramlist_key"><span class="editlinktip">&nbsp;</span></td>
<td class="paramlist_value"><b>Sender Details</b></td>
</tr>


<tr>



<td   style=" background-color:  #BEC8D1; text-align: right; width: 30%; color: #666; font-weight: bold; border-bottom: 1px solid #e9e9e9;  border-right: 1px solid #e9e9e9; padding: 3px;" width="100" align="right" >



Sender Phone:



</td>



<td style=" padding: 3px;">


'.$phone.'



</td>



</tr>


<tr >



<td   style=" background-color:  #BEC8D1; text-align: right;  width: 30%; color: #666; font-weight: bold; border-bottom: 1px solid #e9e9e9;  border-right: 1px solid #e9e9e9; padding: 3px;" width="100" align="right" >



Sender Email:



</td>



<td style=" padding: 3px;" >


'.$email.'



</td>



</tr>


<tr>



<td  style=" background-color:  #BEC8D1; text-align: right;  width: 30%; color: #666; font-weight: bold; border-bottom: 1px solid #e9e9e9;  border-right: 1px solid #e9e9e9; padding: 3px;" width="100" align="right" >



Sender Contact Preference:



</td>



<td style=" padding: 3px;" >



'.$cont_pref_db.'


</td>



</tr>

<tr>
<td  style=" background-color:  #BEC8D1; text-align: right;  width: 30%; color: #666; font-weight: bold; border-bottom: 1px solid #e9e9e9;  border-right: 1px solid #e9e9e9; padding: 3px;" width="40%" class="paramlist_key"><span class="editlinktip">&nbsp;</span></td>
<td style=" padding: 3px;" class="paramlist_value"><b>Message Details</b></td>
</tr>


<tr>



<td  style=" background-color:  #BEC8D1; text-align: right;  width: 30%; color: #666; font-weight: bold; border-bottom: 1px solid #e9e9e9;  border-right: 1px solid #e9e9e9; padding: 3px;" width="100" align="right" >



To Contact:



</td>



<td style=" padding: 3px;" >


'.$recipient.'



</td>



</tr>

<tr>



<td   style=" background-color:  #BEC8D1; text-align: right; width: 30%; color: #666; font-weight: bold; border-bottom: 1px solid #e9e9e9;  border-right: 1px solid #e9e9e9; padding: 3px;" width="100" align="right" >



Category:



</td>



<td style=" padding: 3px;" >


'.$category_name.'



</td>



</tr>

<tr>



<td   style=" background-color:  #BEC8D1; text-align: right; width: 30%; color: #666; font-weight: bold; border-bottom: 1px solid #e9e9e9;  border-right: 1px solid #e9e9e9; padding: 3px;" width="100" align="right"  >



Title:



</td>



<td style=" padding: 3px;" >


'.$subject.'



</td>



</tr>

<tr>



<td   valign="top" style=" background-color:  #BEC8D1; text-align: right;  width: 30%; color: #666; font-weight: bold; border-bottom: 1px solid #e9e9e9;  border-right: 1px solid #e9e9e9; padding: 3px;" width="100" align="right"  >



Message:



</td>



<td style=" padding: 3px;" >


'.$message_text.'



</td>



</tr>

</table>
';

											add_filter('wp_mail_content_type',create_function('', 'return "text/html";'));

											$headers='From: '.$fromname.' <'.$from.'>' . "\r\n";

										$send_sucsess= wp_mail($recipient,  $subject,$body, $headers, $attachments );

												if ($send_sucsess)
												 {

													$_SESSION['error_or_no']='0';
													$_SESSION['msg_befor_submit']=__('Message Sent Successfully');
													
													wp_redirect($_SERVER["REQUEST_URI"]);
													exit;
													

												}

												 else {
													 $_SESSION['error_or_no']='1';
													 $_SESSION['msg_befor_submit']=__('Message sent but not emailed');
													
													wp_redirect($_SERVER["REQUEST_URI"]);
													exit;
											

												}

										

										

										}

									else{ 
										$_SESSION['error_or_no']='0';
									 $_SESSION['msg_befor_submit']=__('Message Sent');
													
													wp_redirect($_SERVER["REQUEST_URI"]);
													exit;
									}

									

									}

									
									$_SESSION['error_or_no']='0';
									 $_SESSION['msg_befor_submit']=__('Message Sent');
													
													wp_redirect($_SERVER["REQUEST_URI"]);
													exit;

							}

					}









	

				

	return	html_front_end_single_contact($rows,$params,$category_name);



	
	
	
	
	
	
}












//////////////////////////////         list category








	
function front_end_cotegory_contact_list($id, $type, $order_by){
	global $wpdb;

$idddd=$id;
$params = new wp_cont_param;
$cont_in_page=$params->get( 'count_of_rows_in_the_table' );
$search ='';

$pieces = explode(",", $id);
	
	for($i=0; $i<=count($pieces) - 1; $i++){
	$piece[]=$pieces[$i]; 
	}
	$param_categories=$piece[0];
	
	
	
	$param_categories=substr($param_categories,0,-1);
	
	
$cat=explode(',',$param_categories);
$cats=array();

for($i=0;$i<count($cat);$i++)
{
$cats[]="'".$cat[$i]."'";
}

if(isset($_GET['page_num']))
		$page_num=$_GET['page_num'];
		else
		$page_num=1;
		
if(isset($_POST['name_search'])){
   $search = esc_sql(esc_html(stripslashes($_POST['name_search'])));
}

if(isset($_POST['cat_id'])) {
  if($_POST['cat_id']!=0) {
    $cat_id=esc_sql(esc_html(stripslashes($_POST['cat_id'])));
  }
  else {		
    $cat_id=0;
  }
}
else {
  $cat_id=0;
}


$pos = strpos($id, ',');

if ($pos === false) {
   if($id>0){



$query_count = $wpdb->prepare( "SELECT count(".$wpdb->prefix."spidercontacts_contacts.id) as cont_count FROM ".$wpdb->prefix."spidercontacts_contacts left join ".$wpdb->prefix."spidercontacts_contacts_categories on ".$wpdb->prefix."spidercontacts_contacts.category_id=".$wpdb->prefix."spidercontacts_contacts_categories.id WHERE

".$wpdb->prefix."spidercontacts_contacts.published = '1'  and ".$wpdb->prefix."spidercontacts_contacts.category_id=%d ",$id);



$query = $wpdb->prepare("SELECT ".$wpdb->prefix."spidercontacts_contacts.*, ".$wpdb->prefix."spidercontacts_contacts_categories.name as cat_name FROM ".$wpdb->prefix."spidercontacts_contacts left join ".$wpdb->prefix."spidercontacts_contacts_categories on ".$wpdb->prefix."spidercontacts_contacts.category_id=".$wpdb->prefix."spidercontacts_contacts_categories.id WHERE

".$wpdb->prefix."spidercontacts_contacts.published = '1'  and ".$wpdb->prefix."spidercontacts_contacts.category_id=%d ",$id);

}
else

{

$query_count = "SELECT count(".$wpdb->prefix."spidercontacts_contacts.id) as cont_count FROM ".$wpdb->prefix."spidercontacts_contacts  WHERE

".$wpdb->prefix."spidercontacts_contacts.published = '1' ";



$query= "SELECT ".$wpdb->prefix."spidercontacts_contacts.*, ".$wpdb->prefix."spidercontacts_contacts_categories.name as cat_name  FROM ".$wpdb->prefix."spidercontacts_contacts left join ".$wpdb->prefix."spidercontacts_contacts_categories on ".$wpdb->prefix."spidercontacts_contacts.category_id=".$wpdb->prefix."spidercontacts_contacts_categories.id WHERE

".$wpdb->prefix."spidercontacts_contacts.published = '1' ";
if($cat_id!=0){
$query_count .= " and ".$wpdb->prefix."spidercontacts_contacts.category_id=%d ";
$query_count=$wpdb->prepare($query_count,$cat_id);
$query .= " and ".$wpdb->prefix."spidercontacts_contacts.category_id=%d ";
$query=$wpdb->prepare($query,$cat_id);

}


}
} else {
    if(!in_array(0,$cat)){

$query_count = $wpdb->prepare( "SELECT count(".$wpdb->prefix."spidercontacts_contacts.id) as cont_count FROM ".$wpdb->prefix."spidercontacts_contacts left join ".$wpdb->prefix."spidercontacts_contacts_categories on ".$wpdb->prefix."spidercontacts_contacts.category_id=".$wpdb->prefix."spidercontacts_contacts_categories.id WHERE

".$wpdb->prefix."spidercontacts_contacts.published = '1'  and ".$wpdb->prefix."spidercontacts_contacts.category_id IN (".str_replace("\\",'',$param_categories).") ",$id);



$query = $wpdb->prepare("SELECT ".$wpdb->prefix."spidercontacts_contacts.*, ".$wpdb->prefix."spidercontacts_contacts_categories.name as cat_name FROM ".$wpdb->prefix."spidercontacts_contacts left join ".$wpdb->prefix."spidercontacts_contacts_categories on ".$wpdb->prefix."spidercontacts_contacts.category_id=".$wpdb->prefix."spidercontacts_contacts_categories.id WHERE

".$wpdb->prefix."spidercontacts_contacts.published = '1'  and ".$wpdb->prefix."spidercontacts_contacts.category_id IN (".str_replace("\\",'',$param_categories).") ",$id);

}
else

{

$query_count = "SELECT count(".$wpdb->prefix."spidercontacts_contacts.id) as cont_count FROM ".$wpdb->prefix."spidercontacts_contacts  WHERE

".$wpdb->prefix."spidercontacts_contacts.published = '1' ";



$query= "SELECT ".$wpdb->prefix."spidercontacts_contacts.*, ".$wpdb->prefix."spidercontacts_contacts_categories.name as cat_name  FROM ".$wpdb->prefix."spidercontacts_contacts left join ".$wpdb->prefix."spidercontacts_contacts_categories on ".$wpdb->prefix."spidercontacts_contacts.category_id=".$wpdb->prefix."spidercontacts_contacts_categories.id WHERE

".$wpdb->prefix."spidercontacts_contacts.published = '1' ";
if($cat_id!=0){
$query_count .= " and ".$wpdb->prefix."spidercontacts_contacts.category_id=%d ";
$query_count=$wpdb->prepare($query_count,$cat_id);
$query .= " and ".$wpdb->prefix."spidercontacts_contacts.category_id=%d ";
$query=$wpdb->prepare($query,$cat_id);

}


}
}
		


if ($search)
{
	
	
	$query.= " AND concat(first_name,' ', last_name) LIKE %s";
	$query=$wpdb->prepare($query,"%".$search."%");
	$query_count.= " AND concat(first_name,' ', last_name) LIKE %s";
	$query_count=$wpdb->prepare($query_count,"%".$search."%");
}
if($order_by==0){
$query .= " ORDER BY `id`";
}
elseif($order_by==1){
$query .= " ORDER BY `ordering`";
}
elseif($order_by==2){
$query .= " ORDER BY `first_name`";
}
elseif($order_by==3){
$query .= " ORDER BY `last_name`";
}


$row = $wpdb->get_row($query_count,ARRAY_A);



$cont_count=$row['cont_count'];

$rows = $wpdb->get_results($query);






foreach($rows as $row)

{



	$id=$row->id;



	

		$query= "SELECT * FROM ".$wpdb->prefix."spidercontacts_contacts_categories WHERE id = '".$row->category_id."' ";	$row2 = $wpdb->get_row($query,ARRAY_A);	



	$query= "SELECT * FROM ".$wpdb->prefix."spidercontacts_contacts_categories WHERE id = '".$row->category_id."' ";





	$row2 = $wpdb->get_row($query,ARRAY_A);

	$categories[$row2['id']]=$row2['name'];			

	
}


	$query= "SELECT * FROM ".$wpdb->prefix."spidercontacts_contacts_categories WHERE `published`=1 ";		$category_list = $wpdb->get_results($query);

	return html_front_end_cotegory_contact_list($rows, $params,$page_num,$cont_count,@$categories,$cont_in_page,$category_list,$idddd);




}
	
	
	
	
	
	
	
	
	///////////////////////////////////////
	
	
	
	
	
	
	
	
	
function	fornt_end_contact_short($id,$type,$order_by){
	global $wpdb;
	$idddd=$id;
	
$params = new wp_cont_param;
$pieces = explode(",", $id);
	
	for($i=0; $i<=count($pieces) - 1; $i++){
	$piece[]=$pieces[$i]; 
	}
	$param_categories=$piece[0];
	
	
	
	$param_categories=substr($param_categories,0,-1);
	
	
$cat=explode(',',$param_categories);
$cats=array();

for($i=0;$i<count($cat);$i++)
{
$cats[]="'".$cat[$i]."'";
}


$param_categories=implode(',',$cats);

//echo $params_base->get("name");



$cont_in_page=$params->get('cube_count_of_contact_in_the_row' )*$params->get( 'cube_count_of_rows_in_the_page' );
$search ='';


if(isset($_GET['page_num']))
		$page_num=$_GET['page_num'];
		else
		$page_num=1;
		
if(isset($_POST['name_search'])){
   $search = esc_sql(esc_html(stripslashes($_POST['name_search'])));
}

if(isset($_POST['cat_id'])) {
  if($_POST['cat_id']!=0) {
    $cat_id=esc_sql(esc_html(stripslashes($_POST['cat_id'])));
  }
  else {		
    $cat_id=0;
  }
}
else {
  $cat_id=0;
}

$pos = strpos($id, ',');

if ($pos === false) {
   
if($id>0){



$query_count = $wpdb->prepare("SELECT count(".$wpdb->prefix."spidercontacts_contacts.id) as cont_count FROM ".$wpdb->prefix."spidercontacts_contacts left join ".$wpdb->prefix."spidercontacts_contacts_categories on ".$wpdb->prefix."spidercontacts_contacts.category_id=".$wpdb->prefix."spidercontacts_contacts_categories.id WHERE

".$wpdb->prefix."spidercontacts_contacts.published = '1'  and ".$wpdb->prefix."spidercontacts_contacts.category_id=%d ",$id);



$query = $wpdb->prepare("SELECT ".$wpdb->prefix."spidercontacts_contacts.*, ".$wpdb->prefix."spidercontacts_contacts_categories.name as cat_name FROM ".$wpdb->prefix."spidercontacts_contacts left join ".$wpdb->prefix."spidercontacts_contacts_categories on ".$wpdb->prefix."spidercontacts_contacts.category_id=".$wpdb->prefix."spidercontacts_contacts_categories.id WHERE

".$wpdb->prefix."spidercontacts_contacts.published = '1'  and ".$wpdb->prefix."spidercontacts_contacts.category_id=%d ",$id);

}
else

{

$query_count = "SELECT count(".$wpdb->prefix."spidercontacts_contacts.id) as cont_count FROM ".$wpdb->prefix."spidercontacts_contacts  WHERE

".$wpdb->prefix."spidercontacts_contacts.published = '1' ";



$query= "SELECT ".$wpdb->prefix."spidercontacts_contacts.*, ".$wpdb->prefix."spidercontacts_contacts_categories.name as cat_name  FROM ".$wpdb->prefix."spidercontacts_contacts left join ".$wpdb->prefix."spidercontacts_contacts_categories on ".$wpdb->prefix."spidercontacts_contacts.category_id=".$wpdb->prefix."spidercontacts_contacts_categories.id WHERE

".$wpdb->prefix."spidercontacts_contacts.published = '1' ";
if($cat_id!=0){
	$query_count .= " and ".$wpdb->prefix."spidercontacts_contacts.category_id=%d ";
	$query_count=$wpdb->prepare($query_count,$cat_id);
	$query .= " and ".$wpdb->prefix."spidercontacts_contacts.category_id=%d";
	$query=$wpdb->prepare($query,$cat_id);
	}

}
} else {
    if(!in_array(0,$cat)){

$query_count = $wpdb->prepare("SELECT count(".$wpdb->prefix."spidercontacts_contacts.id) as cont_count FROM ".$wpdb->prefix."spidercontacts_contacts left join ".$wpdb->prefix."spidercontacts_contacts_categories on ".$wpdb->prefix."spidercontacts_contacts.category_id=".$wpdb->prefix."spidercontacts_contacts_categories.id WHERE

".$wpdb->prefix."spidercontacts_contacts.published = '1'  and ".$wpdb->prefix."spidercontacts_contacts.category_id IN (".str_replace("\\",'',$param_categories).") ",$id);


$query = $wpdb->prepare("SELECT ".$wpdb->prefix."spidercontacts_contacts.*, ".$wpdb->prefix."spidercontacts_contacts_categories.name as cat_name FROM ".$wpdb->prefix."spidercontacts_contacts left join ".$wpdb->prefix."spidercontacts_contacts_categories on ".$wpdb->prefix."spidercontacts_contacts.category_id=".$wpdb->prefix."spidercontacts_contacts_categories.id WHERE

".$wpdb->prefix."spidercontacts_contacts.published = '1'  and ".$wpdb->prefix."spidercontacts_contacts.category_id IN (".str_replace("\\",'',$param_categories).") ",$id);

}
else

{

$query_count = "SELECT count(".$wpdb->prefix."spidercontacts_contacts.id) as cont_count FROM ".$wpdb->prefix."spidercontacts_contacts  WHERE

".$wpdb->prefix."spidercontacts_contacts.published = '1' ";



$query= "SELECT ".$wpdb->prefix."spidercontacts_contacts.*, ".$wpdb->prefix."spidercontacts_contacts_categories.name as cat_name  FROM ".$wpdb->prefix."spidercontacts_contacts left join ".$wpdb->prefix."spidercontacts_contacts_categories on ".$wpdb->prefix."spidercontacts_contacts.category_id=".$wpdb->prefix."spidercontacts_contacts_categories.id WHERE

".$wpdb->prefix."spidercontacts_contacts.published = '1' ";
if($cat_id!=0){
	$query_count .= " and ".$wpdb->prefix."spidercontacts_contacts.category_id=%d ";
	$query_count=$wpdb->prepare($query_count,$cat_id);
	$query .= " and ".$wpdb->prefix."spidercontacts_contacts.category_id=%d";
	$query=$wpdb->prepare($query,$cat_id);
	}

}
}
		
	


if ($search)
{
	$query.= " AND concat(first_name,' ', last_name) LIKE %s limit %d,%d";
	$query= $wpdb->prepare($query,'%'.$search.'%',(($page_num-1)*$cont_in_page),(int)$cont_in_page);
	$query_count.= " AND concat(first_name,' ', last_name) LIKE %s limit %d,%d";
	$query_count=$wpdb->prepare($query_count,'%'.$search.'%',(($page_num-1)*$cont_in_page),(int)$cont_in_page);
	}
else{
if($order_by==0){
$query .= " ORDER BY `id`";
}
elseif($order_by==1){
$query .= " ORDER BY `ordering`";
}
elseif($order_by==2){
$query .= " ORDER BY `first_name`";
}
elseif($order_by==3){
$query .= " ORDER BY `last_name`";
}
$query .= " limit %d,%d";
$query=$wpdb->prepare($query,(($page_num-1)*$cont_in_page),(int)$cont_in_page);

}


$row = $wpdb->get_row($query_count,ARRAY_A);



$cont_count=$row['cont_count'];








$rows = $wpdb->get_results($query);



foreach($rows as $row)

{



	$id=$row->id;



	

		$query= $wpdb->prepare("SELECT * FROM ".$wpdb->prefix."spidercontacts_contacts_categories WHERE id = %d ",$row->category_id);
		$row2 = $wpdb->get_row($query,ARRAY_A);	



	$query= $wpdb->prepare("SELECT * FROM ".$wpdb->prefix."spidercontacts_contacts_categories WHERE id = %d ",$row->category_id);

	$row2 = $wpdb->get_row($query,ARRAY_A);

	$categories[$row2['id']]=$row2['name'];			

	
}


	$query= "SELECT * FROM ".$wpdb->prefix."spidercontacts_contacts_categories WHERE `published`=1 ";
		
		$category_list = $wpdb->get_results($query);

return	html_fornt_end_contact_short($rows, $params,$page_num,$cont_count,@$categories,$cont_in_page,$category_list,$idddd);





	}
	
	
	
	
function fornt_end_contact_cells($id,$type,$order_by){
	
$idddd=$id;
global $wpdb;

$params = new wp_cont_param;



$cont_in_page=$params->get('count_of_contact_in_the_row' )*$params->get( 'count_of_rows_in_the_page' );

$search ='';

$pieces = explode(",", $id);
	
	for($i=0; $i<=count($pieces) - 1; $i++){
	$piece[]=$pieces[$i]; 
	}
	$param_categories=$piece[0];
	
	
	
	$param_categories=substr($param_categories,0,-1);
	
	
$cat=explode(',',$param_categories);
$cats=array();

for($i=0;$i<count($cat);$i++)
{
$cats[]="'".$cat[$i]."'";
}


if(isset($_GET['page_num']))
		$page_num=$_GET['page_num'];
		else
		$page_num=1;
		
if(isset($_POST['name_search'])){
   $search = esc_sql(esc_html(stripslashes($_POST['name_search'])));
}

if(isset($_POST['cat_id'])) {
  if($_POST['cat_id']!=0) {
    $cat_id=esc_sql(esc_html(stripslashes($_POST['cat_id'])));
  }
  else {		
    $cat_id=0;
  }
}
else {
  $cat_id=0;
}

		
		
		
$pos = strpos($id, ',');

if ($pos === false) {
    if($id>0){



$query_count = $wpdb->prepare("SELECT COUNT(".$wpdb->prefix."spidercontacts_contacts.id) AS cont_count FROM ".$wpdb->prefix."spidercontacts_contacts LEFT JOIN ".$wpdb->prefix."spidercontacts_contacts_categories ON ".$wpdb->prefix."spidercontacts_contacts.category_id=".$wpdb->prefix."spidercontacts_contacts_categories.id WHERE

".$wpdb->prefix."spidercontacts_contacts.published = '1'  AND ".$wpdb->prefix."spidercontacts_contacts.category_id=%d ",$id);



$query = $wpdb->prepare("SELECT ".$wpdb->prefix."spidercontacts_contacts.*, ".$wpdb->prefix."spidercontacts_contacts_categories.name AS cat_name FROM ".$wpdb->prefix."spidercontacts_contacts LEFT JOIN ".$wpdb->prefix."spidercontacts_contacts_categories ON ".$wpdb->prefix."spidercontacts_contacts.category_id=".$wpdb->prefix."spidercontacts_contacts_categories.id WHERE

".$wpdb->prefix."spidercontacts_contacts.published = '1'  AND ".$wpdb->prefix."spidercontacts_contacts.category_id=%d",$id);

}
else

{


$query_count = "SELECT count(".$wpdb->prefix."spidercontacts_contacts.id) AS cont_count FROM ".$wpdb->prefix."spidercontacts_contacts  WHERE

".$wpdb->prefix."spidercontacts_contacts.published = '1' ";



$query= "SELECT ".$wpdb->prefix."spidercontacts_contacts.*, ".$wpdb->prefix."spidercontacts_contacts_categories.name AS cat_name  FROM ".$wpdb->prefix."spidercontacts_contacts LEFT JOIN ".$wpdb->prefix."spidercontacts_contacts_categories ON ".$wpdb->prefix."spidercontacts_contacts.category_id=".$wpdb->prefix."spidercontacts_contacts_categories.id WHERE

".$wpdb->prefix."spidercontacts_contacts.published = '1' ";
if($cat_id!=0)

{
	$query_count .= " AND ".$wpdb->prefix."spidercontacts_contacts.category_id=%d ";
	$query .= " AND ".$wpdb->prefix."spidercontacts_contacts.category_id=%d ";}
	$query_count=$wpdb->prepare($query_count,$cat_id);
	$query=$wpdb->prepare($query,$cat_id);
}
} else {
    if(!in_array(0,$cat)){

$query_count = $wpdb->prepare("SELECT COUNT(".$wpdb->prefix."spidercontacts_contacts.id) AS cont_count FROM ".$wpdb->prefix."spidercontacts_contacts LEFT JOIN ".$wpdb->prefix."spidercontacts_contacts_categories ON ".$wpdb->prefix."spidercontacts_contacts.category_id=".$wpdb->prefix."spidercontacts_contacts_categories.id WHERE

".$wpdb->prefix."spidercontacts_contacts.published = '1'  AND ".$wpdb->prefix."spidercontacts_contacts.category_id IN (".str_replace("\\",'',$param_categories).") ",$id);



$query = $wpdb->prepare("SELECT ".$wpdb->prefix."spidercontacts_contacts.*, ".$wpdb->prefix."spidercontacts_contacts_categories.name AS cat_name FROM ".$wpdb->prefix."spidercontacts_contacts LEFT JOIN ".$wpdb->prefix."spidercontacts_contacts_categories ON ".$wpdb->prefix."spidercontacts_contacts.category_id=".$wpdb->prefix."spidercontacts_contacts_categories.id WHERE

".$wpdb->prefix."spidercontacts_contacts.published = '1'  AND ".$wpdb->prefix."spidercontacts_contacts.category_id IN (".str_replace("\\",'',$param_categories).") ",$id);

}
else

{

$query_count = "SELECT count(".$wpdb->prefix."spidercontacts_contacts.id) AS cont_count FROM ".$wpdb->prefix."spidercontacts_contacts  WHERE

".$wpdb->prefix."spidercontacts_contacts.published = '1' ";



$query= "SELECT ".$wpdb->prefix."spidercontacts_contacts.*, ".$wpdb->prefix."spidercontacts_contacts_categories.name AS cat_name  FROM ".$wpdb->prefix."spidercontacts_contacts LEFT JOIN ".$wpdb->prefix."spidercontacts_contacts_categories ON ".$wpdb->prefix."spidercontacts_contacts.category_id=".$wpdb->prefix."spidercontacts_contacts_categories.id WHERE

".$wpdb->prefix."spidercontacts_contacts.published = '1' ";

if($cat_id!=0) { 
	$query_count .= " AND ".$wpdb->prefix."spidercontacts_contacts.category_id=%d ";
	$query .= " AND ".$wpdb->prefix."spidercontacts_contacts.category_id=%d ";
	$query_count=$wpdb->prepare($query_count,$cat_id);
	$query=$wpdb->prepare($query,$cat_id);
}
	
}
}
		
		



if ($search)
{

	$query.= " AND concat(first_name,' ', last_name) LIKE %s limit %d,%d";
	$query= $wpdb->prepare($query,'%'.$search.'%',(($page_num-1)*$cont_in_page),(int)$cont_in_page);
	$query_count.= " AND concat(first_name,' ', last_name) LIKE %s limit %d,%d";
	$query_count=$wpdb->prepare($query_count,'%'.$search.'%',(($page_num-1)*$cont_in_page),(int)$cont_in_page);
}
else
{	
if($order_by==0){
$query .= " ORDER BY `id`";
}
elseif($order_by==1){
$query .= " ORDER BY `ordering`";
}
elseif($order_by==2){
$query .= " ORDER BY `first_name`";
}
elseif($order_by==3){
$query .= " ORDER BY `last_name`";
}
$query .= " LIMIT %d,%d";
$query=$wpdb->prepare($query,(($page_num-1)*$cont_in_page),$cont_in_page);
}
$row = $wpdb->get_row($query_count,ARRAY_A);



$cont_count=$row['cont_count'];



$rows = $wpdb->get_results($query);





foreach($rows as $row)

{



	$id=$row->id;



	

		$query= $wpdb->prepare("SELECT * FROM ".$wpdb->prefix."spidercontacts_contacts_categories WHERE id = %d",$row->category_id);
	
			$row2 = $wpdb->get_row($query,ARRAY_A);	

	$categories[$row2['id']]=$row2['name'];			

	
}


	$query= "SELECT * FROM ".$wpdb->prefix."spidercontacts_contacts_categories WHERE `published`=1 ";		$category_list = $wpdb->get_results($query);

$query  = "SELECT last_name, first_name, param FROM  `".$wpdb->prefix."spidercontacts_contacts` ";
$row_param = $wpdb->get_results($query);


return html_fornt_end_contact_cells($rows, $params,$page_num,$cont_count,@$categories,$cont_in_page,$category_list,$idddd);






}
	
	?>