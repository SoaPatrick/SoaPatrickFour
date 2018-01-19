<?php
/*
Template Name: Tags Page
*/

get_header(); ?>

	<div id="primary" class="content-area row">
		<main id="main" class="site-main col-xs-12" role="main">		
			<?php the_widget( 'WP_Widget_Tag_Cloud', '', 'before_title=<header class="page-header"><h1 class="page-title">&after_title=</h1></header>' ); ?>
		</main>
	</div>

<?php get_footer();