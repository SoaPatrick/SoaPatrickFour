<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SoaPatrick_Four
 */

get_header(); ?>

    <div class="site-content blog-post-archive-list">
	    <div class="container">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>/storage/"><i class="fal fa-archive"></i> Storage:</a> <span class="no-wrap"><?php the_archive_title();?></span></h1>
			</header>

			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', get_post_format() );
			endwhile;

			the_posts_navigation();

		else :
			get_template_part( 'template-parts/content', 'none' );
		endif; ?>

		</div>
	</div>

<?php
get_footer();
