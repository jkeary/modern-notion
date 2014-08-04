<?php

//Display the photographer fields to be saved
function mn_photographer_fields( $form_fields, $post ) {
	$form_fields['mn-photographer-name'] = array(
		'label' => 'Photographer Name',
		'input' => 'text',
		'value' => get_post_meta( $post->ID, 'mn_photographer', true ),
		'helps' => '',
	);

	$form_fields['mn-photographer-url'] = array(
		'label' => 'Photographer URL',
		'input' => 'text',
		'value' => get_post_meta( $post->ID, 'mn_photographer_url', true ),
		'helps' => '',
	);

	return $form_fields;
}

add_filter( 'attachment_fields_to_edit', 'mn_photographer_fields', 10, 2 );

//Save the photographer fields, if provided
function mn_photographer_fields_save( $post, $attachment ) {
	if( isset( $attachment['mn-photographer-name'] ) )
		update_post_meta( $post['ID'], 'mn_photographer', $attachment['mn-photographer-name'] );

	if( isset( $attachment['mn-photographer-url'] ) )
update_post_meta( $post['ID'], 'mn_photographer_url', esc_url( $attachment['mn-photographer-url'] ) );

	return $post;
}

add_filter( 'attachment_fields_to_save', 'mn_photographer_fields_save', 10, 2 );

//Cite photo shortcode 
add_shortcode('credit', 'credit_photo'); 
function credit_photo($attrs, $content) {
	$attrs = shortcode_atts( array(
	  'author' => '',
	  'link' => '',
	  'id' => null
	), $attrs );
    if(!$attrs['id'] && $attrs['author'] !== ''){
		return '<p class="cite-photo"><a href="'.$attrs['link'].'" target="_blank">'.$attrs['author'].'</a></p>';
    }
	else {
		$author = get_post_meta($attrs['id'], 'mn_photographer', true);
		$link = get_post_meta($attrs['id'], 'mn_photographer_url', true);
		return '<p class="cite-photo"><a href="'.$link.'" target="_blank">'.$author.'</a></p>';
	}
}
?>