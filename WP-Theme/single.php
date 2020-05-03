<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package TravelGram
 */
get_header( 'search' );
?>
    <div class="body-page ">
		<?php get_sidebar(); ?>
        <main class="content">

            <article class="post_collumn post box-style">
                <section class="photo-full">
                    <a href="<?php the_permalink(); ?>"><?php echo the_post_thumbnail( 'medium' ); ?></a>
                </section>
                <section class="text">
                    <div class="cat-name">
						<?php the_category( $separator = '  /  ' ); ?>
                    </div>

                    <h3> <?php the_title(); ?></h3>
					<?php the_content(); ?>


                    <div class="post__footer">

                        <div class="date-comment">
                            <time><?php the_time( 'j F, Y' ) ?></time>
                            <i class="icon-heart-empty like"><?php
                                echo do_shortcode( '[wp_ulike]' );
                                ?><span>likes</span></i>
                            <i class="icon-comment-empty"><span><?php comments_number( 0, '1', '% ' ); ?></span></i>
                        </div>
                        <ul class="post__menu-social">
                            <li>share</li>
                            <li><a href="#" class="icon-facebook"></a></li>
                            <li><a href="#" class="icon-twitter"></a></li>
                            <li><a href="#" class="icon-instagram"></a></li>
                        </ul>
                    </div>
                    <div class="comment-box">
						<?php comments_template(); ?>
                    </div>
                </section>
            </article>


        </main>
    </div>

<?php

get_footer();
