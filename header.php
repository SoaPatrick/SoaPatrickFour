<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SoaPatrick_Four
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<script>
		FontAwesomeConfig = { searchPseudoElements: true };
	</script>
	<?php wp_head(); ?>
</head>

<body id="top" <?php body_class(); ?>>
	<h1 class="hidden"><?php bloginfo('name'); ?></h1>
	<h2 class="hidden"><?php bloginfo('description'); ?></h2>
	
	<div id="search-collapse">
		<div class="container">
			<form class="search-form" action="<?php echo home_url( '/' ); ?>" method="get">
				<input type="text" name="s" id="search" value="<?php the_search_query(); ?>" placeholder="Find stuff..." />
			</form>			
		</div>
	</div>
	<nav class="dropdown-nav">
		<input type="checkbox" id="nav"/>
		<label for="nav" class="nav-open"><i></i><i></i><i></i></label>
		<div class="nav-container">				
			<?php
				// Primary navigation menu.
				wp_nav_menu( array(
					'menu_id'		 => '',
					'menu_class'     => '',
					'theme_location' => 'primary',
					'container'		 => '',
					'depth'			 => 1,
				) );
			?>
		</div><!-- .main-navigation -->		
	</nav>		
	<div class="wrapper">
	    <header class="site-header">
		    <div class="container container-nav">			    		    	    
				<?php
					// Primary navigation menu.
					wp_nav_menu( array(
						'menu_id'		 => '',
						'menu_class'     => 'horizontal-nav',
						'theme_location' => 'primary',
						'container'		 => '',
						'depth'			 => 1,
					) );
				?>
				<a href="#" id="toggle-search-collapse"><i class="far fa-search"></i></a>
		    </div>		    
		    <div class="container container-logo">			    
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"  class="logo">				
					<svg class="sp-logo version-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 277.6 308.2">
						<path class="letter-s" d="M40.1,263.2c-2.1,0-4.8-.1-5-.1-10.2-.5-18.4-2.8-24.4-6.9C3.7,251.4.2,243.5,0,231.9c-.1-7.8,1.5-17.6,4.8-29l5.7-19.8H52.3l-3.9,12.8c-1.4,5.4-2.1,9.3-2.1,12.2.1,6.1,3.5,9.6,9.3,9.6h.3a22.58,22.58,0,0,0,4.7-.5l.2-.1a15.57,15.57,0,0,0,6.8-4.6c2.8-3.4,5.3-8.5,7.6-15.8a55.67,55.67,0,0,0,2.2-14.6c0-7.5-1.8-14.1-5.4-19.4-3.4-5-7.1-10.1-11.2-15.1-2.6-3-5.2-6.3-7.8-9.7a63.23,63.23,0,0,1-6.7-11,65.57,65.57,0,0,1-4.8-13.1,63.82,63.82,0,0,1-1.9-16c0-9.5,1.9-20.6,5.6-33.2A171.38,171.38,0,0,1,57.1,34.9a71,71,0,0,1,15.5-20A57.13,57.13,0,0,1,93.3,3.6C101.2,1.2,110.5,0,121,0c14.2,0,24.9,2.5,32,7.4,6.9,4.8,10.3,12.8,10.3,24.5,0,7.8-1.8,17.5-5.2,28.9l-6,19.7H109.9l4.5-13.4c1.5-5.3,2.3-9.3,2.3-12.1,0-6.2-3.4-9.7-9.4-9.7a14.65,14.65,0,0,0-11.7,5.4c-2.9,3.4-5.2,8.6-7.2,16.1a47.6,47.6,0,0,0-1.5,6,30.76,30.76,0,0,0-.4,5.3,30.34,30.34,0,0,0,5,17.3,177.31,177.31,0,0,0,10.8,14.1c2.5,3,5.1,6.3,7.8,9.7a76,76,0,0,1,6.9,11.2,74.67,74.67,0,0,1,5.2,13.8,63,63,0,0,1,2.1,16.9,106.54,106.54,0,0,1-1.2,15.2,137.28,137.28,0,0,1-4,17.7,205.71,205.71,0,0,1-12.8,33.5,76,76,0,0,1-15.7,21.3A51.35,51.35,0,0,1,70,260.1a106.77,106.77,0,0,1-28.1,3.3A5.54,5.54,0,0,0,40.1,263.2Z"/>
						<path class="letter-p"  d="M102.3,308.1,178.7,54.3h54.4c15.9,0,27.6,2,34.6,6,6.7,3.8,9.9,10.7,9.9,21,0,8.3-1.9,18.5-5.6,30.4l-14.6,48.6c-3.5,11.4-7.3,21-11.4,28.5a55,55,0,0,1-14.4,17.5,51,51,0,0,1-19.8,9.2c-7.7,1.9-17.2,2.8-28.2,2.8H172.8l-27,89.9H102.3Zm96.1-135.4a15.84,15.84,0,0,0,6.9-1.5,14.81,14.81,0,0,0,5.9-5.6,60.63,60.63,0,0,0,5-10.2,160.58,160.58,0,0,0,5.4-16.5c2.6-8.2,4.5-15,5.7-20.1a57,57,0,0,0,1.8-11.9c0-3.4-1.1-5.5-3.2-6.4a16.93,16.93,0,0,0-6.2-.9l-11.7.1-20.4,67.9-1.5,5Z"/>						
					</svg>									
				</a>
		    </div>		    
	    </header>
	    