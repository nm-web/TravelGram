<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">

    <div class="search-box">
        <input type="search" class="search-field"
               placeholder="<?php echo esc_attr_x( 'Search and hit enter', 'placeholder' ) ?>"
               value="<?php echo get_search_query() ?>" name="s"
               title="<?php echo esc_attr_x( 'Search and hit enter', 'label' ) ?>"/>
        <i class="icon-search"></i>

    </div>
</form>
