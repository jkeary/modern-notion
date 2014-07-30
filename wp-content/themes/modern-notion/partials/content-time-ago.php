<?php
global $popular_id;
if(!empty($popular_id))  {
	$post_id = $popular_id;
}
else  {
	$post_id = $post->ID;	
}
?>
<span class="time-ago"><?php echo human_time_diff( get_the_time('U', $post_id), current_time('timestamp') ) . ' ago'; ?></span>