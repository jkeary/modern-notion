<?php $audio = get_field('podcast'); ?>
<script type="text/javascript">
jQuery(document).ready(function($) {
	$("#jquery_jplayer_1").jPlayer({
		ready: function () {
			$(this).jPlayer("setMedia", {
				mp3: "<?php echo $audio['url']; ?>"
			});
		},
		swfPath: "js",
		supplied: "mp3",
		wmode: "window",
		smoothPlayBar: true,
		keyEnabled: true,
		remainingDuration: true,
		toggleDuration: true
	});
});
</script>
		<div id="jquery_jplayer_1" class="jp-jplayer"></div>
		<div id="jp_container_1" class="jp-audio">
			<div class="jp-type-single">
				<div class="jp-gui jp-interface">
					<ul class="jp-controls">
						<li><a href="javascript:;" class="jp-play" tabindex="1"><span class="valign halign"><span><span class="icon"><span class="sr-only">play</span></span></span></span></a></li>
						<li><a href="javascript:;" class="jp-pause" tabindex="1"><span class="valign halign"><span><span class="icon"><span class="sr-only">pause</span></span></span></span></a></li>
						<li><a href="javascript:;" class="jp-stop" tabindex="1"><span class="valign halign"><span><span class="icon"><span class="sr-only">stop</span></span></span></span></a></li>
					</ul>
					<div class="jp-progress">
						<div class="jp-seek-bar">
							<div class="jp-play-bar"></div>
						</div>
					</div>
				</div>
				<div class="jp-no-solution">
					<span>Update Required</span>
					To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
				</div>
			</div>
		</div>		
<div class="btn-group clearfix">
<?php /*
	<a href="javascript:openShare('https://www.facebook.com/sharer.php?s=100&p[url]=http://miltrosenberg.com/show/the-ghastly-week-that-was/&p[title]=The Ghastly Week That Was');" class="btn social-share facebook-share" title="Share on Facebook">Share on Facebook</a>
	<a href="javascript:openShare('http://twitter.com/share?url=http://miltrosenberg.com/show/the-ghastly-week-that-was/&text=The Ghastly Week That Was');" class="btn social-share twitter-share" title="Share on Twitter">Share on Twitter</a>
*/ ?>
	<a href="" class="btn black">Subscribe on iTunes</a>
	<a href="<?php echo $audio['url']; ?>" class="btn black social-share download" title="Download Show" target="_blank" download="modern-notion-show-<?php echo get_the_time('m-j-Y'); ?>.mp3">Download</a>	
	<a href="<?php home_url() ?>/feed/podcasts-feed" class="btn black icon-btn"><span class="icon-feed"></span><span class="sr-only">RSS Feed</span></a>
	<?php /*
	
	<a href="#" class="btn social-share embed" title="Embed this Show">Embed</a>
	<div class="embed_wrap">
		<div class="embed_link">
			<input type="text" class="embed_link_txt" value="<script>var js;!function(d,s,id){var fjs=d.getElementsByTagName(s)[d.getElementsByTagName(s).length-1];if(!d.getElementById(id)){js=d.createElement(s);js.embed_id = <?php echo $post->ID; ?>;js.audio_src = '<?php echo $audio['url']; ?>';js.src='<?php echo get_stylesheet_directory_uri(); ?>/library/js/embed.js';js.root_src = '<?php echo get_stylesheet_directory_uri(); ?>';fjs.parentNode.appendChild(js);}}(document,'script','jp_script');</script>">
		</div>
	</div>
	*/ ?>
</div>