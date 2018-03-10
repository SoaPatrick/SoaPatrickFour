<?php
/*
Template Name: Tags Page
*/

get_header(); ?>

    <div class="site-content tags-archive-list">
	    <div class="container">	
			<?php the_widget( 'WP_Widget_Tag_Cloud', '', 'before_title=<header class="page-header"><h1 class="page-title"><i class="fal fa-tags"></i> &after_title=</h1></header>' ); ?>
		</div>
	</div>

<?php get_footer();