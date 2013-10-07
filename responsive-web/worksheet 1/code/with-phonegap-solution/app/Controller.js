var Conference = Conference || {};

Conference.controller = (function ($, document) {
    "use strict";

    var position = null;
    var mapDisplayed = false;
    var currentMapWidth = 0;
    var currentMapHeight = 0;

    // This changes the behaviour of the anchor <a> link
    // so that when we click an anchor link we change page without
    // updating the browser's history stack (changeHash: false).
    // We also don't want the usual page transition effect but
    // rather to have no transition (i.e. tabbed behaviour)
    var initialisePage = function (event) {
        change_page_back_history();
    };

    var onPageChange = function (event, data) {
        // Find the id of the page
        var toPageId = data.toPage.attr("id");

        // If we're about to display the map tab (page) then
        // if not already displayed then display, else if
        // displayed and window dimensions changed then redisplay
        // with new dimensions
        if (toPageId == "map") {
            if (!mapDisplayed || (currentMapWidth != get_map_width() ||
                currentMapHeight != get_map_height())){
                deal_with_geolocation();
            }
        }
    };

    var change_page_back_history = function () {
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

    var deal_with_geolocation = function () {
        var phoneGapApp = (document.URL.indexOf( 'http://' ) === -1 && document.URL.indexOf( 'https://' ) === -1 );
        if (navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry)/)) {
            // Running on a mobile. Will have to add to this list for other mobiles.
            // We need the above because the deviceready event is a phonegap event and
            // if we have access to PhoneGap we want to wait until it is ready before
            // initialising geolocation services
            if (phoneGapApp){
                alert('Running as PhoneGapp app');
                document.addEventListener("deviceready", initiate_geolocation, false);
            }
            else {
                initiate_geolocation(); // Directly from the mobile browser
            }
        } else {
            alert('Running as desktop browser app');
            initiate_geolocation(); // Directly from the browser
        }
    };

    var initiate_geolocation = function () {

        // Do we have built-in support for geolocation (either native browser or phonegap)?
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(handle_geolocation_query, handle_errors);
        }
        else {
            // We don't so let's try a polyfill
            yqlgeo.get('visitor', normalize_yql_response);
        }
    };

    var handle_errors = function (error) {
        switch (error.code) {
            case error.PERMISSION_DENIED:
                alert("user did not share geolocation data");
                break;

            case error.POSITION_UNAVAILABLE:
                alert("could not detect current position");
                break;

            case error.TIMEOUT:
                alert("retrieving position timed out");
                break;

            default:
                alert("unknown error");
                break;
        }
    };

    var normalize_yql_response = function (response) {
        if (response.error) {
            var error = { code: 0 };
            handle_errors(error);
            return;
        }

        position = {
            coords: {
                latitude: response.place.centroid.latitude,
                longitude: response.place.centroid.longitude
            },
            address: {
                city: response.place.locality2.content,
                region: response.place.admin1.content,
                country: response.place.country.content
            }
        };

        handle_geolocation_query(position);
    };

    var get_map_height = function(){
        return $(window).height() - ($('#maptitle').height() + $('#mapfooter').height());
    }

    var get_map_width = function(){
        return $(window).width() ;
    }

    var handle_geolocation_query = function (pos) {
        position = pos;

        var the_height = get_map_height();
        var the_width = get_map_width();

        var image_url = "http://maps.google.com/maps/api/staticmap?sensor=false&center=" + position.coords.latitude + "," +
            position.coords.longitude + "&zoom=14&size=" +
            the_width + "x" + the_height + "&markers=color:blue|label:S|" +
            position.coords.latitude + ',' + position.coords.longitude;

        $('#map-img').remove();

        jQuery('<img/>', {
            id: 'map-img',
            src: image_url,
            title: 'Google map of my location'
        }).appendTo('#mapPos');

        mapDisplayed = true;
    };

    var init = function () {
        // The pagechange event is fired every time we switch pages or display a page
        // for the first time.
        $(document).live("pagechange", onPageChange);
        //$(document).live("", onPageChange);
        // The pageinit event is fired when jQM loads a new page for the first time into the
        // Document Object Model (DOM). When this happens we want the initialisePage function
        // to be called.
        $(document).live("pageinit", initialisePage);
    };


    // Provides a hash of functions that we return to external code so that they
    // know which functions they can call. In this case just init.
    var pub = {
        init: init
    };

    return pub;
}(jQuery, document));

// Called when jQuery Mobile is loaded and ready to use.
$(document).live("mobileinit", function () {
    Conference.controller.init();
});


