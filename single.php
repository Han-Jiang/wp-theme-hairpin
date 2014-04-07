<?php get_header(); ?>

<!-- 正文字体放大缩小-->
<script type="text/javascript">
    function doZoom(size) {
        var zoom = document.all ? document.all['entry'] : document.getElementById('entry');
        zoom.style.fontSize = size + 'px';
    }
</script>

<style type="text/css">		
/*边框之间的距离和背景色*/
</style>


<style type="text/css">
#single_box {
	float:left;
	width: 960px;
	margin-left: 32px;
	margin-right: 32px;
	overflow:hidden;
}

.map{
	float:left;
	height:30px;
}

.browse{
	float: left;
	margin-top: 12px;
	width: 980px;
	border-bottom: 1px dashed #CCC;
}
		
	.singlel-js-change-font-size {
		float:right;
		width:100px;
		}/*定义了字的位置和大小*/
		
	.singlel-js-change-font-size a{
		padding:0 3px 0 3px;
		text-decroation:none;

		}/*定义了字的位置距离上下左右以及边框的信息*/
		
		
.single-pre-next {
	/* 文章下方上下篇导航 */
	float: left;
	font-size: 15px;
	width: 936px;
	height: 50px;
	margin: 10px 0 10px 0;
	padding: 10px;
	line-height: 25px;
	border: 1px solid #CCC;
}/*定义了上下篇链接处的文字模式*/

		
.single_post_box {
	float:left;
	width:960px;
	margin:10px 0 0 0;
	border:1px solid #ccc;
	background:rgb(255,255,255);
}/*输出框对于整体的位置及背景色等信息*/
	

	
.single_post_title_box {
	padding-top: 15px;
	padding-bottom:10px;
	border-bottom:1px dashed  #ccc;
}/*调整题目到上边框的距离*/


.single_post_title {
	font-size: 25px;
	font-weight: bold;
	margin-bottom: 10px;
	color: #444444;
}/*定义标题的大小以及其明显级别（bold为一级）*/

.single_post_info, .single_post_info a, .single_post_info a:visited {
	color: #444444;
}/*改变了索搜到的信息显示出来的颜色*/
	
	
	
/*entry*/
	#entry {
		font-size:18px;
		line-height:185%;
		}/*改变了文本框内部文字的整体变化*/
	.entry {
		width:900px;
		margin-top: 0px;
		margin-right: 30px;
		margin-bottom: 0px;
		margin-left: 30px;
		overflow:hidden;
		}/*文本框的整体外形*/
	.entry p {
		text-indent:2em;
		}/*未知*/
	.entry a:link,.entry a:visited{
		color: #5500FF;
		}/*改变了链接的字体颜色*/
/*entry_sb*/
	.entry_box_b,.entry_sb,.box-bottom,.respond_b,.link_b,.footer_bottom_a {
		border-left:1px solid #ccc;
		border-right:1px solid #ccc;
		border-bottom:1px solid #ccc;
		}/*输出框的边界信息*/

		/*single-pre-next*/
	
</style>

<div id="single_box">

<div id="map">
	<div class="browse">
	现在的位置: <a title="返回首页" href="<?php echo get_settings('Home'); ?>/">首页</a>
	＞<?php the_category(', ') ?>
	＞正文<!-- <?php the_title();?> -->
		<div class="singlel-js-change-font-size">
			<a href="javascript:doZoom(14)">小</a> 
			<a href="javascript:doZoom(16)">中</a> 
			<a href="javascript:doZoom(20)">大</a>
		</div>
	</div>		
</div>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	 			
		<div class="single_post_box">
			
			<center>
				<div class="single_post_title_box">
					<!--题目-->
					<div class="single_post_title">
						<?php the_title(); ?>
					</div>
					<div class="single_post_info">
						<!--作者名字-->
						<span class="single_post_author_name">
							<?php the_author_posts_link('namefl'); ?>
						</span>
						<!--日期-->
						<span class="single_post_date">
							<?php the_time('Y年m月d日') ?>
						</span>

						
						<!--类别-->
						<span class="single_post_category">
							&#8260; <?php the_category(', ') ?>
						</span>		
						<!--文章浏览次数-->
						<span class="single_post_views">
							<?php setPostViews(get_the_ID()); ?>
							<?php echo getPostViews(get_the_ID());?>  浏览
						</span>

					</div>
				</div>
			</center>
			
			
			 <!-- ****************显示文章正文********************* -->
			<div class="entry">
				<div id="entry">
					<?php the_content('Read more...'); ?>
					<?php wp_link_pages( array( 'before' => '<p class="pages">' . __( '日志分页:'), 'after' => '</p>' ) ); ?>
				</div>	
			</div>
			 <!-- ****************显示文章正文********************* -->
			
		</div>
		
		<?php comments_template('', true);?>
	
	<div class="single-pre-next">
		<?php previous_post_link('【上篇】%link') ?><br/><?php next_post_link('【下篇】%link') ?>
	</div>
	
	<?php endwhile; else: ?>
	<?php endif; ?>	
	
	
</div>
<!-- end: single -->

<?php get_footer(); ?>
