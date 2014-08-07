<?php
add_action( 'show_user_profile', 'mn_twitter_handle_fields' );
add_action( 'edit_user_profile', 'mn_twitter_handle_fields' );

function mn_twitter_handle_fields( $user ) { ?>

	<table class="form-table">

		<tr>
			<th><label for="twitter">Twitter</label></th>

			<td>
				<input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your Twitter handle.</span>
			</td>
		</tr>

	</table>

<?php }

add_action( 'personal_options_update', 'mn_save_twitter_handle' );
add_action( 'edit_user_profile_update', 'mn_save_twitter_handle' );

function mn_save_twitter_handle( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	update_user_meta( $user_id, 'twitter', $_POST['twitter'] );
}