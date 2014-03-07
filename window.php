<?php
$path  = ''; // It should be end with a trailing slash  
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
            <td><select name="Spider_contact_Category" id="Spider_contact_Category" >
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
            <td>	<input type="radio" name="cat_show" id="paramsshow_category_details0" value="0" checked="checked">
                    <label style="position:relative; bottom:4px" for="paramsshow_category_details0">Short</label>
                    <input type="radio" name="cat_show" id="paramsshow_category_details1" value="1">
                    <label style="position:relative; bottom:4px" for="paramsshow_category_details1">Table</label>
                    <input type="radio" name="cat_show" id="paramsshow_category_details2" value="2">
                    <label style="position:relative; bottom:4px" for="paramsshow_category_details2">Full</label>
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
				   var tagtext;
				   tagtext='[Spider_contact_categories id="'+document.getElementById('Spider_contact_Category').value+'"  type="'+show+'"]';
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
?>