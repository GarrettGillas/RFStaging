/*************************************************************************************************/
/*  Project Content Javascript for the Razorfish Client Preview platfom.                         */
/*  For documentation & support contact Garrett Gillas at Razorfish Portland.                    */
/*  Garrett.Gillas@razorfish.com                                                                 */
/*************************************************************************************************/
var ProjectContent = function (win, doc) {
  "use strict";
  var DATA_REFRESH_COMPLETE = "data_refresh_complete",
      banners_SWF = [],
      banners_IMG = [],
      documents = [];

  function parseData(data){
    
    for(var i = 0; i < data.length; i +=1){

      if(data[i].toLowerCase().indexOf('.swf') != -1){
        banners_SWF.push(buildLink(data[i], 'swf'));
      }
      if(data[i].toLowerCase().indexOf('.jpg') != -1 || data[i].toLowerCase().indexOf('.jpeg') != -1 || data[i].toLowerCase().indexOf('.gif') != -1 || data[i].toLowerCase().indexOf('.png') != -1){
        banners_IMG.push(buildLink(data[i], 'img'));
      }
      if(data[i].toLowerCase().indexOf('.pdf') != -1 || data[i].toLowerCase().indexOf('.ppt') != -1 || data[i].toLowerCase().indexOf('.pptx') != -1 || data[i].toLowerCase().indexOf('.doc') != -1 || data[i].toLowerCase().indexOf('.docx') != -1 || data[i].toLowerCase().indexOf('.xls') != -1 || data[i].toLowerCase().indexOf('.xlsx') != -1){
        documents.push(buildLink(data[i], 'doc'));
      }
    }
  }

  function buildLink(_fileName, _type){
    var outputLinkContainer = document.createElement('p');
    var outputLink = document.createElement('a');
    outputLink.href = "uploads/"+_fileName;
    $(outputLink).html(_fileName);
    $(outputLink).addClass('assetLink');
    $(outputLink).addClass(_type);
    $(outputLinkContainer).addClass('assetLinkItemContainer');
    $(outputLinkContainer).append(outputLink);
    
    return outputLinkContainer;
  }

  function refresh(projectContentPath){
    banners_SWF.length = 0;
    banners_IMG.length = 0;
    documents.length = 0;
    $.ajax({
      type: "POST",
      url: "/_services/getuploadslist.php",
      data: {pathToContent: projectContentPath},
      context: document.body
    }).done(function(data) {
      parseData(data);
      $(document).trigger(DATA_REFRESH_COMPLETE);
    });
  }

  return {
    DATA_REFRESH_COMPLETE: DATA_REFRESH_COMPLETE,
    refresh: refresh,
    banners_SWF: banners_SWF,
    banners_IMG: banners_IMG,
    documents: documents
  };
}(window, document);

/*************************************************************************************************/
/* Javascript for Breadcrumb Navigation                                                          */
/*************************************************************************************************/
function breadcrumbs() {
  sURL = new String;
  bits = new Object;
  var x = 0;
  var stop = 0;
  var output = "<nav><a href=/>Home</a>";

  sURL = location.href;
  sURL = sURL.slice(8,sURL.length);
  chunkStart = sURL.indexOf("/");
  sURL = sURL.slice(chunkStart+1,sURL.length)

  while(!stop){
    chunkStart = sURL.indexOf("/");
    if (chunkStart != -1){
      bits[x] = sURL.slice(0,chunkStart)
      sURL = sURL.slice(chunkStart+1,sURL.length);
    } else {
      stop = 1;
    }
    x++;
  }

  for(var i in bits){
    output += " &nbsp;>&nbsp; <a href=\"";
    for(y=1;y<x-i;y++){
      output += "../";
    }
    output += bits[i] + "/\">" + bits[i] + "</a>";
  }

  if(sURL.indexOf('login/')!= -1){
    output = "<nav><a href='/login/'>Login</a>";
  }
  document.write(output);
  document.write("</nav>");
  }

/*************************************************************************************************/
/* Action Confirmation Prompts                                                                   */
/*************************************************************************************************/
$(document).ready(function(){
    $('.confirm-del').click(function(){
        var answer = confirm("Are you sure you want to delete this project?");
        if (answer){
            return true;
        } else {
            return false;
        }
    });
});

$(document).ready(function(){
    $('.confirm-del-year').click(function(){
        var answer = confirm("Are you absolutly sure you want to delete this year? This action is not reversable.");
        if (answer){
            return true;
        } else {
            return false;
        }
    });
});

$(document).ready(function(){
    $('.confirm-priv').click(function(){
        var answer = confirm("Are you sure you want to make this project visible only to Razorfish employees?");
        if (answer){
            return true;
        } else {
            return false;
        }
    });
});

$(document).ready(function(){
    $('.confirm-pub').click(function(){
        var answer = confirm("Are you sure you want to make this project visible to Razorfish clients?");
        if (answer){
            return true;
        } else {
            return false;
        }
    });
});

/*************************************************************************************************/
/* "Create Year" Form Validation                                                                 */
/*************************************************************************************************/
function yearValidation(year,ev) {
  var text = /^[0-9]+$/;
  if(ev.type=="blur" || year.length==4 && ev.keyCode!=8 && ev.keyCode!=46) {
    if (year != 0) {
        if ((year != "") && (!text.test(year))) {

            alert("The year must contain numeric values only.");
            return false;
        }
        if (year.length != 4) {
            alert("Please enter a valid year.");
            return false;
        }
        var current_year=new Date().getFullYear();
        if((year < 1960) || (year > current_year))
            {
            alert("Please enter a current or recent year.");
            return false;
            }
        return true;
    } }
}

/*************************************************************************************************/
/* jReject (jQuery Browser Rejection Plugin)                                                     */
/* Version 1.0.2                                                                                 */
/* URL: http://jreject.turnwheel.com/                                                            */
/*************************************************************************************************/
(function($) {
$.reject = function(options) {
  var opts = $.extend(true,{
    reject : { // Rejection flags for specific browsers
      all: false, // Covers Everything (Nothing blocked)
      msie5: true, msie6: true, msie7: true, msie8: true, msie9: true, 
      safari1: true, safari2: true, safari3: true, safari4: true, safari5: true, 
      chrome1: true, chrome2: true, chrome3: true, chrome4: true, chrome5: true, chrome6: true, chrome7: true, chrome8: true, chrome9: true, chrome10: true,  
      firefox1: true, firefox2: true, firefox3: true, firefox4: true, firefox5: true, firefox6: true, firefox7: true, firefox8: true, firefox9: true, firefox10: true,  
      opera: true,
      iphone: true,

      // chrome33: true, firefox27: true, // For testing, also change closeCookie to "false"
      /*
       * Possibilities are endless...
       *
       * // MSIE Flags (Global, 5-8)
       * msie, msie5, msie6, msie7, msie8,
       * // Firefox Flags (Global, 1-3)
       * firefox, firefox1, firefox2, firefox3,
       * // Konqueror Flags (Global, 1-3)
       * konqueror, konqueror1, konqueror2, konqueror3,
       * // Chrome Flags (Global, 1-4)
       * chrome, chrome1, chrome2, chrome3, chrome4,
       * // Safari Flags (Global, 1-4)
       * safari, safari2, safari3, safari4,
       * // Opera Flags (Global, 7-10)
       * opera, opera7, opera8, opera9, opera10,
       * // Rendering Engines (Gecko, Webkit, Trident, KHTML, Presto)
       * gecko, webkit, trident, khtml, presto,
       * // Operating Systems (Win, Mac, Linux, Solaris, iPhone)
       * win, mac, linux, solaris, iphone,
       * unknown // Unknown covers everything else
       */
    },
    display: [], // What browsers to display and their order (default set below)
    browserShow: true, // Should the browser options be shown?
    browserInfo: { // Settings for which browsers to display
      msie: {
        text: 'Internet Explorer',
        url: 'http://www.microsoft.com/windows/Internet-explorer/'
      },
      firefox: {
        text: 'Mozilla Firefox', // Text below the icon
        url: 'http://www.mozilla.com/firefox/' // URL For icon/text link
      }, 
      chrome: {
        text: 'Google Chrome',
        url: 'http://www.google.com/chrome/'
      },
      /*safari: {
        text: 'Safari 5',
        url: 'http://www.apple.com/safari/download/'
      },
      opera: {
        text: 'Opera 12',
        url: 'http://www.opera.com/download/'
      },
      gcf: {
        text: 'Google Chrome Frame',
        url: 'http://code.google.com/chrome/chromeframe/',
        // This browser option will only be displayed for MSIE
        allow: { all: false, msie: true }
      }*/
    },

    // Header of pop-up window
    header: 'Your Browser is Not Supported',
    // Paragraph 1
    paragraph1: 'Your web browser is either out of date or not compatible with '+
          'this website. A supported browser can be downloaded from the options below. '+ 
          'By closing this window you may find some of the features on this website unusable.',
    // Paragraph 2
    paragraph2: '',
    close: true, // Allow closing of window
    // Message displayed below closing link
    closeMessage: '',
    closeLink: 'Close', // Text for closing link
    closeURL: '#', // Close URL
    closeESC: true, // Allow closing of window with esc key

    // If cookies should be used to remmember if the window was closed
    // See cookieSettings for more options
    closeCookie: true,
    // Cookie settings are only used if closeCookie is true
    cookieSettings: {
      // Path for the cookie to be saved on
      // Should be root domain in most cases
      path: '/',
      // Expiration Date (in seconds)
      // 0 (default) means it ends with the current session
      expires: 0
    },

    imagePath: '../../_includes/images/', // Path where images are located
    overlayBgColor: '#000', // Background color for overlay
    overlayOpacity: 0.85, // Background transparency (0-1)

    // Fade in time on open ('slow','medium','fast' or integer in ms)
    fadeInTime: 'fast',
    // Fade out time on close ('slow','medium','fast' or integer in ms)
    fadeOutTime: 'fast',

    // Google Analytics Link Tracking (Optional)
    // Set to true to enable
    // Note: Analytics tracking code must be added separately
    analytics: false
  }, options);

  // Set default browsers to display if not already defined
  if (opts.display.length < 1) {
    opts.display = ['chrome','firefox','safari','opera','gcf','msie'];
  }

  // beforeRject: Customized Function
  if ($.isFunction(opts.beforeReject)) {
    opts.beforeReject();
  }

  // Disable 'closeESC' if closing is disabled (mutually exclusive)
  if (!opts.close) {
    opts.closeESC = false;
  }

  // This function parses the advanced browser options
  var browserCheck = function(settings) {
    // Check 1: Look for 'all' forced setting
    // Check 2: Operating System (eg. 'win','mac','linux','solaris','iphone')
    // Check 3: Rendering engine (eg. 'webkit', 'gecko', 'trident')
    // Check 4: Browser name (eg. 'firefox','msie','chrome')
    // Check 5: Browser+major version (eg. 'firefox3','msie7','chrome4')
    return (settings['all'] ? true : false) ||
      (settings[$.os.name] ? true : false) ||
      (settings[$.layout.name] ? true : false) ||
      (settings[$.browser.name] ? true : false) ||
      (settings[$.browser.className] ? true : false);
  };

  // Determine if we need to display rejection for this browser, or exit
  if (!browserCheck(opts.reject)) {
    // onFail: Customized Function
    if ($.isFunction(opts.onFail)) {
      opts.onFail();
    }

    return false;
  }

  // If user can close and set to remmember close, initiate cookie functions
  if (opts.close && opts.closeCookie) {
    // Local global setting for the name of the cookie used
    var COOKIE_NAME = 'jreject-close';

    // Cookies Function: Handles creating/retrieving/deleting cookies
    // Cookies are only used for opts.closeCookie parameter functionality
    var _cookie = function(name, value) {
      // Save cookie
      if (typeof value != 'undefined') {
        var expires = '';

        // Check if we need to set an expiration date
        if (opts.cookieSettings.expires !== 0) {
          var date = new Date();
          date.setTime(date.getTime()+(opts.cookieSettings.expires*1000));
          expires = "; expires="+date.toGMTString();
        }

        // Get path from settings
        var path = opts.cookieSettings.path || '/';

        // Set Cookie with parameters
        document.cookie = name+'='+
          encodeURIComponent((!value) ? '' : value)+expires+
          '; path='+path;

        return true;
      }
      // Get cookie
      else {
        var cookie,val = null;

        if (document.cookie && document.cookie !== '') {
          var cookies = document.cookie.split(';');

          // Loop through all cookie values
          var clen = cookies.length;
          for (var i = 0; i < clen; ++i) {
            cookie = $.trim(cookies[i]);

            // Does this cookie string begin with the name we want?
            if (cookie.substring(0,name.length+1) == (name+'=')) {
              var len = name.length;
              val = decodeURIComponent(cookie.substring(len+1));
              break;
            }
          }
        }

        // Returns cookie value
        return val;
      }
    };

    // If cookie is set, return false and don't display rejection
    if (_cookie(COOKIE_NAME)) {
      return false;
    }
  }

  // Load background overlay (jr_overlay) + Main wrapper (jr_wrap) +
  // Inner Wrapper (jr_inner) w/ opts.header (jr_header) +
  // opts.paragraph1/opts.paragraph2 if set
  var html = '<div id="jr_overlay"></div><div id="jr_wrap"><div id="jr_inner">'+
    '<h1 id="jr_header">'+opts.header+'</h1>'+
    (opts.paragraph1 === '' ? '' : '<p>'+opts.paragraph1+'</p>')+
    (opts.paragraph2 === '' ? '' : '<p>'+opts.paragraph2+'</p>');

  if (opts.browserShow) {
    html += '<ul>';

    var displayNum = 0;

    // Generate the browsers to display
    for (var x in opts.display) {
      var browser = opts.display[x]; // Current Browser
      var info = opts.browserInfo[browser] || false; // Browser Information

      // If no info exists for this browser
      // or if this browser is not suppose to display to this user
      if (!info || (info['allow'] != undefined && !browserCheck(info['allow']))) {
        continue;
      }

      var url = info.url || '#'; // URL to link text/icon to

      // Generate HTML for this browser option
      html += '<li id="jr_'+browser+'"><div class="jr_icon"></div>'+
          '<div><strong><a href="'+url+'">'+(info.text || 'Unknown')+'</a></strong>'+
          '</div></li>';

      ++displayNum;
    }

    html += '</ul>';
  }

  // Close list and #jr_list
  html += '<div id="jr_close">'+
  // Display close links/message if set
  (opts.close ? '<a href="'+opts.closeURL+'">'+opts.closeLink+'</a>'/*+
    '<p>'+opts.closeMessage+'</p>'*/ : '')+'</div>'+
  // Close #jr_inner and #jr_wrap
  '</div></div>';

  var element = $('<div>'+html+'</div>'); // Create element
  var size = _pageSize(); // Get page size
  var scroll = _scrollSize(); // Get page scroll

  // This function handles closing this reject window
  // When clicked, fadeOut and remove all elements
  element.bind('closejr', function() {
    // Make sure the permission to close is granted
    if (!opts.close) {
      return false;
    }

    // Customized Function
    if ($.isFunction(opts.beforeClose)) {
      opts.beforeClose();
    }

    // Remove binding function so it
    // doesn't get called more than once
    $(this).unbind('closejr');

    // Fade out background and modal wrapper
    $('#jr_overlay,#jr_wrap').fadeOut(opts.fadeOutTime,function() {
      $(this).remove(); // Remove element from DOM

      // afterClose: Customized Function
      if ($.isFunction(opts.afterClose)) {
        opts.afterClose();
      }
    });

    // Show elements that were hidden for layering issues
    var elmhide = 'embed.jr_hidden, object.jr_hidden, select.jr_hidden, applet.jr_hidden';
    $(elmhide).show().removeClass('jr_hidden');

    // Set close cookie for next run
    if (opts.closeCookie) {
      _cookie(COOKIE_NAME, 'true');
    }

    return true;
  });

  // Tracks clicks in Google Analytics (category 'External Links')
  // only if opts.analytics is enabled
  var analytics = function (url) {
    if (!opts.analytics) return false;

    // Get just the hostname
    var host = url.split(/\/+/g)[1];

    // Send external link event to Google Analaytics
    // Attempts both versions of analytics code. (Newest first)
    try {
      // Newest analytics code
      _gaq.push(['_trackEvent', 'External Links',  host, url]);
    } catch (e) {
      try {
        // Older analytics code
        pageTracker._trackEvent('External Links', host, url);
      } catch (e) { }
    }
  };

  // Called onClick for browser links (and icons)
  // Opens link in new window
  var openBrowserLinks = function(url) {
    // Send link to analytics if enabled
    analytics(url);

    // Open window, generate random id value
    window.open(url, 'jr_'+ Math.round(Math.random()*11));

    return false;
  };

  /*
   * Trverse through element DOM and apply JS variables
   * All CSS elements that do not require JS will be in
   * css/jquery.jreject.css
   */

  // Creates 'background' (div)
  element.find('#jr_overlay').css({
    width: size[0],
    height: size[1],
    background: opts.overlayBgColor,
    opacity: opts.overlayOpacity
  });

  // Wrapper for our pop-up (div)
  element.find('#jr_wrap').css({
    top: scroll[1]+(size[3]/4),
    left: scroll[0]
  });

  // Wrapper for inner centered content (div)
  element.find('#jr_inner').css({
    minWidth: displayNum*100,
    maxWidth: displayNum*140,
    // min/maxWidth not supported by IE
    width: $.layout.name == 'trident' ? displayNum*155 : 'auto'
  });

  /*element.find('#jr_inner li').css({ // Browser list items (li)
    background: 'transparent url("'+opts.imagePath+'background_browser.gif")'+
          'no-repeat scroll left top'
  });*/

  element.find('#jr_inner li .jr_icon').each(function() {
    // Dynamically sets the icon background image
    var self = $(this);
    self.css('background','transparent url('+opts.imagePath+'browser_'+
        (self.parent('li').attr('id').replace(/jr_/,''))+'.png)'+
          ' no-repeat scroll left top');

    // Send link clicks to openBrowserLinks
    self.click(function () {
      var url = $(this).next('div').children('a').attr('href');
      openBrowserLinks(url);
    });
  });

  element.find('#jr_inner li a').click(function() {
    openBrowserLinks($(this).attr('href'));
    return false;
  });

  // Bind closing event to trigger closejr
  // to be consistant with ESC key close function
  element.find('#jr_close a').click(function() {
    $(this).trigger('closejr');

    // If plain anchor is set, return false so there is no page jump
    if (opts.closeURL === '#') {
      return false;
    }
  });

  // Set focus (fixes ESC key issues with forms and other focus bugs)
  $('#jr_overlay').focus();

  // Hide elements that won't display properly
  $('embed, object, select, applet').each(function() {
    if ($(this).is(':visible')) {
      $(this).hide().addClass('jr_hidden');
    }
  });

  // Append element to body of document to display
  $('body').append(element.hide().fadeIn(opts.fadeInTime));

  // Handle window resize/scroll events and update overlay dimensions
  $(window).bind('resize scroll',function() {
    var size = _pageSize(); // Get size

    // Update overlay dimensions based on page size
    $('#jr_overlay').css({
      width: size[0],
      height: size[1]
    });

    var scroll = _scrollSize(); // Get page scroll

    // Update modal position based on scroll
    $('#jr_wrap').css({
      top: scroll[1] + (size[3]/4),
      left: scroll[0]
    });
  });

  // Add optional ESC Key functionality
  if (opts.closeESC) {
    $(document).bind('keydown',function(event) {
      // ESC = Keycode 27
      if (event.keyCode == 27) {
        element.trigger('closejr');
      }
    });
  }

  // afterReject: Customized Function
  if ($.isFunction(opts.afterReject)) {
    opts.afterReject();
  }

  return true;
};

// Based on compatibility data from quirksmode.com
var _pageSize = function() {
  var xScroll = window.innerWidth && window.scrollMaxX ?
        window.innerWidth + window.scrollMaxX :
        (document.body.scrollWidth > document.body.offsetWidth ?
        document.body.scrollWidth : document.body.offsetWidth);

  var yScroll = window.innerHeight && window.scrollMaxY ?
        window.innerHeight + window.scrollMaxY :
        (document.body.scrollHeight > document.body.offsetHeight ?
        document.body.scrollHeight : document.body.offsetHeight);

  var windowWidth = window.innerWidth ? window.innerWidth :
        (document.documentElement && document.documentElement.clientWidth ?
        document.documentElement.clientWidth : document.body.clientWidth);

  var windowHeight = window.innerHeight ? window.innerHeight :
        (document.documentElement && document.documentElement.clientHeight ?
        document.documentElement.clientHeight : document.body.clientHeight);

  return [
    xScroll < windowWidth ? xScroll : windowWidth, // Page Width
    yScroll < windowHeight ? windowHeight : yScroll, // Page Height
    windowWidth,windowHeight
  ];
};


// Based on compatibility data from quirksmode.com
var _scrollSize = function() {
  return [
    // scrollSize X
    window.pageXOffset ? window.pageXOffset : (document.documentElement &&
        document.documentElement.scrollTop ?
        document.documentElement.scrollLeft : document.body.scrollLeft),

    // scrollSize Y
    window.pageYOffset ? window.pageYOffset : (document.documentElement &&
        document.documentElement.scrollTop ?
        document.documentElement.scrollTop : document.body.scrollTop)
  ];
};
})(jQuery);

/*************************************************************************************************/
/* jQuery Browser Plugin                                                                         */
/* Version 2.4                                                                                   */
/* Updated By: Steven Bower for use with jReject plugin                                          */
/*************************************************************************************************/ 
(function ($) {
  $.browserTest = function (a, z) {
    var u = 'unknown',
      x = 'X',
      m = function (r, h) {
        for (var i = 0; i < h.length; i = i + 1) {
          r = r.replace(h[i][0], h[i][1]);
        }

        return r;
      }, c = function (i, a, b, c) {
        var r = {
          name: m((a.exec(i) || [u, u])[1], b)
        };

        r[r.name] = true;

        if (!r.opera) {
          r.version = (c.exec(i) || [x, x, x, x])[3];
        }
        else {
          r.version = window.opera.version();
        }

        if (/safari/.test(r.name)) {
          var safariversion = /(safari)(\/|\s)([a-z0-9\.\+]*?)(\;|dev|rel|\s|$)/;
          var res = safariversion.exec(i)
          if (res && res[3] && res[3] < 400) {
            r.version = '2.0';
          }
        }

        else if (r.name === 'presto') {
          r.version = ($.browser.version > 9.27) ? 'futhark' : 'linear_b';
        }

        r.versionNumber = parseFloat(r.version, 10) || 0;
        var minorStart = 1;

        if (r.versionNumber < 100 && r.versionNumber > 9) {
          minorStart = 2;
        }

        r.versionX = (r.version !== x) ? r.version.substr(0, minorStart) : x;
        r.className = r.name + r.versionX;

        return r;
      };

    a = (/Opera|Navigator|Minefield|KHTML|Chrome|CriOS/.test(a) ? m(a, [
      [/(Firefox|MSIE|KHTML,\slike\sGecko|Konqueror)/, ''],
      ['Chrome Safari', 'Chrome'],
      ['CriOS', 'Chrome'],
      ['KHTML', 'Konqueror'],
      ['Minefield', 'Firefox'],
      ['Navigator', 'Netscape']
    ]) : a).toLowerCase();

    $.browser = $.extend((!z) ? $.browser : {}, c(a,
      /(camino|chrome|crios|firefox|netscape|konqueror|lynx|msie|opera|safari)/,
      [],
      /(camino|chrome|crios|firefox|netscape|netscape6|opera|version|konqueror|lynx|msie|safari)(\/|\s)([a-z0-9\.\+]*?)(\;|dev|rel|\s|$)/));

    $.layout = c(a, /(gecko|konqueror|msie|opera|webkit)/, [
      ['konqueror', 'khtml'],
      ['msie', 'trident'],
      ['opera', 'presto']
    ], /(applewebkit|rv|konqueror|msie)(\:|\/|\s)([a-z0-9\.]*?)(\;|\)|\s)/);

    $.os = {
      name: (/(win|mac|linux|sunos|solaris|iphone|ipad)/.
          exec(navigator.platform.toLowerCase()) || [u])[0].replace('sunos', 'solaris')
    };

    if (!z) {
      $('html').addClass([$.os.name, $.browser.name, $.browser.className,
        $.layout.name, $.layout.className].join(' '));
    }
  };

  $.browserTest(navigator.userAgent);
}(jQuery));

/*************************************************************************************************/
/* Kevin's kick-ass polyfill logic                                                               */
/*************************************************************************************************/
if (!Array.prototype.indexOf) {
    Array.prototype.indexOf = function (searchElement, fromIndex) {
      if ( this === undefined || this === null ) {
        throw new TypeError( '"this" is null or not defined' );
      }

      var length = this.length >>> 0; // Hack to convert object.length to a UInt32

      fromIndex = +fromIndex || 0;

      if (Math.abs(fromIndex) === Infinity) {
        fromIndex = 0;
      }

      if (fromIndex < 0) {
        fromIndex += length;
        if (fromIndex < 0) {
          fromIndex = 0;
        }
      }

      for (;fromIndex < length; fromIndex++) {
        if (this[fromIndex] === searchElement) {
          return fromIndex;
        }
      }

      return -1;
    };
  }

/*************************************************************************************************/
/* Redirect al urls with index.php to /                                                          */
/*************************************************************************************************/
if(document.URL.indexOf('index.php')>-1){
  window.location.href = window.location.href.substr(0, window.location.href.indexOf('index.php'));
}

/*************************************************************************************************/
/* jScrollPane - v2.0.19 (minified)                                                              */
/* http://jscrollpane.kelvinluck.com/                                                            */
/*************************************************************************************************/
!function(a,b,c){a.fn.jScrollPane=function(d){function e(d,e){function f(b){var e,h,j,l,m,n,q=!1,r=!1;if(P=b,Q===c)m=d.scrollTop(),n=d.scrollLeft(),d.css({overflow:"hidden",padding:0}),R=d.innerWidth()+tb,S=d.innerHeight(),d.width(R),Q=a('<div class="jspPane" />').css("padding",sb).append(d.children()),T=a('<div class="jspContainer" />').css({width:R+"px",height:S+"px"}).append(Q).appendTo(d);else{if(d.css("width",""),q=P.stickToBottom&&C(),r=P.stickToRight&&D(),l=d.innerWidth()+tb!=R||d.outerHeight()!=S,l&&(R=d.innerWidth()+tb,S=d.innerHeight(),T.css({width:R+"px",height:S+"px"})),!l&&ub==U&&Q.outerHeight()==V)return d.width(R),void 0;ub=U,Q.css("width",""),d.width(R),T.find(">.jspVerticalBar,>.jspHorizontalBar").remove().end()}Q.css("overflow","auto"),U=b.contentWidth?b.contentWidth:Q[0].scrollWidth,V=Q[0].scrollHeight,Q.css("overflow",""),W=U/R,X=V/S,Y=X>1,Z=W>1,Z||Y?(d.addClass("jspScrollable"),e=P.maintainPosition&&(ab||db),e&&(h=A(),j=B()),g(),i(),k(),e&&(y(r?U-R:h,!1),x(q?V-S:j,!1)),H(),E(),N(),P.enableKeyboardNavigation&&J(),P.clickOnTrack&&o(),L(),P.hijackInternalLinks&&M()):(d.removeClass("jspScrollable"),Q.css({top:0,left:0,width:T.width()-tb}),F(),I(),K(),p()),P.autoReinitialise&&!rb?rb=setInterval(function(){f(P)},P.autoReinitialiseDelay):!P.autoReinitialise&&rb&&clearInterval(rb),m&&d.scrollTop(0)&&x(m,!1),n&&d.scrollLeft(0)&&y(n,!1),d.trigger("jsp-initialised",[Z||Y])}function g(){Y&&(T.append(a('<div class="jspVerticalBar" />').append(a('<div class="jspCap jspCapTop" />'),a('<div class="jspTrack" />').append(a('<div class="jspDrag" />').append(a('<div class="jspDragTop" />'),a('<div class="jspDragBottom" />'))),a('<div class="jspCap jspCapBottom" />'))),eb=T.find(">.jspVerticalBar"),fb=eb.find(">.jspTrack"),$=fb.find(">.jspDrag"),P.showArrows&&(jb=a('<a class="jspArrow jspArrowUp" />').bind("mousedown.jsp",m(0,-1)).bind("click.jsp",G),kb=a('<a class="jspArrow jspArrowDown" />').bind("mousedown.jsp",m(0,1)).bind("click.jsp",G),P.arrowScrollOnHover&&(jb.bind("mouseover.jsp",m(0,-1,jb)),kb.bind("mouseover.jsp",m(0,1,kb))),l(fb,P.verticalArrowPositions,jb,kb)),hb=S,T.find(">.jspVerticalBar>.jspCap:visible,>.jspVerticalBar>.jspArrow").each(function(){hb-=a(this).outerHeight()}),$.hover(function(){$.addClass("jspHover")},function(){$.removeClass("jspHover")}).bind("mousedown.jsp",function(b){a("html").bind("dragstart.jsp selectstart.jsp",G),$.addClass("jspActive");var c=b.pageY-$.position().top;return a("html").bind("mousemove.jsp",function(a){r(a.pageY-c,!1)}).bind("mouseup.jsp mouseleave.jsp",q),!1}),h())}function h(){fb.height(hb+"px"),ab=0,gb=P.verticalGutter+fb.outerWidth(),Q.width(R-gb-tb);try{0===eb.position().left&&Q.css("margin-left",gb+"px")}catch(a){}}function i(){Z&&(T.append(a('<div class="jspHorizontalBar" />').append(a('<div class="jspCap jspCapLeft" />'),a('<div class="jspTrack" />').append(a('<div class="jspDrag" />').append(a('<div class="jspDragLeft" />'),a('<div class="jspDragRight" />'))),a('<div class="jspCap jspCapRight" />'))),lb=T.find(">.jspHorizontalBar"),mb=lb.find(">.jspTrack"),bb=mb.find(">.jspDrag"),P.showArrows&&(pb=a('<a class="jspArrow jspArrowLeft" />').bind("mousedown.jsp",m(-1,0)).bind("click.jsp",G),qb=a('<a class="jspArrow jspArrowRight" />').bind("mousedown.jsp",m(1,0)).bind("click.jsp",G),P.arrowScrollOnHover&&(pb.bind("mouseover.jsp",m(-1,0,pb)),qb.bind("mouseover.jsp",m(1,0,qb))),l(mb,P.horizontalArrowPositions,pb,qb)),bb.hover(function(){bb.addClass("jspHover")},function(){bb.removeClass("jspHover")}).bind("mousedown.jsp",function(b){a("html").bind("dragstart.jsp selectstart.jsp",G),bb.addClass("jspActive");var c=b.pageX-bb.position().left;return a("html").bind("mousemove.jsp",function(a){t(a.pageX-c,!1)}).bind("mouseup.jsp mouseleave.jsp",q),!1}),nb=T.innerWidth(),j())}function j(){T.find(">.jspHorizontalBar>.jspCap:visible,>.jspHorizontalBar>.jspArrow").each(function(){nb-=a(this).outerWidth()}),mb.width(nb+"px"),db=0}function k(){if(Z&&Y){var b=mb.outerHeight(),c=fb.outerWidth();hb-=b,a(lb).find(">.jspCap:visible,>.jspArrow").each(function(){nb+=a(this).outerWidth()}),nb-=c,S-=c,R-=b,mb.parent().append(a('<div class="jspCorner" />').css("width",b+"px")),h(),j()}Z&&Q.width(T.outerWidth()-tb+"px"),V=Q.outerHeight(),X=V/S,Z&&(ob=Math.ceil(1/W*nb),ob>P.horizontalDragMaxWidth?ob=P.horizontalDragMaxWidth:ob<P.horizontalDragMinWidth&&(ob=P.horizontalDragMinWidth),bb.width(ob+"px"),cb=nb-ob,u(db)),Y&&(ib=Math.ceil(1/X*hb),ib>P.verticalDragMaxHeight?ib=P.verticalDragMaxHeight:ib<P.verticalDragMinHeight&&(ib=P.verticalDragMinHeight),$.height(ib+"px"),_=hb-ib,s(ab))}function l(a,b,c,d){var e,f="before",g="after";"os"==b&&(b=/Mac/.test(navigator.platform)?"after":"split"),b==f?g=b:b==g&&(f=b,e=c,c=d,d=e),a[f](c)[g](d)}function m(a,b,c){return function(){return n(a,b,this,c),this.blur(),!1}}function n(b,c,d,e){d=a(d).addClass("jspActive");var f,g,h=!0,i=function(){0!==b&&vb.scrollByX(b*P.arrowButtonSpeed),0!==c&&vb.scrollByY(c*P.arrowButtonSpeed),g=setTimeout(i,h?P.initialDelay:P.arrowRepeatFreq),h=!1};i(),f=e?"mouseout.jsp":"mouseup.jsp",e=e||a("html"),e.bind(f,function(){d.removeClass("jspActive"),g&&clearTimeout(g),g=null,e.unbind(f)})}function o(){p(),Y&&fb.bind("mousedown.jsp",function(b){if(b.originalTarget===c||b.originalTarget==b.currentTarget){var d,e=a(this),f=e.offset(),g=b.pageY-f.top-ab,h=!0,i=function(){var a=e.offset(),c=b.pageY-a.top-ib/2,f=S*P.scrollPagePercent,k=_*f/(V-S);if(0>g)ab-k>c?vb.scrollByY(-f):r(c);else{if(!(g>0))return j(),void 0;c>ab+k?vb.scrollByY(f):r(c)}d=setTimeout(i,h?P.initialDelay:P.trackClickRepeatFreq),h=!1},j=function(){d&&clearTimeout(d),d=null,a(document).unbind("mouseup.jsp",j)};return i(),a(document).bind("mouseup.jsp",j),!1}}),Z&&mb.bind("mousedown.jsp",function(b){if(b.originalTarget===c||b.originalTarget==b.currentTarget){var d,e=a(this),f=e.offset(),g=b.pageX-f.left-db,h=!0,i=function(){var a=e.offset(),c=b.pageX-a.left-ob/2,f=R*P.scrollPagePercent,k=cb*f/(U-R);if(0>g)db-k>c?vb.scrollByX(-f):t(c);else{if(!(g>0))return j(),void 0;c>db+k?vb.scrollByX(f):t(c)}d=setTimeout(i,h?P.initialDelay:P.trackClickRepeatFreq),h=!1},j=function(){d&&clearTimeout(d),d=null,a(document).unbind("mouseup.jsp",j)};return i(),a(document).bind("mouseup.jsp",j),!1}})}function p(){mb&&mb.unbind("mousedown.jsp"),fb&&fb.unbind("mousedown.jsp")}function q(){a("html").unbind("dragstart.jsp selectstart.jsp mousemove.jsp mouseup.jsp mouseleave.jsp"),$&&$.removeClass("jspActive"),bb&&bb.removeClass("jspActive")}function r(a,b){Y&&(0>a?a=0:a>_&&(a=_),b===c&&(b=P.animateScroll),b?vb.animate($,"top",a,s):($.css("top",a),s(a)))}function s(a){a===c&&(a=$.position().top),T.scrollTop(0),ab=a;var b=0===ab,e=ab==_,f=a/_,g=-f*(V-S);(wb!=b||yb!=e)&&(wb=b,yb=e,d.trigger("jsp-arrow-change",[wb,yb,xb,zb])),v(b,e),Q.css("top",g),d.trigger("jsp-scroll-y",[-g,b,e]).trigger("scroll")}function t(a,b){Z&&(0>a?a=0:a>cb&&(a=cb),b===c&&(b=P.animateScroll),b?vb.animate(bb,"left",a,u):(bb.css("left",a),u(a)))}function u(a){a===c&&(a=bb.position().left),T.scrollTop(0),db=a;var b=0===db,e=db==cb,f=a/cb,g=-f*(U-R);(xb!=b||zb!=e)&&(xb=b,zb=e,d.trigger("jsp-arrow-change",[wb,yb,xb,zb])),w(b,e),Q.css("left",g),d.trigger("jsp-scroll-x",[-g,b,e]).trigger("scroll")}function v(a,b){P.showArrows&&(jb[a?"addClass":"removeClass"]("jspDisabled"),kb[b?"addClass":"removeClass"]("jspDisabled"))}function w(a,b){P.showArrows&&(pb[a?"addClass":"removeClass"]("jspDisabled"),qb[b?"addClass":"removeClass"]("jspDisabled"))}function x(a,b){var c=a/(V-S);r(c*_,b)}function y(a,b){var c=a/(U-R);t(c*cb,b)}function z(b,c,d){var e,f,g,h,i,j,k,l,m,n=0,o=0;try{e=a(b)}catch(p){return}for(f=e.outerHeight(),g=e.outerWidth(),T.scrollTop(0),T.scrollLeft(0);!e.is(".jspPane");)if(n+=e.position().top,o+=e.position().left,e=e.offsetParent(),/^body|html$/i.test(e[0].nodeName))return;h=B(),j=h+S,h>n||c?l=n-P.horizontalGutter:n+f>j&&(l=n-S+f+P.horizontalGutter),isNaN(l)||x(l,d),i=A(),k=i+R,i>o||c?m=o-P.horizontalGutter:o+g>k&&(m=o-R+g+P.horizontalGutter),isNaN(m)||y(m,d)}function A(){return-Q.position().left}function B(){return-Q.position().top}function C(){var a=V-S;return a>20&&a-B()<10}function D(){var a=U-R;return a>20&&a-A()<10}function E(){T.unbind(Bb).bind(Bb,function(a,b,c,d){var e=db,f=ab,g=a.deltaFactor||P.mouseWheelSpeed;return vb.scrollBy(c*g,-d*g,!1),e==db&&f==ab})}function F(){T.unbind(Bb)}function G(){return!1}function H(){Q.find(":input,a").unbind("focus.jsp").bind("focus.jsp",function(a){z(a.target,!1)})}function I(){Q.find(":input,a").unbind("focus.jsp")}function J(){function b(){var a=db,b=ab;switch(c){case 40:vb.scrollByY(P.keyboardSpeed,!1);break;case 38:vb.scrollByY(-P.keyboardSpeed,!1);break;case 34:case 32:vb.scrollByY(S*P.scrollPagePercent,!1);break;case 33:vb.scrollByY(-S*P.scrollPagePercent,!1);break;case 39:vb.scrollByX(P.keyboardSpeed,!1);break;case 37:vb.scrollByX(-P.keyboardSpeed,!1)}return e=a!=db||b!=ab}var c,e,f=[];Z&&f.push(lb[0]),Y&&f.push(eb[0]),Q.focus(function(){d.focus()}),d.attr("tabindex",0).unbind("keydown.jsp keypress.jsp").bind("keydown.jsp",function(d){if(d.target===this||f.length&&a(d.target).closest(f).length){var g=db,h=ab;switch(d.keyCode){case 40:case 38:case 34:case 32:case 33:case 39:case 37:c=d.keyCode,b();break;case 35:x(V-S),c=null;break;case 36:x(0),c=null}return e=d.keyCode==c&&g!=db||h!=ab,!e}}).bind("keypress.jsp",function(a){return a.keyCode==c&&b(),!e}),P.hideFocus?(d.css("outline","none"),"hideFocus"in T[0]&&d.attr("hideFocus",!0)):(d.css("outline",""),"hideFocus"in T[0]&&d.attr("hideFocus",!1))}function K(){d.attr("tabindex","-1").removeAttr("tabindex").unbind("keydown.jsp keypress.jsp")}function L(){if(location.hash&&location.hash.length>1){var b,c,d=escape(location.hash.substr(1));try{b=a("#"+d+', a[name="'+d+'"]')}catch(e){return}b.length&&Q.find(d)&&(0===T.scrollTop()?c=setInterval(function(){T.scrollTop()>0&&(z(b,!0),a(document).scrollTop(T.position().top),clearInterval(c))},50):(z(b,!0),a(document).scrollTop(T.position().top)))}}function M(){a(document.body).data("jspHijack")||(a(document.body).data("jspHijack",!0),a(document.body).delegate("a[href*=#]","click",function(c){var d,e,f,g,h,i,j=this.href.substr(0,this.href.indexOf("#")),k=location.href;if(-1!==location.href.indexOf("#")&&(k=location.href.substr(0,location.href.indexOf("#"))),j===k){d=escape(this.href.substr(this.href.indexOf("#")+1));try{e=a("#"+d+', a[name="'+d+'"]')}catch(l){return}e.length&&(f=e.closest(".jspScrollable"),g=f.data("jsp"),g.scrollToElement(e,!0),f[0].scrollIntoView&&(h=a(b).scrollTop(),i=e.offset().top,(h>i||i>h+a(b).height())&&f[0].scrollIntoView()),c.preventDefault())}}))}function N(){var a,b,c,d,e,f=!1;T.unbind("touchstart.jsp touchmove.jsp touchend.jsp click.jsp-touchclick").bind("touchstart.jsp",function(g){var h=g.originalEvent.touches[0];a=A(),b=B(),c=h.pageX,d=h.pageY,e=!1,f=!0}).bind("touchmove.jsp",function(g){if(f){var h=g.originalEvent.touches[0],i=db,j=ab;return vb.scrollTo(a+c-h.pageX,b+d-h.pageY),e=e||Math.abs(c-h.pageX)>5||Math.abs(d-h.pageY)>5,i==db&&j==ab}}).bind("touchend.jsp",function(){f=!1}).bind("click.jsp-touchclick",function(){return e?(e=!1,!1):void 0})}function O(){var a=B(),b=A();d.removeClass("jspScrollable").unbind(".jsp"),d.replaceWith(Ab.append(Q.children())),Ab.scrollTop(a),Ab.scrollLeft(b),rb&&clearInterval(rb)}var P,Q,R,S,T,U,V,W,X,Y,Z,$,_,ab,bb,cb,db,eb,fb,gb,hb,ib,jb,kb,lb,mb,nb,ob,pb,qb,rb,sb,tb,ub,vb=this,wb=!0,xb=!0,yb=!1,zb=!1,Ab=d.clone(!1,!1).empty(),Bb=a.fn.mwheelIntent?"mwheelIntent.jsp":"mousewheel.jsp";"border-box"===d.css("box-sizing")?(sb=0,tb=0):(sb=d.css("paddingTop")+" "+d.css("paddingRight")+" "+d.css("paddingBottom")+" "+d.css("paddingLeft"),tb=(parseInt(d.css("paddingLeft"),10)||0)+(parseInt(d.css("paddingRight"),10)||0)),a.extend(vb,{reinitialise:function(b){b=a.extend({},P,b),f(b)},scrollToElement:function(a,b,c){z(a,b,c)},scrollTo:function(a,b,c){y(a,c),x(b,c)},scrollToX:function(a,b){y(a,b)},scrollToY:function(a,b){x(a,b)},scrollToPercentX:function(a,b){y(a*(U-R),b)},scrollToPercentY:function(a,b){x(a*(V-S),b)},scrollBy:function(a,b,c){vb.scrollByX(a,c),vb.scrollByY(b,c)},scrollByX:function(a,b){var c=A()+Math[0>a?"floor":"ceil"](a),d=c/(U-R);t(d*cb,b)},scrollByY:function(a,b){var c=B()+Math[0>a?"floor":"ceil"](a),d=c/(V-S);r(d*_,b)},positionDragX:function(a,b){t(a,b)},positionDragY:function(a,b){r(a,b)},animate:function(a,b,c,d){var e={};e[b]=c,a.animate(e,{duration:P.animateDuration,easing:P.animateEase,queue:!1,step:d})},getContentPositionX:function(){return A()},getContentPositionY:function(){return B()},getContentWidth:function(){return U},getContentHeight:function(){return V},getPercentScrolledX:function(){return A()/(U-R)},getPercentScrolledY:function(){return B()/(V-S)},getIsScrollableH:function(){return Z},getIsScrollableV:function(){return Y},getContentPane:function(){return Q},scrollToBottom:function(a){r(_,a)},hijackInternalLinks:a.noop,destroy:function(){O()}}),f(e)}return d=a.extend({},a.fn.jScrollPane.defaults,d),a.each(["arrowButtonSpeed","trackClickSpeed","keyboardSpeed"],function(){d[this]=d[this]||d.speed}),this.each(function(){var b=a(this),c=b.data("jsp");c?c.reinitialise(d):(a("script",b).filter('[type="text/javascript"],:not([type])').remove(),c=new e(b,d),b.data("jsp",c))})},a.fn.jScrollPane.defaults={showArrows:!1,maintainPosition:!0,stickToBottom:!1,stickToRight:!1,clickOnTrack:!0,autoReinitialise:!1,autoReinitialiseDelay:500,verticalDragMinHeight:0,verticalDragMaxHeight:99999,horizontalDragMinWidth:0,horizontalDragMaxWidth:99999,contentWidth:c,animateScroll:!1,animateDuration:300,animateEase:"linear",hijackInternalLinks:!1,verticalGutter:4,horizontalGutter:4,mouseWheelSpeed:3,arrowButtonSpeed:0,arrowRepeatFreq:50,arrowScrollOnHover:!1,trackClickSpeed:0,trackClickRepeatFreq:70,verticalArrowPositions:"split",horizontalArrowPositions:"split",enableKeyboardNavigation:!0,hideFocus:!1,keyboardSpeed:0,initialDelay:300,speed:30,scrollPagePercent:.8}}(jQuery,this);

/*************************************************************************************************/
/* jMouseWheel - v3.1.9 (minified)                                                               */
/* http://jscrollpane.kelvinluck.com/                                                            */
/*************************************************************************************************/
(function(factory){if(typeof define==='function'&&define.amd){define(['jquery'],factory)}else if(typeof exports==='object'){module.exports=factory}else{factory(jQuery)}}(function($){var toFix=['wheel','mousewheel','DOMMouseScroll','MozMousePixelScroll'],toBind=('onwheel'in document||document.documentMode>=9)?['wheel']:['mousewheel','DomMouseScroll','MozMousePixelScroll'],slice=Array.prototype.slice,nullLowestDeltaTimeout,lowestDelta;if($.event.fixHooks){for(var i=toFix.length;i;){$.event.fixHooks[toFix[--i]]=$.event.mouseHooks}}var special=$.event.special.mousewheel={version:'3.1.9',setup:function(){if(this.addEventListener){for(var i=toBind.length;i;){this.addEventListener(toBind[--i],handler,false)}}else{this.onmousewheel=handler}$.data(this,'mousewheel-line-height',special.getLineHeight(this));$.data(this,'mousewheel-page-height',special.getPageHeight(this))},teardown:function(){if(this.removeEventListener){for(var i=toBind.length;i;){this.removeEventListener(toBind[--i],handler,false)}}else{this.onmousewheel=null}},getLineHeight:function(elem){return parseInt($(elem)['offsetParent'in $.fn?'offsetParent':'parent']().css('fontSize'),10)},getPageHeight:function(elem){return $(elem).height()},settings:{adjustOldDeltas:true}};$.fn.extend({mousewheel:function(fn){return fn?this.bind('mousewheel',fn):this.trigger('mousewheel')},unmousewheel:function(fn){return this.unbind('mousewheel',fn)}});function handler(event){var orgEvent=event||window.event,args=slice.call(arguments,1),delta=0,deltaX=0,deltaY=0,absDelta=0;event=$.event.fix(orgEvent);event.type='mousewheel';if('detail'in orgEvent){deltaY=orgEvent.detail*-1}if('wheelDelta'in orgEvent){deltaY=orgEvent.wheelDelta}if('wheelDeltaY'in orgEvent){deltaY=orgEvent.wheelDeltaY}if('wheelDeltaX'in orgEvent){deltaX=orgEvent.wheelDeltaX*-1}if('axis'in orgEvent&&orgEvent.axis===orgEvent.HORIZONTAL_AXIS){deltaX=deltaY*-1;deltaY=0}delta=deltaY===0?deltaX:deltaY;if('deltaY'in orgEvent){deltaY=orgEvent.deltaY*-1;delta=deltaY}if('deltaX'in orgEvent){deltaX=orgEvent.deltaX;if(deltaY===0){delta=deltaX*-1}}if(deltaY===0&&deltaX===0){return}if(orgEvent.deltaMode===1){var lineHeight=$.data(this,'mousewheel-line-height');delta*=lineHeight;deltaY*=lineHeight;deltaX*=lineHeight}else if(orgEvent.deltaMode===2){var pageHeight=$.data(this,'mousewheel-page-height');delta*=pageHeight;deltaY*=pageHeight;deltaX*=pageHeight}absDelta=Math.max(Math.abs(deltaY),Math.abs(deltaX));if(!lowestDelta||absDelta<lowestDelta){lowestDelta=absDelta;if(shouldAdjustOldDeltas(orgEvent,absDelta)){lowestDelta/=40}}if(shouldAdjustOldDeltas(orgEvent,absDelta)){delta/=40;deltaX/=40;deltaY/=40}delta=Math[delta>=1?'floor':'ceil'](delta/lowestDelta);deltaX=Math[deltaX>=1?'floor':'ceil'](deltaX/lowestDelta);deltaY=Math[deltaY>=1?'floor':'ceil'](deltaY/lowestDelta);event.deltaX=deltaX;event.deltaY=deltaY;event.deltaFactor=lowestDelta;event.deltaMode=0;args.unshift(event,delta,deltaX,deltaY);if(nullLowestDeltaTimeout){clearTimeout(nullLowestDeltaTimeout)}nullLowestDeltaTimeout=setTimeout(nullLowestDelta,200);return($.event.dispatch||$.event.handle).apply(this,args)}function nullLowestDelta(){lowestDelta=null}function shouldAdjustOldDeltas(orgEvent,absDelta){return special.settings.adjustOldDeltas&&orgEvent.type==='mousewheel'&&absDelta%120===0}}));

/*************************************************************************************************/
/* jQuery SWFObject v1.1.1 MIT/GPL @jon_neal (minified)                                          */
/* http://jquery.thewikies.com/swfobject                                                         */
/*************************************************************************************************/
(function(f,h,i){function k(a,c){var b=(a[0]||0)-(c[0]||0);return b>0||!b&&a.length>0&&k(a.slice(1),c.slice(1))}function l(a){if(typeof a!=g)return a;var c=[],b="";for(var d in a){b=typeof a[d]==g?l(a[d]):[d,m?encodeURI(a[d]):a[d]].join("=");c.push(b)}return c.join("&")}function n(a){var c=[];for(var b in a)a[b]&&c.push([b,'="',a[b],'"'].join(""));return c.join(" ")}function o(a){var c=[];for(var b in a)c.push(['<param name="',b,'" value="',l(a[b]),'" />'].join(""));return c.join("")}var g="object",m=true;try{var j=i.description||function(){return(new i("ShockwaveFlash.ShockwaveFlash")).GetVariable("$version")}()}catch(p){j="Unavailable"}var e=j.match(/\d+/g)||[0];f[h]={available:e[0]>0,activeX:i&&!i.name,version:{original:j,array:e,string:e.join("."),major:parseInt(e[0],10)||0,minor:parseInt(e[1],10)||0,release:parseInt(e[2],10)||0},hasVersion:function(a){a=/string|number/.test(typeof a)?a.toString().split("."):/object/.test(typeof a)?[a.major,a.minor]:a||[0,0];return k(e,a)},encodeParams:true,expressInstall:"expressInstall.swf",expressInstallIsActive:false,create:function(a){if(!a.swf||this.expressInstallIsActive||!this.available&&!a.hasVersionFail)return false;if(!this.hasVersion(a.hasVersion||1)){this.expressInstallIsActive=true;if(typeof a.hasVersionFail=="function")if(!a.hasVersionFail.apply(a))return false;a={swf:a.expressInstall||this.expressInstall,height:137,width:214,flashvars:{MMredirectURL:location.href,MMplayerType:this.activeX?"ActiveX":"PlugIn",MMdoctitle:document.title.slice(0,47)+" - Flash Player Installation"}}}attrs={data:a.swf,type:"application/x-shockwave-flash",id:a.id||"flash_"+Math.floor(Math.random()*999999999),width:a.width||320,height:a.height||180,style:a.style||""};m=typeof a.useEncode!=="undefined"?a.useEncode:this.encodeParams;a.movie=a.swf;a.wmode=a.wmode||"opaque";delete a.fallback;delete a.hasVersion;delete a.hasVersionFail;delete a.height;delete a.id;delete a.swf;delete a.useEncode;delete a.width;var c=document.createElement("div");c.innerHTML=["<object ",n(attrs),">",o(a),"</object>"].join("");return c.firstChild}};f.fn[h]=function(a){var c=this.find(g).andSelf().filter(g);/string|object/.test(typeof a)&&this.each(function(){var b=f(this),d;a=typeof a==g?a:{swf:a};a.fallback=this;if(d=f[h].create(a)){b.children().remove();b.html(d)}});typeof a=="function"&&c.each(function(){var b=this;b.jsInteractionTimeoutMs=b.jsInteractionTimeoutMs||0;if(b.jsInteractionTimeoutMs<660)b.clientWidth||b.clientHeight?a.call(b):setTimeout(function(){f(b)[h](a)},b.jsInteractionTimeoutMs+66)});return c}})(jQuery,"flash",navigator.plugins["Shockwave Flash"]||window.ActiveXObject);
