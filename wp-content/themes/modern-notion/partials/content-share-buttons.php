<span><a 
	onclick="window.open(this.href, 'mywin', 'left=50,top=50,width=550,height=550,toolbar=1,resizable=0'); return false;" 
	class="twitter" href="http://twitter.com/share?url=<?php echo wpbitly_get_shortlink(get_permalink(), $post->ID); ?>&amp;text=<?php echo urlencode(the_title()); ?>" 
	target="_blank"><span class="icon-twitter"></span><span class="text">Share on Twitter</span></a></span>
<span><a 
	onclick="window.open(this.href, 'mywin','left=50,top=50,width=550,height=550,toolbar=1,resizable=0'); return false;" 
	class="facebook" href="http://www.facebook.com/sharer.php?u=<?php echo wpbitly_get_shortlink(get_permalink(), $post->ID); ?>" 
	target="_blank"><span class="icon-facebook"></span><span class="text">Share on Facebook</span></a></span>
<span><a onclick="window.open(this.href, 'mywin','left=50,top=50,width=550,height=550,toolbar=1,resizable=0'); return false;" 
	class="linkedin" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo wpbitly_get_shortlink(get_permalink(), $post->ID); ?>" 
	target="_blank"><span class="icon-linkedin"></span><span class="text">Share on LinkedIn</span></a></span>
<span><a 
	class="email" 
	href="mailto:?Subject=<?php the_title(); ?>&amp;Body=%20<?php echo wpbitly_get_shortlink(get_permalink(), $post->ID); ?>">
	<span class="icon-Email"></span><span class="sr-only">Email</span></a></span>