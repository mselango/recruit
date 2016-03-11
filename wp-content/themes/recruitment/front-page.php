<?php get_header(); ?>
<!-- Carousel
    ================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel"> 
    <!-- Query and Loop for Slider -->
    <?php
    $args = array('post_type' => 'slider', 'post_status'    => 'publish','orderby' => 'ID', 'order' => 'asc');
    query_posts($args);
    global $wp_query; 
    $slider_count = $wp_query->found_posts;
    
    ?>
    <ol class="carousel-indicators">
        <?php for($i=0;$i<$slider_count;$i++){?>
        <li data-target="#myCarousel" data-slide-to="<?php echo $i;?>" class="<?php if($i==0){ echo "active";}?>"></li>
        <?php }?>
        
    </ol>
    <div class="carousel-inner" role="listbox">
<?php
static $k=0;
 if (have_posts()) : while (have_posts()) : the_post();
    $thumb_id = get_post_thumbnail_id();
    $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
    $thumb_url = $thumb_url_array[0];?>
        <div class="item <?php if($k==0){ echo "active";}?>"> <img class="first-slide" src="<?php echo get_template_directory_uri (); ?>/img/banner-1.jpg" alt="">
            <div class="container">
                <div class="carousel-caption">
                    <h1><?php the_title();?></h1>
                    <p><?php the_content();?></p>
                    <p><a class="btn btn-lg btn-primary white-btn" href="#" role="button">Request Demo</a> <a class="btn btn-lg btn-primary red-btn" href="#" role="button">How it Works</a></p>
                </div>
            </div>
        </div>
  <?php $k++; endwhile; endif; wp_reset_query();wp_reset_postdata(); ?>

    </div>
</div>
<!-- Query and Loop for Slider end-->

<!-- Wordpress page Loop start-->
<?php
if (have_posts()) : while (have_posts()) : the_post();
?>
<div class="part-1">
    <div class="container">
        <div class="col-md-6 animated" data-animation="fadeInUp" data-delay="0">
           <?php the_content();?>
            <div class="clearfix"></div>
        </div>
        <!-- End Col -->
        <div class="col-md-6 animated" data-animation="fadeInUp" data-delay="100"><a href="<?php the_field("video_url") ?>" class="video-demo fancybox iframe"><span class="video-demo-icn"></span><img src="<?php echo get_template_directory_uri (); ?>/img/video-demo-img.jpg" alt=""></a></div>
        <!-- End Col -->
        <div class="clearfix"></div>
    </div>
</div>
<?php
$select_page =  get_field("select_page");
 $image = wp_get_attachment_image_src( get_post_thumbnail_id( $select_page->ID ),'full', true);

?>

<!-- End part-1 -->
<div class="part-2">
    <div class="container">
        <div class="col-md-12"><h3>Resources</h3></div>
        <div class="col-md-6">
            <div class="resource-text">
                <p><?php echo $select_page->post_content;?></p>
            </div>
        </div>
        <!-- End Col -->
        <div class="col-md-6"><div class="italic-text"><?php the_field("slogan");?></div></div>
        <!-- End Col -->
        <div class="clearfix"></div>
        <?php if(empty($image[0])){?>
        <div class="col-md-12 mac-image"><img src="<?php echo get_template_directory_uri (); ?>/img/mac-img.jpg" alt=""></div>
        <?php }else{?>
         <div class="col-md-12 mac-image"><img src="<?php echo $image[0];?>" alt=""></div>
        <?php }?>
    </div>
</div>
<!-- End part-3 -->
<div class="part-3">
    <div class="container">
        <h3>Our Services</h3>
        <?php
         static $s=0;
         $services=  get_field("select_service");
          $size_service = count($services);
          
         foreach($services as $service){
             
             if($s%3==0){
             ?>
        <div class="services-part">
             <?php }?>
            <div class="col-md-4">
                <div class="row service-box">
                    <div class="col-md-3">
                        <div class="service-icon-part"><i class="demo-icon icon-icon-<?php echo $s+1;?>"></i></div>
                    </div>
                    <div class="col-md-9">
                        <div class="service-content-part">
                            <a href="<?php echo $service->guid;?>"><?php echo $service->post_title;?></a>
                            <p><?php echo $service->post_excerpt;?></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Col -->
            <?php     if($s%3==2 || $s==$size_service-1){?>
            <div class="clearfix"></div>
        </div>
        
            <?php } $s++; }?>
        <!-- End services-part -->
        
    </div>
</div>
 <?php  endwhile; endif; ?>
<!-- End part-3 -->
<div class="part-4">
    <div class="container">
        <div id="owl-demo" class="owl-carousel">
            
            <?php
                $args = array('post_type' => 'testimonial','posts_per_page' => 3,'post_status'    => 'publish', 'orderby' => 'ID', 'order' => 'asc');
                
                query_posts($args);
                if (have_posts()) : while (have_posts()) : the_post();
                ?>
            <div class="item">
                <div class="testim-content">
                    <?php the_content();?>
                    <div class="aurthor"><?php the_field('client_name');?>, <span><?php the_field('position').the_field('company').the_field('location');?></span></div>
                </div>
            </div>
            <?php  endwhile; endif; wp_reset_query();wp_reset_postdata(); ?>
        </div>
    </div>
</div>
<!-- End part-4 -->

<?php get_footer(); ?>