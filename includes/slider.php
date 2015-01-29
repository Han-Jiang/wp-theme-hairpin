<?php 

$is_first=true;

get_header(); 

?>

  <?php
      $args = array(
        'posts_per_page' =>5,
        'post__in'  => get_option('sticky_posts'),
        'caller_get_posts' => 10
      );
      query_posts($args);
  ?>
  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="margin-bottom:10px;">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-generic" data-slide-to="1"></li>
      <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      <li data-target="#carousel-example-generic" data-slide-to="3"></li>
      <li data-target="#carousel-example-generic" data-slide-to="4"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox" style="height:100%;">

    <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
      
      <div class="item <?php if($is_first){ echo " active";  $is_first = false;} ?>" style="height:100%;">
          <img src="<?php ven_the_image(); ?>" alt="<?php the_title(); ?>" style="margin: 0 auto; width:100%;height:100%;opacity:0.8;">
       
        <div class="carousel-caption">
           <a href="<?php the_permalink() ?>" style="color:#fff;"><h4><?php the_title(); ?></h4></a>
        </div>
      </div>

      <?php endwhile; ?>
      <?php endif; ?></div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

