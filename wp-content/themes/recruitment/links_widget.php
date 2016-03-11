<?php

// Creating the widget 
class links_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
// Base ID of your widget
                'links_widget',
// Widget name will appear in UI
                __('child links', 'recruitment'),
// Widget description
                array('description' => __('this widget used to display child links of a page ', 'recruitment'),)
        );
    }

// Creating widget front-end
// This is where the action happens
    public function widget($args, $instance) {

        $title = apply_filters('widget_title', $instance['title']);
        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if (!empty($title))
            echo $args['before_title'] . $title . $args['after_title'];
        ?>
        <div class="popular-post-widget"> 
            <?php
            $page_id = get_the_ID();
            $parent_id = wp_get_post_parent_id($page_id);
            $query1 = array('post_type' => 'page', 'post_parent' => $page_id, 'orderby' => 'menu_order', 'order' => 'ASC');
            $query2 = array('post_type' => 'page', 'post_parent' => $parent_id, 'orderby' => 'menu_order', 'order' => 'ASC');
            query_posts($query1);
            if (have_posts()) :
                echo '<ul>';
                while (have_posts()) : the_post();
                    echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
                     endwhile; wp_reset_query();
        wp_reset_postdata();
                echo '</ul>';
            else :
                query_posts($query2);
                echo '<ul>';
                while (have_posts()) : the_post();
                    echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
                  endwhile; wp_reset_query();
        wp_reset_postdata();
                echo '</ul>';
            endif;
            ?>
        </div>
        <?php
        echo $args['after_widget'];
    }

// Widget Backend 
    public function form($instance) {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('New title', 'recruitment');
        }


// Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <?php
    }

// Updating widget replacing old instances with new
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';

        return $instance;
    }

}

// Class wpb_widget ends here
// Register and load the widget
function wpb_link_widget() {
    register_widget('links_widget');
}

add_action('widgets_init', 'wpb_link_widget');
