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

  //Stick the first article
  $("#infinite-scroll-wrapper article").first().mnStick(); 

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

  	waitForFinalEvent(function() {
  		if( viewport.width > 1080 ) {
  			jPM.close();
  		}
      else {
        $(".logo-text").removeClass("sr-only");
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
        url = '/api/get_recent_posts/?ajax=1&count=1&page=' + page;
      }
      else {
        url = '/api/get_tag_posts/?ajax=1&count=1&tag_slug=' + tag + '&page=' + page;
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
          
          var images = put.find("img"); 
          var imageCount = images.length;
          var start = 1;
          images.on("load", function() {
            if(imageCount > start) {
              start++; 
            }
            else {
              put.find("#post-" + post.id).mnStick();
              start = 1; 
            }
          });

          content.append('<div class="load"></div>'); 
          content.append(loading);
          gettingNext = false; 
          loading.css('opacity', '0');
          if(!dev) {
            ga('send', 'pageview', {
              'page': '/' + post.slug,
              'title': 'Modern Notion ' + post.title
            });
          }

          var article = put;
          var title = post.title;
          var path = "/"+post.slug; 
          $(window).bind('mousewheel', function(e) {
            var scroll = $(window).scrollTop();
            if(scroll < (article.height() + article.offset().top - 150) && scroll > (article.offset().top - 150)) {
              if(window.location.pathname !== path)
                window.history.pushState(post.id, title, path);
            }
          });

          hasLoaded = true;
          hasSet = false;
          loadedArticle = put.find('article');
        }); 
      });
      count++;  
    });
    var article = $("article");
    var title = $('title').html();
    var path = window.location.pathname; 
    $(window).bind('mousewheel', function(e) {
      if(!isSingle) return; 
      var scroll = $(window).scrollTop();
      if(scroll < (article.height() + article.offset().top) && scroll > 0) {
        if(window.location.pathname !== path)
          window.history.pushState(0, title, path);
      }
    });
   

	  //Window scroll event
    var lastScrollTop = 0;
    var isDownScroll = true;
    var scrollUpStart = null; 
    var header = $(".site-header");  
    $(window).scroll(function(e) {
        if(isSingle) return;

        //Nav bar animation
        if(header.width() < 1080) {
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
      var split = post.date.split(' ');
      var date = new Date(split[0]);
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
          var split = post.date.split(" "); 
          var date = new Date(split[0]); 
          date = date.format("mmmm d, yyyy");
          result.find("time").html(date);
        });
        button.css("display", "block");
        loading.css("display", "none");
        page++;
      }); 
    }); 


}); /* end of as page load scripts */
