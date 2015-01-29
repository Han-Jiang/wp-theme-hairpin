<?php get_header();

  $wd_catl = "6,5,8";
  $wd_catr = "4,3";
  // get_option('wd_catr')  ?>

<div class="container">
  <div class="row">
    <div class="col-md-7">
      <!--Load the slider showing the images-->
      <?php ven_include ('slider.php'); ?>
    </div>

    <div class="col-md-5">
      <?php 
      // Print the list of 最新动态 and 通知公告 and 党费公开
      $display_categories = explode(',',$wd_catr  ); 
      foreach ($display_categories as $category) { 
            ven_part_blog_in_cat_list($category,5);
      }
      ?>
    </div>
  </div>  <!-- row -->
  <div class="row">

      <div class="col-md-6">
        <?php ven_part_blog_in_cat_list("6",11); ?>
      </div>
      <div class="col-md-6"> 
        <?php ven_part_blog_in_cat_list("5",5); ?> 
      </div>
      <div class="col-md-6">
        <?php ven_part_blog_in_cat_list("8",2); ?> 
      </div>
  
  </div>  <!-- row -->
   
</div>
<?php get_footer();?>
