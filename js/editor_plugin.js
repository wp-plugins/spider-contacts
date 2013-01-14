(function() {
    tinymce.create('tinymce.plugins.Spider_contact_mce', {
 
        init : function(ed, url){
			
			ed.addCommand('mceSpider_contact_mce', function() {
				ed.windowManager.open({
					file : url + '/../window.php',
					width : 450 + ed.getLang('Spider_contact_mce.delta_width', 0),
					height : 220 + ed.getLang('Spider_contact_mce.delta_height', 0),
					inline : 1
				}, {
					plugin_url : url // Plugin absolute URL
				});
			});
            ed.addButton('Spider_contact_mce', {
            title : 'Insert Spider Contact',
			cmd : 'mceSpider_contact_mce',
            });
        }
    });
 
    tinymce.PluginManager.add('Spider_contact_mce', tinymce.plugins.Spider_contact_mce);
 
})();