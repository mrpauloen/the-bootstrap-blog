<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" >

    <input class="form-control mr-sm-2 round" type="search" placeholder="<?php esc_attr_e( 'Type your search term...', 'the-bootstrap-blog' ); ?>" aria-label="Search" value="<?php echo get_search_query(); ?>" name="s" id="s" />

	<button class="btn btn-outline-primary my-2 round"  type="submit" id="searchsubmit"><?php esc_html_e( 'Search', 'the-bootstrap-blog' ); ?></button>

</form>
