(function($) {
  
  var
  
  topWindow, 
  bottomWindow,
  lastTopWindow, 
  lastBottomWindow,

  options = {
    offsetTop: 50
  },

  //Affixes an element to the offset
  affix = function(elm, width) {
    elm.css("position", "fixed"); 
    elm.css("top", options.offsetTop);
    elm.css("bottom", "auto");
    elm.css("width", width || elm.parent().width());
    elm.css("z-index", "9");   
  },

  //Unfixes the element
  unfixTop = function(elm) {
    elm.css("position", "static"); 
    elm.css("top", "auto");    
  },

  //Fixes the element to the bottom of the container dom element
  unfixBottom = function(elm) {
    elm.css("position", "absolute"); 
    elm.css("bottom", "0");
    elm.css("top", "auto");    
  },  

  //Flyin an element
  flyin = function(elm) {
    elm.css("position", "fixed"); 
    elm.css("bottom", "0px");
    elm.css("right", "0px");
    elm.css("z-index", "99999");

    if($("body").hasClass("logged-in")) {
      elm.css("bottom", "32px");
    }
  },

  //Flyin an element
  flyout = function(elm) {
    elm.css("right", "-100%");
  },

  //Calculate all the offsets/heights of 
  //the wrapper and child elements
  calculateValues = function(select) {
    
    select.wrapper = {
      height: select.parent.height(), 
      width: select.parent.width(),
      offsetTop: Math.ceil(select.parent.offset().top)
    };

    select.children.forEach(function(stickyElement, index) {
      select['stick-' + index] = {
        height: stickyElement.height(), 
        width: stickyElement.width(),
        offsetTop: Math.ceil(stickyElement.offset().top),
        parent: {
          height: Math.ceil(stickyElement.parent().height()),
          width: Math.ceil(stickyElement.parent().width())
        }
      }
    });

    //Calculate the flying start and stop
    var articleContent = select.parent.find('.main').first();
    select.flyinStart = articleContent.height() + articleContent.offset().top - ($(window).height() + 1000);
    select.flyinStop = select.flyinStart + 1000;   
  },

  //Caclulate the values and watch the scroll
  scrollEvent = function(select) {
    $(window).scroll(function() {
      var win = $(this);
      lastTopWindow = topWindow || 0; 
      lastBottomWindow = bottomWindow || 0; 
      topWindow = win.scrollTop(); 
      bottomWindow = win.height();
      scrollCheck(select); 
    });
  },

  //This is called by scrollEvent
  //If the article is visible we should run the scroller
  scrollCheck = function(select) {
    
    if(topWindow > (select.wrapper.offsetTop + select.wrapper.height + bottomWindow)) {
      return; 
    }

    scroller(select);
  },

  //This gets called by scrollCheck
  scroller = function(select) {

    //We need to recalculate this for asynchronous loading, ie ads
    //bottomOfElement = select.parent.offset().top + select.parent.height();
    bottomOfElement = select.parent.offset().top + select.parent.height();

    //Apply stick to chilren array
    select.children.forEach(function(stickyElement, index) {
      
      var className = 'stick-' + index;
      var data  = select[className];
      var start = data.offsetTop - options.offsetTop; 
      var stop  = start + data.height;

      if(topWindow >= start && topWindow <= bottomOfElement - (options.offsetTop + data.height)) {
        affix(stickyElement);
      }
      else if(topWindow < start) {
        unfixTop(stickyElement);    
      }    
      else {
        unfixBottom(stickyElement); 
      }
    });

    //Setup flyin
    if(topWindow >= select.flyinStart && topWindow < select.flyinStop) {
      flyin(select.flyin); 
    }
    else if(topWindow > select.flyinStop) {
      flyout(select.flyin);
    }
    else {
      flyout(select.flyin); 
    }
  };
  
  //Expose plugin function
  $.fn.mnStick = function() {
    
    this.each(function(key, value) {

      var parent = $(this);
      parent.css("position", "relative");

      var selections = {
        parent: parent,
        flyin: parent.find(".yarpp-related .slide-in"),
        children: [
          parent.find('.share-panel'),
          parent.find('.sidebar-sticky-wrappers')
        ]
      };

      calculateValues(selections);
      scrollEvent(selections);
    
    });

    //Chainable
    return this;  
  }

})(jQuery)