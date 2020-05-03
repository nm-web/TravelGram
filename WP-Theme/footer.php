<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TravelGram
 */

?>

<div id="back-top"  >
    <i class="icon-up-open-big"></i>
</div>
<footer>
    <ul class="menu-social">
        <li><a href="<?php the_field( "facebook", 61 ); ?>" class="icon-facebook">facebook</a></li>
        <li><a href="<?php the_field( "twitter", 61 ); ?>" class="icon-twitter">twitter</a></li>
        <li><a href="#" class="icon-linkedin">linkedin</a></li>
        <li><a href="<?php the_field( "instagram", 61 ); ?>" class="icon-instagram">instagram</a></li>
        <li><a href="<?php the_field( "youtube", 61 ); ?>" class="icon-youtube-play">youtube</a></li>
    </ul>

    <div class="footer">
        <a href="<?php  echo home_url(); ?>"><img src="<?php bloginfo( 'template_url' ); ?>/assets/image/logofooner.png" alt=""></a>

	        <?php
	        wp_nav_menu( array(
		        'theme_location'  => 'menuTop',
		        'container_class' => 'menu',
		        'container'       => 'nav',
		        'menu_class'      => 'menu-footer',

	        ) );
	        ?>


    </div>
    <div class="sub-footer">TravelGram   Designed  By  Navin Chandra Gup</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
