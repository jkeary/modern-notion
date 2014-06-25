<?php $format = get_post_format_string(get_post_format()); ?>
<?php $format_slug = strtolower($format); ?>
<a href="<?php home_url(); ?>/<?php echo $format_slug; ?>-list" class="valign halign post-icon format-icon <?php echo $format_slug; ?> <?php echo top_category_slug(); ?>-bgcolored" title="View all <?php echo $format_slug; ?> posts">
	<span>
		<span class="icon-font"></span>
		<span class="sr-only">View all <?php echo $format_slug; ?> posts</span>
	</span>		
</a>