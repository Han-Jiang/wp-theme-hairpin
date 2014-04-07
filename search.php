<?php get_header(); ?>

<div id="content">

<style type="text/css">
.browse{
float:left;
margin-top:12px;
width:800px;
border-bottom:1px dashed  #ccc;
}

</style>
	
		<div class="browse">现在位置 ＞<a title="返回首页" href="<?php echo get_settings('Home'); ?>/">首页</a> ＞搜索结果</div>
	
 <style type="text/css">
.clear{clear: both;}

.archive_box{
	margin-top:15px;
	margin-bottom:15px;
	width:800px;
	float:left;
	border:1px solid #ccc;
	
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
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		
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
	<?php endwhile; else: ?>
	
	
		
 <style type="text/css">
 .unfind{
 clear:both;
 float:left;
 }
 </style>
	<div class="unfind">
	<h3 class="center">抱歉!无法搜索到与之相匹配的信息。您可以重新搜索或者直接浏览下面的文章
	</h3>
	</div>

	<?php endif; ?>

</div>
<!-- end: content -->

<?php get_footer(); ?>
