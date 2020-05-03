<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">

    <div class="search-box">
        <input type="search" class="search-field"
               placeholder="<?php echo esc_attr_x( 'Искать и нажать Enter', 'placeholder' ) ?>"
               value="<?php echo get_search_query() ?>" name="s"
               title="<?php echo esc_attr_x( 'Искать и нажать Enter', 'label' ) ?>"/>
        <i class="icon-search"></i>

    </div>
</form>
