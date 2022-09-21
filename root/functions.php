<?php
/**
 * Storefront engine room
 *
 * @package storefront
 */

/**
 * Assign the Storefront version to a var
 */
$theme              = wp_get_theme( 'storefront' );
$storefront_version = $theme['Version'];

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 980; /* pixels */
}

$storefront = (object) array(
	'version'    => $storefront_version,

	/**
	 * Initialize all the things.
	 */
	'main'       => require 'inc/class-storefront.php',
	'customizer' => require 'inc/customizer/class-storefront-customizer.php',
);

require 'inc/storefront-functions.php';
require 'inc/storefront-template-hooks.php';
require 'inc/storefront-template-functions.php';
require 'inc/wordpress-shims.php';

if ( class_exists( 'Jetpack' ) ) {
	$storefront->jetpack = require 'inc/jetpack/class-storefront-jetpack.php';
}

if ( storefront_is_woocommerce_activated() ) {
	$storefront->woocommerce            = require 'inc/woocommerce/class-storefront-woocommerce.php';
	$storefront->woocommerce_customizer = require 'inc/woocommerce/class-storefront-woocommerce-customizer.php';

	require 'inc/woocommerce/class-storefront-woocommerce-adjacent-products.php';

	require 'inc/woocommerce/storefront-woocommerce-template-hooks.php';
	require 'inc/woocommerce/storefront-woocommerce-template-functions.php';
	require 'inc/woocommerce/storefront-woocommerce-functions.php';
}

if ( is_admin() ) {
	$storefront->admin = require 'inc/admin/class-storefront-admin.php';

	require 'inc/admin/class-storefront-plugin-install.php';
}

/**
 * NUX
 * Only load if wp version is 4.7.3 or above because of this issue;
 * https://core.trac.wordpress.org/ticket/39610?cversion=1&cnum_hist=2
 */
if ( version_compare( get_bloginfo( 'version' ), '4.7.3', '>=' ) && ( is_admin() || is_customize_preview() ) ) {
	require 'inc/nux/class-storefront-nux-admin.php';
	require 'inc/nux/class-storefront-nux-guided-tour.php';
	require 'inc/nux/class-storefront-nux-starter-content.php';
}

/**
 * Note: Do not add any custom code here. Please use a custom plugin so that your customizations aren't lost during updates.
 * https://github.com/woocommerce/theme-customisations
 */


// function that runs when shortcode is called
function custom_vertical_slider() { 
?>

 <div class="bxv vertical_thum_resp_slider" id="vertical_thum_resp_slider_main" style="visibility: visible;">
             <div class="bx-wrapper-" style="max-width: 260px; margin: 0px auto;">
             	<div class="bx-viewport" style="width: 100%; overflow: hidden; position: relative; height: 1380px;">
             		<div class="sub-vertical-slider" id="vertical_thum_resp_slider" data-height="1380px" style="width: auto; position: relative; top: -1408.6px;">


             			<?php 

          $args = array(
              'post_type'=> 'sidebar-ads',
              'order'    => 'DESC'
          );              

          $the_query = new WP_Query( $args );
          if($the_query->have_posts() ) : 
              while ( $the_query->have_posts() ) : 
                 $the_query->the_post(); 
          ?>

          <?php 

          	global $wp;
			$current_link = "$_SERVER[REQUEST_URI]";
        	$page_link = get_field('page_link');?>

        	<?php if(!empty($page_link)) : ?>

        		<?php if ($current_link == $page_link) { ?>
             			<div class="sliderimgLiVerticalres bx-clone" style="float: none; list-style: none; position: relative; width: 250px; margin-bottom: 5px;"> 
                                                                                                                                                                                                                                                                                                             
                          <?php the_field('ad_content'); ?>
                         
                    		 <div class="bx-caption-vertical"><span><?php the_title(); ?></span></div>
                 		</div>
        			
        		<?php } ?>
            			

         <?php else : ?>

						<div class="sliderimgLiVerticalres bx-clone" style="float: none; list-style: none; position: relative; width: 250px; margin-bottom: 5px;"> 
                                                                                                                                                                                                                                                                                                             
                          <?php the_field('ad_content'); ?>
                         
                    		 <div class="bx-caption-vertical"><span><?php the_title(); ?></span></div>
                 		</div>

         <?php endif ; ?>

          <?php
              endwhile; 
              wp_reset_postdata(); 
          else: 
          endif;

          ?>



              </div>
		          </div>
	      			</div>
          </div>

          <script type="text/javascript">
          	
          	var interval_6127960e146a9 = setInterval(function() {

                    if(document.readyState === 'complete') {
                        
                     clearInterval(interval_6127960e146a9);    
                    
                    var slider='';
                    var slider_loaded__=false;
                    var maxHeightSlider=0;
                      sliderVertcal=jQuery('#vertical_thum_resp_slider').bxSlider_vertical({
                       mode: 'vertical',
                       slideWidth: 260,
                       moveSlides: 1,
                       minSlides: 5,
                       maxSlides:5,
                       speed:3000,
                       pause:1000,
                       slideMargin:5,
                       preventDefaultSwipeX:false,
                                                autoStart:true,
                         autoDelay:200,
                         auto:true,       
                                                 
                         infiniteLoop: true,
                            
                                                autoHover: true,
                                                                      controls:false,
                                              pager:false,
                       useCSS:false,
                                                 captions:true,  
                                                onSlideBefore: function(slideElement){

                            jQuery(slideElement).find('img').each(function(index, elm) {

                                    if(!elm.complete || elm.naturalWidth === 0){

                                       var toload='';
                                       var toloadval='';
                                       jQuery.each(elm.attributes, function(i, attrib){

                                           var value = attrib.value;
                                           var aname=attrib.name;

                                           var pattern = /^((http|https):\/\/)/;

                                           if(pattern.test(value) && aname!='src' && aname.indexOf('data-html5_vurl')==-1) {

                                               toload=aname;
                                               toloadval=value;
                                               }
                                           // do your magic :-)
                                       });

                                       vsrc= jQuery(elm).attr("src");
                                       jQuery(elm).removeAttr("src");
                                       dsrc= jQuery(elm).attr("data-src");
                                       lsrc= jQuery(elm).attr("data-lazy-src");

                                       if(dsrc!== undefined && dsrc!='' && dsrc!=vsrc){
                                                jQuery(elm).attr("src",dsrc);
                                           }
                                           else if(lsrc!== undefined && lsrc!=vsrc){

                                                jQuery(elm).attr("src",lsrc);
                                           }
                                            else if(toload!='' && toload!='srcset' && toloadval!='' && toloadval!=vsrc){

                                               $(elm).attr("src",toloadval);


                                               } 
                                           else{

                                                jQuery(elm).attr("src",vsrc);

                                           }   

                                       elm= jQuery(elm)[0];      
                                       if(!elm.complete && elm.naturalHeight == 0){

                                            jQuery(elm).removeAttr('loading');
                                            jQuery(elm).removeAttr('data-lazy-type');


                                            jQuery(elm).removeClass('lazy');

                                            jQuery(elm).removeClass('lazyLoad');
                                            jQuery(elm).removeClass('lazy-loaded');
                                            jQuery(elm).removeClass('jetpack-lazy-image');
                                            jQuery(elm).removeClass('jetpack-lazy-image--handled');
                                            jQuery(elm).removeClass('lazy-hidden');

                                   }


                               }

                            });

                      },   
                        onSliderLoad: function(currentIndex){

                                var maxHeight=0;
                               jQuery(".vertical_thum_resp_slider").css("visibility","visible");
                                setTimeout(function(){ 
                                          maxHeightSlider=jQuery('#vertical_thum_resp_slider_main .bx-wrapper- div.bx-viewport').css('height'); 
                                           jQuery("#vertical_thum_resp_slider").attr('data-height',maxHeightSlider);
                                           slider_loaded__=true;
                                  }, 2000);
                          }    
                      



                        });

                    var interval_6127960e146aa = setInterval(function() {
                                
                        if(slider_loaded__==true) {
                             sliderVertcal.redrawSlider(); 
                             clearInterval(interval_6127960e146aa);

                        }
                      });
                      
                      
                        var timer_slider;
                        var width_slider = jQuery(window).width();
                        jQuery(window).bind('resize', function(){
                            if(jQuery(window).width() != width_slider){

                                width_slider = jQuery(window).width();
                                timer_slider && clearTimeout(timer_slider);
                                timer_slider = setTimeout(onResizeVerticalSlider_slider, 600);

                            }   
                        });

                        function onResizeVerticalSlider_slider(){

                              sliderVertcal.redrawSlider();         

                        }
                             
                     
                }     

           }, 100);


               window.addEventListener('load', function() {


                                        setTimeout(function(){ 

                                                if(jQuery(".vertical_thum_resp_slider").find('.bx-loading').length>0){

                                                        jQuery(".vertical_thum_resp_slider").find('img').each(function(index, elm) {
                                                            
                                                                if(!elm.complete || elm.naturalWidth === 0){

                                                                    var toload='';
                                                                    var toloadval='';
                                                                    jQuery.each(this.attributes, function(i, attrib){

                                                                            var value = attrib.value;
                                                                            var aname=attrib.name;

                                                                            var pattern = /^((http|https):\/\/)/;

                                                                            if(pattern.test(value) && aname!='src') {

                                                                                    toload=aname;
                                                                                    toloadval=value;
                                                                             }
                                                                            // do your magic :-)
                                                                     });

                                                                            vsrc=jQuery(elm).attr("src");
                                                                            jQuery(elm).removeAttr("src");
                                                                            dsrc=jQuery(elm).attr("data-src");
                                                                            lsrc=jQuery(elm).attr("data-lazy-src");


                                                                               if(dsrc!== undefined && dsrc!='' && dsrc!=vsrc){
                                                                                                             jQuery(elm).attr("src",dsrc);
                                                                                    }
                                                                                    else if(lsrc!== undefined && lsrc!=vsrc){

                                                                                                     jQuery(elm).attr("src",lsrc);
                                                                                    }
                                                                                    else if(toload!='' && toload!='srcset' && toloadval!='' && toloadval!=vsrc){

                                                                                            jQuery(elm).removeAttr(toload);
                                                                                            jQuery(elm).attr("src",toloadval);


                                                                                        } 
                                                                                    else{

                                                                                                    jQuery(elm).attr("src",vsrc);

                                                                               }   

                                                                            elm=jQuery(elm)[0];      
                                                                             if(!elm.complete && elm.naturalHeight == 0){

                                                                            jQuery(elm).removeAttr('loading');
                                                                            jQuery(elm).removeAttr('data-lazy-type');


                                                                            jQuery(elm).removeClass('lazy');

                                                                            jQuery(elm).removeClass('lazyLoad');
                                                                            jQuery(elm).removeClass('lazy-loaded');
                                                                            jQuery(elm).removeClass('jetpack-lazy-image');
                                                                            jQuery(elm).removeClass('jetpack-lazy-image--handled');
                                                                            jQuery(elm).removeClass('lazy-hidden');

                                                                        }
                                                                 }

                                                            }).promise().done( function(){ 

                                                                    jQuery(".vertical_thum_resp_slider").find('.bx-loading').remove();
                                                            } );

                                                    }


                                           }, 6000);

                                });
          </script>


<?php
} 
// register shortcode
add_shortcode('dolocal_vertical_slider', 'custom_vertical_slider'); 


/**
 * Show dates from the next day and onwards
 *
 * @link https://wpforms.com/developers/customize-the-date-time-field-date-options/
 */
function wpf_limit_date_picker() {
    ?>
    <script type="text/javascript">
        var d = new Date();
        window.wpforms_datepicker = {
            disableMobile: true,
            // Don't allow users to pick dates less than 1 days out
            minDate: d.setDate(d.getDate() + 7),
        }
    </script>
    <?php
}
add_action( 'wpforms_wp_footer_end', 'wpf_limit_date_picker', 10 );