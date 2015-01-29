<?php
  /*
   Plugin Name: VENGIX
   Plugin URI: http://www.ventunity.com/wordpress-plugins/vengix
   Description: Powerful tools and framework
   Author: Han
   Version: 0.0.1
   Author URI: http://www.han.pm
   
   History:
   2015.01.22 First Version, support device detect

   To-Do:
   - Readme.md
   */
  
  // // //  VENGIX FRAMWORK CODE // // //

  /*****************************************
  * 移动, 平板设备检测
  ******************************************/

  include  TEMPLATEPATH.'/vengix/Mobile_Detect.php';
  $g_detect = new Mobile_Detect();

  function ven_is_mobile(){
    global $g_detect;
    return $g_detect->isMobile();
  }

  function ven_is_IE(){
    global $g_detect;
    return $g_detect->isIE();
  }
  
  /*****************************************
  * 移除 WordPress 后台的相关信息
  ******************************************/

  function ven_remove_menu_page() {
    //remove_menu_page('index.php'); // 移除 "仪表盘"
    //remove_menu_page('edit.php'); // 移除 "文章"
    //remove_menu_page('upload.php'); // 移除 "媒体"
    //remove_menu_page('link-manager.php'); // 移除 "链接"
    //remove_menu_page('edit.php?post_type=page'); // 移除 "页面"
    //remove_menu_page('edit-comments.php'); // 移除 "评论"
    remove_menu_page('themes.php'); // 移除 "外观"
    remove_menu_page('plugins.php'); // 移除 "插件"
    //remove_menu_page('users.php'); // 移除 "用户"
    //remove_menu_page('tools.php'); // 移除 "工具"
    //remove_menu_page('options-general.php'); // 移除 "设置"
  }


  /**
  底部的版权和版本信息
  */
  function left_admin_footer_text($text) {
      // 左边信息
      $text = '<span id="footer-thankyou">感谢使用<a href="http://cn.wordpress.org/">国际学院党建网管理系统</a></span>'; 
      return $text;
  }

  function right_admin_footer_text($text) {
      // 右边信息
      $text = "1.0版本";
      return $text;
  }
  add_filter('admin_footer_text', 'left_admin_footer_text'); 
  add_filter('update_footer', 'right_admin_footer_text', 11); 
 
  //移除WordPress 仪表盘首页的“插件”“其它WordPress 新闻”小工具
  function remove_dashboard_widgets() {
      global$wp_meta_boxes; 
      unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
      unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
  }
  // add_action('wp_dashboard_setup', 'remove_dashboard_widgets');

  global $current_user;
  get_currentuserinfo();
  if($current_user->user_login != "jianghan"){
      
      // 禁止 WordPress 检查更新
      remove_action('admin_init', '_maybe_update_core');    

      // 禁止 WordPress 更新插件
      remove_action('admin_init', '_maybe_update_plugins'); 

      // 禁止 WordPress 更新主题
      remove_action('admin_init', '_maybe_update_themes');  

      // 去除 主题与插件等菜单项
      add_action( 'admin_menu', 'ven_remove_menu_page' );
  }
?>