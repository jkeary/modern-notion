<?php

/**
 * Calls the class on the post edit screen.
 */
function initHomepageSlots() {
    new HomepageSlots();
}

if ( is_admin() ) {
    add_action( 'load-post.php', 'initHomepageSlots' );
    add_action( 'load-post-new.php', 'initHomepageSlots' );
}

/** 
 * The Class.
 */
class HomepageSlots {

  /**
   * Hook into the appropriate actions when the class is constructed.
   */
  public function __construct() {
    add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
    add_action( 'save_post', array( $this, 'save' ) );
  }

  /**
   * Adds the meta box container.
   */
  public function add_meta_box( $post_type ) {
    $post_types = array('post');
    if ( in_array( $post_type, $post_types )) {
      add_meta_box(
        'homepage_slots'
        ,__( 'Homepage Slots', 'bonestheme' )
        ,array( $this, 'render_meta_box_content' )
        ,$post_type
        ,'advanced'
        ,'high'
      );
    }
  }

  /**
   * Save the meta when the post is saved.
   *
   * @param int $post_id The ID of the post being saved.
   */
  public function save( $post_id ) {
  
    /*
     * We need to verify this came from the our screen and with proper authorization,
     * because save_post can be triggered at other times.
     */

    // Check if our nonce is set.
    if ( ! isset( $_POST['hp_slots_nonce'] ) )
      return $post_id;

    $nonce = $_POST['hp_slots_nonce'];

    // Verify that the nonce is valid.
    if ( ! wp_verify_nonce( $nonce, 'hp_slots' ) )
      return $post_id;

    // If this is an autosave, our form has not been submitted,
    // so we don't want to do anything.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return $post_id;

    // Check the user's permissions.
  	if ( !current_user_can( 'edit_post', $post_id ))
  	  return $post_id;

  	if(empty($_POST['position']))
  		return $post_id;

  	update_post_meta($post_id, 'hp_slot', $_POST['position']);
  
  }


  /**
   * Render Meta Box content.
   *
   * @param WP_Post $post The post object.
   */
  public function render_meta_box_content( $post ) {
  
    // Add an nonce field so we can check for it later.
    wp_nonce_field( 'hp_slots', 'hp_slots_nonce' );
    get_template_part("partials/admin", "homepage-slots");

  }
}