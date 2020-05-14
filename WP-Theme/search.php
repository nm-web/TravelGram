<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package TravelGram
 */

get_header( 'search' );
?>


    <main class="center">

<?php if ( have_posts() ) : ?>

    <header class="page-header">
        <h1 class="page-title">
			<?php
			/* translators: %s: search query. */
			printf( esc_html__( 'Результаты поиска: %s', 'travelgram' ), '<span>' . get_search_query() . '</span>' );
			?>

        </h1>
    </header><!-- .page-header -->

	<?php
	/* Start the Loop */
	while ( have_posts() ) :
		the_post(); ?>
        <div class="body-page">
            <article class="post_collumn post box-style ">
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
                            <div><?php the_time( 'j F, Y' ) ?></div>
                            <i class="icon-heart-empty"><span>likes</span></i>
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

        </div>



        <?php
        endwhile;

        the_posts_navigation();

        else :

        get_template_part( 'template-parts/content', 'none' );

        endif;
        ?>

        </main><!-- #main -->


		<?php
//get_sidebar();
		get_footer();
