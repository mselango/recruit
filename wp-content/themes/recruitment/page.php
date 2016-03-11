<?php

get_header();?>
<?php
static $k=0;
 if (have_posts()) : while (have_posts()) : the_post();
    $thumb_id = get_post_thumbnail_id();
    $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
    $thumb_url = $thumb_url_array[0];?>
<!-- ================================================== -->
<div class="inner-banner">
	<div class="container"><h1><?php the_title();?></h1></div>
</div>
<!-- /.carousel --> 
<section id="inner-content">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="blog-area">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="blog-left blog-archive">
                  <!-- Start single -->
                  <article class="single-from-blog">
                    <h4><?php the_title();?></h4>
                    <img src="http://202.129.196.131:8085/demo/recruitment/wp-content/uploads/2016/02/comingsoon.png">
                  </article>
                  <!-- End single -->
                </div>
              </div>
             <?php endwhile; endif; wp_reset_query();wp_reset_postdata(); ?>
           
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