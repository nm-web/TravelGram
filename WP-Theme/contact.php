<?php
/* Template Name:contact
 */
get_header( 'search' );
?>
    <div class="body-page ">

        <main class="center">

            <section class="widget_map widget box-style" >
		        <?php
		        $post_id = get_post( 123 );
		        $title   = $post_id->post_title;
		        $content = $post_id->post_content;
		        ?>
                <h3 class="widget-title"><?php echo $title; ?></h3>
		        <?php echo $content; ?>
            </section>
        </main>
    </div>

<?php

get_footer();
