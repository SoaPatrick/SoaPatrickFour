<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SoaPatrick_Four
 */

?>

<?php
	$classes = array(
		'blog-post',
	);
	
	if (has_post_format('quote')) :	
		array_push($classes, 'blog-post-bg-color', 'blog-post-quote', get_field('background_color')	);
	elseif (has_post_format('link')) :		
		array_push($classes, 'blog-post-bg-color', 'blog-post-link', get_field('background_color')	);	
	elseif (has_post_format('status')) :		
		array_push($classes, 'blog-post-bg-color', 'blog-post-status', get_field('background_color') );	
	endif	
		
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $classes ); ?>>
	<header class="blog-post-header">
		<figure class="blog-post-featured-image">
			<div class="feature-image-wrapper">
				<?php if( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail( 'list-featured-image', array( 'class'  => 'feature-image' ) ); ?>
				<?php else : ?>	
					<div class="feature-image empty">
						<?php if (has_post_format('quote')) :?>
							<i class="fal fa-quote-right"></i>							
						<?php elseif (has_post_format('link')) :?>
							<i class="fal fa-link"></i>		
						<?php else : ?>
					    	<?php if (get_field( "font-awesome_icon" )) : ?>
							    <i class="<?php echo get_field( "font-awesome_icon" ) ?>"></i>
							<?php else : ?>
								<i class="fal fa-newspaper"></i>		
							<?php endif; ?>												        
						<?php endif; ?>						
					</div>											
				<?php endif; ?>									
			</div>
		</figure>
	</header>		
	<div class="blog-post-wrapper">
		<?php if (has_post_format('quote') || has_post_format('link') || has_post_format('status')) :
			the_title( '<h1 class="blog-post-title hidden"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
		else: 
			the_title( '<h1 class="blog-post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
		endif; ?>
		
		<div class="blog-post-content">
			<div class="blog-post-excerpt">
				<?php if (has_post_format('quote')) :
			    	the_title( '<p class="quote">', '</p>' ); ?>
					<p class="quote-author">
						<?php echo get_post_meta($post->ID, '_format_quote_source_name', true); ?>
					</p>						
				<?php elseif (has_post_format('link')) :
					the_title( '<p>', '</p>' );
					$link_url = get_post_meta($post->ID, '_format_link_url', true);
					echo '<p><a href="'.$link_url.'" class="link" target="_blank">' .$link_url. '</a></p>';	
				elseif (has_post_format('status')) :
					the_content();
				else: 
			        the_excerpt();
			        echo '<a href="' . esc_url( get_the_permalink() ) . '" class="read-more-link">Read More...</a>';
				endif; ?>				
			</div>
			<div class="blog-post-stats">
				<?php soapatrickfour_posted_on(); ?>
				<?php the_tags('<ul class="article-post-tags"><li><i class="fal fa-tag fa-fw"></i>','</li><li><i class="fal fa-tag fa-fw"></i>','</li></ul>'); ?>
			</div>
		</div>
	</div>																		
</article>
