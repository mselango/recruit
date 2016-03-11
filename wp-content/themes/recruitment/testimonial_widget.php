<?php

// Creating the widget 
class testimonial_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
// Base ID of your widget
                'testimonial_widget',
// Widget name will appear in UI
                __('Display the testimonials', 'recruitment'),
// Widget description
                array('description' => __('this widget used to display random testimonial', 'recruitment'),)
        );
    }

// Creating widget front-end
// This is where the action happens
    public function widget($args, $instance) {
        
       
        $title = apply_filters('widget_title', $instance['title']);
        $no_of_testimonial = $instance['no_of_testimonial'];
// before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if (!empty($title))
            echo $args['before_title'] . $title . $args['after_title'];

        $query = array("post_type" => "testimonial", "posts_per_page" => $no_of_testimonial);
        query_posts($query);
        ?>
<div class="popular-post-widget">
<?php
        if (have_posts()) : while (have_posts()) : the_post();
                ?>

                <div class="media">
                    <div class="media-left">
                        <a href=#">
                            <img class="media-object" src="http://202.129.196.131:8085/demo/recruitment/wp-content/themes/recruitment/img/popular-post-img.jpg" alt="img">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="#"><?php the_field('client_name');?></a></h4>
                         <?php the_content();?>
                    </div>
                </div>
                <?php endwhile;
        else :
            ?>
            <p><?php _e('Sorry, no testmonial found.'); ?></p>
        <?php
        endif;
        echo $args['after_widget'];
        wp_reset_query();
        wp_reset_postdata();
        ?>
             </div>
            <?php
        
    }

// Widget Backend 
    public function form($instance) {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('New title', 'recruitment');
        }

        if (isset($instance['no_of_testimonial'])) {
            $no_of_testimonial = $instance['no_of_testimonial'];
        } else {
            $no_of_testimonial = __('3', 'recruitment');
        }
// Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
            <label for="<?php echo $this->get_field_id('no_of_testimonial'); ?>"><?php _e('Number of testimonials:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('no_of_testimonial'); ?>" name="<?php echo $this->get_field_name('no_of_testimonial'); ?>" type="text" value="<?php echo esc_attr($no_of_testimonial); ?>" />
        </p>
        <?php
    }

// Updating widget replacing old instances with new
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';
        $instance['no_of_testimonial'] = (!empty($new_instance['no_of_testimonial']) ) ? strip_tags($new_instance['no_of_testimonial']) : '';
        return $instance;
    }

}

// Class wpb_widget ends here
// Register and load the widget
function wpb_load_widget() {
    register_widget('testimonial_widget');
}

add_action('widgets_init', 'wpb_load_widget');
