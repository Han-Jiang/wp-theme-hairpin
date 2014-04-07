<?php get_header(); ?>
<style type="text/css">
.browse{
margin-top:12px;
width:800px;
border-bottom:1px dashed  #ccc;

}
.content{
}
</style>

<div class="content">

		<div class="browse">
		现在位置 ＞
		<a title="返回首页" href="<?php echo get_settings('Home'); ?>/">首页</a> ＞
			<?php if (have_posts()) : ?> 
			<?php $post = $posts[0]; ?>
			<?php if (is_category()) { ?><?php single_cat_title(); ?>
			<?php } elseif( is_tag() ) { ?><?php single_tag_title(); ?>
			<?php } elseif (is_day()) { ?><?php the_time('Y年m月'); ?>发表的文章
			<?php } elseif (is_month()) { ?>所有<?php the_time('Y年m月'); ?>文章
			<?php } elseif (is_year()) { ?>Archive for <?php the_time('Y'); ?>
			<?php } elseif (is_author()) { ?><?php wp_title( '');?>发表的所有文章
			<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<h1>Blog Archives</h1>
			<?php } ?>
			<?php endif; ?>
		</div>

	
<style type="text/css">
.clear{clear: both;}

.archive_box{
	margin-top:15px;
	margin-bottom:15px;
	width:800px;
	float:left;
	border:1px solid #ccc;
	background:rgb(255,255,255);
}

.archive_box a{
	text-decoration:none;/*去除超链接下的线*/
}

.archive_title{
	width:100%;
	height:30px;
	margin-bottom:5px;
	background:rgb(230,7,0);
}
.archive_title a{
	margin-top:2px;
	font-size: 24px;
	font-weight: bold;
	float:left;
	color: #f2f2f2;
}
.archive_title a:hover{
	color: rgb(253,241,0);
}

.archive_edit{
	float:right;
}

.archive_category{
	float:left;
	font-size: 18px;
	padding:3px;
	margin-top:5px;
	margin-bottom:5px;
	border-bottom:1px dashed  #ccc;
	border-top:1px dashed  #ccc;
}
.archive_date{
float:left;
	font-size: 18px;
	list-style: none;
	padding:3px;
	margin-top:5px;
	margin-bottom:5px;
	border-bottom:1px dashed  #ccc;
	border-top:1px dashed  #ccc;
}

.archive_summary{
	float:left;
}

.archive_summary p{
	float:left;
}
.archive_posttag{
	float:left;
	margin-top:5px;
	margin-bottom:5px;
}
.archive_read_more{
	float:right;
	margin-top:5px;
	margin-bottom:5px;
}
</style>
	
	<div class="postnav">
		<?php if(function_exists('wp_pagenavi')){ wp_pagenavi(); } else { ?>
		<div class="prev"><?php next_posts_link(__('« Previous Entries')) ?></div>
		<div class="next"><?php previous_posts_link(__('Next Entries »')) ?></div> <?php } ?>
	</div>
  
	<?php while ( have_posts() ) : the_post(); ?>

				<div class="archive_box">
					<div class="archive_title">
						<a href="<?php the_permalink() ?>" rel="bookmark" title="详细阅读 <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
						
						<span class="archive_edit"><?php edit_post_link('&nbsp;&nbsp;', '  ', '  '); ?></span>						
					</div>
					<div class="clear"></div>
						
					<span class="archive_date"><?php the_time('Y年m月d日') ?>&nbsp;&nbsp;&nbsp;&nbsp;</span>
								
					<span class="archive_category">&#8260;&nbsp;<?php the_category(', ') ?></span>
					
					<div class="clear"></div>
					
					<div class="archive-summary">
						<?php if (has_excerpt())
						{ ?> 
							<?php the_excerpt() ?>
						<?php
						}
						else{
							echo "&nbsp;&nbsp;&nbsp;&nbsp;".mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 480,"...");
						} 
						?>
					</div>
					
					<span class="archive_posttag"><?php the_tags('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ', ', ', ''); ?></span>
					
					<span class="archive_read_more"><a href="<?php the_permalink() ?>" title="详细阅读 <?php the_title(); ?>" rel="bookmark" class="title">阅读全文</a></span>
										
				</div>
	<?php endwhile; ?>

	<style type="text/css">
	.postnav{
		clear:both;
	}
	</style>

	<div class="clear"></div>
	<div class="postnav">
		<?php if(function_exists('wp_pagenavi')){ wp_pagenavi(); } else { ?>
		<div class="prev"><?php next_posts_link(__('« Previous Entries')) ?></div>
		<div class="next"><?php previous_posts_link(__('Next Entries »')) ?></div> <?php } ?>
	</div>
	<div class="clear"></div>

<!-- end: content -->
</div>

<?php get_footer(); ?>