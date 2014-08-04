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

  function stick_share_and_sidebar() {
    $(".share-panel").each(function() {     
      var $this = $(this);
      var this_slug = $this.data('slug');
      $this.stick_in_parent({
        offset_top: sticky_offest_top,
        parent: '.article-text-wrapper[data-slug="'+this_slug+'"]'
      });
    });

    $(".sidebar-sticky-wrappers").each(function() {
      var $this = $(this);
      var id = $this.data("id");
      $this.stick_in_parent({
        offset_top: sticky_offest_top,
        parent: "#post-" + id
      });
    });
  }

  /* ------------------------------------------------
  Sticky Elements
  ------------------------------------------------ */
  	var sticky_offest_top = 63;
  	$(window).load(function() {
		if(isSingle)  {      
      stick_share_and_sidebar();       
		}
    // if(isCategory || isTag) {
    //   $('.sidebar-sticky-wrappers').stick_in_parent({
    //     offset_top: sticky_offest_top,
    //     parent: '#inner-content'
    //   });
    // }
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

  /* ------------------------------------------------
  Single page - Infinite Scroll
  ------------------------------------------------ */
    //Grab the articles with the same tag then the recent posts
    if(isSingle){
      var totalPages = null;
      var count = 1;
      var loadedLastTagged = false; 
      var loadedLastRecent = false; 
      var singlePosts = {};
      singlePosts[post.ID] = true;
      if(tags){
        var keys = Object.keys(tags); 
        var tag = tags[keys[0]]; 
      }
      var gettingNext = false;    
      var content = jQuery("#main"); 
      var loading = jQuery("#article-loading");
      var doneSingleLoading = false;
      var hasLoaded = false;  
      var hasSet = false;
      var loadedArticle = undefined; 
    }

    function getNextTaggedArticle(tag, page, cb) {
      var url; 
      if(!loadedLastRecent && loadedLastTagged) {
        url = '/api/get_recent_posts/?count=1&page=' + page;
      }
      else {
        url = '/api/get_tag_posts/?count=1&tag_slug=' + tag + '&page=' + page;
      }
      $.ajax({
        url: url
      }).success(function(data) {

        if(!data.posts.length) {
          return cb({ status: 'done' }); 
        }

        var post = data.posts[0];

        if(page === data.pages) {
          if(tag){
            loadedLastTagged = true; 
          } 
          else {
            loadedLastRecent = true;
          }
        }

        if(singlePosts[post.id]){ 
          getNextTaggedArticle(tag, count++, cb); 
        }
        else {
          singlePosts[post.id] = true; 
          cb(data); 
        }
      }); 
    }  
    jQuery(window).scroll(function(event) {
      if(!isSingle) {
        return; 
      }

      var scroll = $(this).scrollTop();
      var height = $(document).height(); 

      if(scroll < height - 1000) {
        return;
      }

      if(gettingNext || doneSingleLoading){
        return; 
      }

      gettingNext = true;
      loading.css('opacity', '1');  
      getNextTaggedArticle(tag.slug, count, function(data) {
        if(data.status === "done") {
          gettingNext = false; 
          doneSingleLoading = true; 
          loading.css('opacity', '0');       
          return; 
        }

        var post = data.posts[0];
        var put = jQuery("#main .load").last(); 
        put.load('/' + post.slug + ' ' + '#post-' + post.id, function(result) { 
          content.append('<div class="load"></div>'); 
          content.append(loading);
          gettingNext = false; 
          loading.css('opacity', '0');
          // ga('send', 'pageview', {
          //   'page': '/' + post.slug,
          //   'title': 'Modern Notion ' + post.title
          // });
          hasLoaded = true;
          hasSet = false;
          loadedArticle = put.find('article');
          stick_share_and_sidebar(); 
          $(document.body).trigger("sticky_kit:recalc");
          isCalculating = false;
        }); 
      });
      count++;  
    }); 

   
  /* ------------------------------------------------
  Single page - Slide in Recommendation
  ------------------------------------------------ */
  if(isSingle) {
   var article = $(".prose");
   var footerHeight = jQuery('.article-footer').height() + jQuery('.suggested-posts').height(); 
   var end = article.offset().top + (article.height() - footerHeight);
   var isCalculating = false; 
   var left = jQuery(".sidebar-sticky-wrappers").first().offset().left;
   var animating = false; 
   var isShowing = false; 
  }
  $(window).bind('mousewheel', function(e) {
    if(!isSingle) return;

    if(!isCalculating){
      $(document.body).trigger("sticky_kit:recalc"); 
      isCalculating = true; 
    }

    var scroll = $(this).scrollTop();

    if(hasLoaded && !hasSet) {
      //article = $('#main .load .standard-content');
      end = (loadedArticle.offset().top + (loadedArticle.height() - $(window).height()));
      hasSet = true; 
    }

    if(scroll > end) {
      //$(".yarpp-related > div").last().addClass("open");
      if(!animating){
        animating = true;
        $("#slide-in").animate({
          left: left
        }, 'fast', function() {
          isShowing = true; 
          animating = false; 
        });
      }
    }

    else {
      if(!animating && isShowing){
        animating = true;
        $("#slide-in").animate({
          left: "100%"
        }, 5, function() {
          animating = false; 
          isShowing = false; 
        });
      }    
    }
  });    

	  //Window scroll event
    var lastScrollTop = 0;
    var isDownScroll = true;
    var scrollUpStart = null;    
    $(window).scroll(function(e) {

        //Nav bar animation
        var header = $(".site-header");
        if(header.width() < 1104) {
            return; 
        }
        var height = header.height();
        var scroll = $(this).scrollTop(); 

        if($(this).scrollTop() > 20){
            header.addClass("scroll"); 
            $(".logo-text").removeClass("sr-only");
        }
        else {
          header.removeClass("scroll");
          $(".logo-text").addClass("sr-only");                    
        }
    });	

	  //Close recommended
    $(".slide-in .close").click(function(e) {
        e.preventDefault();
        $("#slide-in").removeClass("open");
    });	

    //Modal fix
    var checkeventcount = 1,prevTarget;
    $('.modal').on('show.bs.modal', function (e) {
      if(typeof prevTarget == 'undefined' || (checkeventcount==1 && e.target!=prevTarget))
      {  
        prevTarget = e.target;
        checkeventcount++;
        e.preventDefault();
        $(e.target).appendTo('body').modal('show');
      }
      else if(e.target==prevTarget && checkeventcount==2)
      {
        checkeventcount--;
      }
   }); 

    //Infinite scroll
    var posts = {};
    var done = false;
    var fetching = false;
    var page = 2;
    var pages = 2;
    var row = null;
    var loadRecent = false;
    var source = $("#entry-template").html(); 
    var loading = $("#article-loading");
    var hasResetPages = false;        
    
    if(isCategory) {
      var wrapper = $("#main");
      var template = Handlebars.compile(source);

      //Grab a reference to all the posts being displayed
      $.ajax({
        url: window.location.pathname + "?json=1"
      }).success(function(data) {
        if(data.status === "ok") {
          data.posts.forEach(function(post) {
            posts[post.slug] = true; 
          });
        }
      });
    }

    function formatPostDate(wrapper, post){
      var date = new Date(post.date); 
      var result = date.format("dddd, mmmm dd, yyyy, h:MM TT");
      $(wrapper).find("time").last().html(result);
    }
    
    $(window).scroll(function(e) {
      if(!isCategory){
        return; 
      }

      var scroll = $(this).scrollTop();

      if(scroll < wrapper.height() - 500){
        return; 
      }

      if(done || fetching){ 
        return; 
      }

      fetching = true;

      if(page <= pages)
        loading.css("display", "block"); 


      if(!loadRecent) {
        $.ajax({
          url: window.location.pathname + "page/" + page + "?json=1",
        }).success(function(data) {

          //Update the total pages
          if(data.pages){
            pages = data.pages;  
          }

          if(data.status !== "error"){
            page++;
            data.posts.forEach(function(post, index) {
              posts[post.slug] = true; 
              var isOdd = (index % 2) !== 0;
              if(isFront){
                if(!isOdd){
                  row = null; 
                  row = jQuery('<div/>', { "class": "row" }).append(template(post));
                }
                else {
                  row.append(template(post)); 
                  wrapper.append(row);                  
                } 
              }
              else if(isCategory) {
                wrapper.append(template(post)); 
                formatPostDate(wrapper, post); 
              }
            });
          }

          else {
            loadRecent = true;
          }

          fetching = false;
          loading.css("display", "none");
          $(document.body).trigger("sticky_kit:recalc"); 
        });
      }

      else if(!isFront) {
        if(!hasResetPages) {
          page = 1; 
          pages = 1; 
          hasResetPages = true; 
        }
        
        if(page <= pages)
          loading.css("display", "block"); 
        
        $.ajax({
          url: "/page/" + page + "?json=1"
        }).success(function(data) {

          pages = data.pages;

          if(data.status !== "error") {
            page++; 

            data.posts.forEach(function(post) {
              if(!posts[post.slug]) { 
                wrapper.append(template(post)); 
                formatPostDate(wrapper, post); 
              }
            });
          }
          else {
            done = true; 
          }
          fetching = false;
          loading.css("display", "none");
          $(document.body).trigger("sticky_kit:recalc");
        }); 
      }
    });

    var page = 2;
    var pages;  
    $('.load-more').click(function(e) {
      e.preventDefault();
      if(pages && pages < page) {
        $(this).html("No more posts.");
        return;
      }      
      var source = $("#entry-template").html();
      var template = Handlebars.compile(source);
      var loading = $("#article-loading");      

      var button = $(this); 

      button.css("display", "none"); 
      loading.css("display", "block");
      $.ajax({
        url: '/api/get_recent_posts?count=5&page=' + page
      }).success(function(data) {
        pages = data.pages; 
        data.posts.forEach(function(post) {
          var result = jQuery("#articles").append(template(post));
          var date = new Date(post.date); 
          date = date.format("mmmm d, yyyy");
          result.find("time").html(date);
        });
        button.css("display", "block");
        loading.css("display", "none");
        page++;
      }); 
    }); 


}); /* end of as page load scripts */
