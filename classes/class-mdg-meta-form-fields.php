<?php
/**
 * MDG Meta Form Fields Class.
 */

/**
 * Contains all of the custom meta form fields.
 *
 * @package      WordPress
 * @subpackage   MDG_Base
 *
 * @author       Matchbox Design Group <info@matchboxdesigngroup.com>
 */
class MDG_Meta_Form_Fields extends MDG_Generic
{
	/**
	 * Class constructor
	 *
	 * @param array   $config Class configuration
	 */
	function __construct( $config = array() ) {
		parent::__construct();
	} // __construct()



	/**
	 * Creates a HTML text field and description.
	 *
	 * @param string  $id   id attribute
	 * @param string  $meta meta value
	 * @param string  $desc description
	 *
	 * @return string       The text field and description
	 */
	public function text_field( $id, $meta, $desc ) {
		$text_field  = '<input type="text" name="'.esc_attr( $id ).'" id="'.esc_attr( $id ).'" value="'.$meta.'" size="30">';
		$text_field .= '<br>';
		$text_field .= '<div class="description">'.wp_kses( $desc, 'post' ).'</div>';

		return $text_field;
	} // text_field()



	/**
	 * Creates a HTML email field and description.
	 *
	 * @param string  $id   id attribute
	 * @param string  $meta meta value
	 * @param string  $desc description
	 *
	 * @return string       The email field and description
	 */
	public function email_field( $id, $meta, $desc ) {
		$email_field  = '<input type="email" name="'.esc_attr( $id ).'" id="'.esc_attr( $id ).'" value="'.$meta.'" size="30">';
		$email_field .= '<br>';
		$email_field .= '<div class="description">'.wp_kses( $desc, 'post' ).'</div>';

		return $email_field;
	} // email_field()



	/**
	 * Creates a HTML URL field and description.
	 *
	 * @param string  $id   id attribute
	 * @param string  $meta meta value
	 * @param string  $desc description
	 *
	 * @return string       The URL field and description
	 */
	public function url_field( $id, $meta, $desc ) {
		$url_field  = '<input type="url" name="'.esc_attr( $id ).'" id="'.esc_attr( $id ).'" value="'.$meta.'" size="30">';
		$url_field .= '<br>';
		$url_field .= '<div class="description">'.wp_kses( $desc, 'post' ).'</div>';

		return $url_field;
	} // email_field()



	/**
	 * Creates a color picker.
	 *
	 * @param string  $id   id attribute
	 * @param string  $meta meta value
	 * @param string  $desc description
	 *
	 * @return string       The color picker and description
	 */
	public function color_picker( $id, $meta, $desc ) {
		$color_picker  = '<input type="text" name="'.esc_attr( $id ).'" id="'.esc_attr( $id ).'" value="'.$meta.'" size="30" class="mdg-color-picker">';
		$color_picker .= '<br>';
		$color_picker .= '<div class="description">'.wp_kses( $desc, 'post' ).'</div>';

		return $color_picker;
	} // color_picker()



	/**
	 * Creates a HTML input field and description.
	 *
	 * @param string  $id       id attribute
	 * @param string  $file_src meta value
	 * @param string  $desc     description
	 *
	 * @return string            The input field and description
	 */
	public function file_upload_field( $id, $file_src, $desc ) {
		$image_thumbnail = $this->file_upload_field_thumbnail( $file_src );

		$input_field  = '<div id="meta_upload_'.esc_attr( $id ).'" class="mdg-meta-upload">';
		$input_field .= '<input type="text" name="'.esc_attr( $id ).'" id="'.esc_attr( $id ).'" value="'.$file_src.'" size="30" />';
		$input_field .= '<a href="#" id="meta_upload_link_'.esc_attr( $id ).'" class="upload-link button">upload</a>';
		$input_field .= '<br>';
		$input_field .= '<div class="description">'.wp_kses( $desc, 'post' ).'</div>';
		$input_field .= $image_thumbnail;
		$input_field .= '</div>';
		return $input_field;
	}



	/**
	 * Retrieves file upload field thumbnails
	 *
	 * @param string  $file_src The files source url
	 *
	 * @return string           The image HTML or an empty string
	 */
	public function file_upload_field_thumbnail( $file_src ) {
		$file_id         = $this->get_attachment_id_from_src( $file_src );
		$image_thumbnail = '';

		if ( is_null( $file_id ) )
			return '';

		if ( ! wp_attachment_is_image( $file_id ) )
			return '';

		$image_sizes = get_intermediate_image_sizes();
		$width  = get_option( 'thumbnail' . '_size_w' );
		$height = get_option( 'thumbnail' . '_size_h' );

		$image_thumbnail .= '<br>';
		$image_thumbnail .= wp_get_attachment_image(
			$file_id,
			'thumbnail',
			false,
			array(
				'width'  => '150',
				'height' => '150',
				'class'  => 'meta-upload-thumb',
			)
		);

		return $image_thumbnail;
	} // file_upload_field_thumbnail()



	/**
	 * Creates a HTML textarea and description.
	 *
	 * @param string  $id   id attribute
	 * @param string  $meta meta value
	 * @param string  $desc description
	 *
	 * @return string            The input field and description
	 */
	public function textarea( $id, $meta, $desc ) {
		$textarea  = '<textarea name="'.esc_attr( $id ).'" id="'.esc_attr( $id ).'" cols="55" rows="4">'.$meta.'</textarea>';
		$textarea .= '<br>';
		$textarea .= '<div class="description">'.wp_kses( $desc, 'post' ).'</div>';

		return $textarea;
	} // textarea()



	/**
	 * Creates a HTML checkbox and description.
	 *
	 * @param string  $id   id attribute
	 * @param string  $meta meta value
	 * @param string  $desc description
	 *
	 * @return string            The input field and description
	 */
	public function checkbox( $id, $meta, $desc ) {
		$checked   = ( $meta == 'on' ) ? ' checked="checked"' : '';
		$checkbox  = '<input type="checkbox" name="'.esc_attr( $id ).'" id="'.esc_attr( $id ).'"'.$checked.'>';
		$checkbox .= '<label for="'.esc_attr( $id ).'">&nbsp;'.wp_kses( $desc, 'post' ).'</label>';

		return $checkbox;
	} // checkbox()


	/**
	 * Creates a HTML radio and description.
	 *
	 * @param string  $id      id attribute
	 * @param string  $meta    meta value
	 * @param string  $desc    description
	 * @param array   $options select options
	 *
	 * @return string            The input field and description
	 */
	public function radio( $id, $meta, $desc, $options ) {
		$i     = 1;
		$radio = '';
		foreach ( $options as $option ) {
			extract( $option );
			$checked = ( $value == $meta ) ? ' checked="checked"' : '';
			$radio  .= '<input type="radio" name="'.esc_attr( $id ).'" id="'.esc_attr( "{$id}_{$i}" ).'" value="'.esc_attr( $value ).'"'.$checked.'>';
			$radio  .= '<label for="'.esc_attr( "{$id}_{$i}" ).'">&nbsp;'.esc_attr( $label ).'</label><br><br>';
			$i = $i + 1;
		} // foreach()
		$radio .= '<br>';
		$radio .= '<div class="description">'.wp_kses( $desc, 'post' ).'</div>';

		return $radio;
	} // radio()


	/**
	 * Creates a HTML select and description.
	 *
	 * @param string  $id      id attribute
	 * @param string  $meta    meta value
	 * @param string  $desc    description
	 * @param array   $options select options
	 *
	 * @return string            The input field and description
	 */
	public function select( $id, $meta, $desc, $options ) {
		$select = '<select name="'.esc_attr( $id ).'" id="'.esc_attr( $id ).'">';
		foreach ( $options as $option ) {
			extract( $option );
			$selected = ( $value == $meta ) ? ' selected="selected"' : '';
			$select  .= '<option value="'.esc_attr( $value ).'"'.$selected.'>'.esc_attr( $label ).'</option>';
		} // foreach()
		$select .= '</select>';
		$select .= '<br>';
		$select .= '<div class="description">'.wp_kses( $desc, 'post' ).'</div>';

		return $select;
	} // select()



	/**
	 * Creates a HTML chosen select and description.
	 *
	 * @param string  $id      id attribute
	 * @param string  $meta    meta value
	 * @param string  $desc    description
	 * @param array   $options select options
	 *
	 * @return string            The input field and description
	 */
	public function chosen_select( $id, $meta, $desc, $options ) {
		$select = '<select name="'.esc_attr( $id ).'" id="'.esc_attr( $id ).'" class="mdg-chosen-select" style="width:200px;">';
		foreach ( $options as $option ) {
			extract( $option );
			$selected = ( $value == $meta ) ? ' selected="selected"' : '';
			$select  .= '<option value="'.esc_attr( $value ).'"'.$selected.'>'.esc_attr( $label ).'</option>';
		} // foreach()
		$select .= '</select>';
		$select .= '<br>';
		$select .= '<div class="description">'.wp_kses( $desc, 'post' ).'</div>';

		return $select;
	} // chosen_select()



	/**
	 * Creates a HTML chosen select multiple and description.
	 *
	 * @param string  $id      id attribute
	 * @param string  $meta    meta value
	 * @param string  $desc    description
	 * @param array   $options select options
	 *
	 * @return string            The input field and description
	 */
	public function chosen_select_multi( $id, $meta, $desc, $options ) {
		$select = '<select name="'.esc_attr( $id ).'_multi_chosen" id="'.esc_attr( $id ).'_multi_chosen" multiple="multiple" class="mdg-chosen-select" style="width:200px;">';

		$meta_array = explode( ',', $meta );
		foreach ( $options as $option ) {
			extract( $option );
			$selected = ( in_array( $value, $meta_array ) ) ? ' selected="selected"' : '';
			$select  .= '<option value="'.esc_attr( $value ).'"'.$selected.'>'.esc_attr( $label ).'</option>';
		} // foreach()
		$select .= '</select>';
		$select .= '<input type="hidden"  name="'.esc_attr( $id ).'" id="'.esc_attr( $id ).'" value="' . esc_attr( $meta ) . '"  placeholder="" >';
		$select .= '<br>';
		$select .= '<div class="description">'.wp_kses( $desc, 'post' ).'</div>';

		return $select;
	} // chosen_select_multi()



	/**
	 * Creates a date picker.
	 *
	 * @param string  $id           Id attribute.
	 * @param string  $meta         Meta value.
	 * @param string  $desc         Description.
	 * @param string  $date_format  Optional, JavaScript date format default DD, MM d, yy.
	 *
	 * @return string       The date picker and description
	 */
	public function datepicker( $id, $meta, $desc, $date_format = 'DD, MM d, yy' ) {
		$datepicker  = '<input type="text" class="mdg-datepicker datepicker" name="'.esc_attr( $id ).'" id="'.esc_attr( $id ).'" value="'.$meta.'" size="30" data-format="'.esc_attr( $date_format ).'" />';
		$datepicker .= '<br />';
		$datepicker .= '<div class="description">'.wp_kses( $desc, 'post' ).'</div>';

		return $datepicker;
	} // datepicker()



	/**
	 * Creates a HTML text area WYSWIG editor and description.
	 *
	 * @param string  $id    id attribute
	 * @param string  $meta  meta value
	 * @param string  $desc  description
	 * @param string  $args  Customize wp_editor arguments.
	 *
	 * @return string            The text area and description
	 */
	public function wysiwg_editor( $id, $meta, $desc = '', $args = array() ) {
		$meta = html_entity_decode( $meta );
		$wysiwg_editor = '';
		$default_args  = array(
			'teeny'         => false,
			'editor_class'  => 'mdg-wyswig-editor',
			'textarea_rows' => 8,
		);
		$wp_editor_settings = array_merge( $default_args, $args );
		ob_start();
		wp_editor( $meta, $id, $wp_editor_settings );
		$wysiwg_editor .= ob_get_clean();

		$wysiwg_editor .= '<br>';
		$wysiwg_editor .= '<span class="description">'.esc_attr( $desc ).'</span>';

		return $wysiwg_editor;
	} // wysiwg_editor()



	/**
	 * Makes the multi field input
	 *
	 * @todo Document and fix this method better.
	 *
	 * @param array   $args  The input field arguments.
	 *
	 * @return string The multi input field and description.
	 */
	public function multi_input_field( $args = array() ) {
		// get the fields
		$multi_fields = isset( $multi_fields ) ? $multi_fields : '';
		$id           = isset( $id ) ? $id : '';
		$description  = isset( $args['desc'] ) ? $args['desc'] : '';
		$meta         = isset( $args['meta'] ) ? $args['meta'] : '';

		$json_fields = '\''.json_encode( $multi_fields ).'\' ';
		echo wp_kses( $description, 'post' );
		echo '<div class="multi-input" id="'.$id.'_container">';
		echo '<input '.
			'type="text" '.
			'style="display:none;"'.
			'name="'.$id.'" '.
			'id="'.$id.'" '.
			'value="'.$meta.'" '.
			'size="30" '.
			'class="multi-input-field" '.   // JS will grab this class to start the magic
		'data-field-id="'.$id.'" '.    // JS uses this to identify this multi-input field
		'data-fields='.$json_fields.'" '.  // JS converts this to an object to manage the fields
		'/>';
		echo '</div>';
	} // multi_input_field()
} // End class MDG_Meta_Form_Fields()

global $mdg_meta_form_fields;
$mdg_meta_form_fields = new MDG_Meta_Form_Fields();
