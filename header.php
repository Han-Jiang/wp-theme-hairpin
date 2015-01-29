<!-- ****************** ****************** -->
<?php 
//文件说明
//header.php  包含 头图和导航栏
date_default_timezone_set('prc');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes() ?>
	>
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>" >
	<meta charset= "<?php bloginfo('charset'); ?>">
	<!-- 这个不写的话上传到sae上显示不了中文-->
	<?php if(is_home()):?>
  		<title><?php bloginfo('name'); ?></title>

 	<?php elseif(is_single()):?>
  		<title><?php the_title() ?></title>
  		<meta name="description" conetnt="<?php the_title();?>">

  	<?php elseif (is_category()): ?>
	<title><?php single_cat_title(); echo "&nbsp;|&nbsp;"; bloginfo('name');?></title>

	<?php elseif (is_page()):?>
	<title><?php  echo wp_title('',0);echo "&nbsp;|&nbsp;"; bloginfo('name');?></title>
	
  	<?php endif ?>
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="VEN | ventunity.com">
	
	<link rel="icon" href="<?php bloginfo('template_directory');?>
	/images/favicon.ico">
  <!-- Bootstrap core CSS -->
  <link href="<?php bloginfo('template_directory');?>/css/bootstrap.css" rel="stylesheet">

	
  <?php 
  /*
  
  <!--Load the style.css file-->
  <link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">

  */
  ?>
  <style type="text/css">
    <?php 
//       include(TEMPLATEPATH."/css/bootstrap.css");
      include(TEMPLATEPATH."/style.css");
    ?>
  </style>

	<?php wp_head(); ?>

</head>

<body>

	<?php if (ven_is_mobile()){

	}else{

		?>
	<div class="container">
		<row>
	    <div class="jumbotron" style="margin:0 0 2px 0;padding:0px;">
				<div class="topic">
					<img src="<?php bloginfo('template_directory'); ?>/images/toppic.jpg" alt="国际学院党建网（中文）">
				</div>
			</div>
		</row>
	</div>
	<?php }?>

	
	<div class="container">

	<div class="navbar navbar-default" >
      <div class="container">
        <div class="navbar-header">
          <a href="<?php echo home_url();?>" class="navbar-brand">首页</a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main" aria-expanded="true">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main" aria-expanded="true">
          <?php wp_nav_menu( array( 'container' =>
					false, 'menu_class' => 'nav navbar-nav','theme_location' =>'header-menu' ) ); ?>

          	<form method="get" class="nav navbar-nav navbar-form navbar-right" role="form" 
            action="<?php bloginfo('url');?>">
						<div class="input-group">
							<input type="text" placeholder="输入搜索内容" class="form-control" name="key" id="key" >
							<span class="input-group-btn">
								<button type="submit" class="btn btn-primary" id="go" alt="Search">搜索</button>
							</span>
						</div>
						<!-- /input-group -->
					</form>
        </div>
      </div>
    </div>
  
  </div>
