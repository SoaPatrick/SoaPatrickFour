<?php
/**
Template Name: Archives Facrtory Items
 */

get_header(); ?>

    <div class="site-content factory-list">
	    <div class="container">
		    
		<?php
		$args = array(
			'post_type' => 'factory',
			'posts_per_page' => 200,
		);	
			
		$cat_posts = new WP_Query( $args );
		if ( $cat_posts->have_posts() ) : ?>	
		
			<header class="page-header">
				<h1 class="page-title">Factory</h1>
			</header>			

			<div class="flex-container">
				<?php 
				while ( $cat_posts->have_posts() ) : $cat_posts->the_post();	
					get_template_part( 'template-parts/content-factory', get_post_format() );
				endwhile; ?>
			</div>
		<?php else :
			get_template_part( 'template-parts/content', 'none' );
		endif; ?>
		
		</div>
	</div>

<?php
get_footer();