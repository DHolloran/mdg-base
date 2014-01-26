<div class="container">
<?php function stub_get_posts() {
	global $mdg_stub;

	$stubs = $mdg_stub->get_posts();
	$ret   = array();

	// pp( $stubs );

	foreach ( $stubs as $stub ) {
		$ret[] = $stub->post_title;
	} // foreach()

	return $ret;
} // stub_get_posts()?>

<?php function stub_get_posts_custom() {
	global $mdg_stub;

	$stubs = $mdg_stub->get_posts( array( 'posts_per_page' => 1 ) );
	$ret = array();

	// pp( $stubs );

	foreach ( $stubs as $stub ) {
		$ret[] = $stub->post_title;
	} // foreach()

	return $ret;
} // stub_get_posts_custom() ?>

<?php function stub_get_posts_with_thumbnails() {
	global $mdg_stub;

	$stubs = $mdg_stub->get_posts_with_featured_image();
	$ret   = array();

	// pp( $stubs );

	foreach ( $stubs as $stub ) {
		$ret[] = $stub->post_title;
	} // foreach()

	return $ret;
} // stub_get_posts_with_thumbnails() ?>

<?php function stub_get_posts_attachments() {
	global $mdg_stub;

	$stubs = $mdg_stub->get_attachments( null, array() );
	$ret   = array();

	// pp( $stubs );

	foreach ( $stubs as $stub ) {
		$ret[] = wp_get_attachment_url( $stub->ID );
	} // foreach()

	return $ret;
} // stub_get_posts_attachments() ?>

<?php function stub_get_posts_custom_query_object() {
	global $mdg_stub;

	$stubs = $mdg_stub->get_posts( array( 'posts_per_page' => 1 ), true );

	return $stubs;
} // stub_get_posts_custom_query_object() ?>

<?php function stub_get_responsive_image_test() {
	global $mdg_stub;

	$resp_image = $mdg_stub->get_responsive_image( 'some_image', array( 'link' => 'test', 'echo' => false, ) );
} // stub_get_responsive_image_test() ?>

<?php function stub_font_awsome_glyphicons_test() {
	$icons  = '';
	$icons .= '<i class="fa fa-wheelchair"></i> fa-wheelchair<br>';
	$icons .= '<i class="fa fa-plus-square-o"></i> fa-plus-square-o<br>';
	$icons .= '<span class="glyphicon glyphicon-star"></span> Star<br>';
	$icons .= '<a href="http://fontawesome.io/icons/" target="_blank">Font Awesome Icons</a><br>';
	$icons .= '<a href="http://getbootstrap.com/components/#glyphicons" target="_blank">Glyphicons</a>';

	return $icons;
} // stub_font_awsome_glyphicons_test() ?>

<?php function stub_css3pie_test() {
	$base          = 'border: 1px solid #696; padding: 60px 0; text-align: center; width: 200px;';
	$border_radius = '-webkit-border-radius: 100px;-moz-border-radius: 100px;border-radius: 100px;';
	$box_shadow    = '-webkit-box-shadow: #666 20px 25px 15px;-moz-box-shadow: #666 20px 25px 15px;box-shadow: #666 20px 25px 15px;';
	$gradient      = 'background: #FFA899; background: -webkit-gradient(linear, 0 0, 0 bottom, from(#FFA899), to(#66EE33)); background: -webkit-linear-gradient(#FFA899, #66EE33); background: -moz-lineargradient(#FFA899, #66EE33); background: -ms-linear-gradient(#FFA899, #66EE33); background: -o-linear-gradient(#FFA899, #66EE33); background: linear-gradient(#FFA899, #66EE33); -pie-background: linear-gradient(#FFA899, #66EE33);';
	$style         = "{$base} {$border_radius} {$box_shadow} {$gradient}";
	$css3pie       = "<div class='css3pie' style='{$style}'>CSS3PIE</div>";

	return $css3pie;
} // stub_css3pie_test() ?>
	<!-- 'AJAX Loaders'
	<div class="small progress"><div>Loading…</div></div>
	<div class="progress"><div>Loading…</div></div>
	<div class="large progress"><div>Loading…</div></div> -->

	<!-- 'LightBox Example'
	<a href="#" class="mdg-lightbox" data-content="<h4>test</h4>">Lightbox HTML Content</a><br>
	<a href="#" class="mdg-lightbox" data-image="http://placehold.it/2800x530">Lightbox Image</a> -->

	<?php
	$examples = array(
		array(
			'title'        => 'Get Posts',
			'content'      => stub_get_posts(),
			'pretty_print' => true,
			'example'      => '',
		),
		array(
			'title'        => 'Get Posts Custom',
			'content'      => stub_get_posts_custom(),
			'pretty_print' => true,
			'example'      => '',
		),
		array(
			'title'        => 'Get Posts With Thumbnails',
			'content'      => stub_get_posts_with_thumbnails(),
			'pretty_print' => true,
			'example'      => '',
		),
		array(
			'title'        => 'Get Posts Attachments',
			'content'      => stub_get_posts_attachments(),
			'pretty_print' => true,
			'example'      => '',
		),
		array(
			'title'        => 'Get Posts Custom Query Object',
			'content'      => stub_get_posts_custom_query_object(),
			'pretty_print' => true,
			'example'      => '',
		),
		// array(
		// 	'title'        => 'Get Responsive Image Test',
		// 	'content'      => stub_get_responsive_image_test(),
		// 	'pretty_print' => false,
		// ),
		array(
			'title'        => 'FontAwesome/Glyphicons Test',
			'content'      => stub_font_awsome_glyphicons_test(),
			'pretty_print' => false,
		),
	);
	?>
	<div class="panel-group" id="stub_accordion">
	<?php foreach ( $examples as $example ) { ?>
		<?php extract( $example );
		$id = str_replace( '-', '_', sanitize_title( $title ) ); ?>

		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#stub_accordion" href="#<?php echo esc_attr( $id ); ?>"><?php echo esc_html( $title ); ?></a>
				</h4>
			</div> <!-- /.panel-heading -->
			<div id="<?php echo esc_attr( $id ); ?>" class="panel-collapse collapse">
				<div class="panel-body">
					<?php
					if ( isset( $example ) ) {
						pp( $example );
					} // if()
					if ( $pretty_print ) {
						pp( $content );
					} else {
						echo $content;
					} // if/else() ?>
				</div> <!-- /.panel-body -->
			</div> <!-- /.panel-collapse -->
		</div> <!-- /.panel -->
	<?php } ?>

	<h4>CSS3Pie Test</h4>
	<?php echo stub_css3pie_test(); ?>
	</div> <!-- /.panel-group -->
</div><!-- /.container -->