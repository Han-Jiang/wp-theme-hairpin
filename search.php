<?php get_header(); ?>

<div class="container">
<div class="row row-offcanvas row-offcanvas-right">
<div class="<?php ven_get_content_layout_class();?>"> 
  <?php ven_include("part-breadcumb.php");?>
  <?php ven_include("part-page-nav.php");?>

  <?php while ( have_posts() ) : the_post(); ?>
  <div class="col-xs-6" >
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title archive_title" style="overflow:hidden;white-space:nowrap;text-overflow:ellipsis;">
        <a href="<?php the_permalink() ?>
          " title="详细阅读
          <?php the_title_attribute(); ?>
          " >
          <?php the_title(); ?></a>
        <span class="archive_edit">
          <?php edit_post_link('&nbsp;&nbsp;', '  ', '  '); ?></span>
      </h3>
    </div>
    <div class="panel-body" style="height:70%;overflow:hidden;text-overflow:ellipsis;">
      <span class="archive_date">
        <?php the_time('Y年m月d日') ?>&nbsp;&nbsp;&nbsp;&nbsp;</span>
      <span class="archive_category">
        &#8260;&nbsp;
        <?php the_category(', ') ?></span>
      <div class="archive-summary ">
        <?php  ven_the_excerpt($post->post_content); ?>
      </div>
      <span class="pull-left">
        <?php the_tags('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ', ', ', ''); ?></span>

      <span class="btn-blank pull-right">
        <a href="<?php the_permalink() ?>
          " title="详细阅读
          <?php the_title(); ?>" rel="bookmark" class="title">阅读全文</a>
      </span>
    </div>
  </div>
</div>

  <?php endwhile; ?>

  <?php ven_include("part-page-nav.php");?>

  </div><!--/.col-xs-12.col-sm-9-->

        <?php get_sidebar(); ?>
 
</div><!-- row row-offcanvas row-offcanvas-right -->
</div>

<?php get_footer(); ?>

