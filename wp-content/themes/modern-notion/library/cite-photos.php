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
//add_shortcode('credit', 'credit_photo'); 
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

new Shortcode_Tinymce();
class Shortcode_Tinymce
{
    public function __construct()
    {
        //add_action('admin_init', array($this, 'pu_shortcode_button'));
        //add_action('admin_footer', array($this, 'pu_get_shortcodes'));
    }

    /**
     * Create a shortcode button for tinymce
     *
     * @return [type] [description]
     */
    public function pu_shortcode_button()
    {
        if( current_user_can('edit_posts') &&  current_user_can('edit_pages') )
        {
            add_filter( 'mce_external_plugins', array($this, 'pu_add_buttons' ));
            add_filter( 'mce_buttons', array($this, 'pu_register_buttons' ));
        }
    }

    /**
     * Add new Javascript to the plugin scrippt array
     *
     * @param  Array $plugin_array - Array of scripts
     *
     * @return Array
     */
    public function pu_add_buttons( $plugin_array )
    {
        $plugin_array['pushortcodes'] = get_stylesheet_directory_uri() . '/library/js/shortcode-tinymce-button.js';

        return $plugin_array;
    }

    /**
     * Add new button to tinymce
     *
     * @param  Array $buttons - Array of buttons
     *
     * @return Array
     */
    public function pu_register_buttons( $buttons )
    {
        array_push( $buttons, 'separator', 'pushortcodes' );
        return $buttons;
    }

    /**
     * Add shortcode JS to the page
     *
     * @return HTML
     */
    public function pu_get_shortcodes()
    {
        //lobal $shortcode_tags;

        echo '<script type="text/javascript">
        var shortcodes_button = new Array();';

        $count = 0;

        echo "shortcodes_button[0] = 'credit'";

        // foreach($shortcode_tags as $tag => $code)
        // {
        //     echo "shortcodes_button[{$count}] = '{$tag}';";
        //     $count++;
        // }

        echo '</script>';
    }
}
?>