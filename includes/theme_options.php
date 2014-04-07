<?php
ob_start();
$themename = "Hairpin";
$shortname = "wd";

$options = array ( 

	array( "name" => $themename." Options",
       "type" => "title"),

//首页布局设置开始
    array( "type" => "close"),
    array( "name" => "首页布局设置",
           "type" => "section"),
    array( "type" => "open"),

	array(  "name" => "选择首页布局",
			"desc" => "默认BLOG布局",
            "id" => $shortname."_home",
            "type" => "select",
            "std" => "CMS",
            "options" => array("BLOG", "CMS")),

//CMS布局首页设置

    array( "type" => "close"),
    array( "name" => "首页CMS布局设置",
           "type" => "section"),
    array( "type" => "open"),

	array(	"name" => "CMS首页左侧分类ID设置",
			"desc" => "输入分类ID，显示更多分类，请用英文逗号＂,＂隔开",
            "id" => $shortname."_catl",
            "type" => "text",
            "std" => "1,2,3,4"),

	array(	"name" => "CMS首页右侧分类ID设置",
			"desc" => "输入分类ID,显示更多分类，请用英文逗号＂,＂隔开",
            "id" => $shortname."_catr",
            "type" => "text",
            "std" => "1,2,3,4")

);



function mytheme_add_admin() {

	global $themename, $shortname, $options;

	if ( $_GET['page'] == basename(__FILE__) ) {

		/***************如果点击了保存按钮*****************/ 
		if ( 'save' == $_REQUEST['action'] ) {

			foreach ($options as $value) {
			update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

			foreach ($options as $value) {
				if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

			header("Location: admin.php?page=theme_options.php&saved=true");
			die;
		}
		/***************如果点击的是重置按钮*****************/
		else if( 'reset' == $_REQUEST['action'] ) {

			foreach ($options as $value) {
				delete_option( $value['id'] ); }

			header("Location: admin.php?page=theme_options.php&reset=true");
			die;
		}
	}

	/***************调用mytheme_admin()创建设置页面，名称为Hairpin*****************/
	add_theme_page($themename." Options", "Hairpin Setting", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}

function mytheme_admin() {
 
	global $themename, $shortname, $options;
	$i=0;
 
	if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' 主题设置已保存</strong></p></div>';
	if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' 主题已重新设置</strong></p></div>';

?>

<div class="wrap rm_wrap">

<h2><?php echo $themename; ?> 主题设置</h2>
<p>当前使用主题: Hairpin | 设计者:<a href="http://jilinhan.sinaapp.com" target="_blank">暨林瀚</a></p> 

		<div class="rm_opts">
		<form method="post">

		<?php foreach ($options as $value) {
		switch ( $value['type'] ) {
		 
		case "open":
		?>
		 
		<?php break;
		case "close":
		?>

<?php break;
 
case "title":
?>

 
<?php break;
 
case 'text':
?>

<div class="rm_input rm_text">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'])  ); } else { echo $value['std']; } ?>" />
 <small><?php echo $value['desc']; ?></small>
 
 <div class="clearfix"></div>
 
 </div>
<?php
break;
 
case 'textarea':
?>

<div class="rm_input rm_textarea">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id']) ); } else { echo $value['std']; } ?></textarea>
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 
 </div>
  
<?php
break;
 
case 'select':
?>

<div class="rm_input rm_select">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	
<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
<?php foreach ($value['options'] as $option) { ?>
		<option <?php if (get_settings( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>
</select>

	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
</div>
<?php
break;
 
case "checkbox":
?>

<div class="rm_input rm_checkbox">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	
<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />


	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 </div>
<?php break; 
case "section":

$i++;

?>

<div class="rm_section">
<div class="rm_title"><h3><?php echo $value['name']; ?></h3>
<span class="submit"><input name="save<?php echo $i; ?>" type="submit" value="保存设置" />
</span><div class="clearfix"></div></div>


<div class="rm_options">

<?php break;
}
}
?>
		</div>

</div>

<br />
<?php /***************显示分类目录id*****************/?>
<?php
function show_id() {
	global $wpdb;
	$request = "SELECT $wpdb->terms.term_id, name FROM $wpdb->terms ";
	$request .= " LEFT JOIN $wpdb->term_taxonomy ON $wpdb->term_taxonomy.term_id = $wpdb->terms.term_id ";
	$request .= " WHERE $wpdb->term_taxonomy.taxonomy = 'category' ";
	$request .= " ORDER BY term_id asc";
	$categorys = $wpdb->get_results($request);
	foreach ($categorys as $category) { 
		$output = '<ul>'.$category->name."( <em>".$category->term_id.'</em> )</ul>';
		echo $output;
	}
}
?>

<span class="show_id">
	<h4>站点所有分类ID</h4><?php show_id();?>
</span>
<?php /***************显示分类目录id*****************/?>
 
 
<input type="hidden" name="action" value="save" /></form>
<form method="post">

	<p class="submit">
		<input name="reset" type="submit" value="恢复默认设置" /> 
			<font color=#ff0000>提示：此按钮将恢复主题初始状态，您的所有设置将消失！</font>
		<input type="hidden" name="action" value="reset" />
	</p>
	
</form>
 </div>
 
<?php
}/*******************对应mytheme_admin()************************* */
?>

<?php
add_action('admin_menu', 'mytheme_add_admin');/*添加主题设置页面到管理菜单*/
?>