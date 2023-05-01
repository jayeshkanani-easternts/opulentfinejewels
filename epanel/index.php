<?php
	include "includes/app_top.php";
	if(isset($_REQUEST['controller']))
	{
		
		$header_include =  DIR_WS_CONTROLLER_PATH.$_REQUEST['controller'].'/header.php';
		$content_include = DIR_WS_CONTROLLER_PATH.$_REQUEST['controller'].'/'.basename($PHP_SELF);	
		/* Get User Permisstion */
		$_SESSION['userper'] = getPermission($_SESSION['group'],$_REQUEST['action']);
	}
	if(!isset($_REQUEST['controller']))
	{
	loadModules();	
	$header_include =  DIR_WS_CONTROLLER_PATH.'header.php';
	$content_include = DIR_WS_CONTROLLER_PATH.basename($PHP_SELF);	
	}
	include DIR_WS_TEMPLATE."main.tpl.php";		
?>