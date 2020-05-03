<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TravelGram
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


    <header class="header">

            <div class="underline row-between content_center">
	            <?php get_search_form(); ?>
	            <?php the_custom_logo( );?>
                <a class="btn-subcribe">подписаться</a>
            </div>

        <section class="row-menu row-between content_center">
	        <?php
	        wp_nav_menu( array(
		        'theme_location'  => 'menuTop',
		        'container_class' => 'menu',
		        'container'       => 'nav',
		        'menu_class'      => 'menu-top',
		        'depth'           => 2,
	        ) );

	        ?>
            <div class="icon-menu menu-toggle"></div>
            <ul class="menu-social">
                <li><a href="<?php the_field( "facebook", 61 ); ?>" class="icon-facebook"></a></li>
                <li><a href="<?php the_field( "twitter", 61 ); ?>" class="icon-twitter"></a></li>
                <li><a href="#" class="icon-linkedin"></a></li>
                <li><a href="<?php the_field( "instagram", 61 ); ?>" class="icon-instagram"></a></li>
                <li><a href="<?php the_field( "youtube", 61 ); ?>" class="icon-youtube-play"></a></li>
            </ul>
        </section>


    </header>

