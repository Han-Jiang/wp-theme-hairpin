<!-- ****************** ****************** -->
<?php 
//文件说明
//header.php  包含 头图和导航栏
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes() ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>"/><!-- 这个不写的话上传到sae上显示不了中文-->

<link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">
<?php wp_head(); ?>  
 
<style type="text/css">
body
{
margin:0 auto 0 auto;
width:1024px; 
height:auto;
}

/*for ie, fun same as body*/
#all
{
margin:0 auto 0 auto;
width:1024px; 
height:auto;
background:rgb(239,242,244);
}

#header{
background:rgb(230,7,0);
}

.toppic{

	background-image:url(<?php bloginfo('template_directory'); ?>/images/toppic.jpg);
	width:1024px;
	height:240px;
}

.navi{
margin-top:0px;
padding-top:0px;
overflow:hidden;
}

</style>

</head>

<body>

<div id=all><br><!--start of id = all which located in header.php-->
<div id="header">
	<DIV class="toppic"></DIV>
	<div class="navi"><?php include('includes/navi.php'); ?></div>    
</div>