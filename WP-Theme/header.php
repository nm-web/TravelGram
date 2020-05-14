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
    <meta name="author" content="Natalya Motovilova">
    <meta name="description" content="Адаптивная верстка,перенос на Wordpress">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700%7CPompiere%7CWork+Sans&display=swap"
          rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'travelgram' ); ?></a>

    <header class="header">

        <div class="row-between content_center header-top">
			<?php get_search_form(); ?>
			<?php the_custom_logo(); ?>
            <a class="btn-subcribe">SubScribe</a>
        </div>
        <div class="underline"></div>
        <section class="row-menu row-between content_center">

			<?php
			wp_nav_menu( array(
				'theme_location'  => 'menuTop',
				'container_class' => 'menu',
				'container'       => 'nav',
				'menu_class'      => 'menu-top',

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
        <div class="slider">
			<?php

                $args = array(
                    'numberposts' => 4,
                    'category'    => 3,
                    'post_status' => 'publish',
                );

                $result = wp_get_recent_posts($args);


                list($image,$title,$content,$url) = slider_content($result[0]);



			?>


            <div class="slider-box"

                 style="background-image: linear-gradient(-115deg, transparent 63%, rgba(0,0,0,0.6)  0), url('<?php echo $image; ?>');">
                <section class="slider-box__title wow fadeInLeft " data-wow-delay="0.5s">
                    <h3><?php the_field( "header", 61 ); ?></h3>
                    <p><?php the_field( "quotes", 61 ); ?></p>
                </section>

                <section class="slider-box__text">
                    <p class="subtitle"><?php echo get_cat_name(3);?></p>
                    <h1><a href="<?php echo $url; ?>"><?php echo $title; ?></a></h1>
	                <?php echo '<p>'.$content.'</p>'; ?>
                    <a href="<?php echo $url; ?>" class="btn_slider">EXPLORE NOW</a>
                </section>

            </div>

            <?php list($image_url,$title,$content,$url) = slider_content($result[1]); ?>
            <div class="slider-box"
                 style="background-image: linear-gradient(-115deg, transparent 63%, rgba(0,0,0,0.6)  0), url('<?php echo $image; ?>');">
                <section class="slider-box__title ">
                    <h2><?php the_field( "header2", 61 ); ?></h2>
                    <p><?php the_field( "quotes2", 61 ); ?></p>
                </section>

                <section class="slider-box__text">
                    <p class="subtitle"><?php echo get_cat_name(3);?></p>
                    <h3><a href="<?php echo $url; ?>"><?php echo $title; ?></a></h3>
	                <?php echo '<p>'.$content.'</p>'; ?>
                    <a href="<?php echo $url; ?>" class="btn_slider">EXPLORE NOW</a>
                </section>
            </div>

	        <?php list($image,$title,$content,$url) = slider_content($result[2]); ?>
            <div class="slider-box"
                 style="background-image:  linear-gradient(-115deg, transparent 63%, rgba(0,0,0,0.6)  0), url('<?php echo $image; ?>');">
                <section class="slider-box__title ">
                    <h2><?php the_field( "header3", 61 ); ?></h2>
                    <p><?php the_field( "quote3", 61 ); ?></p>
                </section>

                <section class="slider-box__text">
                    <p class="subtitle"><?php echo get_cat_name(3);?></p>
                    <h3><a href="<?php echo $url; ?>"><?php echo $title; ?></a></h3>
	                <?php echo '<p>'.$content.'</p>'; ?>
                    <a href="<?php echo $url; ?>" class="btn_slider">EXPLORE NOW</a>
                </section>
            </div>

	        <?php list($image,$title,$content,$url) = slider_content($result[3]); ?>
            <div class="slider-box"
                 style="background-image: linear-gradient(-115deg, transparent 63%, rgba(0,0,0,0.6)  0), url('<?php echo $image; ?>');">

                <section class="slider-box__title ">
                    <h2><?php the_field( "header4", 61 ); ?></h2>
                    <p><?php the_field( "quote4", 61 ); ?></p>
                </section>

                <section class="slider-box__text">
                    <p class="subtitle"><?php echo get_cat_name(3);?></p>
                    <h3><a href="<?php echo $url; ?>"><?php echo $title; ?></a></h3>
	                <?php echo '<p>'.$content.'</p>'; ?>
                    <a href="<?php echo $url; ?>" class="btn_slider">EXPLORE NOW</a>
                </section>

            </div>
        </div>
<?php wp_reset_postdata();?>
    </header>

