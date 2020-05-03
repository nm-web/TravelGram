<?php
/*Template Name:home
 */

get_header();
?>

    <div class="body-page ">
		<?php get_sidebar(); ?>
        <main class="content">
			<?php

			$custom_query_args =  array(
				'numberposts'      => '',
				'cat'         => -3,
				'orderby'          => 'date',
				'order'            => 'DESC',
				'include'          => array(),
				'exclude'          => array(),
				'meta_key'         => '',
				'meta_value'       => '',
				'posts_per_page' => 5,
				'paged' => get_query_var('paged') ?: 1,
				'post_type'        => 'post',
				'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
			 );

            $custom_query = new WP_Query( $custom_query_args );

            function textPost() {
                ?>
                <section class="text">
                    <span class="tag"><?php the_category( ' / ' ); ?></span>
                    <a href="<?php the_permalink(); ?>"><h3
                                class="head-underline"><?php the_title(); ?></h3>
                    </a>
                    <?php the_excerpt(); ?>
                    <div class="post__footer">
                        <a href="<?php the_permalink(); ?>" class="btn_readmore">readmore</a>
                        <ul class="post__menu-social">
                            <li>share</li>
                            <li><a href="<?php the_field( "facebook", 61 ); ?>" class="icon-facebook"></a>
                            </li>
                            <li><a href="<?php the_field( "twitter", 61 ); ?>" class="icon-twitter"></a>
                            </li>
                            <li><a href="<?php the_field( "instagram", 61 ); ?>" class="icon-instagram"></a>
                            </li>
                        </ul>
                    </div>
                </section>
             <?php
            }

            function postPhoto() {  ?>
               <section class="photo-post">
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'small' ); ?></a>
            <div class="photo_top">
                <a href="<?php the_permalink(); ?>" class="btn_readmore">readmore</a>
                <div class="date-comment">
                    <time><?php the_time( 'j F, Y' ) ?></time>
                    <i class="icon-heart-empty"></i>
                    <i class="icon-comment-empty"><?php comments_number( 0, '1', '% ' ); ?></i>
                </div>
            </div>
            </section>
            <?php
            }

            if ( $custom_query->have_posts() ) {
				while ( $custom_query->have_posts() ) {
					$custom_query->the_post();

					if ( in_category( 4 ) ) { ?>
                        <article class="post box-style_article">
                            <?php
                            textPost();
                            postPhoto();
                            ?>
                        </article>
						<?php
					} else if ( in_category( 12 ) ) { ?>
                        <article class="post box-style_article">
                            <?php
                            postPhoto();
                            textPost();
                            ?>
                        </article>

						<?php

					} else if ( in_category( 6 ) ) { ?>
                        <article class="post box-style">

                            <div class="col-half">
                                <section class="photo-post">
                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'small' ); ?></a>

                                    <div class="photo_top">
                                        <a href="<?php the_permalink(); ?>" class="btn_readmore">readmore</a>
                                        <div class="date-comment">
                                            <time><?php the_time( 'j F, Y' ) ?></time>
                                            <i class="icon-heart-empty like"><?php
												echo do_shortcode( '[wp_ulike]' );
												?><span>likes</span></i>
                                            <i class="icon-comment-empty"><span><?php comments_number( 0, '1', '% ' ); ?></span></i>
                                        </div>
                                    </div>
                                </section>

                                <section class="text">
                                    <span class="tag"><?php the_category( ' / ' ); ?></span>
                                    <a href="<?php the_permalink(); ?>"><h3> <?php the_title(); ?></h3></a>
                                    <div class="date-comment">
                                        <time><?php the_time( 'j F, Y' ) ?></time>
                                        <i class="icon-heart-empty like"><?php
											echo do_shortcode( '[wp_ulike]' );
											?><span>likes</span></i>
                                        <i class="icon-comment-empty"><span><?php comments_number( 0, '1', '% ' ); ?></span></i>
                                    </div>
                                    <div class="post__footer">
                                        <a href="<?php the_permalink(); ?>" class="btn_readmore">readmore</a>
                                        <ul class="post__menu-social">
                                            <li>share</li>
                                            <li><a href="<?php the_field( "facebook", 61 ); ?>"
                                                   class="icon-facebook"></a>
                                            </li>
                                            <li><a href="<?php the_field( "twitter", 61 ); ?>" class="icon-twitter"></a>
                                            </li>
                                            <li><a href="<?php the_field( "instagram", 61 ); ?>"
                                                   class="icon-instagram"></a>
                                            </li>
                                        </ul>
                                    </div>
                                </section>
                            </div>
                            <div class="col-half">
                                <section class="photo-post">
                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'small' ); ?></a>

                                    <div class="photo_top">
                                        <a href="<?php the_permalink(); ?>" class="btn_readmore">readmore</a>
                                        <div class="date-comment">
                                            <time><?php the_time( 'j F, Y' ) ?></time>
                                            <i class="icon-heart-empty like"><?php
                                                echo do_shortcode( '[wp_ulike]' );
                                                ?><span>likes</span></i>
                                            <i class="icon-comment-empty"><span><?php comments_number( 0, '1', '% ' ); ?></span></i>
                                        </div>
                                    </div>
                                </section>

                                <section class="text">
                                    <span class="tag"><?php the_category( ' / ' ); ?></span>
                                    <a href="<?php the_permalink(); ?>"><h3> <?php the_title(); ?></h3></a>
                                    <div class="date-comment">
                                        <time><?php the_time( 'j F, Y' ) ?></time>
                                        <i class="icon-heart-empty like"><?php
                                            echo do_shortcode( '[wp_ulike]' );
                                            ?><span>likes</span></i>
                                        <i class="icon-comment-empty"><span><?php comments_number( 0, '1', '% ' ); ?></span></i>
                                    </div>
                                    <div class="post__footer">
                                        <a href="<?php the_permalink(); ?>" class="btn_readmore">readmore</a>
                                        <ul class="post__menu-social">
                                            <li>share</li>
                                            <li><a href="<?php the_field( "facebook", 61 ); ?>"
                                                   class="icon-facebook"></a>
                                            </li>
                                            <li><a href="<?php the_field( "twitter", 61 ); ?>" class="icon-twitter"></a>
                                            </li>
                                            <li><a href="<?php the_field( "instagram", 61 ); ?>"
                                                   class="icon-instagram"></a>
                                            </li>
                                        </ul>
                                    </div>
                                </section>
                            </div>

                        </article>


						<?php
					} else { ?>
                        <article class="post_collumn post box-style">
                            <section class="photo-full photo-post">
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium' ); ?></a>
                                <div class="photo_top">
                                    <a href="<?php the_permalink(); ?>" class="btn_readmore">readmore</a>
                                    <div class="date-comment">
                                        <time><?php the_time( 'j F, Y' ) ?></time>
                                        <i class="icon-heart-empty like"><?php
                                            echo do_shortcode( '[wp_ulike]' );
                                            ?><span>likes</span></i>
                                        <i class="icon-comment-empty"><span><?php comments_number( 0, '1', '% ' ); ?></span></i>
                                    </div>
                                </div>
                            </section>
                            <section class="text">
                                <span class="tag"><?php the_category( ' / ' ); ?></span>
                                <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3>
                                </a>
                                <div class="date-comment">
                                    <time><?php the_time( 'j F, Y' ) ?></time>
                                    <i class="icon-heart-empty like"><?php
                                        echo do_shortcode( '[wp_ulike]' );
                                        ?><span>likes</span></i>
                                    <i class="icon-comment-empty"><span><?php comments_number( 0, '1', '% ' ); ?></span></i>
                                </div>

                                <div class="post__footer">
                                    <a href="<?php the_permalink(); ?>" class="btn_readmore">readmore</a>
                                    <ul class="post__menu-social">
                                        <li>share</li>
                                        <li><a href="<?php the_field( "facebook", 61 ); ?>" class="icon-facebook"></a>
                                        </li>
                                        <li><a href="<?php the_field( "twitter", 61 ); ?>" class="icon-twitter"></a>
                                        </li>
                                        <li><a href="<?php the_field( "instagram", 61 ); ?>" class="icon-instagram"></a>
                                        </li>
                                    </ul>
                                </div>
                            </section>
                        </article>
						<?php

					};
				};
				?>
                <div class="pagination">
	              <?php my_pagenavi(); ?>
                </div>
			<?php	wp_reset_query();wp_reset_postdata();
			};
			?>

        </main>

    </div>
    <div id="gallery" class='box-style'>
		<?php
		$post_id = get_post( 52 );
		$content = $post_id->post_content;
		echo $content;

		?>
    </div>
<?php

get_footer();
