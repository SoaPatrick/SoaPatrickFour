<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package SoaPatrick_Four
 */

get_header(); ?>

    <div class="site-content blog-post-list">
	    <div class="container">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'soapatrickfour' ); ?></h1>
			</header>

			<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'soapatrickfour' ); ?></p>
			<?php get_search_form(); ?>
		</div>
	</div>
<?php
get_footer();