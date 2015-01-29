 <?php 

if(is_single()){?> 
  <div class="pager"?>
      <li class="pull-left">
        <a href="">上一篇</a>
      <?php previous_post_link('%link') ?>
    </li>
    <li class="pull-right " >
      <?php next_post_link('%link') ?>
       <a href="">下一篇</a>
    </li>
  </div>

    <?php
    }


    if(is_archive()||is_search()){?>

  <div class="pager ">
    <?php if(function_exists('wp_pagenavi')){ wp_pagenavi(); } else { ?>
    <li class="prev pull-right"><?php next_posts_link(__('下一页')) ?></li>
    <li class="next pull-left"><?php previous_posts_link(__('上一页')) ?></li> <?php } ?>
  </div>
  
        <?php
    }
    ?>
