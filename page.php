<?php get_header(); ?>
<!-- 正文字体放大缩小-->

<div class="container">
	<div class="row row-offcanvas row-offcanvas-right">
        <div class="<?php ven_get_content_layout_class();?>"> 
    	<?php ven_include("part-breadcumb.php");?>
		
			<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>	
				<?php the_content('More &raquo;'); ?>
				<?php endwhile; ?>		
			<?php endif; ?>

		</div><!-- /col-xs-12 col-sm-9 -->			
			  
			  <?php 
			  if(ven_is_mobile()){
			  	
			  }else {
						get_sidebar();
				} 
				?>
		
		</div><!-- /row row-offcanvas row-offcanvas-right -->
</div><!-- /container -->
<?php get_footer(); ?>
