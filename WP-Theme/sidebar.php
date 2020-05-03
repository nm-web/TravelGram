<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TravelGram
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

    <aside class="sidebar wow fadeInLeft" data-wow-delay="0.5s">
        <section class="widget_map widget box-style" >
			<?php
			$post_id = get_post( 123 );
			$title   = $post_id->post_title;
			$content = $post_id->post_content;
			?>
            <h3 class="widget-title"><?php echo $title; ?></h3>
			<?php echo $content; ?>
        </section>
        <section class="widget_about widget box-style">
			<?php
                $post_id = get_post( 126 );
                $title   = $post_id->post_title;
                $content = $post_id->post_content;
                $image   = get_the_post_thumbnail( 126 );
			?>
            <h3 class="widget-title"><?php echo $title; ?></h3>
			<?php echo $content; ?>
            <div><strong>Follow Me</strong>
                <ul class="menu-social">
                    <li><a href="<?php the_field( "facebook", 61 ); ?>" class="icon-facebook"></a></li>
                    <li><a href="<?php the_field( "twitter", 61 ); ?>" class="icon-twitter"></a></li>
                    <li><a href="#" class="icon-linkedin"></a></li>
                    <li><a href="<?php the_field( "instagram", 61 ); ?>" class="icon-instagram"></a></li>
                    <li><a href="<?php the_field( "youtube", 61 ); ?>" class="icon-youtube-play"></a></li>
                </ul>
            </div>
			<?php echo $image; ?>
        </section>
		<?php
            $post_id = get_post( 129 );
            $title   = $post_id->post_title;
            $content = $post_id->post_content;

		?>
        <section class="widget newsletter box-style" >
            <h4 class="widget-title"><?php echo $title; ?></h4>
	        <?php echo do_shortcode('[contact-form-7 id="153" title="newsletter"]') ;?>
	        <?php echo $content; ?>
        </section>

		<?php dynamic_sidebar( 'sidebar-1' ); ?>

        <section class="widget_posts widget box-style " >
            <h4 class="widget-title">Recent Post</h4>
        <?php
        // параметры по умолчанию
        $posts = get_posts( array(
	        'numberposts' => 5,
	        'category'    => -3,
	        'orderby'     => 'date',
	        'order'       => 'DESC',
	        'include'     => array(),
	        'exclude'     => array(),
	        'meta_key'    => '',
	        'meta_value'  =>'',
	        'post_type'   => 'post',
	        'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
        ) );

        foreach( $posts as $post ){
	        setup_postdata($post);?>

            <div class="row">
                <div class="col-1">

	                <?php if ( has_post_thumbnail()) { ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
			                <?php the_post_thumbnail('verysmall'); ?>
                        </a>
	                <?php } ?>
                </div>
                <div class="col-2">
                    <a href="<?php the_permalink();?>"><h5><?php the_title();?></h5></a>
                    <time class="date_color"><?php the_time( 'j F, Y' ) ?></time>
                </div>

            </div>
            <?php
        };

            wp_reset_postdata(); // сброс
            ?>
        </section>

        <section class="widget_tags widget box-style">
            <h4 class="widget-title">tags</h4>

        <?php
        $tags = get_tags( [
	        'number'       => 10,
	        'offset'       => 0,
	        'orderby'      => 'id',
	        'order'        => 'ASC',
	        'hide_empty'   => true,
	        'fields'       => 'all',
	        'slug'         => '',
	        'hierarchical' => true,
	        'name__like'   => '',
	        'pad_counts'   => false,
	        'get'          => '',
	        'child_of'     => 0,
	        'parent'       => '',
        ] );

//        $tags = get_tags();

            $html = '<div class="row">';

            foreach ( $tags as $tag ) {
            $tag_link = get_tag_link( $tag->term_id );

            $html .= " <span class=\"tags-col-1\"> <a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>";
                $html .= "{$tag->name}</a> </span>";
            }

            $html .= '</div>';
        wp_reset_postdata();
        echo $html;
        ?>



<!--            </div>-->
        </section>

	    <?php
	    $post_id = get_post( 54 );
	    $title   = $post_id->post_title;


	    ?>
        <section class="widget_contacts box-style" >
            <h3><?php echo $title;?></h3>
	        <?php echo do_shortcode('[contact-form-7 id="159" title="contact"]') ;?>
        </section>
    </aside><!-- #secondary -->


