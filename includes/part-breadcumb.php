
<?php 
    $has_zoom = false;

    function ven_sidebar_button(){
        if(ven_is_mobile()){

        }else{
            echo '<a class="pull-right visible-xs" style="margin-left:10px;"><button type="button" class="btn btn-default btn-xs" data-toggle="offcanvas">热门文章</button></a>'; 
        }
    }

    function ven_show_single_breadcumb(){
        global $has_zoom;
        $has_zoom = true;

        if(is_single()){?>   
            <ol class="breadcrumb">
              当前位置: 
              <li><a title="返回首页" href="<?php echo get_settings('Home'); ?>/">首页</a></li>
                <li><?php the_category('<span style="font-size:13px;font-weight:100;"> & </span> ') ?></li>
                <li class="active">正文</li>
                <span class="pull-right">
                <a href="javascript:doZoom(14)">小</a> 
                <a href="javascript:doZoom(16)">中</a> 
                <a href="javascript:doZoom(20)">大</a>
                <?php ven_sidebar_button(); ?> 
                </span>
            </ol>
        <?php } 
    }

    function ven_show_archive_breadcumb(){
        if(is_archive()){?>   
            <div class="breadcrumb">
                当前位置 ＞
                <li><a title="返回首页" href="<?php echo get_settings('Home'); ?>/">首页</a></li> 

                    <li><?php if (is_category()) { ?><?php single_cat_title(); ?>
                    <?php } elseif( is_tag() ) { ?><?php single_tag_title(); ?>
                    <?php } elseif (is_day()) { ?><?php the_time('Y年m月'); ?>发表的文章
                    <?php } elseif (is_month()) { ?>所有<?php the_time('Y年m月'); ?>文章
                    <?php } elseif (is_year()) { ?>Archive for <?php the_time('Y'); ?>
                    <?php } elseif (is_author()) { ?><?php wp_title( '');?>发表的所有文章
                    <?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
                    <h1>Blog Archives</h1>
                    <?php } ?>
                   
                </li>
            </div>
        <?php }
    }


    function ven_show_search_search(){
        if(is_search()){?>   
            <div class="breadcrumb">
            当前位置 ＞
            <li ><a title="返回首页" href="<?php echo get_settings('Home'); ?>/">首页</a></li> 
               <li > 搜索结果
            </li>
            </div>
        <?php }
    }


    function ven_show_page_search(){
        global $has_zoom;
        $has_zoom = true;
        if(is_page()){?>   
            <ol class="breadcrumb">
                当前位置: 
                <li><a title="返回首页" href="<?php echo get_settings('Home'); ?>/">首页</a></li>
                <li><?php the_title() ?></li>
                <li class="active">正文</li>
            
                <span class="pull-right">
                    <a href="javascript:doZoom(14)">小</a> 
                    <a href="javascript:doZoom(16)">中</a> 
                    <a href="javascript:doZoom(20)">大</a>

                    <?php ven_sidebar_button(); ?>          
                </span>
            </ol>
        <?php }
    }

