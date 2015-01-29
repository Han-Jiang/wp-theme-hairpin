<?php get_header(); ?>
	
	<div class="container">
		<div class="row row-offcanvas row-offcanvas-right">
        	<div class="<?php ven_get_content_layout_class();?>"> 
        
			<?php ven_include("part-breadcumb.php");?>
	
		<?php if (have_posts()) : 

		while (have_posts()) : the_post(); ?>
	<div class="text-center">
		<h3>
		<?php the_title(); ?>
		</h3>
		<h5>
			<?php the_author_posts_link('namefl'); ?> | <?php the_time('Y年m月d日') ?> | <?php the_category('<span style="font-size:13px;"> & </span>') ?> | 浏览<?php setPostViews(get_the_ID()); ?> <?php echo getPostViews(get_the_ID());?>
		</h5>
	</div>
	<hr />

    <div id="content">
      <?php the_content('Read more...'); ?>
    </div>
				
		<?php ven_include("part-page-nav.php");?>
		<?php wp_link_pages( array( 'before' => '<p class="pages">' . __( '日志分页:'), 'after' => '</p>' ) ); ?>

		<?php comments_template('', true);?>

		<?php endwhile; endif ?>

	</div><!--/.col-xs-12.col-sm-9-->
			  <?php 
			  if(ven_is_mobile()){
			  	
			  }else {
						get_sidebar();
				} 
				?>
			</div><!-- row row-offcanvas row-offcanvas-right -->
	
</div><!-- container -->

<?php get_footer(); ?>
