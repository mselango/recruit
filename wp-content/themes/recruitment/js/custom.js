/* Add here all your JS customizations */
$(document).ready(function(){
    $('section[data-type="background"]').each(function(){
        var $bgobj = $(this);
        $(window).scroll(function() {
            var yPos = -($window.scrollTop() / $bgobj.data('speed'));              
            var coords = '50% '+ yPos + 'px'; 
            $bgobj.css({ backgroundPosition: coords });
        }); 
    }); 
	var nice = $("html").niceScroll();	
	/*var scroll = 0;
	var scrolled = false;
	jQuery(window).bind('scroll', function(e) {
		 if(jQuery(this).scrollTop() > scroll){
			 if(scrolled == false){
				$("body").addClass("sticky-menu-active"); 
				jQuery('header').animate({top:'-36px'}, 400).css("height", "90px");
				jQuery("header .logo img").css("width", "auto").css("height", "35");				
				var str1 = document.URL;
				var str2 = "/#";
				//var str3 = "technology/#";
				//var str4 = "careers/#";
				var temp = 0;
				if(str1.search(str2) != -1) {temp = 1;}
					if(temp == 1) {
					//alert('set top 0');
						jQuery("body.sticky-menu-active .main").css("margin-top", "197px");
					}				
				//jQuery("body.sticky-menu-active .main").css("margin-top", "107px");
				//jQuery("body.sticky-menu-active .contentheaderspace").css("height", "73px");
				scroll = jQuery(this).scrollTop();
				//jQuery("#dummy").val(scroll);
			 }       
			scrolled = true;
		} else {
			if(scrolled == true){
				jQuery('header').animate({top: 0}, 400).css("height", "142px");
				jQuery("header .logo img").css("width", "auto").css("height", "auto");
				jQuery("body.sticky-menu-active .main").css("margin-top", "142px");
				//jQuery("body.sticky-menu-active .contentheaderspace").css("height", "142px");
				$("body").removeClass("sticky-menu-active");
				//jQuery("#dummy").val(scroll);		
				//$(function(){
				var hash = location.hash.replace('#','');
				if(hash != ''){
					//alert(hash);
					location.hash = '';
					window.history.pushState("", document.title, window.location.pathname);
					}
				//});
				scroll = 1;
			}       
			scrolled = false;            
		}
	});*/
});
$(function(){	
if($(window).width() < 962) {
//$("body").addClass("mobile-nav");	
$body.removeClass('sticky-menu-active');
} 
else {

}
$(window).resize(function () {
});
var header = 100;
var logo   = $("header .logo img");
var logoSmallHeight = 35;
$('body').bind('mousewheel', function(e) {
});
$('body').bind('mousewheel', function(e) {
      var scroll = getCurrentScroll();
	  if ( scroll >= header) {
		$('body').addClass('sticky-menu-active');
		$("header").animate({top:"-36px"});
		jQuery("body.sticky-menu-active .main").css("margin-top", "197px");
	  }
      if ( scroll >= header && $(window).width() > 964) {	
		   logo
				.height(logoSmallHeight)
				.css("width", "auto");	
			var str1 = document.URL;
			var str2 = "/#";
			var temp = 0;
			if(str1.search(str2) != -1) {temp = 1;}
			//if(temp == 1) {			
				//jQuery("body.sticky-menu-active .main").css("margin-top", "197px");
			//}			   
        }		
        else {			
			$("body.sticky-menu-active .main").css("margin-top", "0");
			$('body').removeClass('sticky-menu-active');			
			logo
				.css("height", "auto").css("width", "auto");
			var hash = location.hash.replace('#','');
				if(hash != ''){					
					location.hash = '';
					window.history.pushState("", document.title, window.location.pathname);
				}
        }		
  });
function getCurrentScroll() {
    return window.pageYOffset || document.documentElement.scrollTop;
    }
});

(function($) {   
   /* $(window).scroll(function() {
        var $this   = $(this);
        var $body   = $('body');
		var logo 	= $("header .logo img");	
		var header  = $("header");		
        var offset  = 0 === $('#header').length ? 0 : $('#header').height();
        if($this.scrollTop() >= offset && $(window).width() > 964) {											
			var logoSmallHeight = 35;	
			$("body").addClass("sticky-menu-active");
			$body.removeClass('mobile-nav');
			//jQuery("body.sticky-menu-active .main").css("margin-top", "197px");
			$("body.sticky-menu-active header").css("height", "90px");
			var str1 = document.URL;
			var str2 = "/#";
			var temp = 0;
			if(str1.search(str2) != -1) {temp = 1;}
			if(temp == 1) {
			//alert('set top 0');
				jQuery("body.sticky-menu-active .main").css("margin-top", "197px");
			}			
			logo
				.height(logoSmallHeight)
				.css("width", "auto");			
			}		
			else {	
				$("body.sticky-menu-active header").css("height", "auto");			
				$("body.sticky-menu-active .main").css("margin-top", "142px");				
				$("body").removeClass("sticky-menu-active");
				logo
				.css("height", "auto").css("width", "auto");
				var hash = location.hash.replace('#','');
				if(hash != ''){
					//alert(hash);
					location.hash = '';
					window.history.pushState("", document.title, window.location.pathname);
				}
			}			
			if($this.scrollTop() >= offset && $(window).width() < 962) {								
				$("body").addClass("mobile-nav");
				$body.removeClass('sticky-menu-active');
				
			} else {
            	$body.removeClass('mobile-nav');		
			}					
		});*/
		
    // Add "animated-out" class to elements with data-animated attribute
    $('[data-animated]').each(function() {
        $(this).addClass('animated-out');
    });

    // Switch "animated-out" class to "animated-in" when scrolling
    $(window).scroll(function() {
        var scroll      = $(window).scrollTop();
        var height      = $(window).height();
        $('.animated-out[data-animated]').each(function() {
            var $this   = $(this);
            if(scroll + height >= $this.offset().top) {
                var delay   = parseInt($this.attr('data-animated'));
                if(isNaN(delay) || 0 === delay) {
                    $this.removeClass('animated-out').addClass('animated-in');
                } else {
                    setTimeout(function() {
                        $this.removeClass('animated-out').addClass('animated-in');
                    }, delay);
                }
            }
        });
    });    
})(jQuery);