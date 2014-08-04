var container = document.createElement('div');
container.id = 'jp_container_' + js.embed_id;
container.setAttribute('class', 'jp_milt_container');
js.parentNode.insertBefore(container, js);

var jplayer_embed = document.createElement('div');
jplayer_embed.setAttribute('class', 'jplayer-embed');
jplayer_embed.setAttribute('data-media', js.audio_src);
jplayer_embed.setAttribute('data-ancestor', 'jp_container_' +js.embed_id);
js.parentNode.insertBefore(jplayer_embed, js);

var headID = document.getElementsByTagName('head')[0];

var player_tpl = [
	'<div class="jp-type-single jp-audio jp_clearfix">',
		'<div class="jp-gui jp-interface jp_clearfix">',
			'<div class="jp-controls jp_clearfix">',
				'<a href="javascript:void();" class="jp-play jp_ir" tabindex="1">play</a>',
				'<a href="javascript:void();" class="jp-pause jp_ir" tabindex="1">pause</a>',
			'</div>',
			'<div class="times">',
				'<span class="jp-current-time"></span> / <span class="jp-duration"></span>',
			'</div>',
			'</ul>',
		'</div>',
		'<div class="jp-no-solution">',
			'<span>Update Required</span>',
			'To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.',
		'</div>',
	'</div>'
	];


if(typeof jQuery === 'undefined') {
	initjQuery();
} else {
	initjPlayer();
}

function initjQuery() {
	var script = document.createElement('script');
	script.type = 'text/javascript';
	script.src = '//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js';
	script.onload = function() {
		initjPlayer();
	}
	headID.appendChild(script);
}

function initjPlayer() {
	if( typeof(jQuery.jPlayer) !== typeof(Function) ) {
		var jplayer_script = document.createElement('script');

		jplayer_script.type = 'text/javascript';
		jplayer_script.src = js.root_src + '/library/js/plugins/jquery.jplayer.min.js';

		jplayer_script.onload = function() {
			setup_jPlayer(jQuery);
		}
		headID.appendChild(jplayer_script);
	} else {
		setup_jPlayer(jQuery);
	}
}

function setup_jPlayer($) {
	var css = document.createElement('link');
	css.setAttribute('href', js.root_src + '/library/css/jplayer-embed.css');
	css.setAttribute('type', 'text/css');
	css.setAttribute('rel', 'stylesheet');
	headID.appendChild(css);

	var jPlayer = $('.jplayer-embed');
	var div_wrap = '#' + $(jPlayer).attr('data-ancestor');


	$(div_wrap).html(player_tpl.join(''));

	$(jPlayer).jPlayer({
		swfPath: js.root_src + '/lib/Jplayer.swf',
		backgroundColor: '#dddddd',
		preload: 'metadata',
		volume: 1,
		cssSelectorAncestor: div_wrap,
		ready: function() {
			$(this).jPlayer('setMedia', {
				mp3: $(this).attr('data-media')
			});
			$(this).jPlayer('pauseOthers');

			$(this).bind($.jPlayer.event.play, function() {
				$(this).jPlayer('pauseOthers');
			});
		}
	});
}