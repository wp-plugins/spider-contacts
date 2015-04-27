	<?php	
if(function_exists('current_user_can'))
	if(!current_user_can('manage_options')) {
	die('Access Denied');
}	
if(!function_exists('current_user_can')){
	die('Access Denied');
}		












function html_show_spider_contact_massage($rows, $pageNav, $sort,$cat_rows,$cont_rows){
	 
	 
	 	
	global $wpdb;

	?>
     <style>
        .calendar .button
		{
		display:table-cell !important;
		}
    </style>
    <script language="javascript">
	function ordering(name,as_or_desc)
	{
		document.getElementById('asc_or_desc').value=as_or_desc;		
		document.getElementById('order_by').value=name;
		document.getElementById('admin_form').action=document.getElementById('admin_form').action+'&task=edit_reviews';
		document.getElementById('admin_form').submit();
	}
	function doNothing() {  
var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
    if( keyCode == 13 ) {


        if(!e) var e = window.event;

        e.cancelBubble = true;
        e.returnValue = false;

        if (e.stopPropagation) {
                e.stopPropagation();
                e.preventDefault();
        }
}
}
function delete_massages(){
	
	document.getElementById('admin_form').action=document.getElementById('admin_form').action+'&task=delete_massage'
	document.getElementById('admin_form').submit();
	
}
	</script>
    <form method="post" action="admin.php?page=Massages_Spider_contact" onkeypress="doNothing()" id="admin_form" name="admin_form" >
	<?php $nonce_sp_con = wp_create_nonce('nonce_sp_con'); ?>
	<table cellspacing="10" width="100%">
                  <tr>   
<td width="100%" style="font-size:14px; font-weight:bold"><a href="http://web-dorado.com/wordpress-contacts-guide-step-4.html" target="_blank" style="color:blue; text-decoration:none;">User Manual</a><br />
This section allows you to view and delete messages of the contacts. <a href="http://web-dorado.com/wordpress-contacts-guide-step-4.html" target="_blank" style="color:blue; text-decoration:none;">More...</a></td>   
<td colspan="7" align="right" style="font-size:16px;">
  <a href="http://web-dorado.com/files/fromSpiderContactsWP.php" target="_blank" style="color:red; text-decoration:none;">
<img src="<?php echo plugins_url("images/header.png",__FILE__) ?>" border="0" alt="http://web-dorado.com/files/fromSpiderContactsWP.php" width="215"><br>
Get the full version&nbsp;&nbsp;&nbsp;&nbsp;
</a>
  </td>
        </tr>
    <tr>
    <td style="width:100%; text-align:left">
    <?php echo "<h2>Messages</h2>"; ?>
    </td>
    <td><input class="button-secondary action" type="button" value="Mark as Read"  onclick="document.getElementById('admin_form').action=document.getElementById('admin_form').action+'&task=mark_readen&_wpnonce=<?php echo $nonce_sp_con; ?>'; document.getElementById('admin_form').submit()" /></td>
        <td><input class="button-secondary action" type="button" value="Mark as Unread"  onclick="document.getElementById('admin_form').action=document.getElementById('admin_form').action+'&task=mark_unread&_wpnonce=<?php echo $nonce_sp_con; ?>'; document.getElementById('admin_form').submit()" /></td>
    </tr>
    </table>
    
   
 Filter:<input type="text" name="search" id="search" value="<?php if(isset($_POST['search'])) echo esc_js(esc_html(stripslashes($_POST['search']))); ?>" class="text_area" onchange="document.adminForm.submit();">
 From: 	<input class="inputbox" type="text" value="<?php if(isset($_POST['startdate'])) echo esc_js(esc_html(stripslashes($_POST['startdate']))); ?>" name="startdate" id="startdate" size="10" maxlength="10" >
		<input type="reset" class="button" value="..." onclick="return showCalendar('startdate','%Y-%m-%d');"> 
 To:    <input class="inputbox" type="text" value="<?php if(isset($_POST['enddate'])) echo esc_js(esc_html(stripslashes($_POST['enddate']))); ?>" name="enddate" id="enddate" size="10" maxlength="10" > 
		<input type="reset" class="button" value="..." onclick="return showCalendar('enddate','%Y-%m-%d');">
        <button class="button-primary" onclick="this.form.submit();">Submit</button>
		<button class="button-primary" onclick="document.getElementById('search').value=''; document.getElementById('enddate').value='';document.getElementById('startdate').value='';this.form.getElementById('filter_state').value='';this.form.submit();">Reset</button>
					<br />
                    <?php 
					$serch=' <select name="cat_search" id="cat_search" class="inputbox" onchange="this.form.submit();">
                    <option value="0">- Select a Category -</option>';
                  foreach($cat_rows as $cat_row) {
				  $serch.='<option value="'.$cat_row->id.'"';
	              if(isset($_POST['cat_search']))
		          if($_POST['cat_search']==$cat_row->id)
		          $serch.='selected="selected"';		
		          $serch.='>'.$cat_row->name.'</option>';                  
					}
                   
                   $serch.= '</select>
                    <select name="cont_search" id="cont_search" class="inputbox" onchange="this.form.submit();">
                    <option  value="0">- Select a Contact -</option>';
                    foreach($cont_rows as $cont_row) {
					$serch.='<option value="'.$cont_row->id.'"';
	                if(isset($_POST['cat_search']))
		            if($_POST['cont_search']==$cont_row->id)
		            $serch.='selected="selected"';		
		            $serch.='>'.$cont_row->first_name.' '.$cont_row->last_name.'</option>';                  
					}
                   
                    $serch.='</select>
                    <button class="button-primary" onclick="document.getElementById(\'cat_search\').value=0; document.getElementById(\'cont_search\').value=0;this.form.submit();">Show All Messages</button>';
   
	 print_html_nav($pageNav['total'],$pageNav['limit'],$serch);	
	
	?>
  <table class="wp-list-table widefat plugins" style="width:95%">
 <thead>
 
 <th scope="col" id="cb" class="manage-column column-cb check-column"><input type="checkbox"></th>
 <th scope="col" id="remote_ip" class="<?php $sort_by_field='title'; if($sort["sortid_by"]==$sort_by_field) echo $sort["custom_style"]; else echo $sort["default_style"]; ?>" style="width:110px" ><a href="javascript:ordering(<?php echo $sort_by_field; ?>,<?php if($sort["sortid_by"]==$sort_by_field) echo $sort["1_or_2"]; else echo "1"; ?>)"><span>Message Title</span><span class="sorting-indicator"></span></a></th>
 <th scope="col" id="remote_ip" class="<?php $sort_by_field='first_name'; if($sort["sortid_by"]==$sort_by_field) echo $sort["custom_style"]; else echo $sort["default_style"]; ?>"  ><a href="javascript:ordering('<?php echo $sort_by_field; ?>',<?php if($sort["sortid_by"]==$sort_by_field) echo $sort["1_or_2"]; else echo "1"; ?>)"><span>Name</span><span class="sorting-indicator"></span></a></th>
 <th scope="col" width="115px" id="remote_ip" class="<?php $sort_by_field='sender'; if($sort["sortid_by"]==$sort_by_field) echo $sort["custom_style"]; else echo $sort["default_style"]; ?>" ><a href="javascript:ordering('<?php echo $sort_by_field; ?>',<?php if($sort["sortid_by"]==$sort_by_field) echo $sort["1_or_2"]; else echo "1"; ?>)"><span>Sender Name</span><span class="sorting-indicator"></span></a></th>
 <th scope="col" width="115px" id="remote_ip" class="<?php $sort_by_field='phone'; if($sort["sortid_by"]==$sort_by_field) echo $sort["custom_style"]; else echo $sort["default_style"]; ?>"  ><a href="javascript:ordering('<?php echo $sort_by_field; ?>',<?php if($sort["sortid_by"]==$sort_by_field) echo $sort["1_or_2"]; else echo "1"; ?>)"><span>Sender Phone</span><span class="sorting-indicator"></span></a></th>
 <th scope="col" id="remote_ip" class="<?php $sort_by_field='email'; if($sort["sortid_by"]==$sort_by_field) echo $sort["custom_style"]; else echo $sort["default_style"]; ?>"  ><a href="javascript:ordering('<?php echo $sort_by_field; ?>',<?php if($sort["sortid_by"]==$sort_by_field) echo $sort["1_or_2"]; else echo "1"; ?>)"><span>Sender Email</span><span class="sorting-indicator"></span></a></th>
 <th scope="col" width="160px" id="remote_ip" class="<?php $sort_by_field='cont_pref'; if($sort["sortid_by"]==$sort_by_field) echo $sort["custom_style"]; else echo $sort["default_style"]; ?>"  ><a href="javascript:ordering('<?php echo $sort_by_field; ?>',<?php if($sort["sortid_by"]==$sort_by_field) echo $sort["1_or_2"]; else echo "1"; ?>)"><span>Contact Preferences<br /> with Sender</span><span class="sorting-indicator"></span></a></th>
 <th scope="col" width="90px" id="remote_ip" class="<?php $sort_by_field='name'; if($sort["sortid_by"]==$sort_by_field) echo $sort["custom_style"]; else echo $sort["default_style"]; ?>"  ><a href="javascript:ordering('<?php echo $sort_by_field; ?>',<?php if($sort["sortid_by"]==$sort_by_field) echo $sort["1_or_2"]; else echo "1"; ?>)" ><span>Category</span><span class="sorting-indicator"></span></a></th>
 <th scope="col" width="83px" id="remote_ip" class="<?php $sort_by_field='date'; if($sort["sortid_by"]==$sort_by_field) echo $sort["custom_style"]; else echo $sort["default_style"]; ?>"  ><a href="javascript:ordering('<?php echo $sort_by_field; ?>',<?php if($sort["sortid_by"]==$sort_by_field) echo $sort["1_or_2"]; else echo "1"; ?>)"><span>Date</span><span class="sorting-indicator"></span></a></th>
 <th scope="col" id="remote_ip" style="width:30px" ><span>Edit</span><span class="sorting-indicator"></span></th>

 <th style="width:80px"><a  href="javascript:delete_massages()">Delete</a></th>
 </tr>
 </thead>
 <tbody id="the-list">
 <?php for($i=0; $i<count($rows);$i++){ ?>
 <tr class="<?php if($rows[$i]->readen) echo 'inactive'; else echo 'active'; ?>">
 		 <th scope="row" class="check-column"><input type="checkbox" name="post[]" value="<?php echo $rows[$i]->id; ?>"></th>
         <td><?php echo $rows[$i]->title; ?></td>
         <td><a  href="admin.php?page=Massages_Spider_contact&task=edit_massage&id=<?php echo $rows[$i]->id; ?>"><?php echo $rows[$i]->first_name.' '. $rows[$i]->last_name; ?></a></td>
         <td><?php echo $rows[$i]->sender; ?></td>
         <td><?php echo $rows[$i]->phone; ?></td>
         <td><?php echo $rows[$i]->email; ?></td>
         <td><?php echo $rows[$i]->cont_pref; ?></td>
         <td><?php echo $rows[$i]->name; ?></td>
         <td><?php echo $rows[$i]->date; ?></td>
         <td><a  href="admin.php?page=Massages_Spider_contact&task=edit_massage&id=<?php echo $rows[$i]->id; ?>">Edit</a></td>         
         <td><a  href="admin.php?page=Massages_Spider_contact&task=delete_massage&id=<?php echo $rows[$i]->id; ?>&_wpnonce=<?php echo $nonce_sp_con; ?>">Delete</a></td>
  </tr> 
 <?php } ?>
 </tbody>
 </table>
 <?php wp_nonce_field('nonce_sp_con', 'nonce_sp_con'); ?>
 <input type="hidden" name="asc_or_desc" id="asc_or_desc" value="<?php if(isset($_POST['asc_or_desc'])) echo esc_js(esc_html(stripslashes($_POST['asc_or_desc'])));?>"  />
 <input type="hidden" name="order_by" id="order_by" value="<?php if(isset($_POST['order_by'])) echo esc_js(esc_html(stripslashes($_POST['order_by'])));?>"  />

 <?php
?>
    
    
   
 </form>
    <?php
	 
	 
	 
	 
	 
 }

























/////////////////////////////////////////////// 








function html_viewMessage($sender , $title,  $text ,$date , $name,  $category, $sender_phone, $sender_mail, $sender_cont_pref){
	
?>
<style>
.adminform{
	border:3px solid;
	border-color:#21759B;
	border-radius:4px;
}
legend{
	color:#06C;
	font-weight:bold;
}
.adminform{
	margin: 10px 10px 10px 10px !important;
}
.key{
	background-color:#CCC;
}
.paramlist_key{
	background-color:#CCC;
}
</style>
<table width="80%">
                  <tr>   
<td width="100%" style="font-size:14px; font-weight:bold"><a href="http://web-dorado.com/wordpress-contacts-guide-step-4.html" target="_blank" style="color:blue; text-decoration:none;">User Manual</a><br />
This section allows you to view and delete messages of the contacts. <a href="http://web-dorado.com/wordpress-contacts-guide-step-4.html" target="_blank" style="color:blue; text-decoration:none;">More...</a></td>   
<td colspan="7" align="right" style="font-size:16px;">
  <a href="http://web-dorado.com/files/fromSpiderContactsWP.php" target="_blank" style="color:red; text-decoration:none;">
<img src="<?php echo plugins_url("images/header.png",__FILE__) ?>" border="0" alt="http://web-dorado.com/files/fromSpiderContactsWP.php" width="215"><br>
Get the full version&nbsp;&nbsp;&nbsp;&nbsp;
</a>
  </td>
        </tr>
<tr>
<td style="text-align:right"><button class="button-secondary action" onclick="window.location.href='admin.php?page=Massages_Spider_contact'">Cancel</button></td>
</tr>
</table>
<br /><br />
<form action="" method="post" name="adminForm">



<legend>A Message from <?php echo $sender ?> </legend>



<table class="admintable">
<tr>
<td width="40%" class="paramlist_key"><span class="editlinktip">&nbsp;</span></td>
<td class="paramlist_value"><b>Sender Details</b></td>
</tr>


<tr>



<td width="100" align="right" class="key">



Sender Phone:



</td>



<td>


<?php echo $sender_phone;?>



</td>



</tr>


<tr>



<td width="100" align="right" class="key">



Sender Email:



</td>



<td>


<?php echo $sender_mail;?>



</td>



</tr>


<tr>



<td width="100" align="right" class="key">



Sender Contact Preference:



</td>



<td>


<?php  echo $sender_cont_pref;?>



</td>



</tr>

<tr>
<td width="40%" class="paramlist_key"><span class="editlinktip">&nbsp;</span></td>
<td class="paramlist_value"><b>Message Details</b></td>
</tr>


<tr>



<td width="100" align="right" class="key">



To Contact:



</td>



<td>


<?php echo $name;?>



</td>



</tr>

<tr>



<td width="100" align="right" class="key">



Category:



</td>



<td>


<?php echo $category;?>



</td>



</tr>

<tr>



<td width="100" align="right" class="key">



Date:



</td>



<td>


<?php echo $date;?>



</td>



</tr>

<tr>



<td width="100" align="right" class="key">



Title:



</td>



<td>


<?php echo $title;?>



</td>



</tr>

<tr>



<td width="100" align="right" class="key">



Message:



</td>



<td>


<?php echo $text;?>



</td>



</tr>

</table>

<?php wp_nonce_field('nonce_sp_con', 'nonce_sp_con'); ?>
<input type="hidden" name="task" value="" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="controller" value="messages" />
</form>


<?php
	  
	}






?>