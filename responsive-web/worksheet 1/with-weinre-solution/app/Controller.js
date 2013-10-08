var Conference = Conference || {};

﻿Conference.controller = (function ($, document) {
    "use strict";
    
    // This changes the behaviour of the anchor <a> link
    // so that when we click an anchor link we change page without
    // updating the browser's history stack (changeHash: false).
    // We also don't want the usual page transition effect but
    // rather to have no transition (i.e. tabbed behaviour)
    var initialisePage = function(event){
    	  $('a[data-role="tab"]').each(function () {
          var anchor = $(this);
          anchor.bind("click", function () {
             $.mobile.changePage(anchor.attr("href"), { // Go to the URL
                transition: "none",
                changeHash: false
             });
             return false;
          });
       });
    	};

    var init = function () { 
      // The pageinit event is fired when jQM loads a new page for the first time into the 
      // Document Object Model (DOM). When this happens we want the initialisePage function 
      // to be called.	
    	  $(document).live("pageinit", initialisePage);   	 
    };

    // Provides a hash of functions that we return to external code so that they
    // know which functions they can call. In this case just init.
    var pub = {
        init:init
    };

    return pub;
}(jQuery, document));

// Called when jQuery Mobile is loaded and ready to use.
$(document).live("mobileinit", function () {
    Conference.controller.init();
});