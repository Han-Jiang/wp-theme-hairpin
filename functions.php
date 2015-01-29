<?php

include (TEMPLATEPATH."/vengix/vengix.php");
 
// To enable post thumbnails, the current theme must include add_theme_support( 'post-thumbnails' ); in its functions.php file. See also Post Thumbnails.
// has_post_thumbnail( $post_id )
add_theme_support( 'post-thumbnails' ); 
 
// include("includes/theme_options.php");



if (function_exists('register_sidebar'))
{
    register_sidebar(array(
		'name'			=> '首页小工具1',
        'before_widget'	=> '',
        'after_widget'	=> '</div>',
        'before_title'	=> '<h3>',
        'after_title'	=> '</h3><div class="box">',
    	'after_widget' => '</div>
    	<div class="box-bottom">
			<i class="lb"></i>
			<i class="rb"></i>
		</div>',
    ));
}
{
    register_sidebar(array(
		'name'			=> '首页小工具2',
        'before_widget'	=> '',
        'after_widget'	=> '</div>',
        'before_title'	=> '<h3>',
        'after_title'	=> '</h3><div class="box">',
    	'after_widget' => '</div>
    	<div class="box-bottom">
			<i class="lb"></i>
			<i class="rb"></i>
		</div>',
    ));
}
{
    register_sidebar(array(
		'name'			=> '全部页面小工具',
        'before_widget'	=> '',
        'after_widget'	=> '</div>',
        'before_title'	=> '<h3>',
        'after_title'	=> '</h3><div class="box">',
    	'after_widget' => '</div>
    	<div class="box-bottom">
			<i class="lb"></i>
			<i class="rb"></i>
		</div>',
    ));
}
{
    register_sidebar(array(
		'name'			=> '其它页面小工具1',
        'before_widget'	=> '',
        'after_widget'	=> '</div>',
        'before_title'	=> '<h3>',
        'after_title'	=> '</h3><div class="box">',
    	'after_widget' => '</div>
    	<div class="box-bottom">
			<i class="lb"></i>
			<i class="rb"></i>
		</div>',
    ));
}
{
    register_sidebar(array(
		'name'			=> '其它页面小工具2',
        'before_widget'	=> '',
        'after_widget'	=> '</div>',
        'before_title'	=> '<h3>',
        'after_title'	=> '</h3><div class="box">',
    	'after_widget' => '</div>
    	<div class="box-bottom">
			<i class="lb"></i>
			<i class="rb"></i>
		</div>',
    ));
}
{
    register_sidebar(array(
		'name'			=> '相册、视频和公告模版小工具',
        'before_widget'	=> '',
        'after_widget'	=> '</div>',
        'before_title'	=> '<h3>',
        'after_title'	=> '</h3><div class="box">',
    	'after_widget' => '</div>
    	<div class="box-bottom">
			<i class="lb"></i>
			<i class="rb"></i>
		</div>',
    ));
}

// 自定义菜单 外观中会出现菜单选项
   register_nav_menus(
      array(
         'header-menu' => __( '导航自定义菜单' )
      )
   );

 
 /*Catch first image (post-thumbnail fallback) */
 function catch_first_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

  if(empty($first_img)){ //Defines a default image
		$random = mt_rand(1, 10);
		echo get_bloginfo ( 'stylesheet_directory' );
		echo '/images/random/'.$random.'.jpg';
  }
  return $first_img;
 }
 

//标题文字截断
function cut_str($src_str,$cut_length)
{
    $return_str='';
    $i=0;
    $n=0;
    $str_length=strlen($src_str);
    while (($n<$cut_length) && ($i<=$str_length))
    {
        $tmp_str=substr($src_str,$i,1);
        $ascnum=ord($tmp_str);
        if ($ascnum>=224)
        {
            $return_str=$return_str.substr($src_str,$i,3);
            $i=$i+3;
            $n=$n+2;
        }
        elseif ($ascnum>=192)
        {
            $return_str=$return_str.substr($src_str,$i,2);
            $i=$i+2;
            $n=$n+2;
        }
        elseif ($ascnum>=65 && $ascnum<=90)
        {
            $return_str=$return_str.substr($src_str,$i,1);
            $i=$i+1;
            $n=$n+2;
        }
        else 
        {
            $return_str=$return_str.substr($src_str,$i,1);
            $i=$i+1;
            $n=$n+1;
        }
    }
    if ($i<$str_length)
    {
        $return_str = $return_str . '';
    }
    if (get_post_status() == 'private')
    {
        $return_str = $return_str . '（private）';
    }
    return $return_str;
}

function getPostViews($postID) {  //此函数用于输出文章浏览次数

    $count_key = 'post_views_count';

    $count = get_post_meta ( $postID, $count_key, true );// _post_meta()函数获取统一文章id，//用于返回同一数值

    if ($count == '') {

        delete_post_meta ( $postID, $count_key );

        add_post_meta ( $postID, $count_key, '0' );

        return 0;//如果从setPostViews()函数中读取到$count为空，则文章未被浏览//过

    }

    return $count;

}


function setPostViews($postID) {    //将文章id传到函数中，文章被采用一次，$count自加//1

    $count_key = 'post_views_count';

    $count = get_post_meta ( $postID, $count_key, true );

    if ($count == '') {

        $count = 0;

        delete_post_meta ( $postID, $count_key );

        add_post_meta ( $postID, $count_key, '0' );

    } else {

        $count ++;

        update_post_meta ( $postID, $count_key, $count );

    }

}


function ven_include($file_name){
    include (TEMPLATEPATH . '/includes/'.$file_name); 
}


function ven_the_excerpt($post_content){
    if (has_excerpt()){
        the_excerpt(); 
    }else{
        echo "&nbsp;&nbsp;&nbsp;&nbsp;".mb_strimwidth(strip_tags(apply_filters('the_content', $post_content)), 0, 480,"...");
    } 
}

function ven_the_image(){
    if ( $image = get_post_meta($post->ID, 'show', true) ) {
        echo $image;
    }elseif(has_post_thumbnail()) { 
        the_post_thumbnail('show');
    }else{
        echo catch_first_image();
    } 
}


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

ven_include ('part-archive-list.php');


function ven_get_content_layout_class(){
    if(ven_is_mobile()){
        echo "col-xs-12 col-sm-12";
    }else{
        echo "col-xs-12 col-sm-9";
    }
}

?>
