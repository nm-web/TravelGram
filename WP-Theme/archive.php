<?php
/* Template Name:blog
 */

get_header( 'search' );
?>


<div class="body-page ">
	<?php get_sidebar(); ?>
    <main class="content">
		<?php
		$post = array(
			'numberposts'      => '',
			'category'         => '',
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

		$custom_query = new WP_Query( $post );


		if ( $custom_query->have_posts() ) {
			while ( $custom_query->have_posts() ) {
				$custom_query->the_post();
				?>
                <article class="post_collumn post box-style">
                    <section class="photo-full">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium' ); ?></a>
                    </section>
                    <section class="text">
                        <span class="tag"><?php the_category( ' / ' ); ?></span>
                        <a href="<?php the_permalink(); ?>"><h3> <?php the_title(); ?></h3></a>
						<?php the_content(); ?>
                        <div class="date-comment">
                            <time><?php the_time( 'j F, Y' ) ?></time>
                            <i class="icon-heart-empty"><span>100 likes</span></i>
                            <i class="icon-comment-empty"><span><?php comments_number( 0, '1', '% ' ); ?></span></i>
                        </div>
                        <div class="post__footer">
                            <a href="<?php the_permalink(); ?>" class="btn_readmore">readmore</a>
                            <ul class="post__menu-social">
                                <li>share</li>
                                <li><a href="#" class="icon-facebook"></a></li>
                                <li><a href="#" class="icon-twitter"></a></li>
                                <li><a href="#" class="icon-instagram"></a></li>
                            </ul>
                        </div>
                    </section>
                </article>

				<?php

			};
			?>
            <div class="pagination">
				<?php
				my_pagenavi();
				?>
            </div>
			<?php
			wp_reset_postdata();
			wp_reset_query();
		};

		?>

    </main>
</div>

<?php

get_footer();
?>
