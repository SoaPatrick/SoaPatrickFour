<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SoaPatrick_Four
 */

?>
		<?php if ( is_home() && !is_paged() ) : ?>
		    <div class="site-content svg-divider white-brightblue">
				<svg class="circle-down" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 100 100" preserveAspectRatio="none">
				    <path d="M0 0 C40 100 60 100 100 0 Z" />
				</svg>			    
		    </div>	
			<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
			<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>							
		    <div class="site-content instagram-feed">
			    <div class="container">
				    <h1><i class="fab fa-instagram fa-fw"></i>Instagram Feed</h1>
					<p class="lead">If you have the time and feel like it, why don't you <a href="https://www.instagram.com/SoaPatrick/" target="_blank">follow me</a> on Instagram?</p>
					<?php simple_instagram(20); ?>
			    </div>
		    </div>
			<script>var flkty=new Flickity(".main-carousel",{setGallerySize:!0,pageDots:!1,resize:!0,groupCells:1});					
			</script>			    
		    <div class="site-content svg-divider brightblue-darkblue">
				<svg class="circle-down" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 100 100" preserveAspectRatio="none">
				    <path d="M0 0 C40 100 60 100 100 0 Z" />
				</svg>			    
		    </div>		    
	    <?php else: ?>
		    <div class="site-content svg-divider white-darkblue">
				<svg class="circle-down" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 100 100" preserveAspectRatio="none">
				    <path d="M0 0 C40 100 60 100 100 0 Z" />
				</svg>			    
		    </div>	    
		<?php endif; ?>		    
	    <footer class="site-footer">
		    <div class="container">
				<p>Stuff from 2000 to <?php echo date('Y'); ?> by SoaPatrick / Four</p>			    
		    </div>
			<div class="back-to-top-wrapper" id="back_top">
				<a id="scroll-to-top" title="Back to top">
					<svg viewBox="0 0 100 100">
						<path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" class="arrow" transform="translate(100, 5) rotate(90) "></path>
					</svg>								
				</a>
			</div>		    	    
	    </footer>
	</div>

<?php wp_footer(); ?>

</body>
</html>