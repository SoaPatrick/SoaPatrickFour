<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package SoaPatrick_Four
 */
 
 get_header(); ?>
    <div class="site-content blog-post-single">
	    <div class="container">				
			<?php
			while ( have_posts() ) : the_post();				
				get_template_part( 'template-parts/content', 'single' ); ?>
		    	<nav class="nav-blog-post-links">
			    	<div class="prev-blog-post">
						<?php previous_post_link( '<span class="blog-post-nav-description">previous</span><p>%link</p>', shorten_next_prev_title( 'prev', 50 )  );?>
			    	</div>
			    	<div class="next-blog-post">
						<?php next_post_link( '<span class="blog-post-nav-description">next</span><p>%link</p>', shorten_next_prev_title( 'next', 50 )  );?>	    				    	
			    	</div>
		    	</nav>	
			<?php endwhile; ?>
		</div>
	</div>
<?php
get_footer();