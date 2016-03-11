<?php

// Creating the widget 
class social_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
// Base ID of your widget
                'social_widget',
// Widget name will appear in UI
                __('Social Links', 'recruitment'),
// Widget description
                array('description' => __('this widget used to display social links  ', 'recruitment'),)
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
                <div class="follow-us">
                    <a target="_blank" class="facebook" href="<?php echo $instance['facebook'];?>"><span class="fa fa-facebook"></span></a>
                      <a target="_blank" class="twitter" href="<?php echo $instance['twitter'];?>"><span class="fa fa-twitter"></span></a>
                      <a target="_blank" class="google-plus" href="<?php echo $instance['google'];?>"><span class="fa fa-google-plus"></span></a>
                      <a target="_blank" class="youtube" href="<?php echo $instance['youtube'];?>"><span class="fa fa-youtube"></span></a>
                      <a target="_blank" class="linkedin" href="<?php echo $instance['linkedin'];?>"><span class="fa fa-linkedin"></span></a>
                      <a target="_blank" class="dribbble" href="<?php echo $instance['dribble'];?>"><span class="fa fa-dribbble"></span></a>
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
        
        if (isset($instance['facebook'])) {
            $facebook = $instance['facebook'];
        } else {
            $facebook = __('', 'recruitment');
        }
        
        if (isset($instance['twitter'])) {
            $twitter = $instance['twitter'];
        } else {
            $twitter = __('', 'recruitment');
        }

        if (isset($instance['linkedin'])) {
            $linkedin = $instance['linkedin'];
        } else {
            $linkedin = __('', 'recruitment');
        }
        if (isset($instance['youtube'])) {
            $youtube = $instance['youtube'];
        } else {
            $youtube = __('', 'recruitment');
        }
        if (isset($instance['google'])) {
            $google = $instance['google'];
        } else {
            $google = __('', 'recruitment');
        }
         if (isset($instance['dribble'])) {
            $dribble = $instance['dribble'];
        } else {
            $dribble = __('', 'recruitment');
        }

// Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
            <label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook Url:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo esc_attr($facebook); ?>" />
            <label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter Url:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo esc_attr($twitter); ?>" />
            <label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php _e('Linkedin Url:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" type="text" value="<?php echo esc_attr($linkedin); ?>" />
            <label for="<?php echo $this->get_field_id('google'); ?>"><?php _e('Google Plus Url:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('google'); ?>" name="<?php echo $this->get_field_name('google'); ?>" type="text" value="<?php echo esc_attr($google); ?>" />
            <label for="<?php echo $this->get_field_id('youtube'); ?>"><?php _e('Youtube Url:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('youtube'); ?>" name="<?php echo $this->get_field_name('youtube'); ?>" type="text" value="<?php echo esc_attr($youtube); ?>" />
            <label for="<?php echo $this->get_field_id('dribble'); ?>"><?php _e('Dribbble Url:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('dribble'); ?>" name="<?php echo $this->get_field_name('dribble'); ?>" type="text" value="<?php echo esc_attr($dribble); ?>" />
           
        </p>
        <?php
    }

// Updating widget replacing old instances with new
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';
        $instance['facebook'] = (!empty($new_instance['facebook']) ) ? strip_tags($new_instance['facebook']) : '';
        $instance['twitter'] = (!empty($new_instance['twitter']) ) ? strip_tags($new_instance['twitter']) : '';
        $instance['linkedin'] = (!empty($new_instance['linkedin']) ) ? strip_tags($new_instance['linkedin']) : '';
        $instance['google'] = (!empty($new_instance['google']) ) ? strip_tags($new_instance['google']) : '';
        $instance['youtube'] = (!empty($new_instance['youtube']) ) ? strip_tags($new_instance['youtube']) : '';
        $instance['dribble'] = (!empty($new_instance['dribble']) ) ? strip_tags($new_instance['dribble']) : '';

        return $instance;
    }

}

// Class wpb_widget ends here
// Register and load the widget
function wpb_social_widget() {
    register_widget('social_widget');
}

add_action('widgets_init', 'wpb_social_widget');
