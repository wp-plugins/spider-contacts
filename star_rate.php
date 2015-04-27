<?php
if ( !defined('WP_LOAD_PATH') ) {

	/** classic root path if wp-content and plugins is below wp-config.php */
	$classic_root = dirname(dirname(dirname(dirname(__FILE__)))) . '/' ;
	
	if (file_exists( $classic_root . 'wp-load.php') )
		define( 'WP_LOAD_PATH', $classic_root);
	else
		if (file_exists( $path . 'wp-load.php') )
			define( 'WP_LOAD_PATH', $path);
		else
			exit("Could not find wp-load.php");
}

// let's load WordPress
require_once( WP_LOAD_PATH . 'wp-load.php');

starrating();
	function starrating()
		{
			global $wpdb;
			if(isset($_POST['product_id']))
			$product_id = esc_js(esc_html(stripslashes($_POST['product_id'])));
			else
			$product_id=0;
			
			if(isset($_POST['vote_value']))
			$vote_value = esc_js(esc_html(stripslashes($_POST['vote_value'])));
			else
			$vote_value=0;
			
			
			
			$save_or_no=$wpdb->insert($wpdb->prefix.'spidercatalog_product_votes', 
				array( 
					'product_id' => $product_id, 
					'vote_value' => $vote_value, 
					'remote_ip' => $_SERVER['REMOTE_ADDR']
				), 
				array( 
					'%d', 
					'%d',
					'%s' 
				) 
			);


			if (!$save_or_no)
				{
					echo "<script> alert('".$row->getError()."');
					window.history.go(-1); </script>\n";
					exit();
				}

	$query= $wpdb->prepare( "SELECT AVG(vote_value) as rating FROM ".$wpdb->prefix."spidercatalog_product_votes  WHERE product_id =%d ",$product_id);
	$row1 = $wpdb->get_var($query);

	$rating=substr($row1,0,3);

			print_starin_catalog($product_id,$rating);

		}
		
		
		
		function 	print_starin_catalog($product_id,$rating){
			
			
			
			
$title=__('Rating','sp_catalog').' '.$rating.'&nbsp;&nbsp;&nbsp;&nbsp;&#013;'.__('You have already rated this product.','sp_catalog');

echo "<ul class='star-rating1'>	
<li class='current-rating' id='current-rating' style=\"width: ".($rating*25)."px\"></li>
	<li><a  title='".$title."'  class='one-star'>1</a></li>
	<li><a   title='".$title."'  class='two-stars'>2</a></li>
	<li><a  title='".$title."'  class='three-stars'>3</a></li>
	<li><a  title='".$title."'  class='four-stars'>4</a></li>
	<li><a  title='".$title."'  class='five-stars'>5</a></li>
	</ul>
	</td></tr>";
}









?>
		