<?php 
$pagename = $_REQUEST['pagename'];
$page_slug = strtolower($pagename);
$page_slug = trim($page_slug);
$page_slug = preg_replace("`[.*]`U","",$page_slug);
$page_slug = preg_replace('`&(amp;)?#?[a-z0-9]+;`i','-',$page_slug);
$page_slug = htmlentities($page_slug, ENT_COMPAT, 'utf-8');
$page_slug = preg_replace( "`&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);`i","\1", $page_slug);
$page_slug = preg_replace( array("`[^a-z0-9]`i","`[-]+`") , "-", $page_slug);

echo '<input type="text" name="seo_slug" id="seo_slug" value="'.$page_slug.'" class="select" readonly />';
?>