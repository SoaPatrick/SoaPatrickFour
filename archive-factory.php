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
			'posts_per_page' => 12,
			'paged' => $paged, 
		);	

		$wp_query   = new WP_Query( $args );	
		
		if ( have_posts() ) : ?>	
		
			<header class="page-header">
				<h1 class="page-title"><i class="fal fa-industry-alt"></i> Factory</h1>
			</header>			

			<div class="flex-container">
				<?php 
				while ( have_posts() ) : the_post();	
					get_template_part( 'template-parts/content-factory', get_post_format() );
				endwhile; ?>
			</div>
			
			<?php the_posts_navigation();			
				
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif; ?>
		
		</div>
	</div>

<?php
get_footer();