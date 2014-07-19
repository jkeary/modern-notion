<?php
  $text = get_post_meta( $post->ID, 'cite_text', true );
  $link = get_post_meta( $post->ID, 'cite_link', true );
?>
<table>
  <tr>
    <td><label for="author">Author</label></td>
    <td><input id="author" type="text" name="cite_text" value="<?php echo esc_attr( $text ); ?>"></td>
  </tr>
  <tr>
    <td><label for="link">Link</label></td>
    <td><input id="author" type="text" name="cite_link" value="<?php echo esc_attr( $link ); ?>"></td>
  </tr>  
</table>