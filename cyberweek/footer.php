<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CyberWeek
 */

?>

<footer class="footer">
    <div class="footer__container">
        <nav class="footer__nav nav-footer">
			<?php wp_nav_menu( [
				'theme_location'  => 'footer_upper',
				'container'       => null,
				'menu_class'    => 'nav-footer__upper-list'
			] );?>
			<?php wp_nav_menu( [
				'theme_location'  => 'footer_lower',
				'container'       => null,
				'menu_class'    => 'nav-footer__lower-list'
			] );?>
			<?php wp_nav_menu( [
				'theme_location'  => 'socials',
				'container'       => null,
				'menu_class'    => 'footer__social'
			] );?>
        </nav>
        <div class="footer__created">
            <span>Created by:</span><a href="mailto: yahorlukyanchyk@gmail.com">Yahor Lukyanchyk</a>
            <span>Designed by:</span><a href="https://www.linkedin.com/in/artur-chernetski/" target="_blank">Artur
                Chernetski</a>
        </div>
        <div class="copyright__block">
            <span>Copyright © <?php bloginfo( 'name' ); ?> 2022. Все права защищены.</span>
            <div class="footer__logo">
			<?php echo get_custom_logo(); ?>
			</div>
        </div>
    </div>
</footer>
</div>
</body>
<?php wp_footer(); ?>

</html>