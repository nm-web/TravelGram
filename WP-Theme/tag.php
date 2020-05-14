<?php

get_header( 'search' );
?>
<div class="body-page ">
	<?php get_sidebar(); ?>
    <main class="content">


		<?php

		if ( is_tag() ) {
			$tag_name = get_queried_object()->name;
			$tag_slug = get_queried_object()->slug;

		}
		?>

		<?php

		$posts = get_posts( array(
			'numberposts'      => '',
			'category_name'    => '',
			'tag' => $tag_slug,
			'orderby'          => 'date',
			'order'            => 'DESC',
			'include'          => array(),
			'exclude'          => array(),
			'meta_key'         => '',
			'meta_value'       => '',
			'post_type'        => 'post',
			'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
		) );

		if ( ! ( have_posts() ) ) { ?>
        <article class="post_collumn post box-style">
            <section class="text">
                <div class="cat-name">
                    статьи с метками <?php echo $tag_name; ?> не обнаружены
                </div>
		<?php
		}
		?>
            </section>
        </article>
		<?php
		foreach ( $posts as $post ) {
			setup_postdata( $post );
			?>

            <article class="post_collumn post box-style">
                <section class="text">
                    <div class="cat-name"> tags:
						<?php the_tags( '',$separator = '  /  ' ); ?>
                    </div>
                    <section class="photo-full">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium' ); ?></a>
                    </section>
                    <div class="cat-name"> Categories:
		                <?php the_category( $separator = '  /  ' ); ?>
                    </div>
                    <a href="<?php the_permalink(); ?>"> <h3> <?php the_title(); ?></h3></a>
					<?php the_excerpt(); ?>

	                <div class="count-like"> <?php echo do_shortcode('[wp_ulike]');?></div>
                    <div class="post__footer">

                        <div class="date-comment">
                            <div><?php the_time( 'j F, Y' ); ?></div>
                            <div class="icon-heart-empty like">
                                <?php
                                echo do_shortcode('[wp_ulike]');
                                ?>
                                likes
                            </div>
                            <i class="icon-comment-empty"><span><?php comments_number( 0, '1', '% ' ); ?></span></i>
                        </div>
                        <ul class="post__menu-social">
                            <li>share</li>
                            <li><a href="<?php the_field( "facebook", 61 ); ?>" class="icon-facebook"></a></li>
                            <li><a href="<?php the_field( "twitter", 61 ); ?>" class="icon-twitter"></a></li>
                            <li><a href="<?php the_field( "instagram", 61 ); ?>" class="icon-instagram"></a></li>

                        </ul>
                    </div>
                    <div class="comment-box">
						<?php comments_template(); ?>
                    </div>
                </section>
            </article>
			<?php

			$args = array(
				'show_all'           => false,
				// показаны все страницы участвующие в пагинации
				'end_size'           => 1,
				// количество страниц на концах
				'mid_size'           => 2,
				// количество страниц вокруг текущей
				'prev_next'          => true,
				// выводить ли боковые ссылки "предыдущая/следующая страница".
				'prev_text'          => __( '« Prev' ),
				'next_text'          => __( 'Next »' ),
				'add_args'           => false,
				// Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
				'add_fragment'       => '',
				// Текст который добавиться ко всем ссылкам.
				'screen_reader_text' => __( 'Posts navigation' ),
			);
			the_posts_pagination( $args );

		};
		wp_reset_postdata(); // сброс

		?>

    </main>
</div>

<?php
get_footer();
?>
