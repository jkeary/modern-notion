/*
 * Get Viewport Dimensions
 * returns object with viewport dimensions to match css in width and height properties
 * ( source: http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript )
*/
function updateViewportDimensions() {
	var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
	return { width:x,height:y }
}
// setting the viewport width
var viewport = updateViewportDimensions();


/*
 * Throttle Resize-triggered Events
 * Wrap your actions in this function to throttle the frequency of firing them off, for better performance, esp. on mobile.
 * ( source: http://stackoverflow.com/questions/2854407/javascript-jquery-window-resize-how-to-fire-after-the-resize-is-completed )
*/
var waitForFinalEvent = (function () {
	var timers = {};
	return function (callback, ms, uniqueId) {
		if (!uniqueId) { uniqueId = "Don't call this twice without a uniqueId"; }
		if (timers[uniqueId]) { clearTimeout (timers[uniqueId]); }
		timers[uniqueId] = setTimeout(callback, ms);
	};
})();

// how long to wait before deciding the resize has stopped, in ms. Around 50-100 should work ok.
var timeToWaitForLast = 100;


/*
 * Here's an example so you can see how we're using the above function
 *
 * This is commented out so it won't work, but you can copy it and
 * remove the comments.
 *
 *
 *
 * If we want to only do it on a certain page, we can setup checks so we do it
 * as efficient as possible.
 *
 * if( typeof is_home === "undefined" ) var is_home = $('body').hasClass('home');
 *
 * This once checks to see if you're on the home page based on the body class
 * We can then use that check to perform actions on the home page only
 *
 * When the window is resized, we perform this function
 * $(window).resize(function () {
 *
 *    // if we're on the home page, we wait the set amount (in function above) then fire the function
 *    if( is_home ) { waitForFinalEvent( function() {
 *
 *      // if we're above or equal to 768 fire this off
 *      if( viewport.width >= 768 ) {
 *        console.log('On home page and window sized to 768 width or more.');
 *      } else {
 *        // otherwise, let's do this instead
 *        console.log('Not on home page, or window sized to less than 768.');
 *      }
 *
 *    }, timeToWaitForLast, "your-function-identifier-string"); }
 * });
 *
 * Pretty cool huh? You can create functions like this to conditionally load
 * content and other stuff dependent on the viewport.
 * Remember that mobile devices and javascript aren't the best of friends.
 * Keep it light and always make sure the larger viewports are doing the heavy lifting.
 *
*/

/*
 * Put all your regular jQuery in here.
*/
jQuery(document).ready(function($) {

  /* ------------------------------------------------
  Common Variables
  ------------------------------------------------ */
  var $body = $('body');

  /* ------------------------------------------------
  Clear search form and focus
  ------------------------------------------------ */
	$(".clear-field").click(function(evt){
	  $(this).prev().val("").focus();
	  return false;
	});

  /* ------------------------------------------------
  jPanel
  ------------------------------------------------ */
	var jPM = $.jPanelMenu({
		menu: '#menu-site-header',
		trigger: '.menu-trigger',
		direction: 'right',
		duration: 300
	});
	jPM.on();

  /* ------------------------------------------------
  Sticky Elements
  ------------------------------------------------ */
  	var sticky_offest_top = 70;
  	$(window).load(function() {
     	$(".share-panel").each(function() {  		
	  		var $this = $(this);
	  		var this_slug = $this.data('slug');
	  		$this.stick_in_parent({
				offset_top: sticky_offest_top,
				parent: '.article-text-wrapper[data-slug="'+this_slug+'"]'
			});
		});
		if($('body.home').length == 0)  {
		  	$('.sidebar-sticky-wrapper').stick_in_parent({
				offset_top: sticky_offest_top,
				inner_scrolling: false,
				parent: '#inner-content'
			});
		}
	});
  	

	  
  /* ------------------------------------------------
  Bxslider
  ------------------------------------------------ */
	$('.bxslider').bxSlider( {
		nextText: '',
		prevText: ''
	});

  /* ------------------------------------------------
  Resize Events
  ------------------------------------------------ */
$(window).resize(function () {

	waitForFinalEvent( function() {
		if( viewport.width > 1080 ) {
			jPM.close();
		}
		$(document.body).trigger("sticky_kit:recalc");
	}, timeToWaitForLast, "resize-functions");
});


  /* ------------------------------------------------
  Podcast - embed link
  ------------------------------------------------ */
		$('.embed_link_txt')
			.focus(function() {$(this).select();})
			.mouseup(function(e) {e.preventDefault();});

		var out = false;
		$('.links .embed').click(function() {
			if (!out) {
				$(this).siblings('.embed_wrap').find('.embed_link').animate(
					{left : 0},
					400
				);
				out = true;
			} else {
				$(this).siblings('.embed_wrap').find('.embed_link').animate(
					{left : '-485px'},
					400
				);
				out = false;
			}
			return false;
		});

	  //Window scroll event
    var hasAlerted = false;
    jQuery(window).scroll(function(e) {

        //Nav bar animation
        var header = jQuery(".site-header");
        if(header.width() < 1104) {
            return; 
        }
        var height = header.height();
        var scroll = jQuery(this).scrollTop(); 

        if(jQuery(this).scrollTop() > 250){
            header.addClass("scroll"); 
            jQuery(".logo-text").removeClass("sr-only");
        }
        else {
            header.removeClass("scroll"); 
            jQuery(".logo-text").addClass("sr-only");                    
        }

        //Alert box, for after articles
        var contentHeight = jQuery(".standard-content").height();
        if(scroll > (contentHeight) && !hasAlerted && isSingle){
            hasAlerted = true;
            jQuery("#slide-in").addClass("open");
        }
    });	

	  //Close recommended
    jQuery(".slide-in .close").click(function(e) {
        e.preventDefault();
        jQuery("#slide-in").removeClass("open");
    });	

    //Modal fix
    var checkeventcount = 1,prevTarget;
    jQuery('.modal').on('show.bs.modal', function (e) {
        if(typeof prevTarget == 'undefined' || (checkeventcount==1 && e.target!=prevTarget))
        {  
          prevTarget = e.target;
          checkeventcount++;
          e.preventDefault();
          jQuery(e.target).appendTo('body').modal('show');
        }
        else if(e.target==prevTarget && checkeventcount==2)
        {
          checkeventcount--;
        }
     }); 

    //Infinite scroll on homepage
    if(isFront){
      var wrapper = jQuery("#infinite-scroll-wrapper");
      var loading = jQuery("#article-loading"); 
      var content = jQuery("#main").height();
      var source = jQuery("#entry-template").html(); 
      var template = Handlebars.compile(source); 
      var done = false;
      var fetching = false;
      var page = 2;
      var pages = 2;
      var row = null;  
    }
    
    jQuery(window).scroll(function(e) {
      if(!isFront){
        return; 
      }

      var scroll = jQuery(this).scrollTop();
      console.log(scroll); 
      console.log(wrapper.height());

      if(scroll < wrapper.height()){
        return; 
      }

      if(done || fetching){ 
        return; 
      }

      fetching = true;
      
      if(page <= pages)
        loading.css("display", "block"); 

      jQuery.ajax({
        url: "/page/" + page + "?json=1",
      }).success(function(data) {
        console.log(data);
        
        //Update the total pages
        pages = data.pages;  

        if(data.status !== "error"){
          page++;
          data.posts.forEach(function(post, index) {
            var isOdd = (index % 2) !== 0; 
            if(!isOdd){
              row = null; 
              row = jQuery('<div/>', { "class": "row" }).append(template(post));
            }
            else {
              row.append(template(post)); 
              wrapper.append(row);
            } 
          });
        }
        else {
          done = true; 
        }

        fetching = false;
        loading.css("display", "none");  
      });
    });        


}); /* end of as page load scripts */