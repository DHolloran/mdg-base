<div class="container">
	<?php while ( have_posts() ) {
		the_post();
		the_content();
		wp_link_pages( array( 'before' => '<nav class="pagination">', 'after' => '</nav>' ) );
	} // while() ?>
</div> <!-- /.container -->