<div class="container">
<footer role="contentinfo">
    <div class="col-xs-12 col-sm-9" style="font-size:0.8em">
      <hr />
      <p>
     
      <?php 
  $menuParameters = array(
    'container' => false,
    'echo'  => false,
    'items_wrap' => '%3$s',
    'depth' => 0,
    'link_before' => '&nbsp;&nbsp;|&nbsp;&nbsp;',

  );
  echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' );
?>
</p>
<p>
      联系方式：0086-20-85226662&nbsp;&nbsp;&nbsp;&nbsp;
      地址：<a href="http://j.map.baidu.com/tgy1z">广州市黄埔大道西601号暨南大学</a>&nbsp;&nbsp;&nbsp;&nbsp;
      邮编：510632&nbsp;&nbsp;&nbsp;&nbsp;
        
        邮箱：ogj@jnu.edu.cn
      </p>
      <p>
       版权所有 &copy; 2015
        <a href="http://ischool.jnu.edu.cn/" target="_blank">暨南大学国际学院 </a>&nbsp;&nbsp;保留所有权利&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;维护：<a href="http://www.han.pm/" target="_blank">Ventunity团队</a>
      </p>
    </div>
  
</footer>
</div>
<?php wp_footer(); ?>


<?php 
/*
根据每一个部分的标志变量加载不同的 JS 文件
<script src="<?php bloginfo('template_directory');?>/js/jquery.min.js"></script>
<script src="<?php bloginfo('template_directory');?>/js/bootstrap.min.js"></script>
*/
?>

<?php if(!is_page()): ?>

<?php endif ?>


<?php if(ven_is_IE()): ?>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="<?php bloginfo('template_directory');?>/assets/js/ie10-viewport-bug-workaround.js"></script>
<script src="<?php bloginfo('template_directory');?>/assets/js/ie-emulation-modes-warning.js"></script>

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<?php endif ?>

<script type="text/javascript">
 <?php include(TEMPLATEPATH."/js/jquery.min.js"); ?>
 <?php include(TEMPLATEPATH."/js/bootstrap.min.js"); ?>
 
$(document).ready(function () {
  
    <?php //if($has_sidebar): ?>
      $('[data-toggle="offcanvas"]').click(function () {
        $('.row-offcanvas').toggleClass('active')
      });
    <?php //endif ?>

    <?php //if($has_zoom): ?>
        function doZoom(size) {
            var zoom = document.all ? document.all['entry'] : document.getElementById('entry');
            zoom.style.fontSize = size + 'px';
        }
    <?php //endif ?>

});

</script>

</body>
</html>
