<div id="sidebar">
<div><h1>这里是side_bar<h1></div>

	
	<div class="widget">
		<?php wp_reset_query();if ( is_home()){ ?>
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('首页小工具1') ) : ?>
		<?php endif; ?>
		<?php } ?>
	</div>

	<div class="widget">
		<?php wp_reset_query();if (is_single() || is_page() || is_archive() || is_search()) { ?>
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('其它页面小工具1') ) : ?>
		<?php endif; ?>
		<?php } ?>
	</div>

	<div class="widget">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('全部页面小工具') ) : ?>
		<?php endif; ?>
	</div>

	<div class="widget">
		<?php wp_reset_query();if ( is_home() ){ ?>
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('首页小工具2') ) : ?>
		<?php endif; ?>
		<?php } ?>
	</div>

	<div class="widget">
		<?php wp_reset_query();if (is_single() || is_page() || is_archive() || is_search()) { ?>
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('其它页面小工具2') ) : ?>
		<?php endif; ?>
		<?php } ?>
	</div>

</div>