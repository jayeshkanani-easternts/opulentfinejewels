<?php
  // #We need current stylesheet to be loaded into editor for enhanced editing.
  
if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') )
{
   //$browser = 'IE';
	$tiny_loader = "tiny_mce.js" ;//use standard .js file
} else {
	//$browser = 'Others browsers';
	$tiny_loader = "tiny_mce.js" ;//use standard .js file
}
?>
<script type="text/javascript" src="<?php echo HTTP_SERVER.WS_ROOT;?>tiny_mce/<?php echo $tiny_loader;?>"></script>
<script type="text/javascript"
   src="<?php echo HTTP_SERVER.WS_ROOT;?>tiny_mce/plugins/tinybrowser/tb_tinymce.js.php"></script> 
<script type="text/javascript">
	var convert_urls = true;
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		editor_selector : "mce",
		skin : "o2k7",
		skin_variant : "silver",
		relative_urls : false,
		remove_script_host : false,
		plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,Archiv",
		Archiv_settings_file : "config.php",
		// Theme options
		theme_advanced_buttons1 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,undo,redo,|,link,unlink,anchor,image,|,insertdate,inserttime,|,charmap,emotions,iespell,advhr,media,|,visualchars,nonbreaking,pagebreak,|,styleprops,cleanup,code,print,fullscreen,preview",
		theme_advanced_buttons2 : "insertlayer,moveforward,movebackward,absolute,|,tablecontrols,|,hr,removeformat,visualaid,|,outdent,indent,blockquote,ltr,rtl,|,cite,abbr,acronym,del,ins,attribs",
		theme_advanced_buttons3 : 
"styleselect,formatselect,fontselect,fontsizeselect,bold,italic,underline,strikethrough,forecolor,backcolor,sub,sup,|,justifyleft,justifycenter,justifyright,justifyfull,bullist,numlist",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "sitestyle.css",
		file_browser_callback : "tinyBrowser",
		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>