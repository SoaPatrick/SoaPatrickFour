<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SoaPatrick_Four
 */

get_header(); ?>
    <div class="site-content blog-post-list">
	    <div class="container">
			<?php
			if ( have_posts() ) : 
				$postCount = 1;
				
				while ( have_posts() ) : 
					the_post(); 
					$postCount++;
					
					if ( $postCount == 2  && is_home() && !is_paged() ) :
						get_template_part( 'template-parts/content', 'single' );
					else :
						get_template_part( 'template-parts/content', get_post_format() );
					endif; 				
				endwhile;
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif; 
			the_posts_navigation(); 
			?>			    	
		</div>
	</div>
<?php
get_footer();