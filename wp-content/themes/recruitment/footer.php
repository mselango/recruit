<footer>
	<div class="container">
    	<div class="col-md-7">
        	<?php if ( has_nav_menu( 'footer1' ) ) : ?>
                <?php
                            wp_nav_menu( array(
                                'theme_location' => 'footer1',
                                'menu_class'     => ' ',
                             ) );
                        ?>

                <?php endif; ?>

                <?php if ( has_nav_menu( 'footer2' ) ) : ?>
                <?php
                            wp_nav_menu( array(
                                'theme_location' => 'footer2',
                                'menu_class'     => ' ',
                             ) );
                        ?>

                <?php endif; ?>

                 <?php if ( has_nav_menu( 'footer3' ) ) : ?>
                <?php
                            wp_nav_menu( array(
                                'theme_location' => 'footer3',
                                'menu_class'     => ' ',
                             ) );
                        ?>

                <?php endif; ?>

                 <?php if ( has_nav_menu( 'footer4' ) ) : ?>
                <?php
                            wp_nav_menu( array(
                                'theme_location' => 'footer4',
                                'menu_class'     => ' ',
                             ) );
                        ?>

                <?php endif; ?>

        </div>
       
       
        <!-- End Col -->
        <div class="col-md-3">
        	<h4>CONTACT</h4>
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

            <div class="foot-cont-address"><i class="demo-icon icon-location"></i><?php echo $address;?></div>
            <div class="foot-cont-address"><i class="demo-icon icon-mail"></i> <a href="mailto:<?php echo $email;?>"><?php echo $email;?></a></div>
            <div class="foot-cont-address"><i class="demo-icon icon-globe-inv"></i> <a href="<?php echo $url;?>" target="_blank" ><?php echo $url;?></a></div>
            <div class="foot-cont-address"><i class="demo-icon icon-phone"></i><?php echo $phone1;?></div>
            <div class="foot-cont-address"><i class="demo-icon icon-phone"></i><?php echo $phone2;?></div>
        </div>
        <!-- End Col -->

        <?php if ( is_active_sidebar( 'sidebar-3' )  ) : ?>
    
            <?php dynamic_sidebar( 'sidebar-3' ); ?>
    
        <?php endif; ?>

        <!--<div class="col-md-2">
        	<h4>NEWSLETTER</h4>
            <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit,</p>
            <label class="newsletter">
            	<input name="Email address" class="text-bx-news" type="text"> <input name="GO" class="btn-bx-news" type="button" value="GO" id="Submit">
            </label>
        </div>
         End Col -->
    </div>
</footer>
<!-- End Footer -->
<div class="copyrights">
	<div class="container">
  <?php
        $re_sys_copyright="Recruitment Systems Copyright";
        $privacy_policy="Privacy Policy";
        $contact_us="Contact Us";
        $sitemap="Sitemap";

        if ( function_exists( 'ot_get_option' ) ) {

          $re_sys_copyright_data=ot_get_option( 're_sys_copyright' );
          $privacy_policy_data=ot_get_option( 'privacy_policy' );
          $contact_us_data=ot_get_option( 'contact_us' );
          $sitemap_data=ot_get_option( 'sitemap' );

          if($re_sys_copyright_data){$re_sys_copyright=$re_sys_copyright_data;}
          if($privacy_policy_data){$privacy_policy=$privacy_policy_data;}
          if($contact_us_data){$contact_us=$contact_us_data;}
          if($sitemap_data){$sitemap=$sitemap_data;}

        
        }

  ?>
    	<div class="col-md-6 copy-link"><a href="<?php echo get_permalink($re_sys_copyright); ?>">Recruitment Systems Copyright</a>  |  <a href="<?php echo get_permalink($privacy_policy); ?>">Privacy Policy</a>  |  <a href="<?php echo get_permalink($contact_us); ?>">Contact Us</a> | <a href="<?php echo get_permalink($sitemap); ?>">Sitemap</a></div>
        <!-- End Col -->
        <div class="col-md-6 copy-cnt"><?php echo $copyright; ?></div>
        <!-- End Col -->
    </div>
</div>
<!-- End copyrights -->
<!--  ================================================== --> 

<?php wp_footer(); ?>

<script>window.jQuery || document.write('<script src="<?php echo get_template_directory_uri ();?>/js/vendor/jquery.min.js"><\/script>')</script> 
<script>
    
jQuery(document).ready(function($) {
var owl = $("#owl-demo");

  owl.owlCarousel({

  items :1, //10 items above 1000px browser width
  itemsDesktop : [1024,1], //5 items between 1000px and 901px
  itemsDesktopSmall : [900,1], // 3 items betweem 900px and 601px
  itemsTablet: [640,1], //2 items between 600 and 0;
  itemsMobile: [480,1],
  itemsMobile: [360,1],
  itemsMobile :[320,1],// itemsMobile disabled - inherit from itemsTablet option
  navigation:false,
  paginationSpeed : 1000
  });


});
</script>

<script type="text/javascript">
//&lt;![CDATA[
if (typeof newsletter_check !== "function") {
window.newsletter_check = function (f) {
    var re = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-]{1,})+\.)+([a-zA-Z0-9]{2,})+$/;
    if (!re.test(f.elements["ne"].value)) {
        alert("The email is not correct");
        return false;
    }
    for (var i=1; i&lt;20; i++) {
    if (f.elements["np" + i] &amp;&amp; f.elements["np" + i].required &amp;&amp; f.elements["np" + i].value == "") {
        alert("");
        return false;
    }
    }
    if (f.elements["ny"] &amp;&amp; !f.elements["ny"].checked) {
        alert("You must accept the privacy statement");
        return false;
    }
    return true;
}
}
//]]&gt;
</script>

</body>
</html>
