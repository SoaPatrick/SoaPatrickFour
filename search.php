<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package SoaPatrick_Four
 */

get_header(); ?>

    <div class="site-content blog-post-list">
	    <div class="container">
			<?php 
			if ( have_posts() ) : ?>
				<header class="page-header">
					<h1 class="page-title"><?php
						printf( esc_html__( 'Search Results for: %s', 'soapatrickfour' ), '<span>' . get_search_query() . '</span>' );
					?></h1>
				</header>
	
				<?php
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', get_post_format() );
				endwhile;
				the_posts_navigation();
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif; 
			?>
		</div>
	</div>

<?php
get_footer();