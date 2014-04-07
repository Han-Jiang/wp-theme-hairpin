<!-- ****************** ****************** -->
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/styles/navi.css" />
<!-- ****************** ****************** -->

	<div id='topnav'>
		
		
		 <div class="home"><a href="<?php bloginfo('url' ); ?>" title="首  页" class="home"></a>
		 </div> 
		
		
		<div class="genMenu">
			<!-- ******************以下为php生成部分****************** -->

			<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?> 

			<!-- ******************以上为php生成部分****************** -->
		</div>

		
		<div id="searchbar">
			<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
			<input type="text" value="搜索" onclick="this.value='';" name="s" id="s" />
			<input type="image" src="<?php bloginfo('template_directory'); ?>/styles/navi/go.gif" id="go" alt="Search" title="搜索" />
			</form>
		</div>
		<!-- end: searchbar -->
		
	</div>
	<!-- end: topnav -->

<!-- ****************** ****************** -->