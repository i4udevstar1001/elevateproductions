<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package elevateproductions
 */

?>

	</div>	
	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<div class="container">
				<div class="footer-1 footer-item"><?php dynamic_sidebar('footer-1'); ?></div>
				<div class="footer-2 footer-item"><?php dynamic_sidebar('footer-2'); ?></div>
				<div class="footer-3 footer-item"><?php dynamic_sidebar('footer-3'); ?></div>
				<div class="footer-4 footer-item"><?php dynamic_sidebar('footer-4'); ?></div>
			</div>
		</div>
		<div class="copyright">
			<div class="container"><?php dynamic_sidebar('copyright'); ?></div>
		</div>
	</footer>
</div>
<span class="scroll-to-top"><i class="fa fa-chevron-up"></i></span>
<?php wp_footer(); ?>
</body>
</html>
