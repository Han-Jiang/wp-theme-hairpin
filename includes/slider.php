
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.min.js" ></script>

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.cycle.all.min.js"></script>


<style type="text/css">
/** slideshow **/
#slideshow {
	position:relative;
	background:#fff;
	height:338px;
	padding:10px;
	}

.featured_post{
	width:100%;
	height:338px;
	overflow:hidden;
	}
	
.slider_image,.slider_image img {
	float: left;
	width:480px;
	height:338px;
	}
	

#slider_nav  {
	position:absolute;
	z-index:999;
	margin:300px 0 0 340px;
	}
#slider_nav a {
	background:url(<?php bloginfo('template_url'); ?>/images/slider_nav.png);
	float:left;
	line-height:24px;
	padding:0 8px 0 8px;
	color:#ebebeb;
	text-shadow: none;
	}
	
#slider_nav a.activeSlide { color:#f99356;}

#featured_tag {
	background:url(<?php bloginfo('template_url'); ?>/images/featured.png);
	position:absolute;
	width:21px;
	height:79px;
	left:0px;
	top:20px;
	z-index:999;
	}

</style>

<div id="slideshow">

	<div id="featured_tag"></div>
	<div id="slider_nav"></div>
	
	<div id="slider" class="clearfix">
		<?php
			$args = array(
				'posts_per_page' => 5,
				'post__in'  => get_option('sticky_posts'),
				'caller_get_posts' => 10
			);
			query_posts($args);
			?>
		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
		<div class="featured_post" >
			<div class="slider_image">	<!-- Start: slider_image -->		
				<?php if ( get_post_meta($post->ID, 'show', true) ) : ?>
					<?php $image = get_post_meta($post->ID, 'show', true); ?>
				<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><img src="<?php echo $image; ?>"width="400" height="248" alt="<?php the_title(); ?>"/></a>
				<?php else: ?>
					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php if (has_post_thumbnail()) { the_post_thumbnail('show'); }
				else { ?>
					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><img class="home-thumb" src="<?php echo catch_first_image() ?>" width="400px" height="248px" alt="<?php the_title(); ?>"/></a>
				<?php } ?>
				<?php endif; ?>
			</div>	<!-- end: slider_image -->
			
		</div>
	<?php endwhile; ?>
	<?php endif; ?>	
	</div>

	
 </div>