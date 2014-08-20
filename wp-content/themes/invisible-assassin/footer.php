<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Invisible Assassin
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info col-md-4">
			<?php printf( __( 'Powered by %1$s.', 'invisible-assassin' ), '<a href="http://rohitink.com" rel="designer">Invisible Assassin</a>' ); ?>
		</div><!-- .site-info -->
		<div class="footer-menu col-md-8">
			<?php wp_nav_menu('footer'); ?>
		</div>	
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>