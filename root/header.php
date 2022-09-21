<?php

/**

 * The header for our theme.

 *

 * Displays all of the <head> section and everything up till <div id="content">

 *

 * @package storefront

 */



?><!doctype html>

<html <?php language_attributes(); ?>>

<head>

<meta charset="<?php bloginfo( 'charset' ); ?>">

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="profile" href="http://gmpg.org/xfn/11">

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">



<?php wp_head(); ?>

</head>



<body <?php body_class(); ?>>



<?php wp_body_open(); ?>



<?php do_action( 'storefront_before_site' ); ?>



<div id="page" class="hfeed site">

	<?php do_action( 'storefront_before_header' ); ?>



	<header id="masthead" class="site-header" role="banner" style="<?php storefront_header_styles(); ?>">



		<?php

		/**

		 * Functions hooked into storefront_header action

		 *

		 * @hooked storefront_header_container                 - 0

		 * @hooked storefront_skip_links                       - 5

		 * @hooked storefront_social_icons                     - 10

		 * @hooked storefront_site_branding                    - 20

		 * @hooked storefront_secondary_navigation             - 30

		 * @hooked storefront_product_search                   - 40

		 * @hooked storefront_header_container_close           - 41

		 * @hooked storefront_primary_navigation_wrapper       - 42

		 * @hooked storefront_primary_navigation               - 50

		 * @hooked storefront_header_cart                      - 60

		 * @hooked storefront_primary_navigation_wrapper_close - 68

		 */

		do_action( 'storefront_header' );

		?>



	</header><!-- #masthead -->



	<?php

	/**

	 * Functions hooked in to storefront_before_content

	 *

	 * @hooked storefront_header_widget_region - 10

	 * @hooked woocommerce_breadcrumb - 10

	 */

	//do_action( 'storefront_before_content' );

	?>

	<?php 

	if(!is_front_page()) { ?>



	<?php

		global $wp;

		$actual_link = "$_SERVER[REQUEST_URI]";

		

	?>

			

		<?php if($actual_link == "/listing?w2dc_action=search&field_host_categories%5B%5D=1" || 

				 $actual_link == "/listing?w2dc_action=search&field_host_categories%5B%5D=2" || 

				 $actual_link == "/listing?w2dc_action=search&field_host_categories%5B%5D=3" || 

				 $actual_link == "/listing?w2dc_action=search&field_host_categories%5B%5D=4" ): ?>

		<?php endif;?>

	<div class="col-fulll" style="margin-top: -30px;">

	<div class="main-host">



	

	<ul class="host-set">

		

	

		

			<li><h3 style="text-align: center;"><a href="/listing?w2dc_action=search&amp;field_host_categories%5B%5D=1"><img loading="lazy" class="<?php if($actual_link == '/listing?w2dc_action=search&field_host_categories%5B%5D=1'){ echo 'grayscale'; }else{ echo 'non-active';} ?> aligncenter wp-image-257 size-full" src="https://woovve.com/wp-content/uploads/2021/03/organic.png" alt="" width="100" height="100"></a><a href="/listing?w2dc_action=search&amp;field_host_categories%5B%5D=1">Organic</a></h3></li>



		

	



			<li><h3 style="text-align: center;"><a href="/listing?w2dc_action=search&amp;field_host_categories%5B%5D=3"><img loading="lazy" class="<?php if($actual_link == '/listing?w2dc_action=search&field_host_categories%5B%5D=3'){ echo 'grayscale'; } else{ echo 'non-active';} ?> aligncenter wp-image-261 size-full" src="https://woovve.com/wp-content/uploads/2021/05/vegan-icon.png" alt="" width="100" height="100"></a><a href="/listing?w2dc_action=search&amp;field_host_categories%5B%5D=3">Vegetarian</a></h3></li>





			<li><h3 style="text-align: center;"><a href="/listing?w2dc_action=search&amp;field_host_categories%5B%5D=2"><img loading="lazy" class="<?php if($actual_link == '/listing?w2dc_action=search&field_host_categories%5B%5D=2'){ echo 'grayscale'; } else{ echo 'non-active';} ?> aligncenter wp-image-260 size-full" src="https://woovve.com/wp-content/uploads/2021/03/vegan.png" alt="" width="100" height="100"></a><a href="/listing?w2dc_action=search&amp;field_host_categories%5B%5D=2">Vegan</a></h3></li>



		







	





			<li><h3 style="text-align: center;"><a href="/listing?w2dc_action=search&amp;field_host_categories%5B%5D=4"><img loading="lazy" class="<?php if($actual_link == '/listing?w2dc_action=search&field_host_categories%5B%5D=4'){ echo 'grayscale'; } else{ echo 'non-active';} ?> aligncenter wp-image-327 size-full" src="https://woovve.com/wp-content/uploads/2021/05/eco-icon.png" alt="" width="100" height="100"></a><a href="/listing?w2dc_action=search&amp;field_host_categories%5B%5D=4">Eco</a></h3></li>



	





			<li><h3 style="text-align: center;"><a href="/listing"><img loading="lazy" class="<?php if($actual_link == '/listing'){ echo 'grayscale'; } else{ echo 'non-active';} ?> aligncenter wp-image-264 size-full" src="https://woovve.com/wp-content/uploads/2021/03/all.png" alt="" width="100" height="100"></a><a href="/listing">All</a></h3></li>



	</ul>



</div>

</div>

	<?php } ?>



	<div id="content" class="site-content" tabindex="-1">

		<div class="col-full">



		<?php

		do_action( 'storefront_content_top' );

