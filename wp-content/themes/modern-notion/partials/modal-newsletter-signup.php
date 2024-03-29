<div id="newsletter-modal" class="modal fade mn-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header clearfix">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/icons/newsletter-logo.png" alt="">
        <div class="intro">        
        	<p>Stay in the know</p>
        	<h4 class="modal-title" id="myModalLabel">Sign up for our Newsletter</h4>
        </div>
      </div>
      <div class="modal-body">

      	<p id="newsletter-modal-intro"></p>

      	<!-- Signup form -->
		<div id="mc_embed_signup-modal">
			<form action="//modernnotion.us6.list-manage.com/subscribe/post?u=c825ea2e83&amp;id=005bfbdc33" method="post" id="mc-embedded-subscribe-form-modal" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>		
			<div class="mc-field-group">
				<input type="email" value="" placeholder="Email" name="EMAIL" class="required email full-col" id="mce-EMAIL">
			</div>
				<div id="mce-responses" class="clear">
					<div class="response" id="mce-error-response" style="display:none"></div>
					<div class="response" id="mce-success-response" style="display:none"></div>
				</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
			    <div style="position: absolute; left: -5000px;"><input type="text" name="b_c825ea2e83_005bfbdc33" tabindex="-1" value=""></div>
			    <!-- <div class="clear"><input type="submit" value="Sign Up" name="subscribe" id="mc-embedded-subscribe" class="btn blue"></div> -->
			</form>
		</div>
		<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script>
		<script type='text/javascript'>
		(function($) {
			window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';
			}(jQuery));
			var $mcj = jQuery.noConflict(true);
		</script>
      </div>
      <div class="modal-footer">
      	<input type="submit" value="Sign Up" name="subscribe" id="mc-embedded-subscribe-modal" class="btn blue">
      	<div class="social">
	    	<a class="facebook" href="#" target="_blank">
	    		<img src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/icons/fb-white.png" alt="">
	    		<span class="text">Sign up with Facebook</span>
	    	</a>
    	</div>
      </div>
    </div>
  </div>
</div>