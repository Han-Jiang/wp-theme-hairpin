<?php get_header(); ?>


<div id="content">
<style type="text/css">
	.browse{
	float:left;
	margin-top:12px;
	width:800px;
	border-bottom:1px dashed  #ccc;
}

.page{
margin-top:20px;
float:left;
width:100%;

}


.page_content{
padding-top:20px;
padding-right:5%;
padding-left:5%;
background:rgb(255,255,255);
}
</style>

<div class="browse">现在位置 ＞<a title="返回首页" href="<?php echo get_settings('Home'); ?>/">首页</a> ＞<?php the_title(); ?></div>

	<?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?>	
	
		<div class="page" id="post-<?php the_ID(); ?>">
			
			<div class="page_content" >
			
				<?php the_content('More &raquo;'); ?>				
			</div>
			
		</div>
		
	<?php endwhile; ?><?php else : ?>
 
	<p >非常抱歉，无与之相匹配的信息。</p>

	<?php endif; ?>
</div>
<!-- end: content -->

<?php get_footer(); ?>