<?php
/**
 * Template Name: Our Team
 */
get_header();
?>
<?php
if (have_posts()) : while (have_posts()) : the_post();
        ?>
        <!-- ================================================== -->
        <div class="inner-banner">
            <div class="container"><h1><?php the_title(); ?></h1></div>
        </div>
        <!-- /.carousel --> 
        <section id="inner-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="blog-area">
                            <div class="row">
                                <div class="col-lg-8 col-md-7 col-sm-12">
                                    <div class="blog-left blog-archive">
                                        <!-- Start single -->
                                        <article class="single-from-blog">
                                            <h4><?php the_title(); ?></h4>
                                            <?php the_content(); ?>
                                        </article>
                                        <!-- End single -->
                                    </div>
                                    <div class="single-from-blog">
                                <?php
                                endwhile;
                                    endif;
                                    wp_reset_query();
                                    wp_reset_postdata();
                                    $args = array("post_type" => "ourteam",'post_status'=>'publish','orderby' => 'ID', 'order' => 'asc');
                                    query_posts($args);
                                    if (have_posts()) : while (have_posts()) : the_post();
                                    $thumb_id = get_post_thumbnail_id();
                                    $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
                                    $thumb_url = $thumb_url_array[0];
                                    ?>
                                     <div class="col-lg-12 col-md-12 col-sm-12 align-contnet">
                                        <?php if(!empty($thumb_url)) {?>
                                         <img class="image-left" src="<?php echo $thumb_url;?>">
                                        <?php }?>
                                   
                                        <h4> <?php the_title();?> </h4>
                                        <h5><?php the_field('designation');?></h5>
                                        <p> <?php the_content();?></p>
                                    </div>
                                   
                            <?php 
                                 endwhile;
                                 endif;
                                 wp_reset_query();
                                 wp_reset_postdata(); ?>
                        </div>
</div>
                        <div class="col-lg-4 col-md-5 col-sm-12">
                            <aside class="blog-right">

                            <?php
                            if (is_active_sidebar('right-sidebar')) :
                                dynamic_sidebar('right-sidebar');
                            endif;
                            ?>
                            </aside>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="clearfix"></div>


<?php
get_footer();
?>