<?php
$posts = get_posts( array(
	'numberposts'      => '',
	'category'         => - 3,
	'orderby'          => 'date',
	'order'            => 'DESC',
	'include'          => array(),
	'exclude'          => array(),
	'meta_key'         => '',
	'meta_value'       => '',
	'post_type'        => 'post',
	'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
) );

foreach( $posts as $post ){
	setup_postdata($post);
	$img = send_img($post->post_content);


	if (in_category(4)) { ?>
		<article class="post box-style_article">
			<section class="text">
				<a href="<?php echo get_category_link( 4 ) ?>"><span
						class="tag"><?php echo get_cat_name( 4 ); ?></span></a>
				<a href="<?php the_permalink(); ?>"><h3 class="head-underline"><?php the_title(); ?></h3></a>
				<?php the_excerpt(); ?>
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
			<section class="photo-post">

				<a href="#"><?php echo replace_class( $img ); ?></a>
				<div class="photo_top">
					<a href="#" class="btn_readmore">readmore</a>
					<div class="date-comment">
						<time><?php the_time( 'j F, Y' ) ?></time>
						<i class="icon-heart-empty"></i>
						<i class="icon-comment-empty"><?php comments_number( 0, '1', '% ' ); ?></i>
					</div>
				</div>
			</section>
		</article>
		<?php
	} else if (in_category( 12 )) { ?>
		<article class="post box-style_article">
			<section class="photo-post">

				<a href="#"><?php echo replace_class( $img ); ?></a>
				<div class="photo_top">
					<a href="#" class="btn_readmore">readmore</a>
					<div class="date-comment">
						<time><?php the_time( 'j F, Y' ) ?></time>
						<i class="icon-heart-empty"></i>
						<i class="icon-comment-empty"><?php comments_number( 0, '1', '% ' ); ?></i>
					</div>
				</div>
			</section>
			<section class="text">
				<a href="<?php echo get_category_link( 12 ) ?>"><span
						class="tag"><?php echo get_cat_name( 12 ); ?></span></a>
				<a href="<?php the_permalink(); ?>"><h3 class="head-underline"><?php the_title(); ?></h3></a>
				<?php the_excerpt(); ?>
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
	} else if (in_category( 5 )) { ?>
		<article class="post_collumn post box-style">
			<section class="photo-full">
				<a href="<?php the_permalink(); ?>"><?php echo replace_class( $img ); ?></a>
			</section>
			<section class="text">
				<a href="<?php echo get_category_link( 5 ) ?>"><span class="tag"><?php echo get_cat_name( 5 ); ?></span></a>
				<a href="<?php the_permalink(); ?>"><h3> <?php the_title(); ?></h3></a>
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
	}
}
wp_reset_postdata(); // сброс
?>
