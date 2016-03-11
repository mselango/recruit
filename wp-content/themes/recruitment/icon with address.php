<?php 


add_action( 'widgets_init', 'pwa_load_widget' );

// Register and load the widget
function pwa_load_widget() {
	register_widget( 'pwa_widget' );
}



// Creating the widget 
class pwa_widget extends WP_Widget {

function __construct() {

parent::__construct(
// Base ID of your widget
'pwa_widget', 

// Widget name will appear in UI
__('Icon with Address', 'pwa_widget_domain'), 

// Widget description
array( 'description' => __( 'This widget is used to display icon with address content', 'pwa_widget_domain' ), ) 
);

}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {


$title = apply_filters( 'widget_title', $instance['title'] );



// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
//echo $args['before_title'] . $title . $args['after_title'];


// This is where you run the code and display the output
//echo __( 'Hello, World!', 'pwa_widget_domain' );
 

//to display at Front-End / OUTPUT screen
  
?>
 <h4><?php echo $title;?></h4>
        <?php 
                        $address="4567 Street name, 012 12 City name, Country";
                        $email="info@recruitmentsystems.com";
                        $url="www.recruitmentsystems.com";
                        $phone1="1300 979 777 (Australia)";
                        $phone2="+61 2 6296 7777 (international)";
                        $copyright="© 2001-2016 Recruitment Systems Pty Ltd - Recruitment Software";

              if ( function_exists( 'ot_get_option' ) ) {
                        $addr_data=ot_get_option( 'address' );
                        $email_data=ot_get_option( 'email' );
                        $url_data=ot_get_option( 'website_url' );
                        $phone1_data=ot_get_option( 'phone1' );
                        $phone2_data=ot_get_option( 'phone2' );
                        $copyright_data=ot_get_option( 'copyright' );


                        if($addr_data){$address=$addr_data;}
                        if($email_data){$email=$email_data;}
                        if($url_data){$url=$url_data;}
                        if($phone1_data){ $phone1=$phone1_data;}
                        if($phone2_data){ $phone2=$phone2_data;}
                        if($copyright_data){$copyright=$copyright_data;}

                  }

                  ?>

 <div class="foot-cont-address"><i class="demo-icon icon-location"></i><?php echo strip_tags($address);?></div>
            <div class="foot-cont-address"><i class="demo-icon icon-mail"></i> <a href="mailto:<?php echo $email;?>"><?php echo $email;?></a></div>
            <div class="foot-cont-address"><i class="demo-icon icon-globe-inv"></i> <a href="<?php echo $url;?>" target="_blank" ><?php echo $url;?></a></div>
            <div class="foot-cont-address"><i class="demo-icon icon-phone"></i><?php echo $phone1;?></div>
            <div class="foot-cont-address"><i class="demo-icon icon-phone"></i><?php echo $phone2;?></div>



<?php
echo $args['after_widget'];
}
		
// Widget Backend  stored in the BackEnd / DB
//NOTE: for others Only page ID is stored in the BackEnd / DB
public function form( $instance ) {

if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'wpb_widget_domain' );
}



// below is the form / html form what you will view in the BackEnd where you input the required data
?>

<!--<p>
<label for="<?php echo $this->get_field_id( 'icon' ); ?>"><?php _e( 'Icon:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'icon' ); ?>" name="<?php echo $this->get_field_name( 'icon' ); ?>" type="text" value="<?php echo esc_attr( $icon ); ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('content'); ?>"><?php _e('content'); ?></label> 
    <textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('content'); ?>" name="<?php echo $this->get_field_name('content'); ?>"><?php echo $content; ?></textarea>
</p> -->


<!-- To get title as input-->
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>


    


<?php

}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

return $instance;
}
} // Class pwa_widget ends here




?>