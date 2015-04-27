(function() {
    tinymce.create('tinymce.plugins.Spider_contact_mce', {
 
        init : function(ed, url){
			
			ed.addCommand('mceSpider_contact_mce', function() {
				ed.windowManager.open({
					file : location.protocol+'//'+location.host+ajaxurl+"?action=spidercontactswindow",
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
      image: spider_contacts_plugin_url + '/images/Spider_ContactLogoHover.png'
            });
        }
    });
 
    tinymce.PluginManager.add('Spider_contact_mce', tinymce.plugins.Spider_contact_mce);
 
})();