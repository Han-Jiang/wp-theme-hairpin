<?php get_header(); ?>	   


<Div class="content"><!-- 大中间部分 -->

<?php
//分类文章数
function wt_get_category_count($input = '') {
    global $wpdb;

    if($input == '') {
        $category = get_the_category();
        return $category[0]->category_count;
    }
    elseif(is_numeric($input)) {
        $SQL = "SELECT $wpdb->term_taxonomy.count FROM $wpdb->terms, $wpdb->term_taxonomy WHERE $wpdb->terms.term_id=$wpdb->term_taxonomy.term_id AND $wpdb->term_taxonomy.term_id=$input";
        return $wpdb->get_var($SQL);
    }
    else {
        $SQL = "SELECT $wpdb->term_taxonomy.count FROM $wpdb->terms, $wpdb->term_taxonomy WHERE $wpdb->terms.term_id=$wpdb->term_taxonomy.term_id AND $wpdb->terms.slug='$input'";
        return $wpdb->get_var($SQL);
    }
}
?>

<style type="text/css">

.content{
width:100%;
float:left;
}
/** 左边文章列表栏 **/
	
#postlist-loop-left {
	float:left;
	width:502px;
	}
	
#postlist-loop-right {
	float:right;
	width:502px;
	}
	
#slider-show{
	margin-top:5px;
	margin-bottom:5px;
	width:502px;
	border:2px solid #ccc;
	height: 360px;
	float:left;
	background:rgb(255,255,255);
}
/*********文章列表整体规划**********/	
.postlist-box{
	margin-top:5px;
	margin-bottom:5px;
	border:2px solid #ccc;/*灰色边框*/
	height: 360px;
	float:left;
	background:rgb(255,255,255);
}
/*********文章列表上面导航提示部分**********/
.postlist-navi{
	width:100%;
	height:27px;
	background:rgb(230,7,0);
	float:left;
	overflow:hidden;/*for ie*/
	}
	
.postlist-navi ul{
	margin-top:5px;
	}
	
.postlist-navi ul li a{
	color: #f2f2f2;
	text-decoration:none;/*去除超链接下的线*/
	font-weight:bold;
	}
	
.postlist-navi ul li a:hover{
	color: rgb(253,241,0);
	}
/*********文章列表上面导航提示部分**********/	
/*********文章列表中间部分**********/	
.postlist-10 {
	float:right;
	width:90%;	
	margin-left:5%;
	margin-right:5%;
	}
	
.post-title-date {
	width:100%;
	font-size: 13px;
	list-style: none;
	height:28px;
	border-bottom:1px dashed  #ccc;
	}
.post-title-date li{
	float: left;
	line-height:28px;
	}
.post-date {
	float:right;
	font-size:10px;
	color: #737373;
	line-height:28px;
	}
/*********文章列表中间部分**********/	

/*********文章列表下面部分**********/	
.category-detail{
	width:90%;
	margin-left:5%;
	margin-right:5%;

	float:left;
	height:25px;
	}
	
.category-post-count {
	float:left;
	
	font-size: 12px;
	line-height:20px;
	width:380px;
	color: #737373;
	}

.read-more{
	float:right;
	border:2px solid #ccc;
}

/*********文章列表下面部分**********/	
</style>
	
	
	<div id="postlist-loop-left">
		<div id="slider-show">
		
		<?php include (TEMPLATEPATH . '/includes/slider.php'); ?>
		
		</div>
		<?php $display_categories = explode(',', get_option('wd_catl') ); 
		/*************foreach列表循环开始*************/
		foreach ($display_categories as $category) { ?>
			<?php
				query_posts( array(
					'showposts' => 10,
					'cat' => $category,
					'offset' =>0,
					'post__not_in' => $do_not_duplicate
					)
				);
			?>
			<div class="postlist-box">
				
				<div class="postlist-navi">
					<ul>
					<li>
						<a href="<?php echo get_category_link($category);?>" rel="bookmark" title="<?php single_cat_title();?>"><?php single_cat_title();?></a>
					</li>
					<ul>
				</div>
				
				<div class="postlist-10">
					
					<?php while (have_posts()) : the_post(); ?>
					
					<div class="post-title-date">
						<span class="post-date"><?php the_time('m/d')?></span>
						<li>
							<a href="<?php the_permalink() ?>" rel="bookmark" 
							title="<?php echo cut_str($post->post_title,38); ?>">
							<?php echo cut_str($post->post_title,38); ?></a>
						</li>
					</div>
					<!-- end: cat_post -->
					<?php endwhile; ?>
				</div><!-- end: postlist-10 -->
			
				<div class="category-detail">
					<span class="category-post-count">分类: <?php the_category(', ') ?>共有<?php echo wt_get_category_count(); ?>篇文章</span>
										
					<span class="read-more"><a href="<?php echo get_category_link($category);?>" rel="bookmark" title="更多<?php single_cat_title(); ?>的文章">更  多</a></span>
					
				</div><!-- end: category-detail-->
			
			</div><!-- end: postlist-box-->
		<?php } /*************foreach列表循环开始*************/ ?>	
	</div><!-- end: postlist-loop-left -->
	
	
	<div id="postlist-loop-right">
		<?php $display_categories = explode(',', get_option('wd_catr') ); 
		/*************foreach列表循环开始*************/
		foreach ($display_categories as $category) { ?>
			<?php
				query_posts( array(
					'showposts' => 10,
					'cat' => $category,
					'offset' =>0,
					'post__not_in' => $do_not_duplicate
					)
				);
			?>
			<div class="postlist-box">
				
				<div class="postlist-navi">
					<ul>
					<li>
						<a href="<?php echo get_category_link($category);?>" rel="bookmark" title="<?php single_cat_title();?>"><?php single_cat_title();?></a>
					</li>
					<ul>
				</div>
				<div class="postlist-10">
					
					<?php while (have_posts()) : the_post(); ?>
					
					<div class="post-title-date">
						<span class="post-date"><?php the_time('m/d')?></span>
						<li>
							<a href="<?php the_permalink() ?>" rel="bookmark" 
							title="<?php echo cut_str($post->post_title,38); ?>">
							<?php echo cut_str($post->post_title,38); ?></a>
						</li>
					</div>
					<!-- end: cat_post -->
					<?php endwhile; ?>
				</div><!-- end: postlist-10 -->
			
				<div class="category-detail">
					<span class="category-post-count">分类: <?php the_category(', ') ?>共有<?php echo wt_get_category_count(); ?>篇文章</span>
										
					<span class="read-more"><a href="<?php echo get_category_link($category);?>" rel="bookmark" title="更多<?php single_cat_title(); ?>的文章">更  多</a></span>
					
				</div><!-- end: ption-->
			
			</div><!-- end: postlist-box-->
		<?php } /*************foreach列表循环开始*************/ ?>	
	</div><!-- end: postlist-loop-right -->



	 
</DIV><!-- 大中间部分End -->
<?php get_footer();s?>