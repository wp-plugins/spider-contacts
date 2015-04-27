	<?php	
if(function_exists('current_user_can'))
	if(!current_user_can('manage_options')) {
	die('Access Denied');
}	
if(!function_exists('current_user_can')){
	die('Access Denied');
}		








 //////////////////////////////////////////////////////                                             /////////////////////////////////////////////////////// 
 //////////////////////////////////////////////////////         functions for categories            ///////////////////////////////////////////////////////
 //////////////////////////////////////////////////////                                             ///////////////////////////////////////////////////////
 //////////////////////////////////////////////////////                                             ///////////////////////////////////////////////////////






/////////////////// show categories





function show_spider_contact_massage() 
  {
	
	
	global $wpdb;
 if(isset($_POST['search_events_by_title']))
  $_POST['search_events_by_title']=esc_sql(esc_html(stripslashes($_POST['search_events_by_title'])));
 if(isset($_POST['asc_or_desc']))
  $_POST['asc_or_desc']=esc_sql(esc_html(stripslashes($_POST['asc_or_desc'])));
 if(isset($_POST['order_by']))
  $_POST['order_by']=esc_sql(esc_html(stripslashes($_POST['order_by'])));
	$sort["default_style"]="manage-column column-autor sortable desc";
	$sort["custom_style"]='manage-column column-autor sortable desc';
	$sort["1_or_2"]=1;
	$where='';
	$order='';
	$search_tag='';
	$sort["sortid_by"]='name';
	$catigor_for_select='';
	if(isset($_POST['page_number']))
	{
			
			if($_POST['asc_or_desc'])
			{
				$sort["sortid_by"]=esc_sql(esc_html(stripslashes($_POST['order_by'])));
				if($_POST['asc_or_desc']==1)
				{
					$sort["custom_style"]="manage-column column-title sorted asc";
					$sort["1_or_2"]="2";
					$order="ORDER BY ".$sort["sortid_by"]." ASC";
				}
				else
				{
					$sort["custom_style"]="manage-column column-title sorted desc";
					$sort["1_or_2"]="1";
					$order="ORDER BY ".$sort["sortid_by"]." DESC";
				}
			}
			
	if($_POST['page_number'])
		{
			$limit=(esc_sql(esc_html(stripslashes($_POST['page_number'])))-1)*20; 
		}
		else
		{
			$limit=0;
		}
	}
	else
		{
			$limit=0;
		}
			$where='';
		if(isset( $_POST['startdate']) && isset( $_POST['startdate']))	{
			if($_POST['startdate'] && $_POST['enddate'])
			$where.=' WHERE `date` between "'.esc_sql(esc_html(stripslashes($_POST['startdate']))).' 00:00:00" and "'.esc_sql(esc_html(stripslashes($_POST['enddate']))).' 23:59:59"';
			else
			{
				if($_POST['startdate'])
				$where.=' WHERE `date` BETWEEN "'.esc_sql(esc_html(stripslashes($_POST['startdate']))).'" AND CURRENT_TIMESTAMP';
				if($_POST['enddate'])
				$where.=' WHERE `date` BETWEEN "0001-05-04" AND "'.esc_sql(esc_html(stripslashes($_POST['enddate']))).'"';
			}
		}
		$cont_search=false;
		if(isset($_POST['cont_search']))
		$cont_search=esc_sql(esc_html(stripslashes($_POST['cont_search'])));
		$cat_search=false;
		if(isset($_POST['cat_search']))
		$cat_search=esc_sql(esc_html(stripslashes($_POST['cat_search'])));
		 $go=true;
	if ($cont_search && $cat_search )
	  {
		  if($where)
		 $where .= '  AND to_contact=' . $cont_search.' AND  `category`.`id`=' .$cat_search.'';
		 else
		 $where .= '  WHERE to_contact=' . $cont_search.' AND  `category`.`id`=' .$cat_search.'';
		  $go= false;
	  }	
	if ($go)
	{
	    if ($cont_search)
		  {
			   if($where)
			$where .= '  AND to_contact=' .$cont_search.'';
			else
			$where .= '  WHERE to_contact=' . $cont_search.'';
		  }
		if ($cat_search)
		  {
			   if($where)
			$where .= ' AND `category`.`id`=' .$cat_search.'';
			else
			$where .= ' WHERE `category`.`id`=' .$cat_search.'';
			$catigor_for_select=" WHERE `category_id`=".$cat_search;
		  }
	  
	}
	if(isset($_POST['search'])){
		if($_POST['search']){
		  if($where)
		  $where .= ' AND LOWER(title) LIKE  "%'.esc_sql(esc_html(stripslashes($_POST['search']))).'%" OR LOWER(text) LIKE  "%'.esc_sql(esc_html(stripslashes($_POST['search']))).'%"';
		  else
		  $where .= ' WHERE LOWER(title) LIKE  "%'.esc_sql(esc_html(stripslashes($_POST['search']))).'%" OR LOWER(text) LIKE  "%'.esc_sql(esc_html(stripslashes($_POST['search']))).'%"';		
		}
	}
	
	
	// get the total number of records
	$query = "SELECT message.*, contact.first_name, contact.last_name, contact.id AS c_id, category.id AS cat_id, contact.ordering, category.published, category.ordering , category.description ,  contact.published,  category.name  FROM  (`".$wpdb->prefix."spidercontacts_contacts` AS contact  RIGHT JOIN   `".$wpdb->prefix."spidercontacts_messages` AS message  ON contact.id= message.to_contact) LEFT JOIN   `".$wpdb->prefix."spidercontacts_contacts_categories` AS category  ON category.id=contact.category_id  ".$where;
	$rows = $wpdb->get_results($query);
	$total = count($rows);
	$pageNav['total'] =$total;
	$pageNav['limit'] =	 $limit/20+1;
	if(!$order){
		$order=' ORDER BY `date` DESC ';
	}
	$query = "SELECT message.*, contact.first_name, contact.last_name, contact.id AS c_id, category.id AS cat_id, contact.ordering, category.published, category.ordering , category.description ,  contact.published,  category.name  FROM  (`".$wpdb->prefix."spidercontacts_contacts` AS contact  RIGHT JOIN   `".$wpdb->prefix."spidercontacts_messages` AS message  ON contact.id= message.to_contact) LEFT JOIN   `".$wpdb->prefix."spidercontacts_contacts_categories` AS category  ON category.id=contact.category_id  ".$where." ". $order." "." LIMIT ".$limit.",20";
	$rows = $wpdb->get_results($query);
	if(isset($_POST['cat_search']))
	if($_POST['cat_search'])
	$cat_serch='';
	$cat_rows=$wpdb->get_results("SELECT `id`,`name` FROM ".$wpdb->prefix."spidercontacts_contacts_categories");
	$cont_rows=$wpdb->get_results("SELECT `id`,`first_name`,`last_name` FROM ".$wpdb->prefix."spidercontacts_contacts".$catigor_for_select);
	html_show_spider_contact_massage($rows, $pageNav, $sort,$cat_rows,$cont_rows);	
	
}

function spider_contact_massages_edit($id){
	global $wpdb;
   	$query=$wpdb->prepare('SELECT * FROM '.$wpdb->prefix.'spidercontacts_messages WHERE id=%d',$id);
    $row = $wpdb->get_results($query);
	if(!$row){
		 ?>
         <div id="message" class="error"><p>insert valid `id`</p></div>
         <?php
	 return '';
	 }
	  $row1 =$row[0];
	 $cont_id = $row1->to_contact;
	  
	$query=$wpdb->prepare('SELECT id, first_name, last_name, category_id FROM '.$wpdb->prefix.'spidercontacts_contacts WHERE id=%d',$cont_id);

    $cont_row = $wpdb->get_results($query);
	  
	  if($cont_row != NULL) {
	    $row2 =$cont_row[0];
	    $cat_id = $row2->category_id;
		$name = ''.$row2->first_name.' '.$row2->last_name.'';
	  }
	 else {
	   $cat_id = '';
	   $name = '';
	 }
	 
	$query=$wpdb->prepare('SELECT id, name FROM '.$wpdb->prefix.'spidercontacts_contacts_categories WHERE id=%d',$cat_id);
    $cat_row = $wpdb->get_results($query);
	//$row3 =$cat_row[0]; 
	    $category = ($cat_row != NULL) ? $cat_row[0]->name : '';
	  	$sender             = $row1->sender;
		$sender_phone =  $row1->phone;
		$sender_mail = $row1->email;
		$sender_cont_pref = $row1->cont_pref;
	 	$title              = $row1->title;
        $text             = $row1->text;
        $date = $row1->date;
		
		$wpdb->update($wpdb->prefix.'spidercontacts_messages',
		array('readen'=>1),
		array('id'=>$_GET['id']),
		array('%d')
			
			
			);
	
		
		html_viewMessage($sender , $title,  $text ,$date , $name,  $category, $sender_phone, $sender_mail, $sender_cont_pref);
	
	}
	
	
	function spider_contact_removeMessages($id)
  {
	  
	  global $wpdb;
	  if($id){
		  $query=$wpdb->prepare("DELETE FROM ".$wpdb->prefix."spidercontacts_messages WHERE id=%d",$id);
		 $sucsess_query= $wpdb->query($query);
		  if( $sucsess_query){
			  ?> <div class="updated"><p><strong>Item Deleted.</strong></p></div> <?php 
			  return true;
		  }
		  else
		  {
			  ?><div id="message" class="error"><p>Item Not Deleted.</p></div><?php
			  return false;
		  }
	  }
	  if(isset($_POST['post']))
	  {
	  foreach($_POST['post'] as $iddd){
		if(!is_numeric($iddd))
		{
			?>
             <div id="message" class="error"><p>One or more `id` isnt numerical</p></div>
            <?php 
			return false;
		}
	  }
		  if(count($_POST['post'])){
		    $cids  = implode(',', esc_sql(esc_html(stripslashes($_POST['post']))));
			$query = "DELETE FROM ".$wpdb->prefix."spidercontacts_messages WHERE id IN ( ".$cids.")";
			$sucsess_query= $wpdb->query($query);
			  if( $sucsess_query){
				  ?> <div class="updated"><p><strong>Items Deleted.</strong></p></div> <?php 
				  return true;
			  }
			  else
			  {
				  ?><div id="message" class="error"><p>Items Not Deleted.</p></div><?php
				  return false;
			  }
			
			
		  }
		  else
		  {
			   ?><div id="message" class="error"><p>Items Not Selected</p></div><?php
				  return false;
		  }
	  }
  }
function spider_cont_mark_as_readen(){
	
	 global $wpdb;
	 if(isset($_POST['post'])){
	 $cid  = $_POST['post'];
	 }
	 else
	 {
		   ?><div id="message" class="error"><p>Items Not Selected</p></div><?php
				  return false; 
		 
	 }
    if (count($cid))
      {
        $cids  = implode(',', $cid);
       	$query_mark_readen_messages = "UPDATE  `".$wpdb->prefix."spidercontacts_messages` SET  `readen` =  '1' WHERE `id` IN ( ".$cids." )";
       
	 
	    $sucsess_query=$wpdb->query($query_mark_readen_messages);
		
		 	 if( $sucsess_query){
				  ?> <div class="updated"><p><strong>Items updated as readen.</strong></p></div> <?php 
				  return true;
			  }
			  else
			  {
				  ?><div id="message" class="error"><p>Items not updated as readen.</p></div><?php
				  return false;
			  }
		
      }
	
	
	
	
	}
	
	
	function spider_cont_mark_as_unreaden(){
	
	 global $wpdb;
	 if(isset($_POST['post'])){
	 $cid  = $_POST['post'];
	 }
	 else
	 {
		   ?><div id="message" class="error"><p>Items Not Selected</p></div><?php
				  return false; 
		 
	 }
    if (count($cid))
      {
        $cids  = implode(',', $cid);
       	$query_mark_readen_messages = "UPDATE  `".$wpdb->prefix."spidercontacts_messages` SET  `readen` =  '0' WHERE `id` IN ( ".$cids." )";
        $sucsess_query=$wpdb->query($query_mark_readen_messages);
		
		 	 if( $sucsess_query){
				  ?> <div class="updated"><p><strong>Items updated as readen.</strong></p></div> <?php 
				  return true;
			  }
			  else
			  {
				  ?><div id="message" class="error"><p>Items not updated as readen.</p></div><?php
				  return false;
			  }
		
      }
	
	
	
	
	}
?>