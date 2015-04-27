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





function showCategory_contact() 
  {
	  
	  
	  
	  
	  
  global $wpdb;
   if(isset($_POST['search_events_by_title']))
$_POST['search_events_by_title']=esc_sql(esc_html(stripslashes($_POST['search_events_by_title'])));
if(isset($_POST['asc_or_desc']))
$_POST['asc_or_desc']=esc_sql(esc_html(stripslashes($_POST['asc_or_desc'])));
if(isset($_POST['order_by']))
$_POST['order_by']=esc_sql(esc_html(stripslashes($_POST['order_by'])));
	$sort["default_style"]="manage-column column-autor sortable desc";
	$sort["custom_style"] ="manage-column column-autor sortable desc";
	$sort["1_or_2"]=1;
	$where='';
	$order='';
	$sort["sortid_by"]='id';
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
	if(isset($_POST['search_events_by_title'])){
		$search_tag=esc_sql(esc_html(stripslashes($_POST['search_events_by_title'])));
		}
		
		else
		{
		$search_tag="";
		}
	if ( $search_tag ) {
		$where= ' WHERE name LIKE "%'.$search_tag.'%"';
	}
	if(isset($_POST['saveorder']))
	{
		if($_POST['saveorder']=="save")
		{
			foreach($_POST as $key=>$order1)
			{
				
				
				if(is_numeric(str_replace("order_","",$key))){
					$id_order[str_replace("order_","",$key)]=$order1;
					if(!is_numeric($order1))
					{
						$id_order[str_replace("order_","",$key)]='10000';
					}
				}
			}
			$popoxvac_orderner=array();
			$aranc_popoxutineri_orderner=array();
			$all_products_oreder=$wpdb->get_results("SELECT `id`,`ordering` FROM ".$wpdb->prefix."spidercontacts_contacts_categories");
			foreach($all_products_oreder as $products_oreder)
			{
				if(isset($_POST['order_'.$products_oreder->id]))
				{
					if($_POST['order_'.$products_oreder->id] == $products_oreder->ordering)
					$aranc_popoxutineri_orderner[$products_oreder->id]=$products_oreder->ordering;
					else
					$popoxvac_orderner[$products_oreder->id]=esc_sql(esc_html(stripslashes($_POST['order_'.$products_oreder->id])));
				}
				else
				{
					$aranc_popoxutineri_orderner[$products_oreder->id]=$products_oreder->ordering;
				}
			}
			$count_of_ordered_products=count($all_products_oreder);
			$count_popoxvac=count($popoxvac_orderner);
			$count_anpopox=count($aranc_popoxutineri_orderner);
			if($count_popoxvac)
			{
			for($order_for_ordering=1;$order_for_ordering<=$count_of_ordered_products;$order_for_ordering++){
				$min_popoxvac_value=10000000;
				$min_popoxvac_id=0;
				$min_anpopox_value=10000000;
				$min_anpopox_id=0;
				foreach($popoxvac_orderner as $key=>$popoxvac_order)	{
					if($min_popoxvac_value>$popoxvac_order){
						$min_popoxvac_value=$popoxvac_order;
						$min_popoxvac_id=$key;
					}
				}

				foreach($aranc_popoxutineri_orderner as $key=>$aranc_popoxutineri_order)	{
					if($min_anpopox_value>$aranc_popoxutineri_order){
						$min_anpopox_value=$aranc_popoxutineri_order;
						$min_anpopox_id=$key;
					}
				}
				
				if($min_anpopox_value>$min_popoxvac_value)
				{
					$wpdb->update($wpdb->prefix.'spidercatalog_products', array(
					'ordering'    =>$order_for_ordering,
					  ), 
					  array('id'=>$min_popoxvac_id),
					  array(  '%d' )
					  );
					  $popoxvac_orderner[$min_popoxvac_id]=1000000000000;
					  
				}
				if($min_anpopox_value==$min_popoxvac_value)
				{
					if($min_popoxvac_value<=$order_for_ordering){
					$wpdb->update($wpdb->prefix.'spidercontacts_contacts_categories', array(
					'ordering'    =>$order_for_ordering,
					  ), 
					  array('id'=>$min_popoxvac_id),
					  array(  '%d' )
					  );
					$popoxvac_orderner[$min_popoxvac_id]=1000000000000;
					}
					else
					{
					$wpdb->update($wpdb->prefix.'spidercontacts_contacts_categories', array(
					'ordering'    =>$order_for_ordering,
					  ), 
					  array('id'=>$min_anpopox_id),
					  array(  '%d' )
					  );
					  $aranc_popoxutineri_orderner[$min_anpopox_id]=1000000000000;
					}
					  
					  
				}
	
				if($min_anpopox_value<$min_popoxvac_value)
				{
					$wpdb->update($wpdb->prefix.'spidercontacts_contacts_categories', array(
					'ordering'    =>$order_for_ordering,
					  ), 
					  array('id'=>$min_anpopox_id),
					  array(  '%d' )
					  );
					  $aranc_popoxutineri_orderner[$min_anpopox_id]=1000000000000;
				}

				
			}
			}
			
		}
		
		
	}
	
	
	
	if(isset($_POST["oreder_move"]))
	{
		$ids=explode(",",$_POST["oreder_move"]);
		$this_order=$wpdb->get_var($wpdb->prepare("SELECT ordering FROM ".$wpdb->prefix."spidercontacts_contacts_categories WHERE id=%d",$ids[0]));
		$next_order=$wpdb->get_var($wpdb->prepare("SELECT ordering FROM ".$wpdb->prefix."spidercontacts_contacts_categories WHERE id=%d",$ids[1]));	
		$wpdb->update($wpdb->prefix.'spidercontacts_contacts_categories', array(
		'ordering'    =>$next_order,
          ), 
          array('id'=>$ids[0]),
		array(  '%d' )
			  );
		$wpdb->update($wpdb->prefix.'spidercontacts_contacts_categories', array(
		'ordering'    =>$this_order,
          ), 
          array('id'=>$ids[1]),
		array(  '%d' )
			  );
			  
			  		
	}
	
	
	
	// get the total number of records
	$query = "SELECT COUNT(*) FROM ".$wpdb->prefix."spidercontacts_contacts_categories". $where;
	
	$total = $wpdb->get_var($query);

	$pageNav['total'] =$total;
	$pageNav['limit'] =	 $limit/20+1;
	
	$query = "SELECT * FROM ".$wpdb->prefix."spidercontacts_contacts_categories".$where." ". $order." "." LIMIT ".$limit.",20";
	$rows = $wpdb->get_results($query);	   
		html_showcategories_contact($rows, $pageNav,$sort);
  }









//////////////////////        edit or add categories




function editCategory_contact($id)
  {
	  
	  global $wpdb;
	  $query="SELECT name,ordering FROM ".$wpdb->prefix."spidercontacts_contacts_categories  ORDER BY `ordering`";
	  
	  $ord_elem=$wpdb->get_results($query);
	  $query=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."spidercontacts_contacts_categories WHERE id=%d",$id);
	   $row=$wpdb->get_row($query);
	   if(!$row){
		 ?>
         <div id="message" class="error"><p>insert valid `id`</p></div>
         <?php
	 return '';
	 }
	   /*
	   $images=explode(";;;",$row->category_image_url);
	   $par=explode('	',$row->param);
	   $count_ord=count($images);
	   Html_editCategory_contact($ord_elem, $count_ord,$row);
	   */

	   Html_editCategory_contact($ord_elem,$row);
  }
  
  
  
  
  
  
  
  
function add_category_contact()
{
	global $wpdb;
	$row = new stdClass();
	$row->description = '';
	$row->param = '';
	$query="SELECT name,ordering FROM ".$wpdb->prefix."spidercontacts_contacts_categories ORDER BY `ordering`";
	$ord_elem=$wpdb->get_results($query); ///////ordering elements list
	html_add_category_contact($ord_elem, $row);	
}






function save_cat_contact()
{	
	 global $wpdb;
	 if(!(isset($_POST) && count($_POST)))
	 return '';
	 if(isset($_POST["ordering"])){	 
	 	$rows=$wpdb->get_results($wpdb->prepare('SELECT * FROM '.$wpdb->prefix.'spidercontacts_contacts_categories WHERE ordering>=%d  ORDER BY `ordering` ASC ', $_POST["ordering"]));
	 }
	 else{
		 		echo "<h1>Error</h1>";
		return false;
	 }
	 
	$count_of_rows=count($rows);
	$ordering_values=array();
	$ordering_ids=array();
	for($i=0;$i<$count_of_rows;$i++)
	{		
	
		$ordering_ids[$i]=$rows[$i]->id;
		$ordering_values[$i]=$i+1+$_POST["ordering"];
	}
	for($i=0;$i<$count_of_rows;$i++){
				$wpdb->update($wpdb->prefix.'spidercontacts_contacts_categories', 
			  array('ordering'    =>$ordering_values[$i]), 
              array('id'=>$ordering_ids[$i]),
			  array(  '%d' )
			  );
			
			 
	}
	 
	 
	 
	 $script_cat = preg_replace('#<script(.*?)>(.*?)</script>#is', '', stripslashes($_POST["content"]));
	 $save_or_no= $wpdb->insert($wpdb->prefix.'spidercontacts_contacts_categories', array(
		'id'	=> NULL,
		'name'   				 => esc_sql(esc_html(stripslashes($_POST["name"]))),
        'description'			 => $script_cat,
        'param'  				 => esc_sql(esc_html(stripslashes($_POST["param"]))),
        'ordering' 				 => esc_sql(esc_html(stripslashes($_POST["ordering"]))),
		'published'				 => esc_sql(esc_html(stripslashes($_POST["published"]))),
                ),
				array(
				'%d',
				'%s',
				'%s',
				'%s',
				'%d',	
				'%d',
						
				)
                );
					if($save_or_no === FALSE)
	{
		?>
	<div class="updated"><p><strong><?php _e('Error. Please install plugin again'); ?></strong></p></div>
	<?php
		return false;
	}
	

	
	
	?>
	<div class="updated"><p><strong><?php _e('Item Saved'); ?></strong></p></div>
	<?php
	
    return true;	
}




function change_cat_contact( $id ){
  global $wpdb;
  $published=$wpdb->get_var($wpdb->prepare("SELECT published FROM ".$wpdb->prefix."spidercontacts_contacts_categories WHERE `id`=%d",$id ) );
  if($published)
   $published=0;
  else
   $published=1;
  $savedd=$wpdb->update($wpdb->prefix.'spidercontacts_contacts_categories', array(
			'published'    =>$published,
              ), 
              array('id'=>$id),
			  array(  '%d' )
			  );
	if($savedd === FALSE)
	{
		?>
	<div class="error"><p><strong><?php _e('Error. Please install plugin again'); ?></strong></p></div>
	<?php
		return false;
	}
	?>
	<div class="updated"><p><strong><?php _e('Item Saved'); ?></strong></p></div>
	<?php
	
    return true;
}



function removeCategory_contact($id)
{
	
	
	global $wpdb;
	 $sql_remov_tag=$wpdb->prepare("DELETE FROM ".$wpdb->prefix."spidercontacts_contacts_categories WHERE id=%d",$id);
 if(!$wpdb->query($sql_remov_tag))
 {
	  ?>
	  <div id="message" class="error"><p>Spider Video Player Tag Not Deleted</p></div>
      <?php
	 
 }
 else{
 ?>
 <div class="updated"><p><strong><?php _e('Item Deleted.' ); ?></strong></p></div>
 <?php
 }
	$rows=$wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'spidercontacts_contacts_categories  ORDER BY `ordering` ASC ');
	
	$count_of_rows=count($rows);
	$ordering_values=array();
	$ordering_ids=array();
	for($i=0;$i<$count_of_rows;$i++)
	{		
	
		$ordering_ids[$i]=$rows[$i]->id;
		if(isset($_POST["ordering"]))
		$ordering_values[$i]=$i+1+esc_sql(esc_html(stripslashes($_POST["ordering"])));
		else
		$ordering_values[$i]=$i+1;
	}

		for($i=0;$i<$count_of_rows;$i++)
	{	
			$wpdb->update($wpdb->prefix.'spidercontacts_contacts_categories', 
			  array('ordering'      =>$ordering_values[$i]), 
              array('id'			=>$ordering_ids[$i]),
			  array('%s'),
			  array( '%s' )
			  );
	}
		

  

}






function apply_cat_contact($id)
{
	
	
		 global $wpdb;

		 if(!(isset($_POST) && count($_POST)))
		 return '';
		 $corent_ord=$wpdb->get_var($wpdb->prepare('SELECT `ordering` FROM '.$wpdb->prefix.'spidercontacts_contacts_categories WHERE id=%d',$id ));
		 $max_ord=$wpdb->get_var('SELECT MAX(ordering) FROM '.$wpdb->prefix.'spidercontacts_contacts_categories');
		 if($corent_ord > $_POST["ordering"])
		 {
				$rows=$wpdb->get_results($wpdb->prepare('SELECT * FROM '.$wpdb->prefix.'spidercontacts_contacts_categories WHERE ordering>=%d AND id<>%d  ORDER BY `ordering` ASC ',$_POST["ordering"],$id));
			 
			$count_of_rows=count($rows);
			$ordering_values==array();
			$ordering_ids==array();
			for($i=0;$i<$count_of_rows;$i++)
			{		
			
				$ordering_ids[$i]=$rows[$i]->id;
				$ordering_values[$i]=$i+1+esc_sql(esc_html(stripslashes($_POST["ordering"])));
			}
			for($i=0;$i<$count_of_rows;$i++){
					$wpdb->update($wpdb->prefix.'spidercontacts_contacts_categories', 
					  array('ordering'    =>$ordering_values[$i]), 
					  array('id'=>$ordering_ids[$i]),
					  array(  '%d' )
					  );
		
			}
		 }
		 if($corent_ord<$_POST["ordering"])
		 {
			 $rows=$wpdb->get_results($wpdb->prepare('SELECT * FROM '.$wpdb->prefix.'spidercontacts_contacts_categories WHERE ordering<=%d AND id<>%d  ORDER BY `ordering` ASC ',$_POST["ordering"],$id));
			 
			$count_of_rows=count($rows);
			$ordering_values==array();
			$ordering_ids==array();
			for($i=0;$i<$count_of_rows;$i++)
			{		
			
				$ordering_ids[$i]=$rows[$i]->id;
				$ordering_values[$i]=$i+1;
			}
			if($max_ord == esc_sql(esc_html(stripslashes($_POST["ordering"])))-1)
			{
				$_POST["ordering"]--;
			}
			for($i=0;$i<$count_of_rows;$i++){
					$wpdb->update($wpdb->prefix.'spidercontacts_contacts_categories', 
					  array('ordering'    =>$ordering_values[$i]), 
					  array('id'=>$ordering_ids[$i]),
					  array(  '%d' )
					  );
		
			}
		 }
	
	$script_cat = preg_replace('#<script(.*?)>(.*?)</script>#is', '', stripslashes($_POST["content"]));
	$savedd=$wpdb->update($wpdb->prefix.'spidercontacts_contacts_categories', array(
					'name'   				 => esc_sql(esc_html(stripslashes($_POST["name"]))),
					'description'			 => $script_cat,
					'param'  				 => esc_sql(esc_html(stripslashes($_POST["param"]))),
					'ordering' 				 => esc_sql(esc_html(stripslashes($_POST["ordering"]))),
					'published'				 => esc_sql(esc_html(stripslashes($_POST["published"]))),
              ), 
              array('id'=>$id),
			  array( 
			    '%s',
				'%s',
				'%s',
				'%d',	
				'%d', )
			  );
	if($savedd === FALSE)
	{
		?>
	<div class="error"><p><strong><?php _e('Error. Please install plugin again'); ?></strong></p></div>
	<?php
		return false;
	}
	?>
	<div class="updated"><p><strong><?php _e('Item Saved'); ?></strong></p></div>
	<?php
	
    return true;
	
}








?>